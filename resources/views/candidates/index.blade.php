<x-default-layout>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

    <!-- Link to your custom JavaScript file -->
    <script src="{{ asset('public/js/script2.js') }}"></script>
    <script src="{{ asset('public/js/swiper-bundle.min.js') }}"></script>
    @section('title')
        Liste des Candidats
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
    <script src="js/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    
    {{-- <link href="{{ asset('assets/css/style.bundle') }}" rel="stylesheet"> --}}
    <!-- CSS -->
    <link href="{{ asset('assets/css/script2.js') }}" rel="script">
    <link href="{{ asset('assets/css/script2.js') }}" rel="script">
    {{-- <link href="{{ asset('assets/css/styletech.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <!--begin::Row-->
    {{-- <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-xl-12">
            <div class="card card-xxl-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Liste des Candidats</h2>
                    </div>
                    
                </div>
                <div class="card-body">
                    <!-- Table to display the list of candidates -->
                    <table class="table table-striped table-row-bordered gy-5 gs-7">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800">
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de Naissance</th>
                                <th>Genre</th>
                                <th>Ville</th>
                                <th>Spécialités</th>
                                <th>Disponibilité</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidates as $candidate)
                            <tr>
                                <td>{{ $candidate->nom }}</td>
                                <td>{{ $candidate->prenom }}</td>
                                <td>{{ $candidate->date_de_naissance }}</td>
                                <td>{{ $candidate->gender }}</td>
                                <td>{{ $candidate->ville }}</td>
                                <td>
                                    @foreach($candidate->specialities as $speciality)
                                    {{ $speciality->name }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $candidate->disponibilite }}</td>
                                <td>
                                    <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-sm btn-primary">Voir</a>
                                    <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce candidat ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-toolbar">
        <a href="{{ route('candidates.create') }}" class="btn btn-primary">Ajouter Technicien</a>
    </div>
    <style>
        /* Style for the card container */
        .card-container {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px; /* Add border radius */
        }

        /* Style for the card image (making it appear as an avatar) */
        .card-image img {
            max-width: 100%;
            height: auto;
            border-radius: 50%; /* Rounded corners for avatar-like images */
        }

        /* Style for the card title */
        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
            text-align: center; /* Center align the title */
        }

        /* Style for the card description */
        .card-description {
            font-size: 14px;
            margin-top: 10px;
            text-align: center; /* Center align the description */
        }

        /* Style for the buttons */
        .card-button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            display: block;
            margin: 0 auto; /* Center align the button */
        }

        /* Style for the delete button */
        .delete-button {
            background-color: #dc3545;
        }
    </style> --}}
</head>
<body>
    <style>
        article {
            --img-scale: 1.001;
            --title-color: black;
            --link-icon-translate: -20px;
            --link-icon-opacity: 0;
            position: relative;
            border-radius: 16px;
            box-shadow: none;
            background: #fff;
            transform-origin: center;
            transition: all 0.4s ease-in-out;
            overflow: hidden;
        }
    
        article a::after {
            position: absolute;
            inset-block: 0;
            inset-inline: 0;
            cursor: pointer;
            content: "";
        }
    
        /* basic article elements styling */
        article h2 {
            margin: 0 0 18px 0;
            font-family: "times new roman", cursive;
            font-size: 17px;
            letter-spacing: 0.06em;
            color: var(--title-color);
            transition: color 0.3s ease-out;
        }
    
        figure {
            margin: 0;
            padding: 0;
            aspect-ratio: 16 / 9;
            overflow: hidden;
        }
    
        article img.avatar {
            max-width: 100%;
            width: 10px; /* Fixed size for the avatar */
            height:10px; /* Fixed size for the avatar */
            border-radius: 50%; /* Rounded corners for avatar-like images */
            transition: transform 0.4s ease-in-out;
        }
    
        .article-body {
            padding: 24px;
        }
    
        article a {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            color: #28666e;
        }
    
        article a:focus {
            outline: 1px dotted #28666e;
        }
    
        article a .icon {
            min-width: 24px;
            width: 24px;
            height: 24px;
            margin-left: 5px;
            transform: translateX(var(--link-icon-translate));
            opacity: var(--link-icon-opacity);
            transition: all 0.3s;
        }
    
        /* Style for the buttons */
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    
        .card-button {
            flex-grow: 1;
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }
    
        .delete-button {
            flex-grow: 1;
            background-color: #dc3545;
            margin-left: 5px;
        }
    
        /* using the has() relational pseudo selector to update our custom properties */
        article:has(:hover, :focus) {
            --img-scale: 1.1;
            --title-color: #28666e;
            --link-icon-translate: 0;
            --link-icon-opacity: 1;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }
    
        /************************
        Generic layout (demo looks)
        **************************/
    
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
    
        body {
            margin: 0;
            padding: 48px 0;
            font-family: "Figtree", sans-serif;
            font-size: 1.2rem;
            line-height: 1.6rem;
            min-height: 100vh;
        }
    
        .articles {
            display: grid;
            max-width: 100%;
            margin-inline: auto;
            padding-inline: 24px;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 24px;
        }
    
        @media screen and (max-width: 960px) {
            article {
                container: card/inline-size;
            }
            .article-body p {
                display: none;
            }
        }
    
        @container card (min-width: 380px) {
            .article-wrapper {
                display: grid;
                grid-template-columns: 100px 1fr;
                gap: 16px;
            }
            .article-body {
                padding-left: 0;
            }
            figure {
                width: 100%;
                height: 80%;
                overflow: hidden;
            }
            figure img {
                height: 100%;
                aspect-ratio: 1;
                object-fit: cover;
            }
        }
    
        .sr-only:not(:focus):not(:active) {
            clip: rect(0 0 0 0);
            clip-path: inset(50%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }
    </style>
    
    <div class="card-toolbar">
        <a href="{{ route('candidates.create') }}" class="btn btn-primary">Ajouter Technicien</a>
    </div>
    <section class="articles">
        @foreach($candidates as $candidate)
        <article>
            <div class="article-wrapper">
                <figure>
                    <img src="{{ asset('storage/' . $candidate->avatar) }}" alt="Avatar" />
                </figure>
                <div class="article-body">
                    <h2>NOM:{{ $candidate->nom }}</h2>
                    <h2>PRENOM:{{ $candidate->prenom}}</h2>
                    <p>
                        @foreach($candidate->specialities as $speciality)
                            {{ $speciality->name }}<br>
                        @endforeach
                    </p>
                   
                    <td>
                                    <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-sm btn-primary">Voir</a>
                                    
                                    <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce candidat ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                    </form>
                                </td>
                </div>
            </div>
        </article>
        @endforeach
    </section>
    
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>

    {{-- <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div> --}}
    <div class="swiper-pagination"></div>

</x-default-layout>

