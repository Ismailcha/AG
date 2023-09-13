<x-default-layout>

    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    @section('title')
        Ajouter Produit
    @endsection

    @section('breadcrumbs')
    @endsection


    <form method="POST" action="/items">
        @csrf <!-- CSRF Protection -->

        <!-- Item Name -->
        <label for="item_name">Nom:</label>
        <input type="text" name="item_name" id="item_name" required>
        <br>

        <!-- Price -->
        <label for="price">Prix:</label>
        <input type="number" name="price" id="price" required>
        <br>

        <!-- Seller's Name -->
        <label for="seller_name">Nom vendeur:</label>
        <input type="text" name="seller_name" id="seller_name" required>
        <br>

        <!-- Phone Number -->
        <label for="phone_number">Numero telephone:</label>
        <input type="tel" name="phone_number" id="phone_number" required>
        <br>

        <!-- City -->
        <label for="city">Ville:</label>
        <input type="text" name="city" id="city" required>
        <br>

        <button type="submit">Enregistrer</button>
    </form>
</x-default-layout>
