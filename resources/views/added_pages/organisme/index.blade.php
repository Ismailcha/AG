<x-default-layout>
    <!-- Set the title -->
    @section('title', 'Liste organismes')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('added_pages.organismes.index') }}
    @endsection
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- <table class="table">
        <thead>
            <tr>
                <th>nom</th>
                <th>Type</th>
                <th>Address</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organismes as $organism)
                <tr>
                    <td>{{ $organism->nom }}</td>
                    <td>{{ $organism->type == 1 ? 'Laboratoire' : 'Grossiste' }}</td>
                    <td>{{ $organism->adress }}</td>
                    <td>{{ $organism->email }}</td>
                    <td>{{ $organism->telephone }}</td>
                    <td><img src="{{ asset('storage/' . $organism->logo) }}" alt="logo Image" width="90">
                    <td>
                       
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    <div class="modal fade" id="modalWindow" aria-labelledby="modal exemple" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ajout d'un nouveau organism</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">
                    </button>
                </div>
                <div class="modal-body">

                    <div class="modal-body">

                        <form role="form" method="post" action="{{ route('organismes.store') }}"
                            enctype='multipart/form-data'>
                            @csrf

                            <!-- Organisme Name -->
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>

                            <!-- Organisme Type (Radio buttons) -->
                            <div class="form-group">
                                <label for="type">Type</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="laboratoire" name="type"
                                        value="1" required>
                                    <label class="form-check-label" for="laboratoire">Laboratoire</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="grossiste" name="type"
                                        value="2" required>
                                    <label class="form-check-label" for="grossiste">Grossiste</label>
                                </div>
                            </div>

                            <!-- Organisme Address -->
                            <div class="form-group">
                                <label for="adress">Address</label>
                                <input type="text" class="form-control" id="adress" name="adress" required>
                            </div>

                            <!-- Organisme Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <!-- Organisme Telephone -->
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" required>
                            </div>

                            <!-- Organisme ICE -->
                            <div class="form-group">
                                <label for="ICE">ICE</label>
                                <input type="text" class="form-control" id="ICE" name="ICE" required>
                            </div>

                            <!-- Organisme Potent -->
                            <div class="form-group">
                                <label for="Potent">Patente</label>
                                <input type="text" class="form-control" id="Potent" name="Potent" required>
                            </div>

                            <!-- Organisme RC -->
                            <div class="form-group">
                                <label for="RC">RC</label>
                                <input type="text" class="form-control" id="RC" name="RC" required>
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control-file" id="logo" name="logo">
                            </div>
                            <!-- Organisme Logo (File input, if needed) -->
                            <!-- Example: <input type="file" class="form-control-file" id="logo" name="logo"> -->

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">
                                <h4>Enregistrer</h4>
                            </button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="close">
                            <h4> Fermer</h4>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-container container-xxl">
        <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalWindow">
            <h6>Ajouter Organismes</h6>
        </button>
        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
                    @foreach ($organismes as $organism)
                        <div class="col-md-6 col-xxl-4">
                            <div class="card">
                                <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                    <div class="symbol symbol-65px symbol-circle mb-5">
                                        <img style="50px" src="{{ asset('storage/' . $organism->logo) }}"
                                            alt="image" />
                                        <div
                                            class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-body h-15px w-15px ms-n3 mt-n3">
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $organism->nom }}</a>
                                    <h2></h2>
                                    <div class="fw-semibold text-gray-400 mb-6">{{ $organism->telephone }}</div>
                                    <div class="d-flex flex-center flex-wrap mb-5">
                                        <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">

                                            <div class="fw-semibold text-gray-400">{{ $organism->email }}</div>
                                        </div>
                                        <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                            <div class="fs-6 fw-bold text-gray-700">
                                                {{ $organism->type == 1 ? 'Laboratoire' : 'Grossiste' }}</div>
                                            <div class="fw-semibold text-gray-400">type</div>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-light-primary btn-flex btn-center"
                                        data-kt-follow-btn="true">
                                        <i class="ki-outline ki-check following fs-3"></i>
                                        <i class="ki-outline ki-plus follow fs-3 d-none"></i>
                                        <a href="{{ route('organismes.show', $organism->id) }}"><span
                                                class="indicator-label">Afficher plus d'information</span></a>
                                        {{-- <a href="{{ route('organismes.edit', $organism->id) }}" class="btn btn-warning">Edit</a> --}}
                                        <!-- Add a delete button if needed -->
                                        {{-- <form action="{{ route('organismes.destroy', $organism->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}

                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>

                                    </button>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">

        @if ($organismes->currentPage() > 1)
            <a href="{{ $organismes->previousPageUrl() }}" class="btn btn-outline-primary">Precedent</a>
        @endif

        <!-- Page Links -->
        @for ($i = 1; $i <= $organismes->lastPage(); $i++)
            <a href="{{ $organismes->url($i) }}"
                class="btn btn-outline-secondary{{ $i === $organismes->currentPage() ? ' active' : '' }}">{{ $i }}</a>
        @endfor

        <!-- Next Page Link -->
        @if ($organismes->hasMorePages())
            <a href="{{ $organismes->nextPageUrl() }}" class="btn btn-outline-primary">Suivant</a>
        @endif
    </div>





    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>

    <!-- <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div> -->
    <div class="swiper-pagination"></div>
    <!--end::Row-->
</x-default-layout>
