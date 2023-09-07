<x-default-layout>
<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include your JavaScript file -->
<script src="{{ asset('js/live_search.js') }}"></script>

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
            <h2>Add Products to Offer</h2>
            <!-- You can include code here to select products and associate them with the offer -->
            <tbody>
                @foreach ($produits as $produit)
                <div class="form-group">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search by Name">
                </div>
                
    <tr>
        <td>{{ $produit->nom }}</td>
        
        <td><img src="{{ asset('storage/' . $produit->image) }}" alt="Produit Image" width="90"></td>
       <script>
        $(document).ready(function () {
    // Listen for keyup event on the search input
    $('#searchInput').keyup(function () {
        // Get the search query value
        var query = $(this).val();

        // Send an AJAX request to the server
        $.ajax({
            type: 'GET',
            url: '{{ route("produits.search") }}', // Adjust the route name
            data: {
                query: query
            },
            success: function (data) {
                // Update the product table with the search results
                $('#productTable tbody').html(data);
            }
        });
    });
});

       </script>
       
    </tr>
@endforeach

            </tbody>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create Offer</button>
        </form>
    </div>

</x-default-layout>
