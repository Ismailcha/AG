@extends('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
           <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Les utilisateurs
                        
                    </div>

                    <div class="card-footer clearfix">
                        
                       
                        <a href="{{ route('users.create') }}" class="btn btn-success">Ajouter Utilisateur</a>
                        
                        <a href="{{ route('users.createclient') }}" class="btn btn-success">Ajouter Client</a>
                            <button class="btn btn-secondary" onclick="printTable()">Imprimer les Utilisateur</button>
                        
                        
                        @if (Auth::user()->role == 1  || Auth::user()->role == 4 )
                        <a href="{{ route('users.createclient') }}" class="btn btn-success">Ajouter Client</a>
                        
                        @endif
                        
                    </div>
                    
                    
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->role == 1)
                                                Grossiste
                                            @elseif($user->role == 2)
                                                Utilisateur
                                            @elseif($user->role == 3)
                                              Admin
                                            @elseif($user->role == 4)
                                              Laboratoire
                                            @endif
                                            </td>
                                            <td>
                                                @if( Auth::user()->role == 3)
                                                <form action="{{ route('user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                <td>
                                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Modify</a>
                                                </td>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        function printTable() {
            var table = document.querySelector('.table');
            var windowObj = window.open('', '_blank');
            windowObj.document.write('<html><head><title>Print Table</title></head><body>');
            windowObj.document.write('<h1>Users Table</h1>');
            windowObj.document.write(table.outerHTML);
            windowObj.document.write('</body></html>');
            windowObj.document.close();
            windowObj.print();
            windowObj.onafterprint = function() {
                window.location.href = '{{ route('users.index') }}';
            };
        }
    </script>
@endsection
