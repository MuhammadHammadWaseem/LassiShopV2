<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->CompanyName }}</title>
    <link rel=icon href={{ asset('images/' . $settings->logo) }}>
    
    <link rel="stylesheet" href="{{ asset('assets/pos/main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/iconsmind/iconsmind.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/toastr.css') }}">
    <script src="{{ asset('assets/pos/plugins/jquery/jquery.min.js') }}"></script>

    <style>
        .select2-container {
            width: 100%;
            max-width: 800px !important;
        }
        .select2-container--default .select2-selection--single {
            height: auto;
            font-size: 14px;
            border: initial;
            outline: initial !important;
            background: #F4F7FB;
            padding: 12px;
            border: 1px solid #C1CDD7;
            color: #2B3445;
            transition: all 0.2s ease-in-out, color 0.2s ease-in-out;
        }
        .select2-container--default.select2-container--open .select2-selection--single {
            height: auto;
            border: 1px solid #ced4da;
            background: #F4F7FB;
            color: #2B3445;
            padding: 12px;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.16);
        }
        .select2-container--default .select2-selection__arrow {
            top: 25% !important;
        }
        .select2-container--default.select2-container--open .select2-selection__arrow b {
            border-color: #6c757d transparent transparent;
            border-width: 6px 6px 0;
        }

        .select2-selection--single {
            height: auto;
        }
    </style>
</head>

