<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Commandes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Offre</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white" onclick="printTable()"> --Imprimer les Commande--PDF</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="printableContent">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 m-b-20">
                                                    <img src="{{ URL::to('assets/img/logo2.png') }}" class="inv-logo" alt="">
                                                    <ul class="list-unstyled">
                                                        <li>Nom du client:{{$estimatesJoin[0]->billing_address }}</li>
                                                        <li>email du client:{{$estimatesJoin[0]->email}}</li>
                                                        <li>Adress du client:{{$estimatesJoin[0]->client_address }}</li>
                                                        <li style="color: green">Escompte: {{ $estimatesJoin[0]->total * $estimatesJoin[0]->discount / 100 }} DH</li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6 m-b-20">
                                                    <div class="invoice-details">
                                                        <h3 class="text-uppercase">Commande #{{$estimatesJoin[0]->estimate_number }}</h3>
                                                        <ul class="list-unstyled">
                                                            <li>Date de commande: <span>{{date('d F, Y',strtotime($estimatesJoin[0]->estimate_date)) }}</span></li>
                                                            <li>Date D'expiration: <span>{{date('d F, Y',strtotime($estimatesJoin[0]->expiry_date)) }}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12 m-b-20">
                                                    <h5>Offre de: {{$estimatesJoin[0]->billing_address}}</h5>
                                                    <ul class="list-unstyled">
                                                        <li><a href="#">{{$estimatesJoin[0]->email }}</a></li>
                                                        <li><a href="#">{{$estimatesJoin[0]->project }}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Article</th>
                                                        <th class="d-none d-sm-table-cell">DESCRIPTION</th>
                                                        <th>PPV</th>
                                                        <th>QUANTITY</th>
                                                        <th class="text-right">TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($estimatesJoin as $key=>$item )
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $item->item }}</td>
                                                        <td class="d-none d-sm-table-cell">{{ $item->description }}</td>
                                                        <td>{{ $item->unit_cost }}DH</td>
                                                        <td>{{ $item->qty }}</td>
                                                        <td class="text-right">{{ $item->amount }}DH</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div>
                                                <div class="row invoice-payment">
                                                    <div class="col-sm-7">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="m-b-20">
                                                            <div class="table-responsive no-border">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Subtotal:</th>
                                                                            <td class="text-right">{{$estimatesJoin[0]->total }}DH</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>Total:</th>
                                                                            <td class="text-right text-primary"><h5>{{$estimatesJoin[0]->total }}DH</h5></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Gagne</th>
                                                                           <td> <li style="color: green"> {{ $estimatesJoin[0]->total * $estimatesJoin[0]->discount / 100 }} DH</li></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="invoice-info">
                                                    <h5>autre information</h5>
                                                    <p class="text-muted">{{$estimatesJoin[0]->other_information }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #printableContent, #printableContent * {
            visibility: visible;
        }
        #printableContent {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

<script>
    function printTable() {
        var printableContent = document.getElementById('printableContent');
        if (printableContent) {
            var windowObj = window.open('', '_blank');
            windowObj.document.write('<html><head><title>Print Table</title></head><body>');
            windowObj.document.write('<style>@page { size: auto; margin: 25mm; }</style>');
            windowObj.document.write('<h1 style="text-align: center;">Facture du commande</h1>');
            windowObj.document.write(printableContent.innerHTML);
            windowObj.document.write('</body></html>');
            windowObj.document.close();
            windowObj.print();
        } else {
            console.error("Div with id 'printableContent' not found.");
        }
    }
</script>

   <!--end::Row-->
</x-default-layout>
