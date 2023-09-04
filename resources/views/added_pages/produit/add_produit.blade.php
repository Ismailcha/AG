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
            <div id="floating-form" style="display: none;">
                <form action="" method="POST">
                    @csrf
                    <input type="text" name="nomCat" placeholder="Nom Categorie">
                    <button type="submit">enregistrer</button>
                </form>
            </div>
            <button id="show-form-button">Ajouter categorie</button>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Produit</button>
        </form>

    </div>
    <!--end::Row-->
</x-default-layout>
<script>
    // JavaScript code to show the floating form
    document.getElementById('show-form-button').addEventListener('click', function() {
        document.getElementById('floating-form').style.display = 'block';
    });
</script>
