<?php
$path = Request::path();
$parentPath = explode('/', $path)[0];
$setting = DB::table('settings')->where('deleted_at', '=', null)->first();
?>

<!-- start sidebar -->
<div x-data="{ isCompact: false }" :class="isCompact ? 'compact' : ''" class="sidebar-content bg-gray-900 card rounded-0">
    <div class="sidebar-header mb-5 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a href="{{ url('/') }}"> <img class="app-logo me-2" width="100"
                    src="{{ asset('images/' . $setting->logo) }}" alt=""></a>
        </div>
        <button @click="isCompact = !isCompact"
            class="compact-button btn border border-gray-600 d-none d-lg-flex align-items-center p-1 width_24">
            @include('components.icons.collapse', ['class' => 'width_16'])
        </button>
        <button class="close-sidebar btn border border-gray-600 d-flex d-lg-none align-items-center p-1 width_24">
            @include('components.icons.collapse', ['class' => 'width_16'])
        </button>
    </div>

    <!-- user -->
    <div class="scroll-nav" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul x-data="collapse('{{ $parentPath }}')" class="list-group" id="menu">
            {{-- Dashboard --}}
            <li class="">
                <a href="/" class="nav-item @if ($path == 'dashboard/admin') active @endif">
                    @include('components.icons.dashboard', ['class' => 'width_16'])
                    <span class="item-name">{{ __('translate.dashboard') }}</span>
                </a>
            </li>

            {{-- User Management --}}
            @if (auth()->user()->can('user_view') || auth()->user()->can('group_permission'))
                <li>
                    <div @click="selectCollapse('user-management')"
                        :class="selected == 'user-management' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.UserManagement'),
                            'icon' => 'components.icons.user',
                        ])
                    </div>
                    <div x-ref="user-management" x-bind:style="activeCollapse($refs, 'user-management', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @can('user_view')
                                <li class="">
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/user-management/users',
                                        'title' => __('translate.Users'),
                                    ])
                                </li>
                            @endcan
                            @can('group_permission')
                                <li class="">
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/user-management/permissions',
                                        'title' => __('translate.Roles'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif


            {{-- People --}}
            @if (auth()->user()->can('client_view_all') ||
                    auth()->user()->can('client_view_own') ||
                    auth()->user()->can('suppliers_view_all') ||
                    auth()->user()->can('suppliers_view_own'))
                <li>
                    <div @click="selectCollapse('people')"
                        :class="selected == 'people' ? 'collapse-active' : 'collapse-deactive'" class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.People'),
                            'icon' => 'components.icons.customers',
                        ])
                    </div>
                    <div x-ref="people" x-bind:style="activeCollapse($refs, 'people', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @if (auth()->user()->can('client_view_all') || auth()->user()->can('client_view_own'))
                                <li class="">
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/people/clients',
                                        'title' => __('translate.Customers'),
                                    ])
                                </li>
                            @endif
                            @if (auth()->user()->can('suppliers_view_all') || auth()->user()->can('suppliers_view_own'))
                                <li class="">
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/people/suppliers',
                                        'title' => __('translate.Suppliers'),
                                    ])
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            {{-- Points  Customer --}}
            @if (auth()->user()->can('client_view_all'))
                <li class="">
                    {{-- <a href="{{ route('points.index') }}" class="nav-item"> --}}
                    <a href="{{ route('clients.points') }}" class="nav-item">
                        <!-- Points SVG -->
                        <svg class="width_16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0ZM8 14C4.68629 14 2 11.3137 2 8C2 4.68629 4.68629 2 8 2C11.3137 2 14 4.68629 14 8C14 11.3137 11.3137 14 8 14Z"
                                fill="currentColor" />
                            <circle cx="8" cy="8" r="4" fill="currentColor" />
                        </svg>
                        <span class="item-name">Customer Points</span> <!-- Display "Points" as the heading name -->
                    </a>
                </li>
            @endif
            {{-- Orders --}}
            @if (auth()->user()->can('client_view_all'))
                <li class="">
                    {{-- <a href="{{ route('points.index') }}" class="nav-item"> --}}
                    <a href="{{ route('OrderShow') }}" class="nav-item">
                        <!-- Points SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="20" height="20" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="white" stroke="none">
                            <path d="M1235 5100 c-102 -40 -107 -48 -506 -740 -205 -355 -378 -665 -385 -689 -12 -37 -14 -331 -14 -1695 0 -1830 -4 -1716 65 -1821 20 -30 58 -68 88 -88 106 -72 -50 -67 2077 -67 2127 0 1971 -5 2077 67 30 20 68 58 88 88 69 105 65 -10 65 1837 l0 1669 -21 42 c-12 23 -186 326 -386 672 -392 679 -396 686 -501 725 -52 20 -79 20 -1325 19 -1234 0 -1274 -1 -1322 -19z m1175 -765 l0 -485 -811 0 c-724 0 -811 2 -805 15 5 13 306 539 488 853 l60 102 534 0 534 0 0 -485z m1644 10 c149 -258 275 -476 279 -482 7 -10 -156 -13 -802 -13 l-811 0 0 485 0 485 531 -2 531 -3 272 -470z m436 -2402 c0 -1481 -1 -1608 -17 -1625 -15 -17 -88 -18 -1911 -18 -1750 0 -1897 1 -1914 17 -17 15 -18 79 -18 1625 l0 1608 1930 0 1930 0 0 -1607z"/>
                            <path d="M3070 2449 c-14 -5 -180 -165 -370 -355 l-345 -344 -135 136 c-74 74 -147 142 -162 150 -63 33 -149 6 -188 -58 -24 -39 -26 -107 -6 -146 18 -32 402 -415 433 -431 27 -14 83 -14 120 0 32 12 827 800 849 841 8 15 14 48 14 73 0 84 -50 137 -134 142 -28 1 -62 -2 -76 -8z"/>
                            </g>
                            </svg>
                        <span class="item-name">Orders</span> <!-- Display "Points" as the heading name -->
                    </a>
                </li>
            @endif
               {{-- Online Sales  --}}
               @if (auth()->user()->can('client_view_all'))
               <li class="">
                   {{-- <a href="{{ route('points.index') }}" class="nav-item"> --}}
                   <a href="{{ route('online.sales') }}" class="nav-item">
                       <!-- Points SVG -->
                       <img src="https://uxwing.com/wp-content/themes/uxwing/download/e-commerce-currency-shopping/online-sales-icon.png" width="20" height="20" alt="Online Sales icon in SVG, PNG formats" title="Online Sales icon" style=" -webkit-filter: invert(100%);
                       filter: invert(100%);">
                       <span class="item-name">Online Sales</span> <!-- Display "Points" as the heading name -->
                   </a>
               </li>
           @endif
            {{-- HRM --}}
            @if (auth()->user()->can('hrm') || auth()->user()->id == 1)
                <li>
                    <div @click="selectCollapse('HRM')"
                        :class="selected == 'HRM' ? 'collapse-active' : 'collapse-deactive'" class="collapse-button">
                        <div class="d-flex align-items-center">
                            <!-- HRM SVG -->
                            <svg class="" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0ZM10.25 17H9.75C9.33579 17 9 16.6642 9 16.25C9 15.8708 9.28215 15.5565 9.64823 15.5068L9.75 15.5H10.25C10.6642 15.5 11 15.8358 11 16.25C11 16.6292 10.7178 16.9435 10.3518 16.9932L10.25 17ZM11.4435 14.0355C11.254 14.2564 10.991 14.4165 10.7162 14.5H9.28378C9.00897 14.4165 8.746 14.2564 8.55647 14.0355L4.94975 10.3412C4.59724 9.90648 4.54941 9.23965 4.88315 8.76035C5.23056 8.26569 5.88942 8 6.57033 8C7.5737 8 8.45158 8.417 8.94975 9.05878L10 10.4473L11.0502 9.05878C11.5484 8.417 12.4263 8 13.4297 8C14.1106 8 14.7694 8.26569 15.1169 8.76035C15.4506 9.23965 15.4028 9.90648 15.0503 10.3412L11.4435 14.0355ZM5.32641 7.5H14.6736C15.0625 7.5 15.3943 7.77614 15.4947 8.14624L16.4947 12.1462C16.6109 12.5617 16.3631 13 15.923 13H4.07701C3.63689 13 3.3891 12.5617 3.50527 12.1462L4.50527 8.14624C4.60572 7.77614 4.93753 7.5 5.32641 7.5Z"
                                    fill="currentColor" />
                            </svg>
                            <span class="item-name">HRM</span>
                        </div>
                        <svg class="collapse-icon" width="5" height="8" viewBox="0 0 5 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 7L4 4L1 1" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>

                    <div x-ref="HRM" x-bind:style="activeCollapse($refs, 'HRM', selected)" class="collapse-content"
                        style="">
                        <ul class="list-group">
                            @if (auth()->user()->can('company_view_all') || auth()->user()->id == 1)
                                <li class="">
                                    <a href="{{ route('company.index') }}" class="nav-item child-nav">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Company</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can('department_view_all') || auth()->user()->id == 1)
                                <li class="">
                                    <a href="{{ route('department.index') }}" class="nav-item child-nav">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Departments</span>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can('designation_view_all') || auth()->user()->id == 1)
                                <li class="">
                                    <a href="{{ route('designations.index') }}" class="nav-item child-nav ">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Designation</span>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can('office_view_all') || auth()->user()->id == 1)
                                <li class="">
                                    <a href="{{ route('office.index') }}" class="nav-item child-nav ">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Office Shift</span>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can('employee_view_all') || auth()->user()->id == 1 || auth()->user()->can('employee_view_own'))
                                <li class="">
                                    <a href="{{ route('employee.index') }}" class="nav-item child-nav ">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Employee Shift</span>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can('attendance_view_all') || auth()->user()->id == 1 || auth()->user()->can('attendance_view_own'))
                                <li class="">
                                    <a href="{{ route('attendance.index') }}" class="nav-item child-nav ">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Attendance</span>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can('leavetype_view-all') || auth()->user()->id == 1)
                                <li class="">
                                    <a href="{{ route('leaveType.index') }}" class="nav-item child-nav ">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Leave Type</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can('leaverequest_view_all') ||
                                    auth()->user()->id == 1 ||
                                    auth()->user()->can('leaverequest_view_own'))
                                <li class="">
                                    <a href="{{ route('leaveRequest.index') }}" class="nav-item child-nav ">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Leave Request</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can('holiday_view_all') || auth()->user()->id == 1)
                                <li class="">
                                    <a href="{{ route('holiday.index') }}" class="nav-item child-nav ">
                                        <span class="prefix rounded-circle"></span>
                                        <span class="item-name">Holidays</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            {{-- @endif --}}
            {{-- HRM end     --}}

            {{-- POS PRODUCT --}}
            @if (auth()->user()->can('products_add') ||
                    auth()->user()->can('products_view') ||
                    auth()->user()->can('category') ||
                    auth()->user()->can('brand') ||
                    auth()->user()->can('unit') ||
                    auth()->user()->can('warehouse') ||
                    auth()->user()->can('print_labels'))
                <li>
                    <div @click="selectCollapse('pos-product')"
                        :class="selected == 'pos-product' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        <div class="d-flex align-items-center">
                            <!-- HRM SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                <path
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                            </svg>
                            <span class="item-name">Pos Product</span>
                        </div>
                        <svg class="collapse-icon" width="5" height="8" viewBox="0 0 5 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 7L4 4L1 1" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>

                    <div x-ref="pos-product" x-bind:style="activeCollapse($refs, 'pos-product', selected)"
                        class="collapse-content" style="">
                        <ul class="list-group">
                            <li class="">
                                <a href="{{ route('pos-product.index') }}" class="nav-item child-nav">
                                    <span class="prefix rounded-circle"></span>
                                    <span class="item-name">All Pos Products</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div x-ref="pos-product" x-bind:style="activeCollapse($refs, 'pos-product', selected)"
                    class="collapse-content" style="">
                    <ul class="list-group">
                        <li class="">
                            <a href="{{ route('pos.categories') }}" class="nav-item child-nav">
                                <span class="prefix rounded-circle"></span>
                                <span class="item-name">Create Pos Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>
            @endif
            {{-- POS PRODUCT end     --}}

            {{-- Products --}}
            @if (auth()->user()->can('products_add') ||
                    auth()->user()->can('products_view') ||
                    auth()->user()->can('category') ||
                    auth()->user()->can('brand') ||
                    auth()->user()->can('unit') ||
                    auth()->user()->can('warehouse') ||
                    auth()->user()->can('print_labels'))
                <li>
                    <div @click="selectCollapse('products')"
                        :class="selected == 'products' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.Products'),
                            'icon' => 'components.icons.product',
                        ])
                    </div>

                    <div x-ref="products" x-bind:style="activeCollapse($refs, 'products', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @can('products_view')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/products/products',
                                        'title' => __('translate.productsList'),
                                    ])
                                </li>
                            @endcan
                            @can('products_add')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/products/products/create',
                                        'title' => __('translate.AddProduct'),
                                    ])
                                </li>
                            @endcan
                            @can('print_labels')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/products/print_labels',
                                        'title' => __('translate.Print_Labels'),
                                    ])
                                </li>
                            @endcan
                            @can('category')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/products/categories',
                                        'title' => __('translate.Categories'),
                                    ])
                                </li>
                            @endcan
                            @can('unit')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/products/units',
                                        'title' => __('translate.Units'),
                                    ])
                                </li>
                            @endcan
                            @can('brand')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/products/brands',
                                        'title' => __('translate.Brand'),
                                    ])
                                </li>
                            @endcan
                            @can('warehouse')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/products/warehouses',
                                        'title' => __('translate.Warehouses'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Stock Adjustment --}}
            @if (auth()->user()->can('adjustment_view_all') ||
                    auth()->user()->can('adjustment_view_own') ||
                    auth()->user()->can('adjustment_add'))
                <li>
                @can('adjustment_add')
                    <div @click="selectCollapse('adjustment')"
                        :class="selected == 'adjustment' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.StockAdjustement'),
                            'icon' => 'components.icons.store',
                        ])
                    </div>
                @endcan

                    <div x-ref="adjustment" x-bind:style="activeCollapse($refs, 'adjustment', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @if (auth()->user()->can('adjustment_view_all') || auth()->user()->can('adjustment_view_own'))
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/adjustment/adjustments',
                                        'title' => __('translate.ListAdjustments'),
                                    ])
                                </li>
                            @endif
                            @can('adjustment_add')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/adjustment/adjustments/create',
                                        'title' => __('translate.CreateAdjustment'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Stock Transfer --}}
            @if (auth()->user()->can('transfer_view_all') ||
                    auth()->user()->can('transfer_view_own') ||
                    auth()->user()->can('transfer_add'))
                <li>
                    <div @click="selectCollapse('transfer')"
                        :class="selected == 'transfer' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.StockTransfers'),
                            'icon' => 'components.icons.refund',
                        ])
                    </div>
                    <div x-ref="transfer" x-bind:style="activeCollapse($refs, 'transfer', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @if (auth()->user()->can('transfer_view_all') || auth()->user()->can('transfer_view_own'))
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/transfer/transfers',
                                        'title' => __('translate.ListTransfers'),
                                    ])
                                </li>
                            @endif
                            @can('transfer_add')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/transfer/transfers/create',
                                        'title' => __('translate.CreateTransfer'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Quotations --}}
            @if (auth()->user()->can('quotations_view_all') ||
                    auth()->user()->can('quotations_view_own') ||
                    auth()->user()->can('quotations_add'))
                        
                <li>
                    @can('quotations_add')
                    <div @click="selectCollapse('quotation')"
                        :class="selected == 'quotation' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.Quotations'),
                            'icon' => 'components.icons.order',
                        ])
                    </div>
                    @endcan
                    <div x-ref="quotation" x-bind:style="activeCollapse($refs, 'quotation', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @if (auth()->user()->can('quotations_view_all') || auth()->user()->can('quotations_view_own'))
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/quotation/quotations',
                                        'title' => __('translate.All_Quotations'),
                                    ])
                                </li>
                            @endif
                            @can('quotations_add')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/quotation/quotations/create',
                                        'title' => __('translate.Add_Quotation'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Purchases --}}
            @if (auth()->user()->can('purchases_view_all') ||
                    auth()->user()->can('purchases_view_own') ||
                    auth()->user()->can('purchases_add'))
                <li>
                @can('purchases_add')
                    <div @click="selectCollapse('purchase')"
                        :class="selected == 'purchase' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.Purchases'),
                            'icon' => 'components.icons.cart',
                        ])
                    </div>
                @endcan
                    <div x-ref="purchase" x-bind:style="activeCollapse($refs, 'purchase', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @if (auth()->user()->can('purchases_view_all') || auth()->user()->can('purchases_view_own'))
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/purchase/purchases',
                                        'title' => __('translate.ListPurchases'),
                                    ])
                                </li>
                            @endif
                            @can('purchases_add')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/purchase/purchases/create',
                                        'title' => __('translate.AddPurchase'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Sales --}}
            @if (auth()->user()->can('sales_view_all') || auth()->user()->can('sales_view_own') || auth()->user()->can('sales_add'))
                <li>
                @can('sales_add')
                    
                    <div @click="selectCollapse('sale')"
                        :class="selected == 'sale' ? 'collapse-active' : 'collapse-deactive'" class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.Sales'),
                            'icon' => 'components.icons.add-to-cart',
                        ])
                    </div>
                @endcan
                    <div x-ref="sale" x-bind:style="activeCollapse($refs, 'sale', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @if (auth()->user()->can('sales_view_all') || auth()->user()->can('sales_view_own'))
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/sale/sales',
                                        'title' => __('translate.ListSales'),
                                    ])
                                </li>
                            @endif
                            @can('sales_add')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/sale/sales/create',
                                        'title' => __('translate.AddSale'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Sales Return --}}
            @if (auth()->user()->can('sale_returns_view_all') || auth()->user()->can('sale_returns_view_own'))
                <li class="">
                    <a href="/sales-return/returns_sale"
                        class="nav-item @if ($path == 'sales-return/returns_sale') active @endif">
                        @include('components.icons.sales-return', ['class' => 'width_16'])
                        <span class="item-name">{{ __('translate.SalesReturn') }}</span>
                    </a>
                </li>
            @endif

            {{-- Purchase Return --}}
            @if (auth()->user()->can('purchase_returns_view_all') || auth()->user()->can('purchase_returns_view_own'))
                <li class="">
                @can('purchase_returns_add')
                    <a href="/purchase-return/returns_purchase"
                        class="nav-item @if ($path == 'purchase-return/returns_purchase') active @endif">
                        @include('components.icons.purchases-return', ['class' => 'width_16'])
                        <span class="item-name">{{ __('translate.PurchasesReturn') }}</span>
                    </a>
                @endcan
                </li>
            @endif

            {{-- Accounting --}}
            @if (auth()->user()->can('account_view') ||
                    auth()->user()->can('deposit_view') ||
                    auth()->user()->can('expense_view') ||
                    auth()->user()->can('expense_category') ||
                    auth()->user()->can('deposit_category') ||
                    auth()->user()->can('payment_method'))
                <li>
                    <div @click="selectCollapse('accounting')"
                        :class="selected == 'accounting' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.Accounting'),
                            'icon' => 'components.icons.account',
                        ])
                    </div>
                    <div x-ref="accounting" x-bind:style="activeCollapse($refs, 'accounting', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @can('account_view')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/accounting/account',
                                        'title' => __('translate.Account'),
                                    ])
                                </li>
                            @endcan
                            @can('deposit_view')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/accounting/deposit',
                                        'title' => __('translate.Deposit'),
                                    ])
                                </li>
                            @endcan
                            @can('expense_view')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/accounting/expense',
                                        'title' => __('translate.Expense'),
                                    ])
                                </li>
                            @endcan
                            @can('expense_category')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/accounting/expense_category',
                                        'title' => __('translate.Expense_Category'),
                                    ])
                                </li>
                            @endcan
                            @can('deposit_category')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/accounting/deposit_category',
                                        'title' => __('translate.Deposit_Category'),
                                    ])
                                </li>
                            @endcan
                            @can('payment_method')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/accounting/payment_methods',
                                        'title' => __('translate.Payment_Methods'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif



            {{-- Settings --}}
            @if (auth()->user()->can('settings') ||
                    auth()->user()->can('backup') ||
                    auth()->user()->can('currency') ||
                    auth()->user()->can('sms_settings') ||
                    auth()->user()->can('notification_template') ||
                    auth()->user()->can('pos_settings'))
                <li>
                    <div @click="selectCollapse('settings')"
                        :class="selected == 'settings' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.Settings'),
                            'icon' => 'components.icons.settings',
                        ])
                    </div>
                    <div x-ref="settings" x-bind:style="activeCollapse($refs, 'settings', selected)"
                        class="collapse-content">
                        <ul class="list-group">
                            @can('settings')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/settings/system_settings',
                                        'title' => __('translate.System_Settings'),
                                    ])
                                </li>
                            @endcan

                            @can('pos_settings')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/settings/pos_settings',
                                        'title' => __('translate.Pos_Receipt_Settings'),
                                    ])
                                </li>
                            @endcan

                            @can('sms_settings')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/settings/sms_settings',
                                        'title' => __('translate.sms_settings'),
                                    ])
                                </li>
                            @endcan
                            @can('notification_template')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/settings/sms_template',
                                        'title' => __('translate.sms_template'),
                                    ])
                                </li>

                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/settings/emails_template',
                                        'title' => __('translate.emails_template'),
                                    ])
                                </li>
                            @endcan
                            @can('currency')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/settings/currency',
                                        'title' => __('translate.Currency'),
                                    ])
                                </li>
                            @endcan
                            @can('backup')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/settings/backup',
                                        'title' => __('translate.Backup'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Reports --}}
            @if (auth()->user()->can('report_products') ||
                    auth()->user()->can('report_inventaire') ||
                    auth()->user()->can('report_clients') ||
                    auth()->user()->can('report_fournisseurs') ||
                    auth()->user()->can('reports_alert_qty') ||
                    auth()->user()->can('report_profit') ||
                    auth()->user()->can('sale_reports') ||
                    auth()->user()->can('purchase_reports') ||
                    auth()->user()->can('payment_sale_reports') ||
                    auth()->user()->can('payment_purchase_reports') ||
                    auth()->user()->can('payment_return_purchase_reports') ||
                    auth()->user()->can('payment_return_sale_reports'))
                <li>
                    <div @click="selectCollapse('reports')"
                        :class="selected == 'reports' ? 'collapse-active' : 'collapse-deactive'"
                        class="collapse-button">
                        @include('components.sidebar.collapse-navitem', [
                            'title' => __('translate.Reports'),
                            'icon' => 'components.icons.reports',
                        ])
                    </div>
                    <div x-ref="reports" x-bind:style="activeCollapse($refs, 'reports', selected)"
                        class="collapse-content">
                        <ul class="list-group">

                            @can('report_profit')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/report_profit',
                                        'title' => __('translate.ProfitandLoss'),
                                    ])
                                </li>
                            @endcan

                            @can('sale_reports')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/sale_report',
                                        'title' => __('translate.SalesReport'),
                                    ])
                                </li>
                            @endcan
                            @can('purchase_reports')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/purchase_report',
                                        'title' => __('translate.PurchasesReport'),
                                    ])
                                </li>
                            @endcan

                            @can('report_inventaire')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/report_stock',
                                        'title' => __('translate.Inventory_report'),
                                    ])
                                </li>
                            @endcan
                            @can('report_products')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/report_product',
                                        'title' => __('translate.product_report'),
                                    ])
                                </li>
                            @endcan

                            @can('report_clients')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/report_clients',
                                        'title' => __('translate.CustomersReport'),
                                    ])
                                </li>
                            @endcan
                            @can('report_fournisseurs')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/report_providers',
                                        'title' => __('translate.SuppliersReport'),
                                    ])
                                </li>
                            @endcan

                            @can('payment_sale_reports')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/payment_sale',
                                        'title' => __('translate.payment_sale'),
                                    ])
                                </li>
                            @endcan
                            @can('payment_purchase_reports')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/payment_purchase',
                                        'title' => __('translate.payment_purchase'),
                                    ])
                                </li>
                            @endcan
                            @can('payment_return_sale_reports')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/payment_sale_return',
                                        'title' => __('translate.payment_sale_return'),
                                    ])
                                </li>
                            @endcan
                            @can('payment_return_purchase_reports')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/payment_purchase_return',
                                        'title' => __('translate.payment_purchase_return'),
                                    ])
                                </li>
                            @endcan
                            @can('reports_alert_qty')
                                <li>
                                    @include('components.sidebar.child-navitem', [
                                        'href' => '/reports/reports_quantity_alerts',
                                        'title' => __('translate.ProductQuantityAlerts'),
                                    ])
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>
