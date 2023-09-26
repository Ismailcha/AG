<x-default-layout>
    <!-- Set the title -->
    @section('title', 'Offers')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
    <a href="{{ route('offers.create') }}" class="btn btn-primary mb-3">Créé une nouvelle offre</a>

    <!-- Page content -->
    <div class="row g-6 g-xl-9">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Display a table of offers -->
        {{-- <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nom Offre</th>
                    <th>Laboratoire</th>
                    <th>Date fin</th>
                    <th>Escompte</th>
                    <th>Produits</th>
                    <th>Prix Total</th>
                </tr>
            </thead>
            <tbody> --}}
        @foreach ($offers as $offer)
            <!--begin::Card-->
            <div class="col-md-6 col-xl-4">
                <a href="{{ route('offers.show', ['id' => $offer->id]) }}" class="card border-hover-primary">
                    <!--begin::Card header-->
                    {{-- <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
        </div>
        <!--end::Card toolbar-->
    </div> --}}
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9">
                        <!--begin::Name-->
                        <div class="fs-3 fw-bold text-dark">{{ $offer->offre_name }}</div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">{{ $offer->laboratoire }}</p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">{{ $offer->date_end }}</div>
                                <div class="fw-semibold text-gray-400">Date fin</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">{{ $offer->min_total }}</div>
                                <div class="fw-semibold text-gray-400">Minimum</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Progress-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">Cree par</div>
                            <div class="fw-semibold text-gray-400">{{ $offer->user->name }}</div>
                        </div>
                        <!--end::Progress-->
                        <!--begin::Users-->
                        {{-- <div class="symbol-group symbol-hover">
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Emma Smith"
                            data-bs-original-title="Emma Smith" data-kt-initialized="1">
                            <img alt="Pic" src="assets/media/avatars/300-6.jpg">
                        </div>
                        <!--begin::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Rudy Stone"
                            data-bs-original-title="Rudy Stone" data-kt-initialized="1">
                            <img alt="Pic" src="assets/media/avatars/300-1.jpg">
                        </div>
                        <!--begin::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                            data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                        </div>
                        <!--begin::User-->
                    </div> --}}
                        <!--end::Users-->
                    </div>
                    <!--end:: Card body-->
                </a>
            </div>
            <!--end::Card-->
        @endforeach
        <div class="d-flex flex-stack flex-wrap pt-10">
            <div class="fs-6 fw-semibold text-gray-700"></div>
            <!--begin::Pages-->
            <ul class="pagination">
                @if ($offers->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="previous"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $offers->previousPageUrl() }}" class="page-link"><i class="previous"></i></a>
                    </li>
                @endif

                @foreach ($offers->getUrlRange(1, $offers->lastPage()) as $page => $url)
                    @if ($page == $offers->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                @if ($offers->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $offers->nextPageUrl() }}" class="page-link"><i class="next"></i></a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="next"></i></span>
                    </li>
                @endif
            </ul>
            <!--end::Pages-->
        </div>

        </tbody>
        </table>
    </div>

</x-default-layout>
