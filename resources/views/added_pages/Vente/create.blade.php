<x-default-layout>

    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    @section('title')
        Ajouter Produit
    @endsection

    @section('breadcrumbs')
       
    @endsection

    <h1>List an Item for Sale</h1>
    
    <form method="POST" action="/items">
        @csrf <!-- CSRF Protection -->
        
        <!-- Item Name -->
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" id="item_name" required>
        <br>
        
        <!-- Price -->
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>
        <br>
        
        <!-- Seller's Name -->
        <label for="seller_name">Seller's Name:</label>
        <input type="text" name="seller_name" id="seller_name" required>
        <br>
        
        <!-- Phone Number -->
        <label for="phone_number">Phone Number:</label>
        <input type="tel" name="phone_number" id="phone_number" required>
        <br>
        
        <!-- City -->
        <label for="city">City:</label>
        <input type="text" name="city" id="city" required>
        <br>
        
        <button type="submit">List Item</button>
    </form>
</x-default-layout>