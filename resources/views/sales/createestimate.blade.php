
<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!--begin::Row-->
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Creer l'offre</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Creer l'offre</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        {{-- message --}}
        {{-- {!! Toastr::message() !!} --}}
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('create/estimate/save') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <label for="client">{{ __('Client Name') }}</label>
                            <select name="client" id="client" class="form-control" required>
                                <option value="">-- choisir un client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <label for="telephone">{{ __('Client Telephone') }}</label>
                            <input class="form-control" type="text" id="telephone" name="project" readonly>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" id="email" name="email" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <label for="client_address">{{ __('Client Address') }}</label>
                            <input class="form-control" type="text" id="client_address" name="client_address" readonly>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <label for="billing_address">{{ __('Nom du client') }}</label>
                            <input class="form-control" type="text" id="billing_address" name="billing_address" readonly>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Date de commande <span class="text-danger">*</span></label>
                                <div>
                                    <input class="form-control datetimepicker" type="date" id="estimate_date" name="estimate_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label> Date de Livraison <span class="text-danger">*</span></label>
                                <div>
                                    <input class="form-control datetimepicker" type="date" id="expiry_date" name="expiry_date">
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
                            // Make an AJAX request to fetch the client data from the server
                            fetch('/get-client-data/' + clientId)
                                .then(response => response.json())
                                .then(data => populateClientData(data))
                                .catch(error => console.error(error));
                        }

                        function populateClientData(data) {
                            document.getElementById('telephone').value = data.telephone;
                            document.getElementById('email').value = data.email;
                            document.getElementById('client_address').value = data.client_address;
                            document.getElementById('billing_address').value = data.billing_address;
                            document.getElementById('estimate_date').value = data.estimate_date; // Add this line
                            document.getElementById('expiry_date').value = data.expiry_date; // Add this line
                            // You can continue to populate other input fields with relevant client data
                            // You can access additional data using data.<column_name>
                        }

                        function clearClientData() {
                            document.getElementById('telephone').value = '';
                            document.getElementById('email').value = '';
                            document.getElementById('client_address').value = '';
                            document.getElementById('billing_address').value = '';
                            document.getElementById('estimate_date').value = ''; // Add this line to clear estimate_date field
                            document.getElementById('expiry_date').value = ''; // Add this line to clear expiry_date field
                            // Clear other input fields
                        }
                    </script>
                    <!-- resources/views/dynamic-form.blade.php -->

                    <!-- ... (previous code) ... -->

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover table-white" id="tableEstimate">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th class="col-sm-2">Article</th>
                                        <th class="col-md-6">Detail</th>
                                        <th style="width:100px;">PPV</th>
                                        <th style="width:80px;">Qty</th>
                                        <th>Montant</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="row-index text-center"><p>1</p></td>
                                        <td>
                                            <select name="item[]" id="article" class="form-control" required>
                                                <option value="" selected>--articles--</option>
                                                @foreach($articles as $article)
                                                    <option value="{{$article->id}}">{{$article->nom}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
                                        <td><input class="form-control unit_price" style="width:100px" type="text" readonly id="unit_cost" name="unit_cost[]"></td>
                                        <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
                                        <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
                                        <td><a href="javascript:void(0)" class="text-success font-18 addBtn" title="Add"><i class="fa fa-plus"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            // Function to fetch the data and update description and unit cost fields
                            function updateFields(selectedItemId, row) {
                                // Make an AJAX request to fetch the item details
                                $.ajax({
                                    url: '/articles/' + selectedItemId, // Replace with your Laravel route URL for fetching a single article
                                    type: 'GET',
                                    success: function (response) {
                                        // Update the description and unit cost fields with the fetched data
                                        row.find('input[name="description[]"]').val(response.article.Laboratoire);
                                        row.find('input[name="unit_cost[]"]').val(response.article.ppv);
                                        updateTotal(row); // Update the amount total
                                    },
                                    error: function (xhr) {
                                        // Handle error if necessary
                                    }
                                });
                            }

                            // Handle item selection change event
                            $('#tableEstimate').on('change', 'select[name="item[]"]', function () {
                                var selectedItemId = $(this).val(); // Get the selected item ID
                                var row = $(this).closest('tr');
                                updateFields(selectedItemId, row);
                            });

                            // Function to calculate and update the amount total
                            function updateTotal(row) {
                                var qty = parseFloat(row.find('.qty').val());
                                var unitCost = parseFloat(row.find('.unit_price').val());
                                if (!isNaN(qty) && !isNaN(unitCost)) {
                                    var amount = qty * unitCost;
                                    row.find('.total').val(amount);
                                    calculateTotal(); // Update the total in the footer
                                }
                            }

                            // Handle input change event for quantity and unit price
                            $('#tableEstimate').on('input', '.qty, .unit_price', function () {
                                var row = $(this).closest('tr');
                                updateTotal(row);
                            });

                            // Function to calculate the total in the footer
                            function calculateTotal() {
                            /* Footer Calculation */
var sum = 0;
var amts = document.getElementsByName("amount[]");

for (let index = 0; index < amts.length; index++) {
var amt = amts[index].value;
sum = parseFloat(sum) + parseFloat(amt);
}

document.getElementById("total").value = sum;
CalculateGrandTotal();
                        }
                        function CalculateGrandTotal() {
var total = parseFloat(document.getElementById("total").value);
var discount = parseFloat(document.getElementById("discount").value);

var grandTotal = total - (total * (discount / 100));
document.getElementById("grand_total").value = grandTotal.toFixed(2);
}
                            // Add row functionality
                            var rowIdx = 1;
                            $(".addBtn").on("click", function () {
                                // Adding a row inside the tbody.
                                $("#tableEstimate tbody").append(`
                                    <tr id="R${++rowIdx}">
                                        <td class="row-index text-center"><p>${rowIdx}</p></td>
                                        <td>
                                            <select name="item[]" id="article" class="form-control" required>
                                                <option value="" selected>--articles--</option>
                                                @foreach($articles as $article)
                                                    <option value="{{$article->id}}">{{$article->nom}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
                                        <td><input class="form-control unit_price" style="width:100px" type="text" readonly name="unit_cost[]"></td>
                                        <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
                                        <td><input class="form-control total" style="width:120px" type="text" readonly name="amount[]" value="0"></td>
                                        <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><button style="color: red"></button></a></td>
                                    </tr>`);
                            });

                            // Remove row functionality
                            $("#tableEstimate tbody").on("click", ".remove", function () {
                                var child = $(this).closest("tr").nextAll();
                                child.each(function () {
                                    var id = $(this).attr("id");
                                    var idx = $(this).children(".row-index").children("p").html();
                                    var newIdx = parseInt(idx) - 1;
                                    $(this).children(".row-index").children("p").html(newIdx);
                                    $(this).attr("id", "R" + newIdx);
                                });
                                $(this).closest("tr").remove();
                                calculateTotal();
                            });
                        });
                    </script>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-white">
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right">Total</td>
                                <td>
                                    <input class="form-control text-right total" type="text" id="total" name="total" value="0" readonly>
                                </td>
                            </tr>
                           
                            <tr>
                                <td colspan="5" class="text-right">
                                    Remise %
                                </td>
                                <td>
                                    <input class="form-control text-right discount" type="text" id="discount" name="discount" value="0">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right; font-weight: bold">
                                    Grand Total
                                </td>
                                <td style="font-size: 16px;width: 230px">
                                    <input class="form-control text-right" type="text" id="grand_total" name="grand_total" value=" 0.00 DH" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div style="text-align: center">
                            <label>autre Information</label>
                            <textarea id="other_information" name="autre information"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="submit-section">
            <button class="btn btn-primary submit-btn m-r-10">Enregistre & Envoyer</button>
            <button style="visibility: hidden" type="submit" class="btn btn-primary submit-btn">Enregistre</button>
        </div>
        </form>
    </div>