<body class="sidebar-toggled sidebar-fixed-page pos-body">

    <!-- Pre Loader Strat  -->
    <div class='loadscreen' id="preloader">
        <div class="loader spinner-border spinner-border-lg">
        </div>
    </div>

    <div class="compact-layout pos-layout">
        <div data-compact-width="100" class="layout-sidebar pos-sidebar">
            @include('layouts.new-sidebar.sidebar')
        </div>

        <div class="layout-content">
            @include('layouts.new-sidebar.header')

            <div class="content-section" id="main-pos">
                <section class="pos-content">
                    <div class="d-flex align-items-end">
                        <div class="position-relative">
                            <span id="hold-order-count"
                                style="user-select: none; position: absolute; top: -8px; right: -8px; background-color: rgb(252, 51, 51); color: white; border-radius: 50%; padding-left: 6px; padding-right: 6px;"></span>
                            <button class="btn btn-primary btn-sm ms-3" id="show-hold-order">Hold Orders</button>
                        </div>
                        @if (auth()->user()->can('pos_online_orders') || auth()->user()->id == 1)
                        <div class="position-relative">
                            <span id="online-order-count"
                                style="user-select: none; position: absolute; top: -8px; right: -8px; background-color: rgb(252, 51, 51); color: white; border-radius: 50%; padding-left: 6px; padding-right: 6px;"></span>
                            <button class="btn btn-primary btn-sm ms-3" id="show-online-order">Online Orders</button>
                        </div>
                        @endif
                    </div>

                    <div class="row pos-card-left">
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <form>
                                <input type="hidden" name="warehouse_id" id="warehouse_id"
                                    value="{{ $settings->warehouse_id }}">
                                <div class="filter-box d-flex justify-content-between align-items-center">
                                    <label for="customer_id" style="z-index: 1">{{ __('translate.Customer') }} <span
                                            class="field_required">*</span></label>
                                    <select name="customer_id" class="form-control" id="customer_id">
                                        <option value="">Select Customer</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" id="addCustomer">Add</button>
                                </div>


                                <!-- card -->
                                <div class="card m-0 card-list-products">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-semibold m-0">{{ __('translate.Cart') }}</h6>
                                    </div>

                                    <div class="card-items" id="cart-items">
                                    </div>

                                    <div class="cart-summery d-flex flex-row justify-content-center align-items-center">

                                        <div class="col-md-8">
                                            <div class="summery-item mb-2 row">
                                                <span class="title mr-2 col-lg-12 col-sm-12">
                                                    Delivery Charge
                                                </span>
                                            </div>

                                            <div class="summery-item mb-2 row">
                                                <span
                                                    class="title mr-2 col-lg-12 col-sm-12">{{ __('translate.Order_Tax') }}</span>
                                                <div class="col-lg-8 col-sm-12">
                                                    <div class="input-group text-right">
                                                        <input type="text" class="no-focus form-control pos-tax"
                                                            id="orderTax">
                                                        <input type="hidden" id="TaxNet" name="TaxNet">
                                                        <span class="input-group-text cursor-pointer"
                                                            id="basic-addon3">%</span>
                                                    </div>
                                                    <span class="error"></span>
                                                </div>
                                            </div>

                                            <div
                                                class="summery-item mb-3 row d-flex justify-content-center align-items-center">
                                                <div class="col-md-8">
                                                    <span
                                                        class="title mr-2 col-lg-12 col-sm-12">{{ __('translate.Discount') }}</span>
                                                    <div class="col-lg-12 col-sm-12 summery-item-discount">
                                                        <input type="text"
                                                            class="no-focus form-control pos-discount"
                                                            id="discount" />
                                                        <span class="error"></span>
                                                        <select class="input-group-text discount-select-type"
                                                            id="inputGroupSelect02">
                                                            <option value="fixed">{{ $currency }}</option>
                                                            <option value="percent">%</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row d-flex justify-content-center align-items-center m-0 p-0">
                                                    <div class="col-md-12 mt-4">
                                                        <label for="is_points" class="m-0 p-0"
                                                            style="cursor: pointer; font-size:12px;">Use Points for
                                                            Discount?</label>
                                                        <input type="hidden" name="discountAmount"
                                                            id="discountAmount">
                                                        <input type="checkbox" name="is_points" id="is_points"
                                                            class="m-0 p-0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 position-relative" style="position: relative;">
                                            <div class="position-absolute"
                                                style="position: absolute; bottom: 0; right: 0;">
                                                <p class="text-center mt-2 mb-0">Customer Points</p>
                                                <table class="table table-bordered table-sm"
                                                    style="text-align: right;">
                                                    <!-- Added inline style to align content to the right -->
                                                    <thead>
                                                        <tr>
                                                            <th style="font-size: 12px;">Name</th>
                                                            <th style="font-size: 12px;">Points</th>
                                                            <th style="font-size: 12px;">{{ $currency }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="customer-points-details">
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" name="customer_points"
                                                                    id="customer_points">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="half-circle half-circle-left"></div>
                                        <div class="half-circle half-circle-right"></div>
                                    </div>

                                    <div class="cart-summery">
                                        <div class="pt-1 border-top border-gray-300 summery-total">
                                            <h5 class="summery-item m-0">
                                                <span>{{ __('translate.Total') }}</span>
                                                <span id="GrandTotal"></span>
                                                <input type="hidden" name="GrandTotal1" id="GrandTotal1">
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="cart-btn btn btn-success"
                                                id="HoldOrderBtn">Hold &nbsp; <i
                                                    class="fa-solid fa-hand"></i></button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="cart-btn btn btn-danger"
                                                id="ResetPos">Reset &nbsp;<i
                                                    class="fa-solid fa-arrow-rotate-right"></i></button>
                                        </div>
                                    </div>

                                </div>

                            </form>

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="form_Update_Detail" tabindex="-1" role="dialog"
                            aria-labelledby="form_Update_Detail" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create Payment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">

                                                <!-- Date -->
                                                <div class="form-group col-md-6">
                                                    <label for="date">Date
                                                        <span class="field_required">*</span></label>
                                                    <input type="date" name="date" id="date"
                                                        value="{{ date('Y-m-d') }}" class="form-control">
                                                    <span class="error"></span>
                                                </div>

                                                <!-- Paying Amount -->
                                                <div class="form-group col-md-6">
                                                    <label for="paying_amount">Paying Amount <span class="field_required">*</span></label>
                                                    <input type="text" id="paying_amount" name="paying_amount"
                                                        class="form-control">
                                                    <span class="badge badge-danger mt-2"
                                                        id="paying_amount_badge">Grand Total: </span>
                                                    <span class="error"></span>
                                                </div>

                                                <!-- Payment Choice -->
                                                <div class="form-group col-md-6">
                                                    <label for="payment_method_id">Payment Choice
                                                        <span class="field_required">*</span></label>
                                                    <select name="payment_method_id" id="payment_method_id"
                                                        class="form-control">
                                                        <option selected disabled>Select Payment</option>
                                                        @foreach ($payment_methods as $payment_method)
                                                            @if ($payment_method->title == 'Cash' || $payment_method->title == 'Credit card')
                                                                <option value="{{ $payment_method->id }}">
                                                                    {{ $payment_method->title }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="error"></span>
                                                </div>

                                                <!-- Account -->
                                                <div class="form-group col-md-6">
                                                    <label for="account_id">Account <span class="field_required">*</span></label>
                                                    <select name="account_id" id="account_id" class="form-control">
                                                        @foreach ($accounts as $account)
                                                            <option value="">Select Account</option>
                                                            <option value="{{ $account->id }}">
                                                                {{ $account->account_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error"></span>
                                                </div>

                                                {{-- <!-- Payment Note -->
                                                <div class="form-group col-md-6">
                                                    <label for="note">Payment Note
                                                        <span class="field_required">*</span></label>
                                                    <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                                                    <span class="error"></span>
                                                </div>

                                                <!-- Sale note -->
                                                <div class="form-group col-md-6">
                                                    <label>Sale Note <span class="field_required">*</span></label>
                                                    <textarea class="form-control sale_note" name="note" id="note" cols="30" rows="10"></textarea>
                                                    <span class="error"></span>
                                                </div> --}}

                                                <div class="col-lg-12">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="Client_Add" tabindex="-1" role="dialog"
                            aria-labelledby="Client_Add" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create Client</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="client_form">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="username">{{ __('translate.FullName') }} <span
                                                            class="field_required">*</span></label>
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" placeholder="{{ __('translate.FullName') }}" autocomplete="off">
                                                    <span class="error"> </span>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="Phone">{{ __('translate.Phone') }}</label>
                                                    <input type="text" class="form-control" id="Phone"
                                                        name="phone"
                                                        placeholder="{{ __('translate.Enter_Phone') }}" autocomplete="off">
                                                    <span class="error"> </span>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="city">{{ __('translate.City') }}</label>
                                                    <input type="text" class="form-control" id="city"
                                                        name="city"
                                                        placeholder="{{ __('translate.Enter_City') }}" autocomplete="off">
                                                    <span class="error"> </span>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="email">{{ __('translate.Email') }}</label>
                                                    <input type="text" class="form-control" id="email"
                                                        id="email"
                                                        placeholder="{{ __('translate.Enter_email_address') }}" autocomplete="off">
                                                    <span class="error"> </span>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="photo">{{ __('translate.Image') }}</label>
                                                    <input name="photo" type="file" class="form-control"
                                                        id="photo">
                                                    <span class="error"> </span>
                                                </div>

                                                <div class="form-group col-md-8">
                                                    <label for="address">{{ __('translate.Address') }}</label>
                                                    <textarea class="form-control" name="address" id="address" placeholder="{{ __('translate.Address') }}" autocomplete="off"></textarea>
                                                </div>

                                            </div>

                                            <div class="row mt-3">

                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-primary"
                                                        :disabled="SubmitProcessing" id="save_client">
                                                        <i class="i-Yes me-2 font-weight-bold"></i>
                                                        {{ __('translate.Submit') }}
                                                    </button>

                                                </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hold Modal -->
                    <div class="modal fade" style="overflow-y: hidden!important" id="exampleModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">

                                <div class="modal-body text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70"
                                        class="text-warning" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                    <h4 class="text-center my-3">Hold Invoice ? Same Reference will replace the old
                                        list if exist!!</h4>
                                    <input type="text" id="reference-number" required class="form-control"
                                        placeholder="Enter Reference Number">
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="holdOrder">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Show Hold Orders Modal -->
                    <div class="modal fade" id="Show_Hold" tabindex="-1" aria-labelledby="Show_HoldModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="Show_HoldModalLabel">Hold list</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Reference</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="hold_list">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Show Online Orders Modal -->
                    <div class="modal fade" id="Show_Online" tabindex="-1" aria-labelledby="Show_OnlineModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="Show_OnlineModalLabel">Online Orders list</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order No</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Customer Email</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="online_list">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reset Modal -->
                    <div class="modal fade" style="overflow-y: hidden!important" id="exampleModal1" tabindex="-1"
                        aria-labelledby="exampleModal1Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content text-center p-3">

                                <div class="modal-body text-center">
                                    <i class="fa-solid fa-arrow-rotate-right text-danger fa-5x"></i>
                                    <h4 class="text-center my-3">Are you sure you want to reset Products ?</h4>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-danger" id="resetBtn">Yes
                                        Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 mt-3">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="row" id="products-box">



                                </div>
                                <!-- Add this container for pagination links -->
                                <div id="pagination-container"
                                    class="mt-4 d-flex justify-content-center align-items-center mb-5">
                                    <h4>Pagination</h4>
                                    <!-- Pagination links will be inserted here -->
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="calculator">
                                    <div class="input-calu-box">
                                        <div class="calu-box-main">
                                            <div class="input-output-value">
                                                <p>Items Total</p>
                                                <h6 id="items-total">00.00</h6>
                                            </div>
                                            <div class="input-output-value">
                                                <p>To Pay</p>
                                                <h6 id="to-pay">00.00</h6>
                                            </div>
                                        </div>

                                        <div class="calu-box-main">

                                            <div class="input-output-value">
                                                <p>Paid Amount</p>
                                                <h6 id="paid-amount">00.00</h6>
                                            </div>
                                            <div class="input-output-value">
                                                <p>Change</p>
                                                <h6 id="change">00.00</h6>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="text" id="display" disabled>
                                    <div class="two-input-box-radio">
                                        <div class="radio-box-main">
                                            <input type="radio" id="cash" name="fav_language" value="cash">
                                            <label for="cash">Cash</label>
                                        </div>
                                        <div class="radio-box-main">
                                            <input type="radio" id="card" name="fav_language" value="card">
                                            <label for="card">Card</label>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <button class="btn-calcu"
                                            onclick="appendNumber(5)">{{ $currency }}5</button>
                                        <button class="btn-calcu"
                                            onclick="appendNumber(10)">{{ $currency }}10</button>
                                        <button class="btn-calcu"
                                            onclick="appendNumber(20)">{{ $currency }}20</button>
                                        <button class="btn-calcu"
                                            onclick="appendNumber(50)">{{ $currency }}50</button>
                                        <button class="btn-calcu" onclick="appendNumber(7)">7</button>
                                        <button class="btn-calcu" onclick="appendNumber(8)">8</button>
                                        <button class="btn-calcu" onclick="appendNumber(9)">9</button>
                                        <button class="btn-calcu red-btn" onclick="clearDisplay()">Clear</button>
                                        <button class="btn-calcu" onclick="appendNumber(4)">4</button>
                                        <button class="btn-calcu" onclick="appendNumber(5)">5</button>
                                        <button class="btn-calcu" onclick="appendNumber(6)">6</button>
                                        <button class="btn-calcu red-btn" onclick="deleteLast()">Delete</button>
                                        <button class="btn-calcu" onclick="appendNumber(1)">1</button>
                                        <button class="btn-calcu" onclick="appendNumber(2)">2</button>
                                        <button class="btn-calcu" onclick="appendNumber(3)">3</button>
                                        <button class="btn-calcu grand-total-btn" onclick="calculateGrandTotal()"
                                            id="grand-total-actual-btn">00.00</button>
                                        <button class="btn-calcu" onclick="appendNumber(0)">0</button>
                                        <button class="btn-calcu" onclick="appendNumber(`00`)">00</button>
                                        <button class="btn-calcu" onclick="appendNumber(`.`)">.</button>
                                        <button class="btn-calcu grand-total-btn" onclick="calculateGrandTotal()"
                                            id="grand-total-round-btn">00.00</button>
                                    </div>
                                    <button type="submit" id="save_pos" class="btn btn-primary">
                                        <i class="i-Yes me-2 font-weight-bold"></i> Sale
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
    </div>
    </div>
    <audio id="clickSound" src="{{ asset('assets/audio/Beep.wav') }}"></audio>

    {{-- --------------------------------------------------------------------------------------------- --}}

    <script src="{{ asset('assets/js/vue.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-vue.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    @yield('page-js')
    <script src="{{ asset('assets/js/vendor/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.script.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/compact-layout.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <script>
        var OnlineId = null;
        var data;
        var grandTotal = 0;
        var currentPage = 1;
        var pointsValue = {{ $settings->ponit_value }};
        var UserPointsValue = 0;
        var initialValue = null;

        const routes = {
            getProducts: "{{ route('get_products') }}",
            addToCart: "{{ route('add_to_cart') }}",
            addToCartWithQuantity: "{{ route('add_to_cart_with_quantity') }}",
            deleteProductFromCart: "{{ route('delete_product_from_cart') }}",
            addQuantity: "{{ route('add_qty') }}",
            removeQuantity: "{{ route('remove_qty') }}",
            getUserPoints: "{{ route('getUserPoints') }}",
            getClients: "{{ route('getClients') }}",
        };

        const elements = {
            productsBox: $("#products-box"),
            cartItems: $("#cart-items"),
            discountInput: $("#discount"),
            discountSelect: $("#inputGroupSelect02"),
        };

        Pusher.logToConsole = false;
        var pusher = new Pusher("96010b48b2b6efb4c0f1", {
            cluster: "ap2",
            encrypted: true,
            useTls: true,
        });
        var channel = pusher.subscribe('online-order');
        channel.bind('online-order', function(data) {
            $("#online-order-count").text(data.countOrderData);
            $("#online_list").prepend(`
                <tr>
                    <th scope="row">${data.orderData.id}</th>
                    <td>${ data.orderData.order_no }</td>
                    <td>${ data.orderData.name }</td>
                    <td>${ data.orderData.email }</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-sm"
                            data-bs-dismiss="modal" id="editOnlineOrder"
                            data-id="${data.orderData.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            `);
        });

        $(window).on('load', function() {
            jQuery("#loader").fadeOut(); // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(800).fadeOut("slow");
            jQuery("pos-layout").show(); // will fade out the whole DIV that covers the website.

        });

        $(function() {
            "use strict";
            $(document).ready(function() {
                $("#customer_id").select2();
            });
            $(document).ready(function() {
                flatpickr("#datetimepicker", {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i"
                });
            });
        });


        function appendNumber(number) {
            const display = document.getElementById('display');
            display.value += number;
            $("#paid-amount").text(display.value);
            $("#paying_amount").val(display.value);
            if ($("#GrandTotal").text() > 0) {
                if ($("#paid-amount").text() > $("#GrandTotal").text()) {
                    $("#change").text(parseFloat($("#paid-amount").text()) - parseFloat($("#GrandTotal").text()));
                }
            }
            if ($("#change").text() < 0) {
                $("#change").text('00.00');
            }
            initialValue = null;
        }

        function calculateGrandTotal() {
            const display = document.getElementById('display');
            const paidAmount = $("#paid-amount");
            const payingAmount = $("#paying_amount");
            const buttonValue = parseFloat($("#grand-total-round-btn").text());

            if (initialValue === null) {
                initialValue = buttonValue;
                display.value = initialValue;
            } else {
                initialValue *= 2;
                display.value = initialValue;
            }
            paidAmount.text(display.value);
            payingAmount.val(display.value);
            $("#change").text(parseFloat($("#paid-amount").text()) - parseFloat($("#GrandTotal").text()));
            if ($("#change").text() < 0) {
                $("#change").text('00.00');
            }
            if ($("#paid-amount").text() == 0) {
                $("#change").text('00.00');
            }
        }

        function clearDisplay() {
            const display = document.getElementById('display');
            display.value = '';
            $("#paid-amount").text('00.00');
            $("#paying_amount").val('00.00');
            $("#change").text('00.00');
            initialValue = null;
        }

        function deleteLast() {
            const display = document.getElementById('display');
            display.value = display.value.slice(0, -1);
            $("#paid-amount").text(display.value || '00.00');
            $("#paying_amount").val(display.value || '00.00');
            $("#change").text(parseFloat($("#paid-amount").text()) - parseFloat($("#GrandTotal").text()));
            if ($("#change").text() < 0) {
                $("#change").text('00.00');
            }
            if ($("#paid-amount").text() == 0) {
                $("#change").text('00.00');
            }
            initialValue = null;
        }

        $("#cash").on("change", function() {
            if ($(this).is(':checked')) {
                var cashOptionValue = null;
                $("#payment_method_id option").each(function() {
                    if ($(this).text().trim() === 'Cash') {
                        cashOptionValue = $(this).val();
                        return false;
                    }
                });
                if (cashOptionValue !== null) {
                    $("#payment_method_id").val(cashOptionValue).trigger("change");
                }
            }
        });

        $("#card").on("change", function() {
            if ($(this).is(':checked')) {
                var cashOptionValue = null;
                $("#payment_method_id option").each(function() {
                    if ($(this).text().trim() === 'Credit card') {
                        cashOptionValue = $(this).val();
                        return false;
                    }
                });
                if (cashOptionValue !== null) {
                    $("#payment_method_id").val(cashOptionValue).trigger("change");
                }
            }
        });

        $(document).ready(function() {
            data = null;
            $("#is_points").on("change", function() {
                var value = this.value = this.checked ? 1 : 0
                $("#is_points").val(value);
                if (value == 1) {
                    $("#inputGroupSelect02 option[value='percent']").remove();
                    $("#discount").val(0);
                    $("#inputGroupSelect02").val("fixed");
                    updateGrandTotalWithShippingAndTax();
                }
                if (value == 0) {
                    $("#discount").val(0);
                    $("#customer_points_for_show").text(UserPointsValue);
                    if ($("#inputGroupSelect02 option[value='percent']").length == 0) {
                        $("#inputGroupSelect02").append('<option value="percent">%</option>');
                    }
                    updateGrandTotalWithShippingAndTax();
                }
            });

            // Discount Input Value Check For Points
            $('#discount').on('input', function() {
                if ($("#is_points").is(':checked')) {
                    // var userPoints = parseFloat($('#customer_points_for_show').text());
                    var userPoints = parseFloat($('#customer_points1').val());
                    var discountValue = parseFloat($('#discount').val());
                    if (discountValue > userPoints) {
                        toastr.warning("Discount cannot be greater than Points!");
                        $("#discount").val(0);
                        updateGrandTotalWithShippingAndTax();
                    }
                }
            });

            //Get User Points
            var client_id = $('#customer_id').val();
            GetUserPoints(client_id);

            //Get Clients
            function GetClients() {
                $.ajax({
                    type: "GET",
                    url: routes.getClients,
                    success: function(response) {
                        $("#customer_id").empty();
                        response.forEach(element => {
                            let selected = element.id == {{ $settings->client_id }} ?
                                'selected' : '';
                            $("#customer_id").append(
                                `<option value="${element.id}" ${selected}>${element.username} | ${element.phone}</option>`
                            );
                        });
                    },
                    error: function(data) {
                        console.log("Error:", data);
                    }
                });
            }


            //Get Clients
            GetClients();

            //Reset Cart
            FlushCart();

            $("body").on("click", "#resetBtn", function() {
                FlushCart();
                initialValue = null;
                $("#reference-number").val('');
                $("#shipping").val('');
                $("#discount").val('');
                $("#orderTax").val('');
                $("#GrandTotal").text('');
                $("#grand-total-actual-btn").text('00.001');
                $("#grand-total-round-btn").text('00.001');
                $("#items-total").text('00.00');
                $("#balance").text('00.00');
                $("#paid-amount").text('00.00');
                $("#to-pay").text('00.00');
                $("#display").val('00.00');
                $("#change").text('00.00');
                $("#discountType").val('');
                $("#discountInput").val('');
                $("#discountAmount").val('');
                $("#customer_id").val('{{ $settings->client_id }}');
                $("#warehouse_id").val('{{ $settings->warehouse_id }}');
                GetUserPoints({{ $settings->client_id }});
                $("#is_points").prop('checked', false);
                $("#warehouse_id").attr("disabled", false);
                $("#warehouse_id").css("cursor", "pointer");
                if ($("#inputGroupSelect02 option[value='percent']").length == 0) {
                    $("#inputGroupSelect02").append('<option value="percent">%</option>');
                }

                $("#exampleModal1").modal("hide");


                toastr.success("Cart Reset Successfully");
            });

            function FlushCart() {
                $.ajax({
                    url: "{{ route('flushCart') }}",
                    type: "POST",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(responseData) {
                        $("#cart-items").empty();
                        $("#cart-items").append(`
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <h5 class="text-center">Cart is Empty</h5>
                            </div>
                        </div>
                        `);
                    },
                    error: function(responseData) {
                        console.log(responseData);
                    }
                })
                data = null;
            }

            $('body').on('click', '#ResetPos', function() {
                $("#exampleModal1").modal("show");
            });

            function GetHoldList() {
                $.ajax({
                    url: "{{ route('getHoldList') }}",
                    type: "GET",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(responseData) {
                        $("#hold-order-count").text(responseData.length);
                        $("#hold_list").empty();
                        responseData.forEach(element => {
                            $("#hold_list").append(`
                            <tr>
                                <th scope="row">${element.id}</th>
                                <td>${ element.reference_no }</td>
                                <td>${ element.created_at }</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-bs-dismiss="modal"
                                        id="DeleteHoldOrder" data-id="${element.id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor"
                                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-bs-dismiss="modal" id="editHold"
                                        data-id="${element.id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            `);
                        })
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function GetOnlineOrdersList() {
                $.ajax({
                    url: "{{ route('getOnlineOrdersList') }}",
                    type: "GET",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(responseData) {
                        $("#online-order-count").text(responseData.length);
                        $("#online_list").empty();
                        responseData.forEach(element => {
                            $("#online_list").append(`
                            <tr>
                                <th scope="row">${element.id}</th>
                                <td>${ element.order_no }</td>
                                <td>${ element.name }</td>
                                <td>${ element.email }</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-bs-dismiss="modal" id="editOnlineOrder"
                                        data-id="${element.id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            `);
                        })
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }



            $("body").on('click', '#DeleteHoldOrder', function() {
                var id = $(this).data('id');
                deleteHoldOrder(id);
            });

            function deleteHoldOrder(id) {
                $.ajax({
                    url: "{{ route('delete_hold_order') }}",
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        id
                    },
                    success: function(data) {
                        if (data.message === 'success') {
                            toastr.success(data.data);
                            GetHoldList();
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }


            $("body").on('click', '#show-hold-order', function() {
                $("#Show_Hold").modal("show");
            });

            $("body").on('click', '#show-online-order', function() {
                $("#Show_Online").modal("show");
            });

            $("body").on("click", "#HoldOrderBtn", function() {
                // Assuming data is coming from somewhere, make sure it's defined
                if (typeof data !== 'undefined' && data !== null && typeof data.cart !== 'undefined') {
                    if (data.cart.length === 0) {
                        toastr.error("Please select at least one product");
                    } else {
                        $("#exampleModal").modal("show");
                    }
                } else {
                    toastr.error("Please select at least one product");
                }
            });

            $("#holdOrder").prop("disabled", true);
            $("#reference-number").on("keyup", function() {
                if ($(this).val() !== "") {
                    $("#holdOrder").prop("disabled", false);
                } else {
                    $("#holdOrder").prop("disabled", true);
                }
            });

            $("body").on("click", "#holdOrder", function(e) {
                var reference_number = $('#reference-number').val();
                var warehouse_id = $('#warehouse_id').val();
                var client_id = $('#customer_id').val();
                var is_points = $('#is_points').val();
                var shipping = $('#shipping').val();
                var orderTax = $('#orderTax').val();
                var discount = $('#discount').val();
                var discountType = elements.discountSelect.val();
                var hold_products = data;

                $.ajax({
                    url: "{{ route('hold_order') }}",
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        reference_number,
                        warehouse_id,
                        client_id,
                        is_points,
                        shipping,
                        orderTax,
                        discount,
                        discountType,
                        hold_products
                    },
                    success: function(data1) {
                        data = null;
                        if (data1.message === 'success') {
                            toastr.success("Order Hold Successfully");
                            $("#exampleModal").modal("hide");
                            initialValue = null;
                            GetHoldList();
                            GetUserPoints({{ $settings->client_id }});
                            $("#shipping").val("");
                            $("#customer_id").val("{{ $settings->client_id }}");
                            $("#is_points").prop('checked', false);
                            $("#orderTax").val("");
                            $("#discount").val("");
                            $("#GrandTotal").text("");
                            $("#grand-total-actual-btn").text('00.00');
                            $("#grand-total-round-btn").text('00.00');
                            $("#items-total").text('00.00');
                            $("#balance").text('00.00');
                            $("#to-pay").text('00.00');
                            $("#change").text('00.00');
                            $("#discountType").val("");
                            $("#warehouse_id").attr("disabled", false);
                            $("#warehouse_id").css("cursor", "pointer");
                            if ($("#inputGroupSelect02 option[value='percent']").length == 0) {
                                $("#inputGroupSelect02").append(
                                    '<option value="percent">%</option>');
                            }
                            elements.cartItems.html("");
                            $("#cart-items").append(`
                            <div class="container mt-4">
                                <div class="row justify-content-center">
                                    <h5 class="text-center">Cart is Empty</h5>
                                </div>
                            </div>
                            `);
                        }
                        if (data1.message === 'error') {
                            var errors = data1.data;

                            // Display each error message using Toastr
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    var errorMessage = errors[key][
                                        0
                                    ]; // Assuming there is only one error message per field
                                    toastr.error(errorMessage);
                                }
                            }
                        }
                    },
                    error: function(data1) {
                        toastr.error(data.error);
                        $("#exampleModal").modal("hide");
                    }
                })
            });

            $("body").on("click", "#editHold", function() {
                var HoldId = $(this).data("id");
                $.ajax({
                    url: "{{ route('edit_hold_order') }}",
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        id: HoldId
                    },
                    success: function(data) {
                        if (data.data.holdOrder.is_points == 1) {
                            $("#is_points").prop('checked', true);
                            $("#inputGroupSelect02 option[value='percent']").remove();
                        }
                        if (data.data.holdOrder.is_points == 0) {
                            $("#is_points").prop('checked', false);
                            if ($("#inputGroupSelect02 option[value='percent']").length == 0) {
                                $("#inputGroupSelect02").append(
                                    '<option value="percent">%</option>');
                            }
                        }

                        $("#shipping").val(data.data.holdOrder.shipping);
                        $("#orderTax").val(data.data.holdOrder.orderTax);
                        $("#discount").val(data.data.holdOrder.discount);
                        $(elements.discountSelect).val(data.data.holdOrder.discountType);
                        $("#warehouse_id").val(data.data.holdOrder.warehouse_id);
                        $("#customer_id").val(data.data.holdOrder.client_id);
                        GetUserPoints(data.data.holdOrder.client_id);
                        $("#reference-number").val(data.data.holdOrder.reference_no);
                        const warehouseId = data.data.holdOrder.warehouse_id;
                        warehouse_id = warehouseId;
                        const categoryId = $(".category-item.CategorySelected").data(
                            "id"); // Get the selected category ID
                        ProductByCategory(categoryId, warehouseId, "Warehouse");
                        $.ajax({
                            url: routes.addToCartWithQuantity,
                            type: "POST",
                            token: "{{ csrf_token() }}",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            data: {
                                products: data.data.holdProducts,
                                warehouse_id: $("#warehouse_id").val()
                            },
                            success: function(response) {
                                if (response.message) {
                                    toastr.error('Out of stock');
                                } else {
                                    updateCartBox(response);
                                }
                            },
                            error: function(data) {
                                console.log("Error:", data);
                            }
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })

            });

            $("body").on("click", "#editOnlineOrder", function() {
                OnlineId = $(this).data("id");
                $.ajax({
                    url: "{{ route('edit_online_order') }}",
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        id: OnlineId
                    },
                    success: function(data) {
                        const warehouseId = $("#warehouse_id").val();
                        const categoryId = $(".category-item.CategorySelected").data("id");
                        if (data && data.data && data.data.onlineOrderDetails && data.data.onlineOrderDetails[0]) {
                            $("#payment_method_id").val(data.data.onlineOrderDetails[0].payment_method_id);
                        } else {
                            console.error("Online order details are not available or empty.");
                        }

                        if (data.data.onlineOrderDetails[0] && data.data.onlineOrderDetails[0]
                            .payment_method == 'Cash') {
                            $("#cash").prop('checked', true).click();
                        }
                        if (data.data.onlineOrderDetails[0] && data.data.onlineOrderDetails[0]
                            .payment_method == 'Credit card') {
                            $("#card").prop('checked', true).click();
                        }
                        ProductByCategory(categoryId, warehouseId, "Warehouse");
                        $.ajax({
                            url: routes.addToCartWithQuantity,
                            type: "POST",
                            token: "{{ csrf_token() }}",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            data: {
                                products: data.data.onlineOrderDetails,
                                warehouse_id: $("#warehouse_id").val()
                            },
                            success: function(response) {
                                if (response.message) {
                                    toastr.error('Out of stock');
                                } else {
                                    updateCartBox(response);
                                }
                            },
                            error: function(data) {
                                console.log("Error:", data);
                            }
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })

            });

            // Get the customer id from the "customer_id" field and call the GetUserPoints function
            $("#customer_id").on("change", function() {
                var id = $("#customer_id").val();
                GetUserPoints(id);
            })

            // Get Customer Points
            function GetUserPoints(id) {
                $.ajax({
                    url: routes.getUserPoints,
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (!data || data.length === 0 || !data[0].clients) {
                            $("#customer-points-details").empty();
                            $("#customer-points-details").append(`
                            <tr class="text-center">
                                <td style="font-size: 10px; text-align-center !important;">N/A</td>
                                <td style="font-size: 10px; text-align-center !important;">N/A</td>
                                <td style="font-size: 10px; text-align-center !important;">N/A</td>
                            </tr>
                            `);
                        } else {
                            UserPointsValue = data[0].remaining_user_point * pointsValue;
                            UserPointsValue = UserPointsValue.toFixed(2);
                            $("#customer-points-details").empty();
                            $("#customer-points-details").append(`
                            <tr class="text-center">
                                <td style="font-size: 10px;">${data[0].clients.username}</td>
                                <td style="font-size: 10px;">${data[0].remaining_user_point}</td>
                                <td style="font-size: 10px;" id="customer_points_for_show"> ${UserPointsValue}</td>
                            </tr>
                                <input type="hidden" id="customer_points1" value="${UserPointsValue}">
                            `);
                            $("#customer_points").val(data[0].remaining_user_point);
                        }
                    },

                    error: function(data) {
                        console.log(data);
                    }
                })
            }

            $("#products-box").on("click", function() {
                if (elements.cartItems.length > 0) {
                    $("#warehouse_id").attr("disabled", true);
                    $("#warehouse_id").css("cursor", "not-allowed");
                }
            })

            var selectedCategory = 'all';
            var selectedWarehouse = $("#warehouse_id").val();

            var isFetching = false; // Flag to track AJAX request state

            // Fetch and render products on page load
            const initialPage = getInitialPageFromUrl();
            fetchAndRenderProducts(initialPage);

            // Add event listener for popstate
            $(window).on("popstate", function(event) {
                const state = event.originalEvent.state;
                if (state) {
                    const page = state.page;
                    fetchAndRenderProducts(page);
                }
            });

            function getInitialPageFromUrl() {
                const urlParams = new URLSearchParams(window.location.search);
                const initialPage = urlParams.get("page");
                return initialPage ? parseInt(initialPage, 10) : 1; // Default to page 1 if undefined
            }


            // Searching Product
            const autocompleteInput = $("#autocomplete input");
            const autocompleteResultList = $(".autocomplete-result-list");

            // Handle input focus to show/hide the result list
            autocompleteInput.on("focus", function() {
                showSearchResults();
            });

            autocompleteInput.on("blur", function() {
                // Use a delay to allow for the click on the result list
                setTimeout(hideSearchResults, 200);
            });

            // Handle input changes for autocomplete
            autocompleteInput.on("input", function() {
                const searchTerm = $(this).val();
                $.ajax({
                    url: "{{ route('search_products') }}",
                    type: "GET",
                    data: {
                        term: searchTerm,
                        warehouse_id: $("#warehouse_id").val(),
                    },
                    success: function(data) {
                        renderSearchResults(data.products);
                        showSearchResults
                            (); // Ensure the list is visible when there are results
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            // Handle change event for warehouse
            $("#warehouse_id").on("change", function() {
                const warehouseId = $(this).val();
                warehouse_id = warehouseId;
                const categoryId = $(".category-item.CategorySelected").data("id");
                ProductByCategory(categoryId, warehouseId, "Warehouse");
                selectedWarehouse = warehouseId;
                data = null;
            });

            // Handle click events on autocomplete results
            autocompleteResultList.on("click", "li", function(event) {
                event.stopPropagation(); // Prevent the click event from bubbling up

                const id = $(this).data("id");
                const name = $(this).text();
                const price = $(this).data("price");
                const img_path = $(this).data("img_path");

                addToCart(id, price, name, img_path);
                playClickSound();
            });

            function showSearchResults() {
                autocompleteResultList.show();
            }

            function hideSearchResults() {
                autocompleteResultList.hide();
            }

            function renderSearchResults(products) {
                // Clear previous results
                autocompleteResultList.empty();
                // Render new results
                if (products.length > 0) {
                    products.forEach(function(product) {
                        autocompleteResultList.append(`
                    <li style="position: relative" class="px-3 py-2 cursor-pointer fw-semibold fs-14" data-id="${product.id}" data-price="${product.price}" data-img_path="${product.img_path}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                            ${product.name}
                    </li>
                `);
                    });
                } else {
                    autocompleteResultList.append(`
                <li>No results found</li>
            `);
                }
            }

            initialize();

            function checkCartItemsAndEnableWarehouseSelect() {
                const warehouseSelect = $("#warehouse_id");

                // Check if data is defined and has the 'cart' property
                if (data && data.cart) {
                    const isCartEmpty = $.isEmptyObject(data.cart);

                    if (isCartEmpty) {
                        // Cart is empty, enable the warehouse select box
                        warehouseSelect.prop('disabled', false);
                        warehouseSelect.css('cursor', 'pointer');
                    } else {
                        // Cart is not empty, disable the warehouse select box
                        warehouseSelect.prop('disabled', true);
                        warehouseSelect.css('cursor', 'not-allowed');
                    }
                } else {
                    // If data is undefined or doesn't have the 'cart' property, assume cart is empty
                    warehouseSelect.prop('disabled', false);
                    warehouseSelect.css('cursor', 'pointer');
                }
            }

            function initialize() {
                fetchAndRenderProducts();
                checkCartItemsAndEnableWarehouseSelect();
                GetHoldList();
                GetOnlineOrdersList();

                // Handle click events
                elements.productsBox.on("click", ".product-card", function() {
                    const {
                        id,
                        price,
                        name,
                        img_path
                    } = $(this).data();
                    addToCart(id, price, name, img_path);
                    playClickSound();
                });

                $("body").on("click", "#DeleteProduct", function() {
                    const id = $(this).data("id");
                    deleteProductFromCart(id);
                    updateGrandTotalWithShippingAndTax();
                    $("#GrandTotal").text(0);
                    $("#grand-total-actual-btn").text(0);
                    $("#grand-total-round-btn").text(0);
                    $("#items-total").text(0);
                    $("#balance").text(0);
                    $("#to-pay").text(0);
                    $("#change").text(0);
                    $("#paying_amount_badge").text("Grand Total: " + 0);
                });

                $("body").on("click", "#addQty", function() {
                    const id = $(this).data("id");
                    updateQuantity(id, 'add');
                    updateGrandTotalWithShippingAndTax();
                });

                $("body").on("click", "#removeQty", function() {
                    const id = $(this).data("id");
                    updateQuantity(id, 'remove');
                    updateGrandTotalWithShippingAndTax();
                });

                $("#shipping, #orderTax").on("input", function() {
                    updateGrandTotalWithShippingAndTax();
                });

                $("#shipping, #orderTax, #discount, #inputGroupSelect02").on("input change", function() {
                    updateGrandTotalWithShippingAndTax();
                });
            }

            function fetchAndRenderProducts(page) {
                // If an AJAX request is already in progress, do nothing
                if (isFetching) {
                    return;
                }

                // Set the flag to indicate that a request is in progress
                isFetching = true;

                // Fetch and render products
                $.ajax({
                    url: routes.getProducts,
                    type: "GET",
                    dataType: "json",
                    data: {
                        page: page, // Pass the current page to the server
                        warehouse_id: $("#warehouse_id").val(), // Pass the selected warehouse
                        category_id: $(".category-item.CategorySelected").data(
                            "id"), // Pass the selected category
                    },
                    success: function(data) {
                        renderProducts(data);
                        renderPagination(data);
                        history.pushState({
                            page: page
                        }, null, `?page=${page}`);
                    },
                    error: function(data) {
                        console.log(data);
                    },
                    complete: function() {
                        // Reset the flag when the request is complete
                        isFetching = false;
                    },
                });
            }

            function renderPagination(productsData) {
                const totalPages = productsData.last_page;
                const paginationContainer = $("#pagination-container");
                paginationContainer.empty();

                const hasPreviousPage = currentPage > 1;
                const hasNextPage = currentPage < totalPages;

                // Render "First" button and disable it if there's no previous page
                const firstButton =
                    `<button class="btn btn-outline-primary btn-sm mx-1 pagination-link" data-page="1" ${hasPreviousPage ? '' : 'disabled'}>First</button>`;
                // Render "Previous" button and disable it if there's no previous page
                const previousButton =
                    `<button class="btn btn-outline-primary btn-sm mx-1 pagination-link" data-page="${hasPreviousPage ? currentPage - 1 : currentPage}" ${hasPreviousPage ? '' : 'disabled'}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg></button>`;
                // Render "Next" button and disable it if there's no next page
                const nextButton =
                    `<button class="btn btn-outline-primary btn-sm mx-1 pagination-link" data-page="${hasNextPage ? currentPage + 1 : currentPage}" ${hasNextPage ? '' : 'disabled'}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                    </svg></button>`;
                // Render "Last" button and disable it if there's no next page
                const lastButton =
                    `<button class="btn btn-outline-primary btn-sm mx-1 pagination-link" data-page="${hasNextPage ? totalPages : currentPage}" ${hasNextPage ? '' : 'disabled'}>Last</button>`;

                paginationContainer.append(firstButton);
                paginationContainer.append(previousButton);

                for (let i = 1; i <= totalPages; i++) {
                    paginationContainer.append(`
                <button class="btn btn-outline-primary btn-sm mx-1 pagination-link ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>
            `);
                }

                paginationContainer.append(nextButton);
                paginationContainer.append(lastButton);

                // Add click event for pagination links
                paginationContainer.on("click", ".pagination-link", function() {
                    const page = $(this).data("page");
                    currentPage = page;
                    fetchAndRenderProducts(page);
                });
            }




            // Fetch and render products on page load
            fetchAndRenderProducts(currentPage);

            function renderProducts(data) {
                elements.productsBox.empty(); // Clear existing products
                data.data.forEach(renderProduct);
            }

            function renderProduct(element) {
                // Render individual product
                var imgPath = element.img_path;
                if (element.img_path == '') {
                    imgPath = "no_image.jpg";
                }
                elements.productsBox.append(`
                <div class="col-lg-4 col-md-6 col-sm-6 product-card" data-id="${element.id}" data-price="${element.price}" data-name="${element.name}" data-img_path="${element.img_path}">
                    <div class="card cursor-pointer">
                        <img src="/images/products/${imgPath}" class="card-img-top" alt="">
                        <div class="card-body pos-card-product">
                            <p class="text-gray-600">${element.name}</p>
                            <h6 class="title m-0"> {{ $currency }} ${element.price}</h6>
                        </div>
                        <div class="quantity"></div>
                    </div>
                </div>
            `);
            }

            function playClickSound() {
                // Play click sound
                const clickSound = document.getElementById("clickSound");
                if (clickSound) {
                    clickSound.play();
                }
            }

            function addToCart(id, price, name, img_path) {
                // Add to cart
                $.ajax({
                    url: routes.addToCart,
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        id,
                        price,
                        name,
                        img_path,
                        warehouse_id: $("#warehouse_id").val()
                    },
                    success: function(response) {
                        if (response.message) {
                            toastr.error('Out of stock');
                        } else {
                            updateCartBox(response);
                        }
                    },
                    error: function(data) {
                        console.log("Error:", data);
                    }
                });
            }

            function deleteProductFromCart(id) {
                // Delete product from cart
                $.ajax({
                    url: routes.deleteProductFromCart,
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        id
                    },
                    success: function(response) {
                        if (response.cart.length == 0) {
                            $("#warehouse_id").attr("disabled", false);
                            $("#warehouse_id").css("cursor", "pointer");
                        }
                        updateCartBox(response);
                        data = null;
                    },
                    error: function(data) {
                        console.log("Error:", data);
                    }
                });
            }

            function updateQuantity(id, action) {
                // Update quantity
                const route = action === 'add' ? routes.addQuantity : routes.removeQuantity;

                $.ajax({
                    url: route,
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        id: id,
                        warehouse_id: $("#warehouse_id").val()
                    },
                    success: function(responseData) {
                        if (responseData.message === 'Out of stock') {
                            toastr.error('Out of stock');
                        }
                        updateCartBox(responseData); // Call updateCartBox with the response data
                        checkCartItemsAndEnableWarehouseSelect();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function updateCartBox(responseData) {
                // Update cart box
                elements.cartItems.empty();

                if (!responseData.cart || Object.keys(responseData.cart).length === 0) {
                    document.getElementById("cart-items").innerHTML = `
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <h5 class="text-center">Cart is Empty</h5>
                            </div>
                        </div>
                    `;
                } else {

                    // Assign the responseData to the global data variable
                    data = responseData;

                    grandTotal = 0;

                    for (const detailId in data.cart) {
                        if (data.cart.hasOwnProperty(detailId)) {
                            const detail = data.cart[detailId];
                            renderCartItem(detail);
                            grandTotal += detail.price * detail.quantity;
                        }
                    }

                    updateGrandTotalWithShippingAndTax();
                    checkCartItemsAndEnableWarehouseSelect();
                }
            }


            function updateGrandTotal(total, taxNet) {
                // Update grand total without changing previous calculation
                total = total.toFixed(2);
                $("#GrandTotal").text(total);
                $("#grand-total-actual-btn").text(total);
                $("#grand-total-round-btn").text(Math.ceil(total));
                $("#items-total").text(total);
                $("#balance").text(total);
                $("#to-pay").text(total);

                // Assuming you have an element for TaxNet, update its value
                $("#TaxNet").text(taxNet.toFixed(2));

                $("#paying_amount_badge").text("Grand Total: " + total);
            }

            function renderCartItem(detail) {
                // Render cart item
                if (detail.img_path == null) {
                    detail.img_path = 'no_image.png';
                }
                elements.cartItems.append(`
                <div class="cart-item box-shadow-3">
                    <div class="d-flex align-items-center">
                        <img src="/images/products/${detail.img_path}" alt="">
                        <div>
                            <p class="text-gray-600 m-0 font_12">${detail.name}</p>
                            <h6 class="fw-semibold m-0 font_16">{{ $currency }} ${detail.price * detail.quantity}</h6>
                            <a title="Delete" id="DeleteProduct" data-id="${detail.id}"
                                class="cursor-pointer ul-link-action text-danger">
                                <i class="i-Close-Window"></i>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="increment-decrement btn btn-light rounded-circle" id="removeQty" data-id="${detail.id}" ${detail.quantity <= 1 ? 'disabled' : ''}>-</span>
                        <input class="fw-semibold cart-qty m-0 px-2" readonly value="${detail.quantity}">
                        <span class="increment-decrement btn btn-light rounded-circle" id="addQty" data-id="${detail.id}">+</span>
                    </div>
                </div>
            `);
                // Disable the button if the quantity is 1 or less
                if (detail.quantity <= 1) {
                    $(`#removeQty[data-id='${detail.id}']`).prop('disabled', true);
                }
            }

            function updateGrandTotalWithShippingAndTax() {
                // Get the shipping amount from the "shipping" field
                const shippingAmount = parseFloat($("#shipping").val()) || 0;

                // Get the order tax percentage from the "orderTax" field
                const orderTaxPercentage = parseFloat($("#orderTax").val()) || 0;

                // Get the discount amount based on user input
                const discountType = elements.discountSelect.val();
                const discountInput = parseFloat(elements.discountInput.val()) || 0;

                // Calculate discount amount based on type (fixed or percentage)
                const discountAmount = calculateDiscountAmount(grandTotal, discountType, discountInput);

                $("#discountAmount").text(discountAmount);
                // Calculate product amount after discount
                const productAmountAfterDiscount = Math.max(grandTotal - discountAmount, 0);

                // Calculate total without discount
                const totalWithoutDiscount = productAmountAfterDiscount;

                // Calculate TaxNet
                const taxNet = (totalWithoutDiscount * orderTaxPercentage) / 100;

                // Update grand total including shipping, tax, and product amounts
                const newGrandTotal = productAmountAfterDiscount + shippingAmount + taxNet;
                if (data != null) {
                    // Update cart box including shipping, tax, and product amounts
                    elements.cartItems.empty();
                    for (const detailId in data.cart) {
                        if (data.cart.hasOwnProperty(detailId)) {
                            const detail = data.cart[detailId];
                            renderCartItem(detail);
                        }
                    }
                    // Update grand total with TaxNet without changing the previous calculation
                    updateGrandTotal(newGrandTotal, taxNet);
                }

                if (data == null) {
                    $("#GrandTotal").text("0");
                    $("#grand-total-actual-btn").text("00.00");
                    $("#grand-total-round-btn").text("00.00");
                    $("#items-total").text("0");
                    $("#balance").text("0");
                    $("#to-pay").text("0");
                    $("#change").text("0");
                    $("#paying_amount_badge").text("Grand Total: " + 0);
                }


            }



            function calculateDiscountAmount(total, type, value) {
                if ($('#is_points').val() == 1) {
                    var UserPointsValue = $("#customer_points1").val();
                    UserPointsValue -= value;
                    $("#customer_points_for_show").text(UserPointsValue.toFixed(2));
                }
                // Calculate discount amount based on type (fixed or percentage)
                if (type === "percent") {
                    return (total * value) / 100;
                } else if (type === "fixed") {
                    return value;
                } else {
                    return 0;
                }
            }

            // Print Category
            function GetCategories() {
                $.ajax({
                    url: "{{ route('GetCategories') }}",
                    type: "GET",
                    success: function(data) {
                        $("#CategoryUl").empty();

                        // Add a li for showing all categories
                        $("#CategoryUl").append(`
                            <li class="category-item" data-id="all" id="Category">
                                <i class="i-Bookmark"></i>All Categories
                            </li>
                        `);

                        // Add li elements for each category
                        $.each(data, function(key, value) {
                            $("#CategoryUl").append(`
                                <li class="category-item" data-id="${value.id}" id="Category">
                                    <i class="i-Bookmark"></i>${value.name}
                                </li>
                            `);
                        });

                        // Handle click events on category items
                        $("#CategoryUl").on("click", ".category-item", function() {
                            // Remove the 'selected' class from all category items
                            $(".category-item").removeClass("CategorySelected");

                            // Add the 'selected' class to the clicked category item
                            $(this).addClass("CategorySelected");

                            // Get the selected category and warehouse IDs
                            const selectedCategory = $(this).data("id");
                            const selectedWarehouse = $("#warehouse_id").val();

                            // Make the AJAX request
                            ProductByCategory(selectedCategory, selectedWarehouse, "Category");
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }


            GetCategories();

            $("body").on("click", "#Category", function() {
                const id = $(this).data("id");

                // Get the selected category and warehouse IDs
                const selectedCategory = $(this).data("id");
                const selectedWarehouse = $("#warehouse_id").val();

                // Make the AJAX request
                ProductByCategory(selectedCategory, selectedWarehouse, "Category");
            });

            function renderProductsByCategory(products) {
                elements.productsBox.empty();
                if (Array.isArray(products)) {
                    products.forEach(renderProduct);
                } else {
                    console.error("Invalid data format: expected an array of products", products);
                }
            }

            function ProductByCategory(categoryId, warehouseId, type) {
                $.ajax({
                    url: "{{ route('ProductByCategory') }}",
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        category_id: categoryId,
                        warehouse_id: warehouseId,
                        type: type
                    },
                    success: function(data) {
                        if (Array.isArray(data.products)) {
                            renderProductsByCategory(data.products);
                        } else {}
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            $("#PayNow").click(function(e) {
                $("#form_Update_Detail").modal("show");
                e.preventDefault();
            });

            $("#save_pos").click(function(e) {
                $("#form_Update_Detail").modal("hide");
                e.preventDefault();

                var GrandTotalAmount = parseFloat($("#GrandTotal").text());
                var paying_amount = parseFloat($("#paying_amount").val());
                if (GrandTotalAmount > paying_amount) {
                    toastr.warning("Paying amount cannot be greater than Grand Total");
                    $("#paying_amount").val(GrandTotalAmount);
                    $("#paying_amount").focus();
                    return false;
                }
                $.ajax({
                    url: "{{ url('pos/create_pos') }}",
                    type: "POST",
                    token: "{{ csrf_token() }}",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        is_points: $("#is_points").val(),
                        date: $("#date").val(),
                        warehouse_id: $("#warehouse_id").val(),
                        client_id: $("#customer_id").val(),
                        tax_rate: ($("#orderTax").val() !== '') ? $("#orderTax").val() : 0,
                        TaxNet: $("#TaxNet").text(),
                        discount: ($("#discount").val() !== '') ? $("#discount").val() : 0,
                        discount_type: $("#inputGroupSelect02").val(),
                        discount_percent_total: $("#discountAmount").text(),
                        shipping: ($("#shipping").val() !== '') ? $("#shipping").val() : 0,
                        GrandTotal: $("#GrandTotal").text(),
                        notes: $("#note").val(),
                        paying_amount: $("#paying_amount").val(),
                        payment_method_id: $("#payment_method_id").val(),
                        account_id: $("#account_id").val(),
                        sale_note: $("#sale_note").val(),
                        OnlineId: OnlineId,
                    },
                    success: function(data) {
                        if (data.success) {

                            if ($("#cash").is(':checked')) {
                                $("#cash").prop('checked', false);
                                $("#cash").css('color', 'black');
                                $("#cash").css('background', 'white');
                            }
                            if ($("#card").is(':checked')) {
                                $("#card").prop('checked', false);
                                $("#card").css('color', 'black');
                                $("#card").css('background', 'white');
                            }

                            $("#form_Update_Detail").modal("hide");
                            $("#form_Update_Detail").trigger("reset");
                            toastr.success(data.message);

                            //Reset Page
                            FlushCart();
                            initialValue = null;
                            $("#customer_id").val('{{ $settings->client_id }}');
                            GetUserPoints({{ $settings->client_id }});
                            $("#is_points").prop('checked', false);
                            $("#warehouse_id").attr("disabled", false);
                            $("#warehouse_id").css("cursor", "pointer");
                            $("#shipping").val('');
                            $("#discount").val('');
                            $("#orderTax").val('');
                            $("#payment_method_id").val('');
                            $("#GrandTotal").text('');
                            $("#grand-total-actual-btn").text('00.00');
                            $("#grand-total-round-btn").text('00.00');
                            $("#balance").text('00.00');
                            $("#items-total").text('00.00');
                            $("#to-pay").text('00.00');
                            $("#change").text('00.00');
                            $("#paid-amount").text('00.00');
                            $("#display").val('');

                            $("#note").val('');
                            $(".sale_note").val('');
                            $("#paying_amount").val('');
                            $("#paying_amount_badge").text('Grand Total:');
                            OnlineId = null;
                            GetOnlineOrdersList();

                            if ($("#inputGroupSelect02 option[value='percent']").length == 0) {
                                $("#inputGroupSelect02").append(
                                    '<option value="percent">%</option>');
                            }
                            
                            // Print the document
                            var printUrl = "{{ url('invoice_pos') }}/" + data.id;
                            var a = window.open("", "", "height=1000, width=1000");
                            a.document.write(
                                '<html><head><link rel="stylesheet" href="/assets/styles/vendor/pos_print.css"></head><body>'
                            );
                            a.document.write("<iframe src='" + printUrl +
                                "' style='width: 100%; height: 100%; border: none;' onload='this.contentWindow.print();'></iframe>");
                            a.document.write("</body></html>");
                            a.document.close();

                        } else {
                            toastr.error(data.message);
                        }
                        if (data.message === "The given data was invalid") {
                            toastr.error(data.errors);
                        }
                    },
                    error: function(data) {
                        toastr.error(data.error);
                        console.log(data);
                    }
                })
            });

            $("#addCustomer").click(function(e) {
                $("#Client_Add").modal("show");
                e.preventDefault();
            });

            // Post Customer
            $('#save_client').click(function() {
                var formData = new FormData($('#client_form')[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customeradd') }}',
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#Client_Add').modal('hide');
                            toastr.success('{{ __('translate.Created_in_successfully') }}');
                            $('#client_form').trigger('reset');
                            GetClients();
                        } else {
                            // Handle errors
                            toastr.success('Failed to add client. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>


