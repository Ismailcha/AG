<x-default-layout>

    @section('title')
        Liste des Candidats
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-xl-12">
            <div class="card card-xxl-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Liste des Candidats</h2>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('candidates.create') }}" class="btn btn-primary">Ajouter Candidat</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Table to display the list of candidates -->
                    <table class="table table-striped table-row-bordered gy-5 gs-7">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800">
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de Naissance</th>
                                <th>Genre</th>
                                <th>Ville</th>
                                <th>Spécialités</th>
                                <th>Disponibilité</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidates as $candidate)
                            <tr>
                                <td>{{ $candidate->nom }}</td>
                                <td>{{ $candidate->prenom }}</td>
                                <td>{{ $candidate->date_naissance }}</td>
                                <td>{{ $candidate->genre }}</td>
                                <td>{{ $candidate->ville }}</td>
                                <td>
                                    @foreach($candidate->specialities as $speciality)
                                    {{ $speciality->name }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $candidate->disponibilite }}</td>
                                <td>
                                    <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-sm btn-primary">Voir</a>
                                    <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce candidat ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-default-layout>

