<x-default-layout>

    @section('title')
        Ajouter Technicien
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.add_produit') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <h1>Modifier le Technicien</h1>

        <form action="{{ route('techniciens.update', $technicien->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $technicien->nom }}"
                    required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom" class="form-control"
                    value="{{ $technicien->prenom }}" required>
            </div>

            <div class="form-group">
                <label for="cin">CIN:</label>
                <input type="text" name="cin" id="cin" class="form-control" value="{{ $technicien->cin }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ $technicien->email }}" required>
            </div>

            <div class="form-group">
                <label for="societe">Société:</label>
                <input type="text" name="societe" id="societe" class="form-control"
                    value="{{ $technicien->societe }}" required>
            </div>

            <div class="form-group">
                <label for="specialite">Spécialité:</label>
                <input type="text" name="specialite" id="specialite" class="form-control"
                    value="{{ $technicien->specialite }}" required>
            </div>

            <div class="form-group">
                <label for="tel">Téléphone:</label>
                <input type="tel" name="tel" id="tel" class="form-control" value="{{ $technicien->tel }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

</x-default-layout>
