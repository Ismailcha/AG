@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editer Utilisateur</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="email">Role</label>
                {{--if true redo selected ila makanch true khelih khawi '' empty--}}
                <select name="role" id="role" class="form-control">
                    <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Grossiste</option>
                    {{-- <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Utilisateur</option> --}}
                    <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>admin</option>
                    <option value="4" {{ $user->role == 4 ? 'selected' : '' }}>Laboratoire</option>
                </select>
            </div>
            <!-- Add other fields for updating user information -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
