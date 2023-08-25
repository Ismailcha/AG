
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Les articles
                    </div>
                    <div class="card-footer clearfix">
                        <a href="{{ route('articles.create') }}" class="btn btn-success">Ajouter Article</a>
                        <button class="btn btn-primary" onclick="printTable()">Imprimer les Articles</button>
                    </div>

                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table" id="articlesTable">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>PPV</th>
                                        <th>PPH</th>
                                        <th>Laboratoire</th>
                                        <th>Photo</th>
                                        <th>Supprimer</th>
                                        <th>Modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{ $article->nom }}</td>
                                            <td>{{ $article->ppv }}DH</td>
                                            <td>{{ $article->pph }}DH</td>
                                            <td>{{ $article->Laboratoire }}</td>
                                            <td>
                                                <img src="{{ asset('images/'.$article->photo) }}" alt="No Photo" width="50">
                                            </td>
                                            <td>
                                                <form action="{{ route('article.delete', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Modifier</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $articles->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    {{-- <div class="col-md-8 offset-md-2">
        <form id="searchForm">
            <div class="form-group">
                <label for="search">Search Articles</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Search..." required>
            </div>
        </form>
        <br>
        <h4>Search Results</h4>
        <table class="table" id="articlesTable">
            <thead>
                <tr>
                    <th>photo</th>
                    <th>nom</th>
                    <th>PPV</th>
                    <th>PPH</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                {{-- Populate initial data --}}
                {{-- @foreach($articles as $article)
                    <tr>
                        <td><img style="width: 20px" src="{{ $article->photo }}" alt=""></td>
                        <td>{{ $article->nom }}</td>
                        <td>{{ $article->ppv }}DH</td>
                        <td>{{ $article->pph }}DH</td>
                        <td>
                            <button class="btn btn-primary" data-nom="{{ $article->nom }}" data-ppv="{{ $article->ppv }}" data-pph="{{ $article->pph }}">Select</button>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
    {{-- </div> --}} 

    <script>
        function printTable() {
    var table = document.getElementById('articlesTable');
    var windowObj = window.open('', '_blank');
    windowObj.document.write('<html><head><title>Print Table</title></head><body>');
    windowObj.document.write('<h1>Articles Table</h1>');
    windowObj.document.write(table.outerHTML);
    windowObj.document.write('</body></html>');
    windowObj.document.close();
    windowObj.print();

    // Redirect to the index page
    window.location.href = '{{ route('articless.index') }}';
}

    </script>
