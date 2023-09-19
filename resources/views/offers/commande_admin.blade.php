<!-- resources/views/admin/commandes/index.blade.php -->

<x-default-layout>
    @section('title')
        <h2 class="text-primary">Toutes les commandes groupées par offre</h2>
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="container mt-5 justify-content-center">
            <table id='filtered-tables-container' class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom offre</th>
                        <th>Laboratoire</th>
                        <th>Date de commande</th>
                        <th>Escompte</th>
                        <th>Total à Payer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groupedCommandes as $offerId => $groupedDates)
                        @foreach ($groupedDates as $date => $offerCommandes)
                            <tr>
                                <td rowspan="{{ count($offerCommandes) }}">
                                    <h3 class="text-success">{{ $offerCommandes[0]->offer->offre_name }}</h3>
                                </td>
                                <td> {{ $offerCommandes[0]->offer->laboratoire }}</td>
                                <td>{{ $date }}</td>
                                @php
                                    $totalDiscounted = 0;
                                @endphp
                                @foreach ($offerCommandes as $commande)
                                    @php
                                        $totalDiscounted += $commande->quantite * ($commande->produit->prixVente - ($commande->produit->prixVente * $commande->discount) / 100);
                                    @endphp
                                @endforeach
                                <td> {{ $offerCommandes[0]->offer->escompte }}%</td>
                                <td>
                                    {{ number_format($totalDiscounted * (1 - $offerCommandes[0]->offer->escompte / 100), 2) }}
                                    MAD
                                </td>
                                <td><a href="{{ route('commande.show', ['id' => $commande->offer->id]) }}"
                                        class="btn btn-primary">Detail</a></td>

                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
