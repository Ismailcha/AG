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
            <p><i>escompte : </i>{{ $offer->escompte }}%</p>
            @if ($offer->produits->isEmpty())
                <p>Pas de produit dans ce offre</p>
            @else
                <table class="table table-bordered">
                    <h4><u>Produits</u> :</h4>
                    <div id='quantity-error-message'>
                        <h6 class="text-danger">Quantité est plus que le maximum</h6>
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
                                            <input type="number" class='form-control quantity' min='0'
                                                max='{{ $produit->pivot->quantity }}' name='quantity[]'>
                                            <span class="input-group-text">max:
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
                    <p>Total Commande : </p>
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
    $('#quantity-error-message').hide();

    // Function to calculate the total price for a product row
    function calculateTotalPrice(row) {
        var prixVente = parseFloat(row.find('.prixVente').text());
        var quantity = parseFloat(row.find('input.quantity').val()) || 0;
        var remiseText = row.find('.remise').text().trim(); // Get the remise text
        var remise = parseFloat(remiseText.replace('%', '')) || 0;

        // Calculate the total price
        var total = prixVente * quantity;

        // Apply remise as a percentage
        if (remise > 0) {
            var remiseAmount = (total * remise) / 100;
            total -= remiseAmount;
        }
        return total.toFixed(2); // Round to 2 decimal places
    }

    // Function to update the total produit price for a row
    function updateTotalPrice(row) {
        var total = calculateTotalPrice(row);
        row.find('.total-price').text(total);
    }

    // Event listener for quantity input changes
    $(document).on('input', 'input.quantity', function() {
        var allInputsValid = true;

        // Loop through all quantity inputs and check if any exceed their maximum
        $('input.quantity').each(function() {
            var row = $(this).closest('tr');
            var maxQuantity = parseFloat(row.find('.input-group-text').text().replace('max:', ''));

            // Get the entered quantity
            var enteredQuantity = parseFloat($(this).val()) || 0;

            // Check if the entered quantity exceeds the maximum allowed
            if (enteredQuantity > maxQuantity) {
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
    });
</script>
