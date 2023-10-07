<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Organisme Details')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Display Organisme Details at the top of the page -->
    <div class="container mt-3">
        <div class="card shadow-lg">
            <div class="row g-0">
                <div class="col-md-4">
                    @if ($organisme->logo)
                        <img src="{{ asset('storage/' . $organisme->logo) }}" alt="Organisme Logo" class="img-fluid rounded-circle" width="1000" height="210">
                    @else
                        <p>Aucun logo .</p>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $organisme->nom }}</h5>
                        <p class="card-text"><strong>Type:</strong> {{ $organisme->type == 1 ? 'Laboratoire' : 'Grossiste' }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $organisme->adress }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $organisme->email }}</p>
                        <p class="card-text"><strong>Telephone:</strong> {{ $organisme->telephone }}</p>
                        <p class="card-text"><strong>ICE:</strong> {{ $organisme->ICE }}</p>
                        <p class="card-text"><strong>Potent:</strong> {{ $organisme->Potent }}</p>
                        <p class="card-text"><strong>RC:</strong> {{ $organisme->RC }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <a href="{{ route('organismes.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>

    <style>
        .card {
            border: none;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .img-fluid {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>

</x-default-layout>
