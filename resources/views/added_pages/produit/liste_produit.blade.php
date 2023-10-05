<x-default-layout>

    @section('title')
        Liste des Produits
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.liste_produit') }}
    @endsection

    <!--begin::Row-->
    <div class="card card-flush">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">

            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                    <input type="text" data-kt-ecommerce-product-filter="search"
                        class="form-control form-control-solid w-250px ps-12" placeholder="Chercher..">
                </div>
                <!--end::Search-->
            </div>
            {{-- if admin : --}}
            <div class='card-toolbar flex-row-fluid justify-content-end gap-5'>
                <a class=" btn btn-primary m-4" href="{{ route('produit.create') }}">
                    <span class="">
                        <span class=""></span>
                    </span>
                    <span class="menu-title">Ajouter un produit</span>
                </a>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class='table-responsive'>
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                    <thead class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th>Produit</th>
                            <th>Description</th>
                            <th>Prix d'achat</th>
                            <th>Prix de vente</th>
                            <th>Catégorie</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($produits as $produit)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center"><img
                                            src="{{ asset('storage/' . $produit->image) }}" alt="Produit Image"
                                            width="50" height="50">
                                        <div class="ms-5 "> <span
                                                class='text-gray-800 fs-5 fw-bold'>{{ $produit->nom }}</span></div>
                                    </div>

                                </td>
                                <td class="pe-0">
                                    <span class="fw-bold">{{ $produit->description }}</span>
                                </td>
                                <td class=" pe-0">
                                    <span class="fw-bold">{{ $produit->prixAchat }}</span>
                                </td>
                                <td class="pe-0">
                                    <span class="fw-bold">{{ $produit->prixVente }}</span>
                                </td>
                                <td class="pe-0">
                                    <span class="fw-bold">{{ $produit->categorie->nomCat }}</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true"
                                        style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-48.6667px, 398px, 0px);"
                                        data-popper-placement="bottom-end">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('produit.edit', $produit->id) }}"
                                                class="menu-link px-3">Modifier</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <form action="{{ route('produit.destroy', $produit->id) }}" method="POST"
                                                onsubmit="return confirmWithSweetAlert(this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="menu-link px-3">Supprimer</button>
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">

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
        </div>
        <!-- Previous Page Link -->

    </div>
    <!--end::Row-->
</x-default-layout>
