<x-default-layout>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.js"></script>
    <!-- Link to your custom JavaScript file -->
    <script src="{{ asset('public/js/script2.js') }}"></script>
    <script src="{{ asset('public/js/swiper-bundle.min.js') }}"></script>
    {{-- @section('title')
        Liste des Technicien
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection --}}

    <script src="js/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    
    {{-- <link href="{{ asset('assets/css/style.bundle') }}" rel="stylesheet"> --}}
    <!-- CSS -->
    <link href="{{ asset('assets/css/script2.js') }}" rel="script">
    <link href="{{ asset('assets/css/script2.js') }}" rel="script">
    {{-- <link href="{{ asset('assets/css/styletech.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
   
</head>
<body>
  
    <div class="app-container container-xxl">
        <div class="card-toolbar">
            <a href="{{ route('candidates.create') }}" class="btn btn-primary">Ajouter un Technicien</a>
        </div>
        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
                    @foreach($candidates as $candidate)
                    <div class="col-md-6 col-xxl-4">
                        <div class="card">
                            <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                <div class="symbol symbol-65px symbol-circle mb-5">
                                    <img style="50px" src="{{ asset('storage/' . $candidate->avatar) }}" alt="image" />
                                    <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                                </div>
                                <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $candidate->nom }} - {{ $candidate->prenom}}</a> <h2></h2>
                                <div class="fw-semibold text-gray-400 mb-6">Art Director at Novica Co.</div>
                                <div class="d-flex flex-center flex-wrap mb-5">
                                    <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                        @foreach($candidate->specialities as $speciality)
                                        {{ $speciality->name }}<br>
                                        @endforeach
                                        <div class="fw-semibold text-gray-400">Les speciality</div>
                                    </div>
                                    <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                        <div class="fs-6 fw-bold text-gray-700">$236,400</div>
                                        <div class="fw-semibold text-gray-400">Sales</div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-light-primary btn-flex btn-center" data-kt-follow-btn="true" data-bs-toggle="modal" data-bs-target="#pdfModal{{ $candidate->id }}">
                                    <span class="indicator-label">Afficher le CV</span>
                                </button>
                
                                <!-- Create the modal structure with a unique ID -->
                                <div class="modal fade" id="pdfModal{{ $candidate->id }}" tabindex="-1" aria-labelledby="pdfModalLabel{{ $candidate->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pdfModalLabel{{ $candidate->id }}">CV de {{ $candidate->nom }} {{ $candidate->prenom }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Use a unique ID for the iframe element -->
                                                <iframe id="pdfViewer{{ $candidate->id }}" src="{{ asset('storage/' . $candidate->resume_path) }}" width="100%" height="500px"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
   
 
    
        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">

            @if ($candidates->currentPage() > 1)
                <a href="{{ $candidates->previousPageUrl() }}" class="btn btn-outline-primary">Precedent</a>
            @endif
    
            <!-- Page Links -->
            @for ($i = 1; $i <= $candidates->lastPage(); $i++)
                <a href="{{ $candidates->url($i) }}"
                    class="btn btn-outline-secondary{{ $i === $candidates->currentPage() ? ' active' : '' }}">{{ $i }}</a>
            @endfor
    
            <!-- Next Page Link -->
            @if ($candidates->hasMorePages())
                <a href="{{ $candidates->nextPageUrl() }}" class="btn btn-outline-primary">Suivant</a>
            @endif
        </div>
        
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
    
    <!-- <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div> -->
    <div class="swiper-pagination"></div>
</x-default-layout>
