<x-default-layout>
    <!-- Set the title -->
    @section('title', 'Edit Item: ' . $item->name)

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Content section -->
    @section('content')
    <div class="container">
        <h1>Edit Item: {{ $item->name }}</h1>

        <form method="POST" action="{{ route('items.update', ['item' => $item->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Item Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Item Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $item->description }}</textarea>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
            </div>

            <!-- Photo -->
            <div class="mb-3">
                <label for="photo" class="form-label">Photo:</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>

            <!-- Seller Name -->
            <div class="mb-3">
                <label for="seller_name" class="form-label">Seller Name:</label>
                <input type="text" class="form-control" id="seller_name" name="seller_name" value="{{ $item->seller_name }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $item->phone_number }}" required>
            </div>

            <!-- City -->
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $item->city }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
    @endsection
</x-default-layout>
