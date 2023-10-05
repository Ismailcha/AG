<x-default-layout>
    @section('title')
        <h2 class="text-primary">Commandez</h2>
    @endsection

    <!--begin::Row-->
    <div class="card">
        <div class="card-header mb-5">
            <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                <h3 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7 mt-5">{{ $offer->offre_name }}</h3>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="row g-5 g-xl-10 mt-5 mb-xl-10">
                <div class="container mt-5 justify-content-center ">
                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                        <p class="flex-root d-flex flex-column"><i class="text-muted">laboratoire :
                            </i><span class="fs-5">{{ $offer->laboratoire }}</span></p>
                        <p class="flex-root d-flex flex-column"><i class="text-muted">grossiste : </i>
                            @if ($offer->grossiste !== null)
                                {{ $offer->grossiste }}
                            @else
                                <span>Pas de grossiste</span>
                            @endif
                        </p>
                        <p class="flex-root d-flex flex-column"><i class="text-muted">date debut :
                            </i>{{ $offer->date_start }}</p>
                        <p class="flex-root d-flex flex-column"><i class="text-muted">date fin :
                            </i>{{ $offer->date_end }}
                        </p>
                        <p class="flex-root d-flex flex-column"><i class="text-muted">Total minimum : </i><span
                                class="total-minimum">{{ $offer->min_total }}</span></p>
                        <p class="flex-root d-flex flex-column"><i class="text-muted">escompte :
                            </i>{{ $offer->escompte }}%
                        </p>
                    </div>
                    <p id="total-min-message" class='text-danger'>Votre total doit etre supperieur ou egal le total
                        minimum</p>
                    @if ($offer->produits->isEmpty())
                        <p>Pas de produit dans cette offre</p>
                    @else
                        <h4 class="min-w-175px pb-2 m-5">Produits :</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">

                                <div id='quantity-error-message'>
                                    <h6 class="text-danger">Quantité est moin que le minimum</h6>
                                </div>
                                <thead>
                                    <tr class='text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'>
                                        <th class="min-w-100px sorting">Nom Produit</th>
                                        <th class="min-w-100px sorting">Prix</th>
                                        <th class="min-w-100px sorting">Quantité</th>
                                        <th class="min-w-100px sorting">Remise</th>
                                        <th class="min-w-100px sorting">Total produit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('commandesindividu.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $offer->id }}" name='id_offer'>
                                        @foreach ($offer->produits as $produit)
                                            <tr>
                                                <input type="hidden" value="{{ $produit->id }}" name="id_produit[]">
                                                <td class='text-gray-800 fw-bold'>
                                                    {{ $produit->nom }}</td>
                                                <td class='prixVente text-gray-800 fw-bold'>
                                                    {{ $produit->prixVente }}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="number" class='form-control quantity'
                                                            min='{{ $produit->pivot->quantity }}' name='quantity[]'>
                                                        <span class="input-group-text text-gray-80 fw-bold">Min:
                                                            {{ $produit->pivot->quantity }}</span>
                                                    </div>
                                                </td>
                                                <input type="hidden" value="{{ $produit->pivot->discount }}"
                                                    name='discount[]' class="text-gray-800 fw-bold">
                                                <td class='remise text-gray-800fw-bold'>
                                                    {{ $produit->pivot->discount }}%</td>
                                                <td class='total-price'>
                                                    <input type="text" class="form-control total-price-input"
                                                        readonly>
                                                </td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
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
