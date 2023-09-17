<x-default-layout>
    @section('title')
        Détails du Candidat
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('candidates.show', $candidate) }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
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
                        <strong>Genre:</strong> {{ $candidate->genre }}
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
                        <img src="{{ asset('storage/' . $candidate->avatar_path) }}" alt="{{ $candidate->nom }} {{ $candidate->prenom }}" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <strong>Curriculum Vitae:</strong>
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
