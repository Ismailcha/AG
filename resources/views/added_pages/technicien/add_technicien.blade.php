<x-default-layout>

    @section('title')
        Ajouter Technicien
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.add_produit') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <a class="" href="{{ route('techniciens.index') }}">
            <span class="">
                <span class=""></span>
            </span>
            <span class="menu-title">liste des techniciens</span>
        </a>
        <form action="{{ route('techniciens.store') }}" method="POST">
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
                <label for="cin" class="form-label">CIN:</label>
                <input type="text" class="form-control" id="cin" name="cin" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="societe" class="form-label">Société:</label>
                <input type="text" class="form-control" id="societe" name="societe" required>
            </div>

            <div class="mb-3">
                <label for="specialite" class="form-label">Spécialité:</label>
                <input type="text" class="form-control" id="specialite" name="specialite" required>
            </div>

            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone:</label>
                <input type="tel" class="form-control" id="tel" name="tel" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Technicien</button>
        </form>
    </div>
</x-default-layout>
