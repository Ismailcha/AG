<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Articles')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
    <div class="container">

        <!-- Button to Create a New Item -->
        <a href="{{ route('items.create') }}" class="btn btn-primary">Cree un offre de vente</a>
        <div class="m-4">
            <form action="{{ route('items.index') }}" method="GET">
                <div class="col-xl-9">
                    <!--begin::Dialer-->
                    <div class="position-relative w-md-300px" data-kt-dialer="true" data-kt-dialer-min="1"
                        data-kt-dialer-max="999999999" data-kt-dialer-step="100">
                        <!--begin::Decrease control-->
                        <button type="button"
                            class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0"
                            data-kt-dialer-control="decrease">
                            <i class="ki-outline ki-minus-square fs-1"></i>
                        </button>
                        <!--end::Decrease control-->
                        <!--begin::Input control-->
                        <input type="text" class="form-control form-control-solid border-0 ps-12"
                            data-kt-dialer-control="input" placeholder="Prix max" name="max_price">
                        <!--end::Input control-->
                        <!--begin::Increase control-->
                        <button type="button"
                            class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0"
                            data-kt-dialer-control="increase">
                            <i class="ki-outline ki-plus-square fs-1"></i>
                        </button>
                        <!--end::Increase control-->
                    </div>
                    <!--end::Dialer-->
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <button type="button" id="reset-filter" class="btn btn-secondary">Reinsialiser</button>
                </div>
            </form>


        </div>
        {{-- <div class="col-xl-9">
            <!--begin::Dialer-->
            <div class="position-relative w-md-300px" data-kt-dialer="true" data-kt-dialer-min="1000" data-kt-dialer-max="50000" data-kt-dialer-step="1000" data-kt-dialer-prefix="$" data-kt-dialer-decimals="2">
                <!--begin::Decrease control-->
                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                    <i class="ki-outline ki-minus-square fs-1"></i>
                </button>
                <!--end::Decrease control-->
                <!--begin::Input control-->
                <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="$36,000.00">
                <!--end::Input control-->
                <!--begin::Increase control-->
                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                    <i class="ki-outline ki-plus-square fs-1"></i>
                </button>
                <!--end::Increase control-->
            </div>
            <!--end::Dialer-->
        </div> --}}
        <script>
            $(function() {
                // ... (previous code)

                // Reset button click handler
                $("#reset-filter").click(function() {
                    // Clear the input fields
                    $("#min_price").val('');
                    $("#max_price").val('');

                    // Submit the form without the min_price and max_price parameters
                    $("form").submit();
                });
            });
        </script>




        {{-- <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>DH{{ number_format($item->price, 2) }}</td>
                        <td>
                            <a href="{{ route('items.show', ['item' => $item->id]) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
                    @foreach ($items as $item)
                        <div class="col-md-4 col-xxl-4">
                            <div class="card">
                                <div class="card-body text-center py-9 px-5">
                                    @if ($item->itemImages->isNotEmpty())
                                        <div class="mb-5">
                                            <div class="symbol symbol-150px symbol-circle mb-3 mx-auto">
                                                <img src="{{ asset('storage/' . $item->itemImages->first()->image_path) }}"
                                                    alt="{{ $item->name }}">
                                            </div>
                                        </div>
                                    @endif
                                    <a href="#"
                                        class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $item->nom }}</a>
                                    <h2></h2>
                                    <div class="fw-semibold text-gray-400 mb-6">{{ $item->telephone }}</div>
                                    <div class="d-flex flex-center flex-wrap mb-5">
                                        <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                            <div class="fw-semibold text-black-400">{{ $item->name }}</div>
                                        </div>
                                        <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                            <div class="fs-6 fw-bold text-gray-700">
                                                {{ 'Prix' }}
                                            </div>
                                            <div class="fw-semibold text-gray-400">DH{{ $item->price }}</div>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-light-primary btn-flex btn-center">
                                        <i class="ki-outline ki-check following fs-3"></i>
                                        <a href="{{ route('items.show', $item->id) }}">
                                            <span>Afficher plus d'information</span>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>




            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">

                @if ($items->currentPage() > 1)
                    <a href="{{ $items->previousPageUrl() }}" class="btn btn-outline-primary">Precedent</a>
                @endif

                <!-- Page Links -->
                @for ($i = 1; $i <= $items->lastPage(); $i++)
                    <a href="{{ $items->url($i) }}"
                        class="btn btn-outline-secondary{{ $i === $items->currentPage() ? ' active' : '' }}">{{ $i }}</a>
                @endfor

                <!-- Next Page Link -->
                @if ($items->hasMorePages())
                    <a href="{{ $items->nextPageUrl() }}" class="btn btn-outline-primary">Suivant</a>
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
