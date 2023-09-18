<x-default-layout>
    @section('title')
        <h2 class="text-primary">Vos commandes</h2>
    @endsection

    <!--begin::Row-->
    <div id="datacontainer">
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="container mt-5 justify-content-center">
                <div class="mb-6 col-4">
                    <form id="filter-form" method="GET">
                        <div class="mb-3">
                            <label for="search-offer-name" class="form-label">Recherche par nom d'offre :</label>
                            <input type="text" class="form-control" id="search-offer-name" name="search-offer-name">
                        </div>
                        <div class="mb-3">
                            <label for="filter-created-at" class="form-label">Filtrer par date de création :</label>
                            <input type="date" class="form-control" id="filter-created-at" name="filter-created-at">
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                        <a id="reset-link" href="{{ route('user.commandes') }}" class="btn btn-secondary">Annuler</a>

                    </form>
                </div>
                <!-- Container to hold the filtered tables -->
                <div id="filtered-tables-container">
                    @if ($groupedCommandes->isEmpty())
                        <p>Pas de commande trouvée</p>
                    @else
                        <table id='filtered-tables-container' class="table table-bordered">
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
                                            <td rowspan="{{ count($offerCommandes) }}">
                                                <h3 class="text-success">{{ $offerCommandes[0]->offer->offre_name }}
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
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
<script>
    $('#filter-form').submit(function(e) {
        e.preventDefault();

        var searchOfferName = $('#search-offer-name').val();
        var filterCreatedAt = $('#filter-created-at').val();

        // Check if both inputs are empty, don't submit the request
        if (!searchOfferName && !filterCreatedAt) {
            return;
        }

        $.ajax({
            url: '{{ route('commande.filter') }}',
            method: 'GET',
            data: {
                'search-offer-name': searchOfferName,
                'filter-created-at': filterCreatedAt,
            },
            success: function(data) {
                var filteredTablesContainer = $('#filtered-tables-container');

                if (data.length === 0) {
                    filteredTablesContainer.html('<p>Pas de commande trouvée.</p>');
                } else {
                    // Clear the container before adding new tables
                    filteredTablesContainer.empty();

                    // Create an object to group the data by offer
                    var groupedData = {};

                    // Group the data by offer
                    data.filteredCommandes.forEach(function(commande) {
                        var offerId = commande.offer_id;
                        if (!groupedData[offerId]) {
                            groupedData[offerId] = [];
                        }
                        groupedData[offerId].push(commande);
                    });

                    // Iterate through grouped data and create tables for each offer
                    for (var offerId in groupedData) {
                        if (groupedData.hasOwnProperty(offerId)) {
                            var offerGroup = groupedData[offerId];
                            var offer = offerGroup[0]
                                .offer; // Assuming offer details are the same for all items in the group

                            // Create a new table element
                            var tableHtml = '<table class="table table-bordered">';
                            tableHtml += '<thead>';
                            tableHtml += '<tr>';
                            tableHtml += '<th>Nom offre</th>';
                            tableHtml += '<th>Laboratoire</th>';
                            tableHtml += '<th>Date de commande</th>';
                            tableHtml += '<th>Escompte</th>';
                            tableHtml +=
                                '<th>Total à Payer</th>'; // Add a new column for Total à Payer
                            tableHtml += '</tr>';
                            tableHtml += '</thead>';
                            tableHtml += '<tbody>';

                            // Calculate the total amount for this offer group with both offer-level and product-level discounts
                            var totalAmount = 0;
                            var escompteOffer = offer.escompte;
                            offerGroup.forEach(function(commande) {
                                // Calculate the item price for each order with both discounts
                                var productPrice = commande.produit.prixVente;
                                var productDiscount = commande.discount;
                                var totalPrice = productPrice * commande.quantite;
                                var discountedPrice = totalPrice * (1 - (productDiscount /
                                    100)) * (1 - (escompteOffer / 100));
                                totalAmount += discountedPrice;
                            });

                            // Add a row for the offer details and total amount
                            tableHtml += '<tr>';
                            tableHtml += '<td><h3 class="text-success">' + offer.offre_name +
                                '</h3></td>';
                            tableHtml += '<td>' + offer.laboratoire + '</td>';
                            // date
                            var createdAt = new Date(offerGroup[0].created_at);
                            var formattedDate = createdAt.toLocaleDateString(
                                'fr-FR'); // 'fr-FR' for French date format (d/m/y)

                            tableHtml += '<td>' + formattedDate + '</td>';

                            tableHtml += '<td>' + escompteOffer + '%</td>';
                            tableHtml += '<td>' + totalAmount.toFixed(2) + ' MAD</td>';
                            tableHtml += "<td><a class='btn btn-primary'>Detail</a></td>";

                            tableHtml += '</tr>';

                            tableHtml += '</tbody></table>';

                            // Append the table to the container
                            filteredTablesContainer.append(tableHtml);
                        }
                    }

                }
            },



            error: function(error) {
                console.error(error);
            },
        });
    });
</script>
