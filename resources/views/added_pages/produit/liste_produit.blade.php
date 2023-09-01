<!-- resources/views/liste_produit.blade.php -->

<x-default-layout>

    @section('title')
        Liste des Produits
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.liste_produit') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-4">
            {{-- if admin : --}}
            <a class="" href="{{ route('produit.create') }}">
                <span class="">
                    <span class=""></span>
                </span>
                <span class="menu-title">Ajouter un produit</span>
            </a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>{{ $produit->prix }}</td>
                            <td>{{ $produit->categorie }}</td>
                            <td><img src="{{ asset('storage/' . $produit->image) }}" alt="Produit Image" width="90">
                            </td>
                            <td>
                                <a href="{{ route('produit.edit', $produit->id) }}" class="btn btn-primary">Modifier</a>
                            </td>
                            <td>
                                <form action="{{ route('produit.destroy', $produit->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Previous Page Link -->
            @if ($produits->currentPage() > 1)
                <a href="{{ $produits->previousPageUrl() }}" class="btn btn-outline-primary">Precedent</a>
            @endif

            <!-- Page Links -->
            @for ($i = 1; $i <= $produits->lastPage(); $i++)
                <a href="{{ $produits->url($i) }}"
                    class="btn btn-outline-secondary{{ $i === $produits->currentPage() ? ' active' : '' }}">{{ $i }}</a>
            @endfor

            <!-- Next Page Link -->
            @if ($produits->hasMorePages())
                <a href="{{ $produits->nextPageUrl() }}" class="btn btn-outline-primary">Suivant</a>
            @endif

        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
