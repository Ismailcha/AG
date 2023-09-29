    <x-default-layout>
        @section('title')
            <h2 class="text-primary">Vos commandes</h2>
        @endsection

        <!--begin::Row-->
        <div id="datacontainer">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="container mt-5 justify-content-center">
                    <!-- Container to hold the filtered tables -->
                    <div id="filtered-tables-container" class='card'>
                        @if ($groupedCommandes->isEmpty())
                            <p>Pas de commande trouvée</p>
                        @else
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <!--begin::Actions-->
                                <div class="d-flex flex-wrap gap-2">
                                </div>
                                <!--end::Actions-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative">
                                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>

                                        <input type="text"
                                            class="form-control form-control-sm form-control-solid mw-100 min-w-125px min-w-lg-150px min-w-xxl-200px ps-11"
                                            placeholder="Recherche.." id="search-offer-name" name="search-offer-name">
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <div class="card-body">
                                <table id='filtered-tables-container'
                                    class="table table-bordered fs-6 gy-5 my-0 dataTable no-footer">

                                    <thead>
                                        <tr>
                                            <th>Nom offre</th>
                                            <th>Laboratoire</th>
                                            <th>Date de commande</th>
                                            <th>Escompte</th>
                                            <th>Total a payer</th>
                                        </tr>

                                    </thead>


                                    <tbody>

                                        @foreach ($groupedCommandes as $offerId => $groupedDates)
                                            @foreach ($groupedDates as $date => $offerCommandes)
                                                <tr>
                                                    <td>
                                                        <h3 class="text-success">
                                                            {{ $offerCommandes[0]->offer->offre_name }}
                                                        </h3>
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
                                                    <td>
                                                        <a href="{{ route('commande.show', ['id' => $offerCommandes[0]->offer->id]) }}"
                                                            class="btn btn-primary">Detail</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                        @endforeach
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
        <!--end::Row-->
    </x-default-layout>
    <script>
        // Add an input event listener to the search input
        $('#search-offer-name').on('input', function() {
            var searchOfferName = $(this).val().toLowerCase(); // Get the input value
            var filteredRows = [];

            // Iterate through rows in the table
            $('#filtered-tables-container tbody tr').each(function() {
                var row = $(this);
                var offerName = row.find('td:first h3').text().toLowerCase(); // Get the offer name

                // Check if the offer name contains the search input
                if (offerName.includes(searchOfferName) || searchOfferName === '') {
                    filteredRows.push(row); // Add matching rows to the filteredRows array
                }
            });

            // Hide all rows and show the filtered ones
            $('#filtered-tables-container tbody tr').hide();
            filteredRows.forEach(function(row) {
                $(row).show();
            });
        });
    </script>
