<x-default-layout>

    @section('title')
        Ajouter Technicien
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.add_produit') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <h1>Liste des Techniciens</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>CIN</th>
                    <th>Email</th>
                    <th>Société</th>
                    <th>Spécialité</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through techniciens -->
                @foreach ($techniciens as $technicien)
                    <tr>
                        <td>{{ $technicien->nom }}</td>
                        <td>{{ $technicien->prenom }}</td>
                        <td>{{ $technicien->cin }}</td>
                        <td>{{ $technicien->email }}</td>
                        <td>{{ $technicien->societe }}</td>
                        <td>{{ $technicien->specialite }}</td>
                        <td>{{ $technicien->tel }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Manually create pagination links -->
        <div class="pagination">
            <!-- Previous Page Link -->
            @if ($techniciens->currentPage() > 1)
                <a href="{{ $techniciens->previousPageUrl() }}" class="btn btn-outline-primary">Previous</a>
            @endif

            <!-- Page Links -->
            @for ($i = 1; $i <= $techniciens->lastPage(); $i++)
                <a href="{{ $techniciens->url($i) }}"
                    class="btn btn-outline-secondary{{ $i === $techniciens->currentPage() ? ' active' : '' }}">{{ $i }}</a>
            @endfor

            <!-- Next Page Link -->
            @if ($techniciens->hasMorePages())
                <a href="{{ $techniciens->nextPageUrl() }}" class="btn btn-outline-primary">Next</a>
            @endif
        </div>
    </div>
</x-default-layout>
