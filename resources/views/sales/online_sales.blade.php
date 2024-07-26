@extends('layouts.master')
@section('main-content')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/nprogress.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/flatpickr.min.css')}}">

@endsection

<div class="breadcrumb">
  <h1>Online Sales</h1>
</div>

<div class="separator-breadcrumb border-top"></div>


<div id="section_sale_list">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="text-end bg-transparent mb-3">
            @can('sales_add')
        <button id="printButton" class="btn btn-outline-success ms-3 fw-bolder">
                <i class="i-Add me-2 font-weight-bold"></i>Print
              </button>
            @endcan
            {{-- <a class="btn btn-outline-success btn-rounded btn-md m-1" id="Show_Modal_Filter"><i
              class="i-Filter-2 me-2 font-weight-bold"></i>
            {{ __('translate.Filter') }}</a> --}}
          </div>

          <div class="table-responsive">
            <table id="sale_table" class="display table table-hover table_height">
              <thead>
                <tr>
                  <th>ID</th>
                  {{-- <th class="not_show">{{ __('translate.Action') }}</th> --}}
                  <th>{{ __('translate.date') }}</th>
                  <th>{{ __('translate.Ref') }}</th>
                  <th>{{ __('translate.Created_by') }}</th>
                  <th>{{ __('translate.Customer') }}</th>
                  <th>{{ __('translate.warehouse') }}</th>
                  <th>{{ __('translate.Total') }}</th>
                  <th>{{ __('translate.Paid') }}</th>
                  <th>{{ __('translate.Due') }}</th>
                  <th>{{ __('translate.Payment_Status') }}</th>
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
  <!-- Modal Filter -->
  <div class="modal fade" id="filter_purchase_modal" tabindex="-1" role="dialog"
  aria-labelledby="filter_purchase_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">{{ __('translate.Filter') }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">

                  <div class="form-group col-md-6">
                      <label for="start_date">{{ __('translate.From_Date') }}
                      </label>
                      <input type="date" class="form-control date" name="start_date" id="start_date"
                          placeholder="{{ __('translate.From_Date') }}" value="">
                  </div>

                  <div class="form-group col-md-6">
                      <label for="end_date">{{ __('translate.To_Date') }} </label>
                      <input type="date" class="form-control date" name="end_date" id="end_date"
                          placeholder="{{ __('translate.To_Date') }}" value="">
                  </div>

              </div>

              <div class="row mt-3">

                  <div class="col-md-6">
                      <button type="button" id="filter" class="btn btn-primary">
                          <i class="i-Filter-2 me-2 font-weight-bold"></i> {{ __('translate.Filter') }}
                      </button>
                      <button id="Clear_Form" class="btn btn-danger">
                          <i class="i-Power-2 me-2 font-weight-bold"></i> {{ __('translate.Clear') }}
                      </button>
                  </div>
              </div>

          </div>

      </div>
  </div>
</div>
{{-- filter modal end --}}

</div>
@endsection

@section('page-js')

<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/nprogress.js')}}"></script>

<script>
    $(document).ready(function() {
         // Show Modal Filter
         $('#Show_Modal_Filter').on('click', function(e) {
            $('#filter_purchase_modal').modal('show');
        });

        $.ajax({
            url: '{{ route('get.Online.Sales') }}',
            type: 'GET',
            success: function(response) {
                response.onlineSales.forEach(function(sale) {
                    var grandTotal = sale.GrandTotal;
                    var paid = sale.paid_amount;
                    var due = grandTotal - paid;
                    $("#tbody").append(`
                        <tr>
                            <td>${sale.id}</td>
                            <td>${sale.date}</td>
                            <td>${sale.Ref}</td>
                            <td>Online</td>
                            <td>Online Customer</td>
                            <td>${sale.warehouse.name}</td>
                            <td>${sale.GrandTotal} ${response.setting.currency.symbol}</td>
                            <td>${sale.paid_amount} ${response.setting.currency.symbol}</td>
                            <td>${due} ${response.setting.currency.symbol}</td>
                            <td>${sale.payment_statut}</td>
                        </tr>
                    `);
                });

                $('#sale_table').DataTable({
                    "paging": true,
                    "ordering": true,
                    "searching": true,
                    "dom": 'lBfrtip',
                    "buttons": [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            'pdf',
                            'excel'
                        ]
                    },
                ]
                });
            }
        });
    });
    document.getElementById("printButton").addEventListener("click", function() {
        var table = document.getElementById("sale_table");
        if (table) {
            var tableClone = table.cloneNode(true);

            // Exclude the "image" column
            //     Array.from(tableClone.rows).forEach(function(row) {
            //     row.deleteCell(8); // Remove the first column

            // });

            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write(`<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
                </head><body>
                <center class="mt-5">
                <h1>Online Sales</h1>
                </center> ` + tableClone.outerHTML + `</body></html>`);
            newWin.document.close();
            setTimeout(function() {
                newWin.print();
                newWin.close();
            }, 10);
        }
    });
    </script>


@endsection
