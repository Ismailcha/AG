<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Edit Organisme')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
<div class="container">
    <h1>Item Listings</h1>

    <!-- Button to Create a New Item -->
    <a href="{{ route('items.create') }}" class="btn btn-primary">Create New Item</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>DH{{ number_format($item->price, 2) }}</td>
                    <td>
                        <a href="{{ route('items.show', ['item' => $item->id]) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-default-layout>
