<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!--begin::Row-->
    <!-- Add Article Form -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ajouter Article</h5>
            <br>

            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="ppv">PPV</label>
                    <input type="number" name="ppv" id="ppv" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="pph">PPH</label>
                    <input type="number" name="pph" id="pph" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="Laboratoire">Laboratoire</label>
                    <input type="text" name="Laboratoire" id="pph" class="form-control" required>
                </div>

                

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control-file" required>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
<!--end::Row-->
</x-default-layout>