</div>
<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function GetPrint() {
        /* For Print */
        window.print();
    }

    function BtnAdd() {
        /* Add Button */
        var v = $("#TRow").clone().appendTo("#TBody");
        $(v).find("input").val("");
        $(v).removeClass("d-none");
        $(v).find("th").first().html($("#TBody tr").length - 1);
    }

    function BtnDel(v) {
        /* Delete Button */
        $(v).parent().parent().remove();
        GetTotal();

        $("#TBody").find("tr").each(function (index) {
            $(this).find("th").first().html(index);
        });
    }

    function Calc(v) {
        /* Detail Calculation Each Row */
        var index = $(v).parent().parent().index();

        var qty = document.getElementsByName("unit_cost[]")[index].value;
        var rate = document.getElementsByName("qty[]")[index].value;

        var amt = qty * rate;
        document.getElementsByName("amount[]")[index].value = amt;

        GetTotal();
    }

    function calculateTotal() {
                            /* Footer Calculation */
var sum = 0;
var amts = document.getElementsByName("amount[]");

for (let index = 0; index < amts.length; index++) {
var amt = amts[index].value;
sum = parseFloat(sum) + parseFloat(amt);
}

document.getElementById("total").value = sum;
CalculateGrandTotal();
                        }
                        function CalculateGrandTotal() {
var total = parseFloat(document.getElementById("total").value);
var discount = parseFloat(document.getElementById("discount").value);

var grandTotal = total - (total * (discount / 100));
document.getElementById("grand_total").value = grandTotal.toFixed(2);
}
</script>

    <!--end::Row-->
