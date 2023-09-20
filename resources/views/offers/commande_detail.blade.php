<x-default-layout>
    @section('title')
        <h2 class="text-primary">Commande detail</h2>
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-5 justify-content-center">
            @if ($commandes->isEmpty())
                <p>Pas de commande trouvée</p>
            @else
                @php
                    $previousOfferId = null;
                    $overallTotal = 0;
                @endphp


                @foreach ($commandes as $commande)
                    @if ($previousOfferId !== $commande->offer->id)
                        <!-- Show offer details only once for each group -->
                        <tr>
                            <td colspan="5">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Détails de la commande</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Nom de l'offre:</strong>
                                                {{ $commande->offer->offre_name }}</li>
                                            <li class="list-group-item"><strong>Laboratoire:</strong>
                                                {{ $commande->offer->laboratoire }}</li>
                                            <li class="list-group-item"><strong>Date de commande:</strong>
                                                {{ $commande->created_at->toDateString() }}</li>
                                            <li class="list-group-item"><strong>Escompte:</strong>
                                                {{ $commande->offer->escompte }}%</li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <h5>Produits :</h5>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom:</th>
                                    <th>Prix unitaire:</th>
                                    <th>Quantité:</th>
                                    <th>Remise:</th>
                                    <th>Total à Payer:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $previousOfferId = $commande->offer->id;
                                @endphp
                    @endif
                    <!-- Show product details -->
                    <tr>
                        <td>{{ $commande->produit->nom }}</td>
                        <td>{{ $commande->produit->prixVente }} MAD</td>
                        <td>{{ $commande->quantite }}</td>
                        <td>{{ $commande->discount }}%</td>
                        <td>
                            @php
                                $itemPrice = $commande->produit->prixVente * $commande->quantite - $commande->produit->prixVente * $commande->quantite * ($commande->discount / 100);
                                $totalDiscounted = $itemPrice * (1 - $commande->offer->escompte / 100);
                                $overallTotal += $totalDiscounted;
                            @endphp
                            {{ number_format($totalDiscounted, 2) }} MAD
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <td colspan="4"></td>
                    <td>
                        <h5>{{ number_format($overallTotal, 2) }} MAD</h5>
                    </td>
                </tfoot>
                </table>



            @endif
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
