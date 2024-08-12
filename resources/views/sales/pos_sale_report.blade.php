@extends('layouts.master')
@section('main-content')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/nprogress.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/flatpickr.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<div class="breadcrumb">

    <h1>{{ __('Pos Products') }}</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row" id="section_product_list">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3 offset-md-9">
                        <label for="start_date">Filter By Date</label>
                        <input type="date" id="start_date" class="form-control">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="dataTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>VAT</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                            {{-- @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->sale->date }}</td>
                                    <td>{{ $item->sale->vat }}</td>
                                    <td>{{ $item->sale->GrandTotal }}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

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

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<script type="text/javascript">
    function getData() {
        $.ajax({
            type: 'GET',
            url: "{{ route('pos_sale_report_get') }}",
            success: function(response) {
                $("#table_body").empty();
                $('#dataTable').DataTable().destroy();

                for (var i = 0; i < response.length; i++) {

                    var saleDate = response[i].sale ? response[i].sale.date : 'N/A'; // Check if sale exists
                    var saleVat = response[i].sale ? response[i].sale.vat : 'N/A'; // Check if sale exists
                    var saleGrandTotal = response[i].sale ? response[i].sale.GrandTotal : 'N/A'; // Check if sale exists

                    $("#table_body").append(
                        '<tr>' +
                        '<td>' + response[i].id + '</td>' +
                        '<td>' + response[i].name + '</td>' +
                        '<td>' + response[i].qty + '</td>' +
                        '<td>' + saleDate + '</td>' +
                        '<td>' + saleVat + '</td>' +
                        '<td>' + saleGrandTotal + '</td>' +
                        '</tr>'
                    );
                }

                $('#dataTable').DataTable({
                    "paging": true,
                    "ordering": true,
                    "searching": true,
                    "dom": 'lBfrtip',
                    "buttons": [{
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            'pdf',
                            'excel'
                        ]
                    }, ]
                });
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
    $(document).ready(function() {
        getData();

        $("#start_date").on("change", function() {
            var date = this.value;
            $('input[type="search"]').val(date).trigger('keyup');
        })
    })
</script>
@endsection
