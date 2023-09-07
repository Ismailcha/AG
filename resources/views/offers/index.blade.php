<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Offers')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Page content -->
    <div class="container">
        <h1>Offers</h1>
        <a href="{{ route('offers.create') }}" class="btn btn-primary">Create New Offer</a>
        <!-- Display a table of offers -->
        <table class="table">
            <thead>
                <tr>
                    <th>Offer Name</th>
                    <th>Laboratoire</th>
                    <th>Date Start</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->offre_name }}</td>
                    <td>{{ $offer->laboratoire }}</td>
                    <td>{{ $offer->date_start }}</td>
                    <!-- Add more table data columns as needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</x-default-layout>
