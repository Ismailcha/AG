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
            <a class="" href="{{ route('produits.create') }}">
                <span class="">
                    <span class=""></span>
                </span>
                <span class="menu-title">Ajouter un produit</span>
            </a>
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
                                <a href="{{ route('produits.edit', $produit->id) }}"
                                    class="btn btn-primary">Modifier</a>
                            </td>
                            <td>
                                <form action="{{ route('produits.delete', $produit->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
