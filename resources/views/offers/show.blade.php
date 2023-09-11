<x-default-layout>

    @section('title')
        <h2 class="text-primary">{{ $offer->offre_name }}</h2>
    @endsection


    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-5 justify-content-center">
            <h2 class='text-center text-primary'></h2>
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
            @if ($offer->produits->isEmpty())
                <p>Pas de produit dans ce offre</p>
            @else
                <table class="table table-bordered">
                    <h4><u>Produits</u> :</h4>
                    <thead>
                        <tr>
                            <th>Nom Produit</th>
                            <th>Quantiter</th>
                            <th>Prix</th>
                            <th>Remise</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offer->produits as $produit)
                            <tr>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ $produit->prixVente }}</td>
                                <td>{{ $produit->pivot->quantity }}</td> <!-- Accessing pivot data -->
                                <td>{{ $produit->pivot->discount }}%</td> <!-- Accessing pivot data -->
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
