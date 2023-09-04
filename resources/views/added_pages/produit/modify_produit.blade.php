<x-default-layout>

    @section('title')
        Ajouter Produit
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.liste_produit') }}
    @endsection

    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-4">
            <h1>Modifier le Produit</h1>

            <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use the HTTP PUT method for update -->

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $produit->nom }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $produit->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="prix" class="form-label">Prix:</label>
                    <input type="number" class="form-control" id="prix" name="prix"
                        value="{{ $produit->prix }}" required>
                </div>

                <label for="category_id" class="form-label">Categorie:</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nomCat }}</option>
                    @endforeach
                </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <small class="text-muted">Laissez vide pour ne pas changer l'image.</small>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
        </form>
    </div>

    </div>
    <!--end::Row-->
</x-default-layout>
