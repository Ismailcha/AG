<x-default-layout>

    @section('title')
        <h2 class="text-primary">Vos commandes</h2>
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-5 justify-content-center">
            <h2 class='text-center text-primary'></h2>

            @if ($groupedCommandes->isEmpty())
                <p>Pas de commande trouvée</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom d'offre</th>
                            <th>Nom produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Remise</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groupedCommandes as $offerId => $offerCommandes)
                            @php
                                $totalDiscounted = 0;
                            @endphp
                            @foreach ($offerCommandes as $commande)
                                <tr>
                                    <td>{{ $commande->offer->id }}</td>
                                    <td>{{ $commande->offer->offre_name }}</td>
                                    <td>{{ $commande->produit->nom }}</td>
                                    <td>{{ $commande->produit->prixVente }}</td>
                                    <td>{{ $commande->quantite }}</td>
                                    <td>{{ $commande->discount }}%</td>
                                    <td>
                                        {{ number_format(
                                            $commande->quantite * ($commande->produit->prixVente - ($commande->produit->prixVente * $commande->discount) / 100),
                                            2,
                                        ) }}
                                        MAD
                                    </td>
                                </tr>
                                @php
                                    $totalDiscounted += $commande->quantite * ($commande->produit->prixVente - ($commande->produit->prixVente * $commande->discount) / 100);
                                @endphp
                            @endforeach
                            <tr>
                                <td>escompte: {{ $commande->offer->escompte }}%</td>
                                <td colspan="5" class="text-end"><strong>Total pour l'offre:</strong></td>
                                <td>
                                    {{ number_format($totalDiscounted * (1 - $offerCommandes[0]->offer->escompte / 100), 2) }}
                                    MAD
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
