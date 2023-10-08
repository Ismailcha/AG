<x-default-layout>
    <!-- Set the title -->
    @section('title', 'Detail d\'item')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('items.show') }}
    @endsection

    <!-- Content section -->
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="image-slider">
                        @foreach ($item->itemImages as $key => $image)
                            <input type="radio" id="slide-{{ $key + 1 }}" name="slider"
                                {{ $key === 0 ? 'checked' : '' }}>
                            <div class="slide">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $item->name }}">
                            </div>
                        @endforeach
                        <div class="nav">
                            @foreach ($item->itemImages as $key => $image)
                                <label for="slide-{{ $key + 1 }}"></label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">{{ $item->name }}</h1>
                            <p class="card-text"><strong>Description :</strong> {{ $item->description }}</p>
                            <p class="card-text"><strong>Prix :</strong> DH{{ number_format($item->price, 2) }}</p>
                            <p class="card-text"><strong>Nom Vendeur :</strong> {{ $item->seller_name }}</p>
                            <p class="card-text"><strong>Email :</strong> {{ $item->email }}</p>
                            <p class="card-text"><strong>Numero telephone :</strong> {{ $item->phone_number }}</p>
                            <p class="card-text"><strong>Ville :</strong> {{ $item->city }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* Add this CSS to your stylesheet or in a <style> tag in your HTML file */

            .image-slider {
                position: relative;
                max-width: 100%;
                /* Set the maximum width of the slider */

                width: 400px;
                /* Set the fixed width for the slider container */
                margin: 0 auto;
                /* Center the slider horizontally */
            }

            .slide {
                display: none;
                width: 100%;
                transition: opacity 0.5s;
            }

            .slide img {
                width: 100%;
                /* Ensure all images fill the slider width */
                height: 100px;
                /* Set a fixed height for the images (adjust as needed) */
                object-fit: cover;
                /* This ensures the images maintain their aspect ratio */
            }

            /* Rest of your CSS styles */
            /* Add this CSS to your stylesheet or in a <style> tag in your HTML file */

            .image-slider {
                position: relative;
                max-width: 100%;

            }

            .slide {
                display: none;
                width: 100%;
                transition: opacity 0.5s;
            }

            .slide img {
                width: 100%;
                height: auto;
            }

            input[name="slider"] {
                display: none;
            }

            label {
                cursor: pointer;
                padding: 5px;
                background-color: #333;
                border-radius: 50%;
                display: inline-block;
                margin-right: 5px;
            }

            input[name="slider"]:checked+.slide {
                display: block;
                opacity: 1;
            }

            .nav {
                text-align: center;
                margin-top: 10px;
            }

            /* Style the labels to indicate the current slide */
            input[name="slider"]:checked+.slide+.nav label {
                background-color: #000000;
            }
        </style>
    </x-default-layout>
