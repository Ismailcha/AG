<x-default-layout>

    @section('title')
        Liste des Produits
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.liste_produit') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-5 justify-content-center">
            <h2>{{ $offer->offre_name }}</h2>
            <p><i>laboratoire : </i>{{ $offer->laboratoire }}</p>
            <p><i>grossiste : </i>
                @if ($offer->grossiste !== null)
                    {{ $offer->grossiste }}
                @else
                    <span>Pas de grossiste</span>
                @endif
            </p>
            <p><i>date debut : </i>{{ $offer->date_start }}</p>
            <p><i>date fin : </i>{{ $offer->date_end }}</p>
            <p><i>escompte : </i>{{ $offer->escompte }}%</p>
            <h3>Produits</h3>
            @if ($offer->produits->isEmpty())
                <p>Pas de produit dans ce offre</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom Produit</th>
                            <th>Quantiter</th>
                            <th>Remise</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offer->produits as $produit)
                            <tr>
                                <td>{{ $produit->nom }}</td> <!-- Corrected this line -->
                                <td>{{ $produit->pivot->quantity }}</td> <!-- Accessing pivot data -->
                                <td>{{ $produit->pivot->discount }}%</td> <!-- Accessing pivot data -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
