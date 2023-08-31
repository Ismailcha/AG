<x-default-layout>

    @section('title')
        Liste Techniciens
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.produit.add_produit') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <a class="" href="{{ route('techniciens.create') }}">
            <span class="">
                <span class=""></span>
            </span>
            <span class="menu-title">Ajouter un technicien</span>
        </a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                        <td>
                            <a href="{{ route('techniciens.edit', $technicien->id) }}"
                                class="btn btn-primary">Modifier</a>
                            <form action="{{ route('techniciens.destroy', $technicien->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
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
