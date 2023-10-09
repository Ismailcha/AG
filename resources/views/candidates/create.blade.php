<x-default-layout>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    @section('title')
        Ajouter Candidat
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a class="" href="{{ route('candidates.index') }}">
            <span class="">
                <span class=""></span>
            </span>
            <span class="menu-title">Liste des candidats</span>
        </a>

        <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="mb-3">
                <label for="date_de_naissance" class="form-label">Date de Naissance:</label>
                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required>
            </div>


            <div class="mb-3">
                <label class="form-label">Genre:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="genre_male" value="male"
                        required>
                    <label class="form-check-label" for="genre_male">Homme</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="genre_female" value="female"
                        required>
                    <label class="form-check-label" for="genre_female">Femme</label>
                </div>
            </div>



            <div class="mb-3">
                <label for="ville" class="form-label">Ville:</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
            </div>


            <div class="mb-3">
                <label for="specialites" class="form-label">Spécialités:</label>
                <select class="select2-multiple form-control" id="specialites" name="specialites[]" multiple="multiple">
                    <!-- Populate options with specialities from your database -->
                    @foreach ($specialities as $speciality)
                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                    @endforeach
                </select>
            </div>


            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                data-bs-target="#specialityModal">
                Ajouter une spécialité
            </button>
            <div class="mb-3">
                <label for="disponibilite" class="form-label">Disponibilité:</label>

                <select type="text" class="form-control" id="disponibilite" name="disponibilite" required>
                    <option value="1"> immédiate</option>
                    <option value="2">à fixer</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar:</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="resume" class="form-label">CV (PDF or DOCX):</label>
                <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.docx" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Candidat</button>
        </form>

    </div>
    <!--end::Row-->

    <!-- Speciality Modal -->
    <div class="modal fade" id="specialityModal" aria-labelledby="specialityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="specialityModalLabel">Ajouter une spécialité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('specialities.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="specialityName" class="form-label">Nom de la spécialité:</label>
                            <input type="text" class="form-control" id="specialityName" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });
    });
</script>
