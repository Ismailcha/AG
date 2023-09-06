<x-default-layout>

    @section('title')
        Ajouter Produit
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.add_produit') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a class="" href="{{ route('produit.index') }}">
            <span class="">
                <span class=""></span>
            </span>
            <span class="menu-title">Liste des produits</span>
        </a>
        <form action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom"
                    value="{{ old('nom', isset(session('input')['nom']) ? session('input')['nom'] : '') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', isset(session('input')['description']) ? session('input')['description'] : '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="prixAchat" class="form-label">Prix d'achat:</label>
                <input type="number" class="form-control" id="prixAchat" name="prixAchat"
                    value="{{ old('prixAchat', isset(session('input')['prixAchat']) ? session('input')['prixAchat'] : '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="prixVente" class="form-label">Prix de vente:</label>
                <input type="number" class="form-control" id="prixVente" name="prixVente"
                    value="{{ old('prixVente', isset(session('input')['prixVente']) ? session('input')['prixVente'] : '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="laboratoire" class="form-label">Laboratoire:</label>
                <input type="text" class="form-control" id="laboratoire" name="laboratoire"
                    value="{{ old('laboratoire', isset(session('input')['laboratoire']) ? session('input')['laboratoire'] : '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="grossiste" class="form-label">Grossiste:</label>
                <input type="text" class="form-control" id="grossiste" name="grossiste"
                    value="{{ old('grossiste', isset(session('input')['grossiste']) ? session('input')['grossiste'] : '') }}">
            </div>

            <div class="mb-3">
                <label for="categorie_id" class="form-label">Categorie:</label>
                <select class="form-select" id="categorie_id" name="categorie_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('categorie_id', isset(session('input')['categorie_id']) ? session('input')['categorie_id'] : '') == $category->id ? 'selected' : '' }}>
                            {{ $category->nomCat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalWindow">
                <h6>Ajouter categorie</h6>
            </button>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Produit</button>
        </form>

    </div>
    <!--end::Row-->
    <div class="modal fade" id="modalWindow" aria-labelledby="modal exemple" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ajout nouvelle categorie !</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">
                    </button>
                </div>
                <div class="modal-body">

                    <div class="modal-body">

                        <form role="form" method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <label for="nomCat">Nom categorie:</label>
                            <input type="text" class="form-control" id="nomCat" name="nomCat" required>
                            <button type="submit" class="btn btn-primary">
                                <h4>enregistrer</h4>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="close">
                            <h4> Fermer</h4>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
