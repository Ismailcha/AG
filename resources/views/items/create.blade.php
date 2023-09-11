<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Edit Organisme')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <div class="container">
        <h1>Create a New Item</h1>
    
        <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
    
            <div class="form-group">
                <label for="price">Price (DH)</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="seller_name">Seller Name</label>
                <input type="text" name="seller_name" id="seller_name" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
    
            <div id="image-upload">
                <div class="form-group">
                    <label for="photos">Upload Images (Max 4)</label>
                    <input type="file" name="photos[]" id="photos" accept="image/*" class="form-control-file">
                </div>
            </div>

            <button type="button" class="btn btn-success" id="add-image">Add Another Image</button>

            <button type="submit" class="btn btn-primary">Create Item</button>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const imageUpload = document.getElementById("image-upload");
            const addImageBtn = document.getElementById("add-image");

            addImageBtn.addEventListener("click", function () {
                const newImageInput = document.createElement("div");
                newImageInput.innerHTML = `
                    <div class="form-group">
                        <label for="photos">Upload Another Image</label>
                        <input type="file" name="photos[]" accept="image/*" class="form-control-file">
                    </div>
                `;
                imageUpload.appendChild(newImageInput);
            });
        });
    </script>

</x-default-layout>
