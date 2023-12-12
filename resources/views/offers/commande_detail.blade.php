<x-default-layout>
    @section('title')
        <h2 style="font-size: 30px" class="text-primary">Commande detail</h2>
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('offers.commande_detail') }}
    @endsection
    <!--begin::Row-->
    <div class="card">
        <div class="card-body py-20">
            <div class=''>
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                    <div class="pb-12">
                        @if ($commandes->isEmpty())
                            <p>Pas de commande trouvée</p>
                        @else
                            @php
                                $previousOfferId = null;
                                $overallTotal = 0;
                                $totalsansecompte = 0;
                            @endphp

                            @foreach ($commandes as $commande)
                                @if ($previousOfferId !== $commande->offer->id)
                                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Nom de l'offre:</span>
                                            <span class="fs-5">{{ $commande->offer->offre_name }}</span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Date de commande:</span>
                                            <span class="fs-5">{{ $commande->created_at->toDateString() }}</span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Laboratoire:</span>
                                            <span class="fs-5">{{ $commande->offer->laboratoire }}</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between flex-column">
                                        <!--begin::Table-->
                                        <div class="table-responsive border-bottom mt-9">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                <thead>
                                                    <tr class="border-bottom fs-6 fw-bold text-muted">
                                                        <th class="min-w-175px pb-2">Produits</th>
                                                        <th class="min-w-70px text-end pb-2">Prix unitaire</th>
                                                        <th class="min-w-80px text-end pb-2">Quantité</th>
                                                        <th class="min-w-100px text-end pb-2">Remise</th>
                                                        <th class="min-w-100px text-end pb-2">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    @php
                                                        $previousOfferId = $commande->offer->id;
                                                    @endphp
                                @endif
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <div class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                    style="background-image: url('{{ asset('storage/' . $commande->produit->image) }}');"></span>


                                            </div>
                                            <!--end::Thumbnail-->
                                            <!--begin::Title-->
                                            <div class="ms-5">
                                                <div class="fw-bold">{{ $commande->produit->nom }}</div>
                                                <div class="fs-7 text-muted">{{ $commande->produit->description }}</div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                    </td>
                                    <td class="text-end">{{ $commande->produit->prixVente }} MAD</td>
                                    <td class="text-end">{{ $commande->quantite }}</td>
                                    <td class="text-end">{{ $commande->discount }}%</td>
                                    <td class="text-end">
                                        @php
                                            $itemPrice = $commande->produit->prixVente * $commande->quantite - $commande->produit->prixVente * $commande->quantite * ($commande->discount / 100);
                                            $totalsansecompte += $itemPrice;
                                            $totalDiscounted = $itemPrice * (1 - $commande->offer->escompte / 100);
                                            $overallTotal += $totalDiscounted;
                                        @endphp
                                        {{ number_format($totalDiscounted, 2) }} MAD</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="3" class="text-end">Total sans escompte</td>
                                <td class="text-dark fs-3 fw-bolder text-end">{{ $totalsansecompte }}MAD
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" class="text-end">Escompte %</td>
                                <td class="text-dark fs-3 fw-bolder text-end">{{ $commande->offer->escompte }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="fs-3 text-dark fw-bold text-end">Grand Total</td>
                                <td class="text-dark fs-3 fw-bolder text-end">{{ number_format($overallTotal) }} MAD
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="fs-3 text-dark fw-bold text-end">Gain</td>
                                <td class="text-success fs-3 fw-bolder text-end">
                                    {{ number_format($totalsansecompte - $overallTotal) }} MAD
                                </td>
                            </tr>
                            </tbody>
                            </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    <!--end::Row-->
</x-default-layout>
