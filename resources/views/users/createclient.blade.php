<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ajouter Client</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('createclient.store') }}" method="POST">
                                @csrf
                                <!-- Add user form fields -->
                                @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                                <div class="form-group">
                                    <label for="name">username du client</label>
                                    <input type="text" name="nom" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" id="telephone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="client_Adress">Adress du client</label>
                                    <input type="text" name="client_address" id="client_Adress" class="form-control">
                                </div>
                                
        
                               
                                <div class="form-group">
                                    <label for="Adress_livraison">Nom du client</label>
                                    <input type="text" name="billing_address" id="Adress_livraison" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Creer Utilisateur</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
    
    <script>
        document.getElementById('client').addEventListener('change', function () {
            var clientId = this.value;
            if (clientId !== '') {
                fetchClientData(clientId);
            } else {
                clearClientData();
            }
        });
    
        function fetchClientData(clientId) {
            fetch('/get-client-data/' + clientId)
                .then(response => response.json())
                .then(data => populateClientData(data))
                .catch(error => console.error(error));
        }
    
        function populateClientData(data) {
            document.getElementById('telephone').value = data.telephone;
            document.getElementById('email').value = data.email;
            document.getElementById('client_address').value = data.client_Adress;
            document.getElementById('billing_address').value = data.Adress_livraison;
            // Populate other input fields with relevant client data
            // You can access additional data like "estimate_date" and "expiry_date" using data.estimate_date and data.expiry_date
        }
    
        function clearClientData() {
            document.getElementById('telephone').value = '';
            document.getElementById('email').value = '';
            document.getElementById('client_address').value = '';
            document.getElementById('billing_address').value = '';
            // Clear other input fields
        }
    </script>
    
    
    
        
        
        <!--end::Row-->
</x-default-layout>
