<x-default-layout>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Set the title -->
    @section('title', 'Create Offer')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Page content -->
    <div class="container">
        <h1>Create Offer</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Offer creation form -->
        <form method="POST" action="{{ route('offers.store') }}">
            @csrf

            <!-- Offer Name -->
            <div class="form-group">
                <label for="offre_name">Offer Name</label>
                <input type="text" class="form-control" id="offre_name" name="offre_name" required>
            </div>

            <!-- Laboratoire -->
            <div class="form-group">
                <label for="laboratoire">Laboratoire</label>
                <input type="text" class="form-control" id="laboratoire" name="laboratoire" required>
            </div>

            <!-- Grossiste (optional) -->
            <div class="form-group">
                <label for="grossiste">Grossiste</label>
                <input type="text" class="form-control" id="grossiste" name="grossiste">
            </div>

            <!-- Date Start -->
            <div class="form-group">
                <label for="date_start">Date Start</label>
                <input type="date" class="form-control" id="date_start" name="date_start" required>
            </div>

            <!-- Date End -->
            <div class="form-group">
                <label for="date_end">Date End</label>
                <input type="date" class="form-control" id="date_end" name="date_end" required>
            </div>

            <!-- Escompte -->
            <div class="form-group">
                <label for="escompte">Escompte</label>
                <input type="number" class="form-control" id="escompte" name="escompte" required>
            </div>

            <!-- Min Total -->
            <div class="form-group">
                <label for="min_total">Min Total</label>
                <input type="number" class="form-control" id="min_total" name="min_total" required>
            </div>

            <!-- Add Products Section -->


            <!-- Table to display selected products -->
            <h2>Selected Produits</h2>
            <table class="table" id="selectedProductTable">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Prix Achat</th>
                        <th>Qty</th>
                        <th>Remise</th>
                        <th>Prix Remise</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- This table will be populated with selected products via JavaScript -->
                </tbody>
            </table>
            <h2>Add Products to Offer</h2>
            <!-- You can include code here to select products and associate them with the offer -->
            <div class="form-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Search by Name">
            </div>

            <!-- Display a table of products with live search -->
            <table class="table" id="productTable">
                <thead>
                    <tr>
                        <th>Nom De produit</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td><img src="{{ asset('storage/' . $produit->image) }}" alt="Produit Image" width="90">
                            </td>
                            <td>
                                <button class="add-product-btn btn btn-primary" data-nom="{{ $produit->nom }}"
                                    data-prixAchat="{{ $produit->prixAchat }}">+</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Create Offer</button>
        </form>
    </div>
</x-default-layout>

