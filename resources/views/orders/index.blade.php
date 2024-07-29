<style>
    .order-detail-modal .modal-content {
        padding: 35px 400px;
    }

    .order-detail-modal .modal-content h3.text-center {
        font-weight: 800;
    }

    .order-detail-modal .modal-content hr:nth-child(3) {
        margin: 0 !important;
        margin-top: 0px !important;
        margin-bottom: 10px !important;
    }

    .order-detail-modal .modal-content h3:nth-child(2) {
        /* background-color: red; */
        border-top: 1px solid #0000001c;
        padding-top: 5px;
        margin-top: 10px;
    }

    .order-detail-modal .modal-content p.card-text {
        color: black !important;
        font-size: 14px;
        font-weight: 600;
    }

    @media only screen and (max-width: 1440px) {
        .order-detail-modal .modal-content {
            padding: 25px 250px;
        }

    }

    @media only screen and (max-width: 1024px) {
        .order-detail-modal .modal-content {
            padding: 20px 100px;
        }

        .order-detail-modal .modal-content h3.text-center {
            font-size: 18px;
        }

    }

    @media only screen and (max-width: 767px) {
        .order-detail-modal .modal-content {
            padding: 15px;
        }

        .order-detail-modal .modal-content p.card-text {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .order-detail-modal .modal-content hr:nth-child(5) {
            margin: 10px 0px !important;
        }

        .order-detail-modal .modal-content hr:nth-child(6) {
            margin: 10px 0px !important;
        }

        .order-detail-modal .modal-content hr:nth-child(7) {
            margin: 10px 0px !important;
        }

        .modal-body {
            flex: none !important;
        }

    }
</style>

@extends('layouts.master')
@section('main-content')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/nprogress.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/flatpickr.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<div class="breadcrumb">

    <h1>Orders</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row" id="section_Client_list">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">


                <div class="text-end mb-3" style="display: flex;
                justify-content: flex-end;">
                    {{-- @if (Auth::user()->can('employee_create') || auth()->user()->id == 1)
                        <a class="btn btn-outline-primary btn-md m-1" href="{{ route('employees.create') }}"><i
                                class="i-Add me-2 font-weight-bold"></i>
                            {{ __('translate.Create') }}</a>
                    @endif --}}

                    <div class="dropdown show" style="    display: flex;
                    align-items: center;">
                        {{-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            EXPORT
                        </a> --}}
                        @if (auth()->user()->can('employee_view_all'))
                            {{-- <a class="btn btn-outline-success btn-md m-1" id="Show_Modal_Filter"><i
                                    class="i-Filter-2 me-2 font-weight-bold"></i>
                                {{ __('translate.Filter') }}</a> --}}
                        @endif

                        @if (auth()->user()->can('employee_view_all'))
                            <button id="printButton" class="btn btn-outline-primary fw-bolder btn-md m-1"><i
                                    class="i-Add me-2 font-weight-bold" onclick=" print()"></i>Print</button>
                        @endif
                        {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                        {{-- <a class="dropdown-item" href="#" onclick="ExportToExcel('xlsx')">excel</a> --}}
                        {{-- <a class="dropdown-item" href="#">pdf</a> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="client_list_table" class="display table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Order #</th>
                                <th>Email</th>
                                <th>Staus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade order-detail-modal" id="OrderModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="OrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="OrderModalLabel">Order Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="OrderModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Sessions messages will be here --}}
@if (Session::has('success'))
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/dist/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.success("{{ Session::get('success') }}");
        });
    </script>
@endif
@endsection
@section('page-js')
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/nprogress.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Add these lines to include DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>


