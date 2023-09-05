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
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix:</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>

            <div class="mb-3">
                <label for="categorie_id" class="form-label">Categorie:</label>
                <select class="form-select" id="categorie_id" name="categorie_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nomCat }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalWindow">
                <h7>Ajouter categorie</h7>
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
                            <label for="name">Nom categorie:</label>
                            <input type="text" class="form-control" id="nom" name="nomCat" required>
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