<script>
   $(document).ready(function() {
    // Reference to the product table body
    var productTableBody = $('#productTable tbody');
    // Reference to the selected product table body
    var selectedProductTableBody = $('#selectedProductTable tbody');

    // Function to fetch and display all products
    function displayAllProducts() {
        // Send an AJAX request to the server to get all products
        $.ajax({
            type: 'GET',
            url: '{{ route('produits.all') }}', // Use the correct route name for fetching all products
            success: function(response) {
                // Clear the table body
                productTableBody.empty();

                var produits = response.produits;

                if (produits.length > 0) {
                    produits.forEach(function(product) {
                        // Display each product
                        productTableBody.append('<tr><td>' + product.nom +
                            '</td><td><img src="{{ asset('storage/') }}/' +
                            product.image +
                            '" alt="Produit Image" width="90"></td>' +
                            '<td><button class="add-product-btn btn btn-primary" data-nom="' +
                            product.nom + '" data-prixAchat="' + product.prixAchat +
                            '">+</button></td></tr>'
                        );
                    });
                } else {
                    // No products found
                    productTableBody.append(
                        '<tr><td colspan="3">Aucun produit trouvé </td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Initial display of all products
    displayAllProducts();

    // Listen for keyup event on the search input
    $('#searchInput').keyup(function() {
        // Get the search query value
        var query = $(this).val();

        // If the search query is empty, display all products
        if (query === '') {
            displayAllProducts();
            return;
        }

        // Send an AJAX request to the server to search for products
        $.ajax({
            type: 'GET',
            url: '{{ route('produits.search') }}', // Use the correct route name for searching products
            data: {
                query: query
            },
            success: function(response) {
                // Clear the table body
                productTableBody.empty();

                if (query !== '') {
                    var produits = response.produits;

                    if (produits.length > 0) {
                        produits.forEach(function(product) {
                            // Display each matching product
                            productTableBody.append('<tr><td>' + product.nom +
                                '</td><td><img src="{{ asset('storage/') }}/' +
                                product.image +
                                '" alt="Produit Image" width="90"></td>' +
                                '<td><button class="add-product-btn btn btn-primary" data-nom="' +
                                product.nom + '" data-prixAchat="' + product
                                .prixAchat + '">+</button></td></tr>'
                            );
                        });
                    } else {
                        // No matching products found
                        productTableBody.append(
                            '<tr><td colspan="3">Aucun résultat trouvé </td></tr>');
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Listen for input change events on the discount[] and qty[] inputs
    $(document).on('input', 'input[name="discount[]"], input[name="qty[]"]', function() {
        var row = $(this).closest('tr');
        var productPrixAchatInput = row.find('input[name="productPrixAchat[]"]');
        var discountedPrixAchatInput = row.find('input[name="discountedPrixAchat[]"]');
        
        // Get the values as numbers
        var productPrixAchat = parseFloat(productPrixAchatInput.val()) || 0;
        var discount = parseFloat(row.find('input[name="discount[]"]').val()) || 0;
        var qty = parseFloat(row.find('input[name="qty[]"]').val()) || 0;
        
        // Calculate the discountedPrixAchat
        var discountedPrixAchat = (productPrixAchat - discount) * qty;
        
        // Update the discountedPrixAchatInput
        discountedPrixAchatInput.val(discountedPrixAchat);
    });

    // Listen for click events on the "+" buttons
    $(document).on('click', '.add-product-btn', function(e) {
        e.preventDefault();
        var productName = $(this).data('nom');
        var productPrixAchat = $(this).data('prixachat');
        
        // Check if a row with the same product already exists
        var existingRow = selectedProductTableBody.find('tr[data-nom="' + productName + '"]');
        
        if (existingRow.length === 0) {
            // If the row doesn't exist, create a new row for the selected product
            var newRow = '<tr data-nom="' + productName + '">' +
                '<td><input type="text" class="form-control" value="' + productName +
                '" name="productName[]" readonly></td>' +
                '<td><input type="text" class="form-control" value="' + productPrixAchat +
                '" name="productPrixAchat[]" readonly></td>' +
                '<td><input type="number" class="form-control" name="qty[]"></td>' +
                '<td><input type="number" class="form-control" name="discount[]" oninput="updateDiscountedPrixAchat(this)"></td>' +
                '<td><input type="number" class="form-control" name="discountedPrixAchat[]"></td>' +
                '<td><button class="remove-product-btn btn btn-primary">-</button></td>' +
                '</tr>';

            // Append the new row to the selected product table
            selectedProductTableBody.append(newRow);
        }
    });

    // Listen for click events on the "-" buttons to remove rows
    $(document).on('click', '.remove-product-btn', function() {
        $(this).closest('tr').remove();
    });
    
   // Function to calculate and update discountedPrixAchat
function updateDiscountedPrixAchat(input) {
    var row = $(input).closest('tr');
    var productPrixAchatInput = row.find('input[name="productPrixAchat[]"]');
    var discountedPrixAchatInput = row.find('input[name="discountedPrixAchat[]"]');
    
    // Get the values as numbers
    var productPrixAchat = parseFloat(productPrixAchatInput.val()) || 0;
    var discountPercentage = parseFloat(input.value) || 0;
    
    // Ensure discountPercentage is within the range [0, 100]
    discountPercentage = Math.min(Math.max(discountPercentage, 0), 100);
    
    // Calculate the discountedPrixAchat as (productPrixAchat * (100 - discountPercentage)) / 100
    var discountedPrixAchat = ((productPrixAchat / discountPercentage)) / 100;
    
    // Update the discountedPrixAchatInput
    discountedPrixAchatInput.val(discountedPrixAchat.toFixed(2)); // Round to 2 decimal places
}


});
</script>
