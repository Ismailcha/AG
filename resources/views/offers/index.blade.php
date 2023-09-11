<x-default-layout>
    <!-- Set the title -->
    @section('title', 'Offers')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Page content -->
    <div class="container">
        <h1>Offers</h1>
        <a href="{{ route('offers.create') }}" class="btn btn-primary">Créé une nouvelle offre</a>
        <!-- Display a table of offers -->
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nom Offre</th>
                    <th>Laboratoire</th>
                    <th>Date fin</th>
                    <th>Escompte</th>
                    <th>Produits</th>
                    <th>Prix Total</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <td>{{ $offer->offre_name }}</td>
                        <td>{{ $offer->laboratoire }}</td>
                        <td>{{ $offer->date_end }}</td>
                        <td>{{ $offer->escompte }}%</td>
                        <td>
                            @foreach ($offer->produits as $produit)
                                <span class="text-primary">{{ $produit->nom }} |</span>
                                <span>Prix de vente : {{ $produit->prixVente }}</span> <!-- Corrected this line -->
                                <span><i>Quantiter :</i> {{ $produit->pivot->quantity }}</span>
                                <span> <i>Remise :</i>
                                    @if ($produit->pivot->discount !== null)
                                        {{ $produit->pivot->discount }}
                                    @else
                                        <span>0</span>
                                    @endif
                                </span>

                                <br>
                            @endforeach
                        </td>
                        <td>
                            <span>Total Prix de vente: {{ $offer->totalPrixVenteWithEscompte }}</span>
                        </td>
                        <td>
                            <a href="{{ route('offers.show', ['id' => $offer->id]) }}" class="btn btn-primary">Voir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-default-layout>