<script>
    $(document).ready(function() {

        $.ajax({
            url: '{{ route('OrderShowOnline') }}',
            type: 'GET',
            success: function(response) {
                response.online_orders.forEach(function(order) {
                    if (order && order.orders && order.orders.id) {
                        $("#tbody").append(`
                        <tr>
                            <td>${order.orders.id}</td>
                            <td>${order.orders.name}</td>
                            <td>${order.orders.order_no}</td>
                            <td>${order.orders.email}</td>
                            <td>
                                <select class="form-control" onchange="updateStatus(${order.orders.id}, this.value)">
                                    <option value="Confirm" ${order.orders.order_status === 0 ? 'selected' : ''}>Confirm</option>
                                    <option value="On the Way" ${order.orders.order_status === 1 ? 'selected' : ''}>On the Way</option>
                                    <option value="delivered" ${order.orders.order_status === 2 ? 'selected' : ''}>delivered</option>
                                </select>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" onclick="ViewOrder(${order.orders.id})"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-outline-primary" onclick="PrintOrder(${order.orders.sales_id})"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    `);
                    } else {
                        console.error(
                            "Order or order.orders is null or does not have an 'id' property:",
                            order);
                    }
                });

                $('#client_list_table').DataTable({
                    "paging": true,
                    "ordering": true,
                    "searching": true,
                    "order": [
                        [0, 'desc']
                    ],
                    "dom": 'lBfrtip',
                    "buttons": [{
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            'pdf',
                            'excel'
                        ]
                    }]
                });
            },
            error: function(error) {
                console.log(error);
            }


        });

        // Print functionality
        document.getElementById("printButton").addEventListener("click", function() {
            var table = document.getElementById("client_list_table");
            if (table) {
                var tableClone = table.cloneNode(true);

                // Remove the last column from each row
                Array.from(tableClone.rows).forEach(function(row) {
                    row.deleteCell(-1);
                });

                var newWin = window.open('', 'Print-Window');
                newWin.document.open();
                newWin.document.write(`<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
                </head><body>
                <center class="mt-5">
                <h1>Online Orders</h1>
                </center> ` + tableClone.outerHTML + `</body></html>`);
                newWin.document.close();
                setTimeout(function() {
                    newWin.print();
                    newWin.close();
                }, 10);
            }
        });

    });

    function PrintOrder(id) {
        // Print the document
        var printUrl = "{{ url('invoice_pos') }}/" + id;
        var a = window.open(printUrl, "", "height=1000, width=1000");
        a.document.write(
            '<link rel="stylesheet"  href="/assets/styles/vendor/pos_print.css"><html>'
        );
        a.document.write("<body>");
        a.document.write("<iframe src='" + printUrl +
            "' onload='this.contentWindow.print();'></iframe>");
        a.document.write("</body></html>");
        a.document.close();
    }

    function ViewOrder(id) {
        $.ajax({
            url: '{{ url('OrderShow') }}/' + id,
            type: 'GET',
            data: {
                id: id
            },
            success: function(response) {
                var formatedTime = new Date(response.orders[0].orders.created_at).toLocaleString();
                $("#OrderModal").modal('show');
                $("#OrderModalBody").empty();
                $("#OrderModalBody").append(`
                <div class="row">
                    <h3 class="text-center">Client Information</h3>
                    <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                    <div class="col-md-6">
                        <p class="card-text">${response.orders[0].orders.name}</p>
                        <p class="card-text">${response.orders[0].orders.email}</p>
                        <p class="card-text">${response.orders[0].orders.phone}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">${response.orders[0].orders.payment_method && response.orders[0].orders.payment_method.title ? response.orders[0].orders.payment_method.title : ''}</p>
                        <p class="card-text">${formatedTime}</p>
                    </div>
                </div>
                <h3 class="text-center">Product Information</h3>
                        <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                `);

                response.orders.forEach(function(order) {
                    $("#OrderModalBody").append(`
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text">Name: ${order.products.name}</p>
                            <p class="card-text">Price: ${order.products.online_product_price}</p>
                            <p class="card-text">Qty: ${order.quantity}</p>
                        </div>
                    </div>
                    <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                    `);
                });

                $("#OrderModalBody").append(`
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text">Delivery Charges: ${response.orders[0].orders.delivery_charges}</p>
                            <p class="card-text">Total: ${response.orders[0].orders.total}</p>
                        </div>
                    </div>
                `);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function updateStatus(id, status) {
        console.log(id);
        console.log(status);
        $.ajax({
            url: '{{ url('OrderStatusUpdate') }}/' + id,
            type: 'GET',
            data: {
                status: status,
                id: id
            },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
@endsection