</x-default-layout>


{{-- <h4>Search Results</h4>
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
                                        </tbody>
                                        ------------script 9dima------------------
                                        --}}
                                        {{-- <script>
    // ... your existing JavaScript code ...

    // Handle item selection change event
    $('#tableEstimate').on('change', 'select[name="item[]"]', function () {
        var selectedItemId = $(this).val(); // Get the selected item ID

        // Find the corresponding row and update the description and unit cost fields
        var row = $(this).closest('tr');
        var descriptionField = row.find('input.description');
        var unitCostField = row.find('input.unit_cost');

        // Get the additional data from the selected option using data attributes
        var description = $(this).find('option:selected').data('description');
        var unitCost = $(this).find('option:selected').data('unit-cost');

        // Update the description and unit cost fields with the fetched data
        descriptionField.val(description);
        unitCostField.val(unitCost);
    });

    // ... your existing JavaScript code ...
</script> --}}

    
                                    {{-- <script> 
                                        var rowIdx = 1;
                                        $(".addBtn").on("click", function () {
                                            // Adding a row inside the tbody.
                                            $("#tableEstimate tbody").append(`
                                                <tr id="R${++rowIdx}">
                                                    <td class="row-index text-center"><p>${rowIdx}</p></td>
                                                    <td>  <select name="item[]" id="article" class="form-control" required>
                                                        <option value="" selected>--articles--</option>
                                                        @foreach($articles as $article)
                                                        
                                                    <option value="{{$article->id}}">{{$article->nom}}</option>
                                                @endforeach
                                                    </select></td>
                                                    <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
                                                    <td><input class="form-control unit_price" style="width:100px" type="text"  readonly id="unit_cost" name="unit_cost[]"></td>
                                                    <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
                                                    <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
                                                    <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><button style="color red"></button></a></td>
                                                </tr>`);
                                        });
                                
                                        $("#tableEstimate tbody").on("click", ".remove", function () {
                                            var child = $(this).closest("tr").nextAll();
                                            child.each(function () {
                                                var id = $(this).attr("id");
                                                var idx = $(this).children(".row-index").children("p").html();
                                                var newIdx = parseInt(idx) - 1;
                                                $(this).children(".row-index").children("p").html(newIdx);
                                                $(this).attr("id", "R" + newIdx);
                                            });
                                            $(this).closest("tr").remove();
                                            calculateTotal();
                                        });
                                
                                        $("#tableEstimate tbody").on("input", ".qty, .unit_price", function () {
                                            var row = $(this).closest("tr");
                                            var qty = parseFloat(row.find(".qty").val());
                                            var unit_price = parseFloat(row.find(".unit_price").val());
                                            var total = qty * unit_price;
                                            if (!isNaN(total)) {
                                                row.find(".total").val(total.toFixed(2));
                                                calculateTotal();
                                            }
                                        });
                                
                                        function calculateTotal() {
                                            /* Footer Calculation */
          var sum = 0;
          var amts = document.getElementsByName("amount[]");
    
          for (let index = 0; index < amts.length; index++) {
            var amt = amts[index].value;
            sum = parseFloat(sum) + parseFloat(amt);
          }
    
          document.getElementById("total").value = sum;
          CalculateGrandTotal();
                                        }
                                        function CalculateGrandTotal() {
          var total = parseFloat(document.getElementById("total").value);
          var discount = parseFloat(document.getElementById("discount").value);
    
          var grandTotal = total - (total * (discount / 100));
          document.getElementById("grand_total").value = grandTotal.toFixed(2);
        }
                                    </script> --}}