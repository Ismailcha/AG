<x-default-layout>
    @section('title')
        <h2 class="text-primary">Commande detail</h2>
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-5 justify-content-center">
            <div id="filtered-commandes-container">
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
                            <h4>Liste des produits :</h4>
                            <!-- Set previous offer ID to the current one -->
                            @php
                                $previousOfferId = $commande->offer->id;
                            @endphp
                        @endif

                        <!-- Show product details -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nom:</strong> {{ $commande->produit->nom }}
                                    </li>
                                    <li class="list-group-item"><strong>Prix unitaire:</strong>
                                        {{ $commande->produit->prixVente }} MAD</li>
                                    <li class="list-group-item"><strong>Quantité:</strong> {{ $commande->quantite }}
                                    </li>
                                    <li class="list-group-item"><strong>Remise:</strong> {{ $commande->discount }}%
                                    </li>
                                    <li class="list-group-item"><strong>Total à Payer:</strong>
                                        @php
                                            $itemPrice = $commande->produit->prixVente * $commande->quantite - $commande->produit->prixVente * $commande->quantite * ($commande->discount / 100);
                                            $totalDiscounted = $itemPrice * (1 - $commande->offer->escompte / 100);
                                            $overallTotal += $totalDiscounted;
                                        @endphp
                                        {{ number_format($totalDiscounted, 2) }} MAD
                                    </li>

                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i>Total global : </i>{{ number_format($overallTotal, 2) }} MAD</h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
