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
        <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="categorie" class="form-label">Catégorie:</label>
                <input type="text" class="form-control" id="categorie" name="categorie" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Produit</button>
        </form>


    </div>
    <!--end::Row-->
</x-default-layout>
