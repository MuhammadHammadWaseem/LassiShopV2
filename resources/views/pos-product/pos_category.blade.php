@extends('layouts.master')
@section('main-content')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/nprogress.css') }}">
@endsection

<div class="breadcrumb">
    <h1>Pos {{ __('translate.Categories') }}</h1>
</div>

<div class="separator-breadcrumb border-top"></div>


<div class="row" id="section_Category_list">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="text-end mb-3">
                    <a class="new_category btn btn-outline-primary btn-md m-1"><i
                            class="i-Add me-2 font-weight-bold"></i>
                        {{ __('translate.Create') }}</a>
                    <button id="printButton" class="btn btn-outline-success ms-3 fw-bolder"><i
                            class="i-Add me-2 font-weight-bold"></i>Print</button>
                </div>

                <div class="table-responsive">
                    <table id="category_table" class="display table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('translate.Code') }}</th>
                                <th>{{ __('translate.Name') }}</th>
                                <th class="not_show">{{ __('translate.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Add & Edit category -->
    <div class="modal fade" id="modal_Category" tabindex="-1" role="dialog" aria-labelledby="modal_Category"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-if="editmode" class="modal-title">{{ __('translate.Edit') }}</h5>
                    <h5 v-else class="modal-title">{{ __('translate.Create') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form @submit.prevent="editmode?Update_Category():Create_Category()" enctype="multipart/form-data" id="category_forms">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="code">{{ __('translate.Code_of_category') }}<span
                                        class="field_required">*</span></label>
                                <input type="text" v-model="category.code" class="form-control" name="code"
                                    id="code" placeholder="{{ __('translate.Enter_Code_category') }}">
                                <span class="error" v-if="errors && errors.code">
                                    @{{ errors.code[0] }}
                                </span>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="name">{{ __('translate.Name_of_category') }}<span
                                        class="field_required">*</span></label>
                                <input type="text" v-model="category.name" class="form-control" name="name"
                                    id="name" placeholder="{{ __('translate.Enter_name_category') }}">
                                <span class="error" v-if="errors && errors.name">
                                    @{{ errors.name[0] }}
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="image">File must be jpeg, png, jpg, gif<span
                                        class="field_required">*</span></label>
                                <input @change="onFileSelected" type="file" v-model="category.image"
                                    class="form-control" accept="image/*" name="image" id="image">
                                <span class="error" v-if="errors && errors.image">
                                    @{{ errors.image[0] }}
                                </span>
                            </div>

                        </div>
                        <div class="row mt-3">

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" :disabled="SubmitProcessing">
                                    <span v-if="SubmitProcessing" class="spinner-border spinner-border-sm"
                                        role="status" aria-hidden="true"></span> <i
                                        class="i-Yes me-2 font-weight-bold"></i> {{ __('translate.Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/nprogress.js') }}"></script>

<script type="text/javascript">
    $(function() {
        "use strict";

        $(document).ready(function() {
            //init datatable
            Category_datatable();
        });

        //Get Data
        function Category_datatable() {
            var table = $('#category_table').DataTable({
                processing: true,
                serverSide: true,
                "order": [
                    [0, "desc"]
                ],
                'columnDefs': [{
                    'targets': [0],
                    'visible': false,
                    'searchable': false,
                }, ],
                ajax: "{{ route('pos.categories') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        className: "d-none"
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],

                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                dom: "<'row'<'col-sm-12 col-md-7'lB><'col-sm-12 col-md-5 p-0'f>>rtip",
                oLanguage: {
                    sEmptyTable: "{{ __('datatable.sEmptyTable') }}",
                    sInfo: "{{ __('datatable.sInfo') }}",
                    sInfoEmpty: "{{ __('datatable.sInfoEmpty') }}",
                    sInfoFiltered: "{{ __('datatable.sInfoFiltered') }}",
                    sInfoThousands: "{{ __('datatable.sInfoThousands') }}",
                    sLengthMenu: "_MENU_",
                    sLoadingRecords: "{{ __('datatable.sLoadingRecords') }}",
                    sProcessing: "{{ __('datatable.sProcessing') }}",
                    sSearch: "",
                    sSearchPlaceholder: "{{ __('datatable.sSearchPlaceholder') }}",
                    oPaginate: {
                        sFirst: "{{ __('datatable.oPaginate.sFirst') }}",
                        sLast: "{{ __('datatable.oPaginate.sLast') }}",
                        sNext: "{{ __('datatable.oPaginate.sNext') }}",
                        sPrevious: "{{ __('datatable.oPaginate.sPrevious') }}",
                    },
                    oAria: {
                        sSortAscending: "{{ __('datatable.oAria.sSortAscending') }}",
                        sSortDescending: "{{ __('datatable.oAria.sSortDescending') }}",
                    }
                },
                buttons: [{
                    extend: 'collection',
                    text: "{{ __('translate.EXPORT') }}",
                    buttons: [
                        // {
                        //   extend: 'print',
                        //   text: 'print',
                        //   exportOptions: {
                        //       columns: ':visible:Not(.not_show)',
                        //       rows: ':visible'
                        //   },
                        // },
                        {
                            extend: 'pdf',
                            text: 'pdf',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'excel',
                            text: 'excel',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'csv',
                            text: 'csv',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                        },
                    ]
                }]
            });
        }

        // event reload Datatatble
        $(document).bind('event_category', function(e) {
            $('#modal_Category').modal('hide');
            $('#category_table').DataTable().destroy();
            Category_datatable();
        });


        //Create Category
        $(document).on('click', '.new_category', function() {
            app.editmode = false;
            app.reset_Form();
            $('#modal_Category').modal('show');
        });

        //Edit Category
        $(document).on('click', '.edit', function() {
            NProgress.start();
            NProgress.set(0.1);
            app.editmode = true;
            app.reset_Form();
            var id = $(this).attr('id');
            app.Get_Data_Edit(id);

            setTimeout(() => {
                NProgress.done()
                $('#modal_Category').modal('show');
            }, 500);
        });

        //Delete Category
        $(document).on('click', '.delete', function() {
            var id = $(this).attr('id');
            app.Remove_Category(id);
        });
    });
</script>

<script>
    var app = new Vue({
        el: '#section_Category_list',
        data: {
            editmode: false,
            SubmitProcessing: false,
            errors: [],
            categories: [],
            category: {
                id: "",
                name: "",
                code: "",
                image: null,
            }
        },

        methods: {
            //------------------------------ Modal  (create category) -------------------------------\\
            New_category() {
                this.reset_Form();
                this.editmode = false;
                $('#modal_Category').modal('show');
            },

            //--------------------------- reset Form ----------------\\
            reset_Form() {
                this.category = {
                    id: "",
                    name: "",
                    code: "",
                    image: null,
                };
                this.errors = {};
            },

            //---------------------- Get_Data_Edit  ------------------------------\\
            Get_Data_Edit(id) {
                axios
                    .get("/products/categories/" + id + "/edit")
                    .then(response => {
                        this.category = response.data.category;
                    })
                    .catch(error => {

                    });
            },

            //------------------------ Create_Category---------------------------\\
            onFileSelected(event) {
                this.category.image = event.target.files[0];
            },

            resetForm() {
                this.category = {
                    code: '',
                    name: '',
                    image: null // Assuming you want to clear the file input
                };
            },
            Create_Category() {
                var formData = new FormData();
                formData.append('name', this.category.name);
                formData.append('code', this.category.code);
                formData.append('image', this.category.image);
                var self = this;
                self.SubmitProcessing = true;
                axios
                    .post("pos_categories/create", formData)
                    .then(response => {
                        self.SubmitProcessing = false;
                        $.event.trigger('event_category');
                        toastr.success('{{ __('translate.Created_in_successfully') }}');
                        self.errors = {};
                    $('#category_forms').trigger('reset');

                    })
                    .catch(error => {
                        self.SubmitProcessing = false;
                        if (error.response.status == 422) {
                            self.errors = error.response.data.errors;
                        }
                        toastr.error('{{ __('translate.There_was_something_wronge') }}');
                    });
            },

            //----------------------- Update_Category ---------------------------\\

            Update_Category() {
                var self = this;
                self.SubmitProcessing = true;

                let formData = new FormData();
                formData.append('name', this.category.name);
                formData.append('code', this.category.code);
                formData.append('image', this.category.image);
                axios
                    .post(`/products/categories/${this.category.id}`, formData)
                    .then(response => {
                        self.SubmitProcessing = false;
                        $.event.trigger('event_category');
                        toastr.success('{{ __('translate.Updated_in_successfully') }}');
                        self.errors = {};
                        $('#category_forms').trigger('reset');
                    })
                    .catch(error => {
                        self.SubmitProcessing = false;
                        if (error.response.status == 422) {
                            self.errors = error.response.data.errors;
                        }
                        toastr.error('{{ __('translate.There_was_something_wronge') }}');
                    });
            },




            //--------------------------------- Remove_Category ---------------------------\\
            Remove_Category(id) {

                swal({
                    title: '{{ __('translate.Are_you_sure') }}',
                    text: '{{ __('translate.You_wont_be_able_to_revert_this') }}',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0CC27E',
                    cancelButtonColor: '#FF586B',
                    confirmButtonText: '{{ __('translate.Yes_delete_it') }}',
                    cancelButtonText: '{{ __('translate.No_cancel') }}',
                    confirmButtonClass: 'btn btn-primary me-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function() {
                    axios
                        .delete("/products/categories/" + id)
                        .then(() => {
                            $.event.trigger('event_category');
                            toastr.success('{{ __('translate.Deleted_in_successfully') }}');

                        })
                        .catch(() => {
                            toastr.error('{{ __('translate.There_was_something_wronge') }}');
                        });
                });
            },



        },
        //-----------------------------Autoload function-------------------
        created() {}

    })
</script>


{{-- print --}}
<script>
    document.getElementById("printButton").addEventListener("click", function() {
        var table = document.getElementById("category_table");
        if (table) {
            // Clone the table
            var tableClone = table.cloneNode(true);

            // Exclude the "image" column
            Array.from(tableClone.rows).forEach(function(row) {
                row.deleteCell(2); // Remove the first column
            });

            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write(
                '<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></head><body>' +
                tableClone.outerHTML + '</body></html>');
            newWin.document.close();
            setTimeout(function() {
                newWin.print();
                newWin.close();
            }, 10);
        }
    });
</script>
@endsection
