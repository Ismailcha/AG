<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!--begin::Row-->
    
    {{-- message --}}
    
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Commande</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Commandes</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('create/estimate/page') }}" class="btn add-btn"><i class="fa fa-plus"></i> Create Offres</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Num de Commande</th>
                                    <th>Client ID</th>
                                    <th> Date de commande</th>
                                    <th> Date De livraison</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th class="text-right">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estimates as $item)
                                    <tr>
                                        <td><a href="{{ url('estimate/view/'.$item->estimate_number) }}">{{ $item->estimate_number }}</a></td>
                                        <td>{{ $item->client }}</td>
                                        <td>{{ date('d F, Y', strtotime($item->estimate_date)) }}</td>
                                        <td>{{ date('d F, Y', strtotime($item->expiry_date)) }}</td>
                                        <td>{{ $item->total }} MAD</td>
                                        <td><span class="badge bg-inverse-success">Accepted</span></td>
                                        <td class="text-right">
                                            <form action="{{ route('estimate/delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="hidden" name="estimate_number" value="{{ $item->estimate_number }}">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
        {{ $estimates->links() }}
    </div>
    <!-- /Page Wrapper -->
    


    <!--end::Row-->
</x-default-layout>
