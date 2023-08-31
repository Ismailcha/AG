@extends('layouts.app')

@section('content')
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
                        {{ $articles->links() }}
                        <a href="{{ route('articles.create') }}" class="btn btn-success">Ajouter Article</a>
                    </div>


                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>PPV</th>
                                        <th>PPH</th>
                                        <th>Laboratoire</th>
                                        <th>Photo</th>
                                        <th>Supprimer</th>
                                        <th>modifier</th>
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
            <form action="{{ route('article', ['article' => $article->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
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
@endsection
