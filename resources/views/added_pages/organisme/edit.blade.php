<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Edit Organisme')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Display Edit Organisme Form -->
    <div class="container">
        <h1>Edit Organisme</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Organisme Form -->
        <form method="POST" action="{{ route('organismes.update', $organisme->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Organisme Name -->
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $organisme->nom }}" required>
            </div>

            <!-- Organisme Type (Radio buttons) -->
            <div class="form-group">
                <label for="type">Type</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="laboratoire" name="type" value="1"
                        {{ $organisme->type == 1 ? 'checked' : '' }} required>
                    <label class="form-check-label" for="laboratoire">Laboratoire</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="grossiste" name="type" value="2"
                        {{ $organisme->type == 2 ? 'checked' : '' }} required>
                    <label class="form-check-label" for="grossiste">Grossiste</label>
                </div>
            </div>

            <!-- Organisme Address -->
            <div class="form-group">
                <label for="adress">Address</label>
                <input type="text" class="form-control" id="adress" name="adress" value="{{ $organisme->adress }}"
                    required>
            </div>

            <!-- Organisme Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $organisme->email }}"
                    required>
            </div>

            <!-- Organisme Telephone -->
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone"
                    value="{{ $organisme->telephone }}" required>
            </div>

            <!-- Organisme ICE -->
            <div class="form-group">
                <label for="ICE">ICE</label>
                <input type="text" class="form-control" id="ICE" name="ICE" value="{{ $organisme->ICE }}" required>
            </div>

            <!-- Organisme Patente -->
            <div class="form-group">
                <label for="Potent">Patente</label>
                <input type="text" class="form-control" id="Potent" name="Potent" value="{{ $organisme->Potent }}"
                    required>
            </div>

            <!-- Organisme RC -->
            <div class="form-group">
                <label for="RC">RC</label>
                <input type="text" class="form-control" id="RC" name="RC" value="{{ $organisme->RC }}" required>
            </div>

            <!-- Organisme Logo (File input, if needed) -->
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" class="form-control-file" id="logo" name="logo">
            </div>

            <!-- Current Logo Preview -->
            <div class="form-group">
                @if ($organisme->logo)
                    <p>Current Logo:</p>
                    <img src="{{ asset('storage/' . $organisme->logo) }}" alt="Current Logo" width="150">
                @else
                    <p>No logo available.</p>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>

        <!-- Back Button -->
        <a href="{{ route('organismes.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>

</x-default-layout>
