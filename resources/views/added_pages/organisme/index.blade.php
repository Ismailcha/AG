<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Create Offer')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
   
    <h1>List of Organismes</h1>

    

    <table class="table">
        <thead>
            <tr>
                <th>nom</th>
                <th>Type</th>
                <th>Address</th>
                <th>Email</th>
                <th>Telephone</th>
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
                    <td>
                        <a href="{{ route('organismes.show', $organism) }}" class="btn btn-info">View</a>
                        <a href="{{ route('organismes.edit', $organism) }}" class="btn btn-warning">Edit</a>
                        <!-- Add a delete button if needed -->
                        <!-- <form action="{{ route('organismes.destroy', $organism) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalWindow">
        <h6>Ajouter Organismes</h6>
    </button>
    <div class="modal fade" id="modalWindow" aria-labelledby="modal exemple" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ajout nouvelle categorie !</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">
                    </button>
                </div>
                <div class="modal-body">

                    <div class="modal-body">

                        <form role="form" method="post" action="{{ route('organismes.store') }}">
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
                                    <input class="form-check-input" type="radio" id="laboratoire" name="type" value="1" required>
                                    <label class="form-check-label" for="laboratoire">Laboratoire</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="grossiste" name="type" value="2" required>
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
                                <label for="Potent">Potent</label>
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
    <!--end::Row-->
</x-default-layout>
