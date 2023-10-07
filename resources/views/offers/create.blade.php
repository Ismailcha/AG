<x-default-layout>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Set the title -->
    @section('title', 'Creation d\'offre individual')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Page content -->
    <div class="app-container container-xxl">
        <!-- Include this input field in your form -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>Offer detail</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <form method="POST" action="{{ route('offers.store') }}">
                    @csrf
                    <input type="hidden" name="offer_id" value="{{ $offer->id }}">

                    <div class="d-flex flex-column gap-5 gap-md-7">
                        <!-- Offer Name -->
                        <div class="d-flex flex-column flex-md-row gap-5">
                            <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                <label for="offre_name" class="required form-label">Nom offer</label>
                                <input type="text" placeholder="Nom d'offer" class="form-control" id="offre_name"
                                    name="offre_name" required>
                            </div>

                            <!-- Laboratoire -->
                            <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                <label for="laboratoire"class="required form-label">Laboratoire</label>
                                <input type="text" placeholder="Nom Laboratoire" class="form-control"
                                    id="laboratoire" name="laboratoire" required>
                            </div>
                            <!-- Grossiste (optional) -->
                            <div class="flex-row-fluid">
                                <label for="grossiste"class="form-label">Grossiste</label>
                                <input type="text" placeholder="Grossiste" class="form-control" id="grossiste"
                                    name="grossiste">
                            </div>

                        </div>
                        <div class="d-flex flex-column flex-md-row gap-5">
                            <!-- Date Start -->
                            <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                <label for="date_start"class="required form-label">Date debut</label>
                                <input type="date" class="form-control fw-bold pe-5 flatpickr-input" id="date_start"
                                    name="date_start" required>
                            </div>

                            <!-- Date End -->
                            <div class="flex-row-fluid">
                                <label for="date_end"class="required form-label">Date fin</label>
                                <input type="date" class="form-control fw-bold pe-5 flatpickr-input" id="date_end"
                                    name="date_end" required>
                            </div>

                        </div>



                        <div class="d-flex flex-column flex-md-row gap-5 m-3">
                            <!-- Escompte -->
                            <div class="form-group">
                                <label for="escompte"class="required form-label">Escompte %</label>
                                <input type="number" placeholder="Escompte %" class="form-control" id="escompte"
                                    name="escompte" required>

                            </div>
                            <!-- Min Total -->
                            <div class="form-group">
                                <label for="min_total"class="required form-label">Total minimum de commande</label>
                                <input type="number" placeholder="Total minimum" class="form-control" id="min_total"
                                    name="min_total" required>
                            </div>
                        </div>
                        <!-- Add Products Section -->


                        <!-- Table to display selected products -->
                        <h2>Produits Sélectionnés</h2>
                        <table class="table g-5 gs-0 mb-0 fw-bold text-gray-700" id="selectedProductTable">
                            <thead>
                                <tr>
                                    <th>Nom produit</th>
                                    <th>Prix Achat</th>
                                    <th>Quantité</th>
                                    <th>Remise %</th>
                                    <th>Prix Remise</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- This table will be populated with selected products via JavaScript -->
                            </tbody>
                        </table>

                        <h2>Ajouter des produits a l'offre</h2>
                        <!-- You can include code here to select products and associate them with the offer -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search by Name">
                        </div>
                        <div style="overflow-y: scroll; height:200px;">
                            <!-- Display a table of products with live search -->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="kt_ecommerce_edit_order_product_table" style="width: 100%;">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0"
                                        style="height: 0px;">
                                        <th class="w-25px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 25px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;"></div>
                                        </th>
                                        <th class="min-w-200px sorting"
                                            aria-controls="kt_ecommerce_edit_order_product_table" rowspan="1"
                                            colspan="1"
                                            style="width: 487.733px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                Product
                                            </div>
                                        </th>
                                        <th class="min-w-100px text-end pe-5 sorting"
                                            aria-controls="kt_ecommerce_edit_order_product_table" rowspan="1"
                                            colspan="1"
                                            style="width: 272.683px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Qty
                                                Remaining</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($produits as $produit)
                                        <tr>
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center"
                                                    data-kt-ecommerce-edit-order-filter="product"
                                                    data-kt-ecommerce-edit-order-id="product_1">
                                                    <!--begin::Thumbnail-->
                                                    <a href="../../demo53/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="symbol symbol-50px">
                                                        <span class="symbol-label"
                                                            style="background-image: url({{ asset('storage/' . $produit->image) }});"></span>
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <a href="../../demo53/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                            {{ $produit->nom }}
                                                        </a>
                                                        <!--end::Title-->
                                                        <!--begin::Price-->
                                                        <div class="fw-semibold fs-7">
                                                            Prix
                                                            <span data-kt-ecommerce-edit-order-filter="price">
                                                                {{ $produit->prixVente }} MAD
                                                            </span>
                                                        </div>
                                                        <!--end::Price-->
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end pe-5">
                                                <button class="add-product-btn btn btn-primary"
                                                    data-produit-id="{{ $produit->id }}"
                                                    data-nom="{{ $produit->nom }}"
                                                    data-prixAchat="{{ $produit->prixAchat }}">+</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Cree l'offre</button>
                    </div>
                </form>
            </div>
        </div>
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
                            productTableBody.append('<tr>' +
                                '<td><img src="{{ asset('storage/') }}/' +
                                product.image +
                                '" alt="Produit Image" width="90"></td>' + '<td>' +
                                product.nom +
                                '</td>' +
                                '<td><button class="add-product-btn btn btn-primary" data-nom="' +
                                product.nom + '" data-prixAchat="' + product.prixAchat +
                                '"data-produit-id="' + product.id +
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
                                    .prixAchat + '"data-produit-id="' + product
                                    .id + '">+</button></td></tr>'
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
            var productId = $(this).data('produit-id');
            // Check if a row with the same product already exists
            var existingRow = selectedProductTableBody.find('tr[data-nom="' + productName + '"]');

            if (existingRow.length === 0) {
                // If the row doesn't exist, create a new row for the selected product
                var newRow = '<tr data-nom="' + productName + '">' +
                    '<input type="hidden" name="produit_id[]" value="' + productId + '">' +
                    '<td><input type="text" class="form-control" value="' + productName +
                    '" name="productName[]" readonly></td>' +
                    '<td><input type="text" class="form-control" value="' + productPrixAchat +
                    '" name="productPrixAchat[]" readonly></td>' +
                    '<td><input type="number" class="form-control" name="qty[]"></td>' +
                    '<td><input type="number" class="form-control" name="discount[]"></td>' +
                    '<td><input type="text" class="form-control" name="discountedPrixAchat[]" readonly></td>' +
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

            // Get the values by name
            var productName = row.find('input[name="productName[]"]').val();
            var productPrixAchat = parseFloat(row.find('input[name="productPrixAchat[]"]').val()) || 0;
            var discountPercentage = parseFloat(row.find('input[name="discount[]"]').val()) || 0;
            var qty = parseFloat(row.find('input[name="qty[]"]').val()) || 0;
            // Ensure discountPercentage is within the range [0, 100]
            discountPercentage = discountPercentage;
            // Calculate the discountedPrixAchat
            productPrixAchat = productPrixAchat * qty;
            var discountedPrixAchat = (productPrixAchat * discountPercentage) / 100;
            discountedPrixAchat = productPrixAchat - discountedPrixAchat;
            // Update the discountedPrixAchatInput by name
            row.find('input[name="discountedPrixAchat[]"]').val(discountedPrixAchat.toFixed(
                2)); // Round to 2 decimal places

            // You can also update other elements if needed, such as displaying the product name
            // row.find('.product-name').text(productName);
        }

        // Add an event listener to listen for input changes on discount inputs
        $(document).on('input', 'input[name="discount[]"], input[name="qty[]"]', function() {
            updateDiscountedPrixAchat(this);
        });



    });
</script>
