<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Organisme Details')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Display Organisme Details -->
    <div class="container">
        <h1>Organisme Details</h1>

        <!-- Display Organisme Information -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $organisme->nom }}</h5>
                <p class="card-text"><strong>Type:</strong> {{ $organisme->type == 1 ? 'Laboratoire' : 'Grossiste' }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $organisme->adress }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $organisme->email }}</p>
                <p class="card-text"><strong>Telephone:</strong> {{ $organisme->telephone }}</p>
                <p class="card-text"><strong>ICE:</strong> {{ $organisme->ICE }}</p>
                <p class="card-text"><strong>Potent:</strong> {{ $organisme->Potent }}</p>
                <p class="card-text"><strong>RC:</strong> {{ $organisme->RC }}</p>
                @if ($organisme->logo)
                    <img src="{{ asset('storage/' . $organisme->logo) }}" alt="Organisme Logo" width="150">
                @else
                    <p>No logo available.</p>
                @endif
            </div>
        </div>

        <!-- Back Button -->
        <a href="{{ route('organismes.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>

</x-default-layout>
