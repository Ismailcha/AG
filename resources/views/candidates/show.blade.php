<x-default-layout>
    <link href="{{ asset('path/to/custom.css') }}" rel="stylesheet"> <!-- Include custom CSS -->

    @section('title')
        Détails du Candidat
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard', $candidate) }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">Détails du Candidat</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nom:</strong> {{ $candidate->nom }}
                    </div>
                    <div class="mb-3">
                        <strong>Prénom:</strong> {{ $candidate->prenom }}
                    </div>
                    <div class="mb-3">
                        <strong>Date de Naissance:</strong> {{ $candidate->date_de_naissance }}
                    </div>
                    <div class="mb-3">
                        <strong>Genre:</strong> {{ $candidate->gender }}
                    </div>
                    <div class="mb-3">
                        <strong>Ville:</strong> {{ $candidate->ville }}
                    </div>
                    <div class="mb-3">
                        <strong>Spécialités:</strong>
                        @foreach($candidate->specialities as $speciality)
                            {{ $speciality->name }}
                            @if (!$loop->last), @endif
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <strong>Disponibilité:</strong> {{ $candidate->disponibility }}
                    </div>
                    <div class="mb-3">
                        <strong>Avatar:</strong>
                        <img class="avatar" src="{{ asset('storage/' . $candidate->avatar) }}" alt="Avatar">
                    </div>
                    <div class="mb-3">
                        <strong>CV :</strong>
                        <a href="{{ asset('storage/' . $candidate->resume_path) }}" class="btn btn-primary" download>Télécharger le CV</a>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Retour à la liste des candidats</a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
<style>
    /* Custom CSS for Candidate Details Page */

/* Avatar Style */
.avatar {
    max-width: 200px; /* Adjust the maximum width as needed */
    height: auto;
    display: block;
    margin: 10px 0; /* Add margin for spacing */
}

/* Card Style */
.card {
    border: 1px solid #d1d3e2; /* Add a border to the card */
    border-radius: 0.5rem; /* Add rounded corners to the card */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
}

/* Card Header Style */
.card-header {
    background-color: #007bff; /* Primary color for the header background */
}

/* Card Title Style */
.card-title {
    color: #fff; /* Text color for the title */
}

/* Button Style */
.btn-primary {
    background-color: #007bff; /* Primary color for buttons */
    border-color: #007bff;
}

.btn-secondary {
    background-color: #6c757d; /* Secondary color for buttons */
    border-color: #6c757d;
    color: #fff; /* Text color for secondary buttons */
}

/* Breadcrumb Style */
.breadcrumb {
    background-color: transparent; /* Transparent background for breadcrumbs */
    padding: 0; /* Remove default padding */
    margin-bottom: 10px; /* Add margin for spacing */
}

</style>