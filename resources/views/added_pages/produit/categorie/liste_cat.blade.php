<x-default-layout>
    @section('title')
        Liste des categories
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.categorie.liste.cat') }}
    @endsection
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="card">
            <div class="card-body pt-1">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($categories as $category)
                                <tr data-category-id="{{ $category->id }}">
                                    <td>{{ $category->id }}</td>
                                    <td class="category-name" data-original-name="{{ $category->nomCat }}">
                                        {{ $category->nomCat }}
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button type="button" class="btn btn-primary edit-category">
                                            modifier
                                        </button>

                                        <!-- Save Button (Hidden by Default) -->
                                        <button type="button" class="btn btn-success save-category"
                                            style="display: none;">
                                            enregistrer
                                        </button>

                                        <!-- Cancel Button (Hidden by Default) -->
                                        <button type="button" class="btn btn-secondary cancel-edit"
                                            style="display: none;">
                                            annuler
                                        </button>

                                        <!-- Delete Button (Outside Modal) -->
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">

                        @if ($categories->currentPage() > 1)
                            <a href="{{ $categories->previousPageUrl() }}" class="btn btn-outline-primary">Precedent</a>
                        @endif

                        <!-- Page Links -->
                        @for ($i = 1; $i <= $categories->lastPage(); $i++)
                            <a href="{{ $categories->url($i) }}"
                                class="btn btn-outline-secondary{{ $i === $categories->currentPage() ? ' active' : '' }}">{{ $i }}</a>
                        @endfor

                        <!-- Next Page Link -->
                        @if ($categories->hasMorePages())
                            <a href="{{ $categories->nextPageUrl() }}" class="btn btn-outline-primary">Suivant</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-default-layout>
<script>
    $(document).ready(function() {
        // When the "Modify" button is clicked
        $('.edit-category').click(function() {
            var $row = $(this).closest('tr');
            var $nameCell = $row.find('.category-name');
            var $editButton = $row.find('.edit-category');
            var $saveButton = $row.find('.save-category');
            var $cancelButton = $row.find('.cancel-edit');

            // Remove extra spaces from the category name
            var categoryName = $nameCell.text().trim();

            // Hide the "Modify" button and show the "Save" and "Cancel" buttons
            $editButton.hide();
            $saveButton.show();
            $cancelButton.show();

            // Convert the category name cell into an input field for editing
            $nameCell.html('<input type="text" class="form-control" value="' + categoryName + '">');
        });

        // When the "Cancel" button is clicked
        $('.cancel-edit').click(function() {
            var $row = $(this).closest('tr');
            var $nameCell = $row.find('.category-name');
            var $editButton = $row.find('.edit-category');
            var $saveButton = $row.find('.save-category');
            var $cancelButton = $row.find('.cancel-edit');

            // Hide the "Save" and "Cancel" buttons and show the "Modify" button
            $editButton.show();
            $saveButton.hide();
            $cancelButton.hide();

            // Restore the original category name
            $nameCell.html($nameCell.data('original-name'));
        });

        // When the "Save" button is clicked
        $('.save-category').click(function() {
            var $row = $(this).closest('tr');
            var categoryId = $row.data('category-id'); // Make sure this value is set correctly
            var newName = $row.find('.category-name input').val().trim();

            var $editButton = $row.find('.edit-category'); // Define these variables here
            var $saveButton = $row.find('.save-category');
            var $cancelButton = $row.find('.cancel-edit');

            // Send an AJAX request to update the category name in the database
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'PUT',
                url: '/categories/' + categoryId, // Make sure this URL is correct
                dataType: 'json',
                data: {
                    nomCat: newName // Make sure the field name matches your validation rules
                },
                success: function(response) {
                    // Handle the response from the server, e.g., show a success message
                    if (response.success) {

                    } else {

                    }

                    // Hide the "Save" and "Cancel" buttons and show the "Modify" button
                    $editButton.show();
                    $saveButton.hide();
                    $cancelButton.hide();

                    // Update the displayed category name
                    $row.find('.category-name').data('original-name', newName).html(
                        newName);
                },
                error: function() {
                    // Reload the current page
                    location.reload();
                }
            });
        });
    });
</script>
