<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Create Offer')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
    <h1>List of Organismes</h1>
    
    <a href="{{ route('organismes.create') }}" class="btn btn-primary">Create Organisme</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Address</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organisms as $organism)
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
    <!--end::Row-->
</x-default-layout>