<x-default-layout>
    @section('title')
        <h2 class="text-primary">{{ $offer->offre_name }}</h2>
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-5 justify-content-center">
            <h2 class='text-center text-primary'></h2>
            <p><i>laboratoire : </i>{{ $offer->laboratoire }}</p>
            <p><i>grossiste : </i>
                @if ($offer->grossiste !== null)
                    {{ $offer->grossiste }}
                @else
                    <span>Pas de grossiste</span>
                @endif
            </p>
            <p><i>date debut : </i>{{ $offer->date_start }}</p>
            <p><i>date fin : </i>{{ $offer->date_end }}</p>
            <p><i>Total minimum : </i><span class="total-minimum">{{ $offer->min_total }}</span></p>
            <p><i>escompte : </i>{{ $offer->escompte }}%</p>
            <p id="total-min-message" class='text-danger'>Votre total doit etre supperieur ou egal le total minimum</p>
            @if ($offer->produits->isEmpty())
                <p>Pas de produit dans cette offre</p>
            @else
                <table class="table table-bordered">
                    <h4><u>Produits</u> :</h4>
                    <div id='quantity-error-message'>
                        <h6 class="text-danger">Quantité est moin que le minimum</h6>
                    </div>
                    <thead>
                        <tr>
                            <th>Nom Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Remise</th>
                            <th>Total produit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('commandesindividu.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $offer->id }}" name='id_offer'>
                            @foreach ($offer->produits as $produit)
                                <tr>
                                    <input type="hidden" value="{{ $produit->id }}" name="id_produit[]">
                                    <td>{{ $produit->nom }}</td>
                                    <td class='prixVente'>{{ $produit->prixVente }}</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="number" class='form-control quantity'
                                                min='{{ $produit->pivot->quantity }}' name='quantity[]'>
                                            <span class="input-group-text">Min:
                                                {{ $produit->pivot->quantity }}</span>
                                        </div>
                                    </td>
                                    <input type="hidden" value="{{ $produit->pivot->discount }}" name='discount[]'>
                                    <td class='remise'>{{ $produit->pivot->discount }}%</td>
                                    <td class='total-price'>
                                        <input type="text" class="form-control total-price-input" readonly>
                                    </td>
                                </tr>
                            @endforeach

                    </tbody>
                </table>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <p>Total sans remise : <span class='tsremise'></span></p>
                    <p>Total prix remis : <span class='tpremiser'></span></p>
                    <p>Gains : <span class='gain'></span></p>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary" id="submit-button">Commendez</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
<script>
    $(document).ready(function() {
        $('#quantity-error-message').hide();
        $('#total-min-message').hide();
        // Function to update the total product price for a row
        function updateTotalPrice(row) {
            var prixVente = parseFloat(row.find('.prixVente').text());
            var quantity = parseFloat(row.find('input.quantity').val()) || 0;
            var remiseText = row.find('.remise').text().trim();
            var remise = parseFloat(remiseText.replace('%', '')) || 0;

            // Calculate the total price before remise
            var totalBeforeRemise = prixVente * quantity;

            // Apply remise as a percentage
            if (remise > 0) {
                var remiseAmount = (totalBeforeRemise * remise) / 100;
                var totalAfterRemise = totalBeforeRemise - remiseAmount;
                row.find('.total-price').text(totalAfterRemise.toFixed(2));
            } else {
                // If no remise, update with the total before remise
                row.find('.total-price').text(totalBeforeRemise.toFixed(2));
            }
        }

        // Function to calculate and display the totals
        // Function to calculate and display the totals
        function calculateAndDisplayTotals() {
            var tsRemise = 0;
            var tpRemiser = 0;

            // Loop through all rows and calculate the totals
            $('table > tbody > tr').each(function() {
                var row = $(this);
                var prixVente = parseFloat(row.find('.prixVente').text());
                var quantity = parseFloat(row.find('input.quantity').val()) || 0;
                // Calculate and display the product of prixVente and quantity for each row
                var rowTotal = prixVente * quantity;
                // Sum up the rowTotal for tsRemise
                tsRemise += rowTotal;
            });

            // Calculate total with remises applied
            $('table > tbody > tr').each(function() {
                var total = parseFloat($(this).find('.total-price').text()) || 0;
                tpRemiser += total;
            });

            // Display the calculated totals
            $('.tsremise').text(tsRemise.toFixed(2));
            $('.tpremiser').text(tpRemiser.toFixed(2));
            $('.gain').text((tsRemise - tpRemiser - ({{ $offer->escompte }} * tpRemiser / 100)).toFixed(2));
        }


        // Event listener for quantity input changes
        $(document).on('input', 'input.quantity', function() {
            var allInputsValid = true;

            // Loop through all quantity inputs and check if any are less than the minimum
            $('input.quantity').each(function() {
                var row = $(this).closest('tr');
                var minQuantity = parseFloat(row.find('.input-group-text').text().replace(
                    'Min:', ''));

                // Get the entered quantity
                var enteredQuantity = parseFloat($(this).val()) || 0;

                // Check if the entered quantity is less than the minimum allowed
                if (enteredQuantity < minQuantity) {
                    allInputsValid = false;
                    return false; // Exit the loop if an input is invalid
                }
            });

            // Show or hide the error message based on validation results
            if (allInputsValid) {
                $('#quantity-error-message').hide();
            } else {
                $('#quantity-error-message').show();
            }

            // Enable or disable the submit button based on validation results
            if (allInputsValid) {
                $('#submit-button').prop('disabled', false);
            } else {
                $('#submit-button').prop('disabled', true);
            }

            // Update the total prices for all rows
            $('input.quantity').each(function() {
                var row = $(this).closest('tr');
                updateTotalPrice(row);
            });

            // Calculate and display the totals
            calculateAndDisplayTotals();
            // Call the function to check the Total minimum initially
            checkTotalMin();
        });

        // Initial calculation
        $('tr').each(function() {
            var row = $(this);
            updateTotalPrice(row);
        });

        function checkTotalMin() {
            var prixRemis = parseFloat($('.tpremiser').text()) || 0;
            var totalMin = parseFloat($('.total-minimum').text()) || 0;
            if (prixRemis <= totalMin) {
                $('#total-min-message').show();
            } else {
                $('#total-min-message').hide();
            }
        }



        // Calculate and display the totals initially
        calculateAndDisplayTotals();
    });
</script>
