<?php

use App\Mail\OrderCreated;
use FontLib\Table\Type\post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Designation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationsController;
use App\Http\Controllers\LocationController;

// use App\Http\Controllers\DesignationController;


/*units
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/guest', 'GuestController@index')->name('guest.index');
    Route::get('/guest/products', 'GuestController@products')->name('guest');
    Route::get('/guest/getProductByCategory/{id}', 'GuestController@getProductByCategory')->name('getProductByCategory');
    Route::get('search/category', 'CategoriesController@search')->name('search.category');
    Route::post('guest/addToCart', 'GuestController@addToCart')->name('guest.addToCart');
    Route::post('/guest/updateQuantity', 'GuestController@updateQuantity')->name('guest.updateQuantity');
    Route::get('/guest/cart', 'GuestController@cart')->name('guest.cart');
    Route::post('/guest/getProducts', 'GuestController@getProducts')->name('guest.getProducts');
    Route::post('/guest/removeProduct', 'GuestController@deleteProductFromCart')->name('guest.deleteProductFromCart');
    Route::post('/guest/placeOrder', 'GuestController@placeOrder')->name('guest.placeOrder');
    Route::get('/guest/checkout', 'GuestController@checkout')->name('guest.checkout');
    Route::post('/guest/checkSession', 'GuestController@checkSession')->name('guest.checkSession');
    Route::get('/guest/confirmOrder', 'GuestController@confirmOrder')->name('guest.cod');
    Route::get('/guest/stripe', 'GuestController@stripeCheckout')->name('guest.stripe');
    Route::get('/payment/success', 'GuestController@stripeSuccess')->name('payment.success');
    Route::get('/payment/fail', 'GuestController@paymentFail')->name('payment.fail');
    Route::get('/search/guest/order', 'GuestController@searchGuestOrder')->name('search.guest.order');
    Route::get('/online/links', 'GuestController@onlineLinks')->name('online.links');
    Route::get('/online/qrcode', 'GuestController@QrCode')->name('online.qr.code');
    Route::get('/location', 'LocationController@index')->name('location.index');
    Route::get('/success/shopping', 'GuestController@successShopping')->name('success.shopping');
    Route::match(['get', 'post'], '/checkCart', 'GuestController@checkCart')->name('checkCart.session');
    Route::get('/locations/search', 'LocationController@search');
});


// register
Route::get('/customer/register', 'OnlineAuthController@register')->name('online-users.register');
Route::post('/customer/registered', 'OnlineAuthController@store')->name('online-users.store');
Route::get('/login/form', 'OnlineAuthController@showLoginForm')->name('login.form');
Route::post('/login/user', 'OnlineAuthController@login')->name('login.auth');


$installed = Storage::disk('public')->exists('installed');

if ($installed === false) {

    Auth::routes(['register' => false]);


    Route::middleware(['XSS'])->group(function () {

        Route::get('/', "HomeController@RedirectToLogin");
        Route::get('switch/language/{lang}', 'LocalController@languageSwitch')->name('language.switch');

        //------------------------------- dashboard Admin--------------------------\\

        // Route::group(['middleware' => 'auth', 'Is_Admin', 'Is_Active'], function () {
        Route::group(['middleware' => ['auth', 'Is_Admin', 'Is_Active']], function () {
            Route::get('dashboard/admin', "DashboardController@dashboard_admin")->name('dashboard');

            //------------------------------------------------------------------\\

            Route::get('/update_database', 'UpdateController@viewStep1');

            Route::get('/update_database/finish', function () {

                return view('update.finishedUpdate');
            });

            Route::post('/update_database/lastStep', [
                'as' => 'update_lastStep',
                'uses' => 'UpdateController@lastStep',
            ]);
        });

        Route::middleware(['auth', 'Is_Active'])->group(function () {

            Route::get('dashboard/employee', "DashboardController@dashboard_employee")->name('dashboard_employee');

            // Route::prefix('inventory')->group(function() {


            Route::get('dashboard_filter/{start_date}/{end_date}', "DashboardController@dashboard_filter");

            //-------------------------------  Reports ------------------------\\
            Route::prefix('reports')->group(function () {

                Route::get('report_profit', 'ReportController@report_profit')->name('report_profit');
                Route::get('report_profit/{start_date}/{end_date}/{warehouse}', 'ReportController@report_profit_filter')->name('report_profit_filter');

                Route::get('report_stock', 'ReportController@report_stock_page')->name('report_stock');
                Route::post('get_report_stock_datatable', 'ReportController@get_report_stock_datatable')->name('get_report_stock_datatable');

                Route::get('report_product', 'ReportController@report_product')->name('report_product');
                Route::post('get_report_product_datatable', 'ReportController@get_report_product_datatable')->name('get_report_product_datatable');

                Route::get('report_clients', 'ReportController@report_clients')->name('report_clients');
                Route::post('get_report_clients_datatable', 'ReportController@get_report_clients_datatable')->name('get_report_clients_datatable');

                Route::get('report_providers', 'ReportController@report_providers')->name('report_providers');
                Route::post('get_report_providers_datatable', 'ReportController@get_report_providers_datatable')->name('get_report_providers_datatable');

                Route::get('sale_report', 'ReportController@sale_report')->name('sale_report');
                Route::post('get_report_sales_datatable', 'ReportController@get_report_sales_datatable')->name('get_report_sales_datatable');
                Route::get('report_monthly_sale', 'ReportController@report_monthly_sale')->name('report_monthly_sale');

                Route::get('purchase_report', 'ReportController@purchase_report')->name('purchase_report');
                Route::post('get_report_Purchases_datatable', 'ReportController@get_report_Purchases_datatable')->name('get_report_Purchases_datatable');
                Route::get('report_monthly_purchase', 'ReportController@report_monthly_purchase')->name('report_monthly_purchase');

                Route::get('payment_sale', 'ReportController@payment_sale_report')->name('payment_sale');
                Route::post('get_payment_sale_reports_datatable', 'ReportController@get_payment_sale_reports_datatable')->name('get_payment_sale_reports_datatable');


                Route::get('payment_purchase', 'ReportController@payment_purchase_report')->name('payment_purchase');
                Route::post('get_payment_purchase_report_datatable', 'ReportController@get_payment_purchase_report_datatable')->name('get_payment_purchase_report_datatable');


                Route::get('payment_sale_return', 'ReportController@payment_sale_return_report')->name('payment_sale_return_report');

                Route::get('payment_purchase_return', 'ReportController@payment_purchase_return_report')->name('payment_purchase_return_report');

                Route::get('reports_quantity_alerts', 'ReportController@reports_quantity_alerts')->name('reports_quantity_alerts');
            });

            //------------------------------- products--------------------------\\
            Route::prefix('products')->group(function () {
                Route::resource('products', 'ProductsController');
                Route::post('get_product_datatable', 'ProductsController@get_product_datatable')->name('products_datatable');
                Route::get('show_product_data/{id}/{variant_id}', 'ProductsController@show_product_data');

                Route::get('products_by_Warehouse/{id}', 'ProductsController@Products_by_Warehouse');
                Route::get('print_labels', 'ProductsController@print_labels')->name('print_labels');
                Route::get('import_products', 'ProductsController@import_products_page');
                Route::post('import_products', 'ProductsController@import_products');
                Route::get('search_products', 'ProductsController@search_products')->name('search_products');

                Route::post('ProductByCategory', 'ProductsController@ProductByCategory')->name('ProductByCategory');

                //------------------------------- categories--------------------------\\
                Route::resource('categories', 'CategoriesController')->only((['index','destroy','edit','store']));
                Route::post('categories/{id}', 'CategoriesController@update');
                Route::get('pos_categories', 'CategoriesController@posCategory')->name('pos.categories');
                Route::post('pos_categories/create', 'CategoriesController@posCategoryCreate')->name('pos.categories.create');


                //------------------------------- brands--------------------------\\
                Route::resource('brands', 'BrandsController');

                //------------------------------- units--------------------------\\
                Route::resource('units', 'UnitsController');
                Route::get('Get_Units_SubBase', 'UnitsController@Get_Units_SubBase');
                Route::get('Get_sales_units', 'UnitsController@Get_sales_units');

                //------------------------------- warehouses--------------------------\\
                Route::resource('warehouses', 'WarehousesController');
            });

            //------------------------------- adjustments--------------------------\\
            Route::resource('adjustment/adjustments', 'AdjustmentsController');


            //------------------------------- quotations --------------------------\\
            Route::prefix('quotation')->group(function () {
                Route::resource('quotations', 'QuotationsController');
                Route::post('get_quotations_datatable', 'QuotationsController@get_quotations_datatable')->name('get_quotations_datatable');
            });

            Route::post('quotations/sendQuote/email', 'QuotationsController@SendEmail');
            Route::get('quotations/generate_sale/{id}', 'QuotationsController@generate_sale');

            //------------------------------- purchases --------------------------\\
            Route::prefix('purchase')->group(function () {
                Route::resource('purchases', 'PurchasesController');
                Route::post('get_purchases_datatable', 'PurchasesController@get_purchases_datatable')->name('get_purchases_datatable');

                Route::get('purchases/payments/{id}', 'PurchasesController@Get_Payments');
                Route::post('purchases/send/email', 'PurchasesController@Send_Email');
                Route::get('get_Products_by_purchase/{id}', 'PurchasesController@get_Products_by_purchase');
            });

            //------------------------------- Sales --------------------------\\
            Route::prefix('sale')->group(function () {
                Route::resource('sales', 'SalesController');
                Route::post('get_sales_datatable', 'SalesController@get_sales_datatable')->name('sales_datatable');

                Route::post('sales/send/email', 'SalesController@Send_Email');
                Route::get('sales/payments/{id}', 'SalesController@Payments_Sale');
                Route::get('get_Products_by_sale/{id}', 'SalesController@get_Products_by_sale');
            });

            //---------------------- POS (point of sales) ----------------------\\
            //------------------------------------------------------------------\\
            Route::get('pos', 'PosController@index');
            Route::post('pos/create_pos', 'PosController@CreatePOS');
            Route::get('pos/get_products_pos', 'PosController@GetProductsByParametre');
            Route::get('pos/get_products', 'PosController@GetProductsAjax')->name('get_products');
            Route::get('pos/data_create_pos', 'PosController@GetELementPos');
            Route::get('pos/autocomplete_product_pos/{id}', 'PosController@autocomplete_product_pos');
            Route::get('invoice_pos/{id}', 'PosController@Print_Invoice_POS');
            Route::get('GetCategories', 'PosController@GetCategories')->name('GetCategories');
            Route::post('flushCart', 'PosController@flushCart')->name('flushCart');
            Route::post('getUserPoints', 'PosController@getUserPoints')->name('getUserPoints');
            Route::get('getClients', 'PosController@getClients')->name('getClients');

            //---------------------- Hold Order ----------------------\\
            //------------------------------------------------------------------\\
            Route::post('hold-order', 'HoldOrdersController@create')->name('hold_order');
            Route::post('edit-hold-order', 'HoldOrdersController@edit')->name('edit_hold_order');
            Route::get('getHoldList', 'HoldOrdersController@getHoldList')->name('getHoldList');
            Route::post('delete-hold-order', 'HoldOrdersController@delete')->name('delete_hold_order');
            // Employee Dashboard
            Route::get('dashboard/employee', 'EmployeeController@dashboard')->name('dasboard.employee');


            //---------------------- Order List ----------------------\\
            //------------------------------------------------------------------\\
            // Route::post('OrderList', 'OrderListController@OrderList')->name('OrderList');
            Route::get('OrderList', 'OrderListController@OrderList')->name('OrderList');
            Route::get('OrderListShow', 'OrderListController@OrderListShow')->name('OrderListShow');
            // Route::post('complete-order', 'OrderListController@completeOrder')->name('complete_order');
            // Route::post('complete-order/{id}', 'OrderListController@completeOrder')->name('complete_order');
            Route::post('undo-order', 'OrderListController@undoOrder')->name('undo_order');

            Route::match (['get', 'post'], 'complete/order/{orderId}/{productId}', 'OrderListController@completedOrder')->name('complete.order.pos');
            Route::match (['get', 'post'], 'complete/order/{orderId}', 'OrderListController@completedFullOrder')->name('complete.full.order.pos');
            Route::match (['get', 'post'], 'undo/order/{orderId}/{productId}', 'OrderListController@undoOrder')->name('undo.order.pos');


            Route::get('OrderShow', 'OrderListController@Order')->name('OrderShow');
            Route::get('GetOrder', 'OrderListController@OrderOnline')->name('OrderShowOnline');
            Route::get('OrderShow/{id}', 'OrderListController@OrderShowView')->name('OrderShowView');
            Route::get('OrderStatusUpdate/{id}', 'OrderListController@OrderStatusUpdate')->name('OrderStatusUpdate');
            // online sales
            Route::get('online/sales', 'SalesController@onlineSales')->name('online.sales');
            Route::get('getOnlineSales', 'SalesController@getOnlineSales')->name('get.Online.Sales');
            //---------------------- Notification ----------------------\\
            Route::get('/fetch-notifications', 'NotificationController@fetchNotifications')->name('fetch-notifications');
            Route::get('/fetch-notifications-message', 'NotificationController@fetchNotificationsMessage')->name('fetch-notifications-message');
            Route::post('/mark-all-as-read', 'NotificationController@markAllAsRead')->name('mark-all-as-read');

            //------------------------------- transfers --------------------------\\
            Route::resource('transfer/transfers', 'TransfersController');

            //------------------------------- Sales Return --------------------------\\
            Route::prefix('sales-return')->group(function () {
                Route::resource('returns_sale', 'SalesReturnController');
                Route::get('returns/sale/payment/{id}', 'SalesReturnController@Payment_Returns');

                Route::get('add_returns_sale/{id}', 'SalesReturnController@create_sell_return')->name('create_sell_return');
                Route::get('edit_returns_sale/{id}/{sale_id}', 'SalesReturnController@edit_sell_return')->name('edit_sell_return');
            });

            //------------------------------- Purchases Return --------------------------\\
            Route::prefix('purchase-return')->group(function () {
                Route::resource('returns_purchase', 'PurchasesReturnController');
                Route::post('returns/purchase/send/email', 'PurchasesReturnController@Send_Email');
                Route::get('returns/purchase/payment/{id}', 'PurchasesReturnController@Payment_Returns');

                Route::get('add_returns_purchase/{id}', 'PurchasesReturnController@create_purchase_return')->name('create_purchase_return');
                Route::get('edit_returns_purchase/{id}/{purchase_id}', 'PurchasesReturnController@edit_purchase_return')->name('edit_purchase_return');
            });

            //------------------------------- payment purchase --------------------------\\

            Route::resource('payment/purchase', 'PaymentPurchasesController');
            Route::get('payment/purchase/get_data_create/{id}', 'PaymentPurchasesController@get_data_create');
            Route::post('payment/purchase/send/email', 'PaymentPurchasesController@SendEmail');

            //------------------------------- payment sale --------------------------\\

            Route::resource('payment/sale', 'PaymentSalesController');
            Route::get('payment/sale/get_data_create/{id}', 'PaymentSalesController@get_data_create');
            Route::post('payment/sale/send/email', 'PaymentSalesController@SendEmail');

            //------------------------------- Payment Sale Returns --------------------------\\

            Route::resource('payment_returns_sale', 'PaymentSaleReturnsController');
            Route::get('payment/returns_sale/get_data_create/{id}', 'PaymentSaleReturnsController@get_data_create');
            Route::post('payment/returns_sale/send/email', 'PaymentSaleReturnsController@SendEmail');

            //------------------------------- Payments Purchase Returns --------------------------\\

            Route::resource('payment_returns_purchase', 'PaymentPurchaseReturnsController');
            Route::get('payment/returns_purchase/get_data_create/{id}', 'PaymentPurchaseReturnsController@get_data_create');
            Route::post('payment/returns_purchase/send/email', 'PaymentPurchaseReturnsController@SendEmail');

            //------------------------------- suppliers --------------------------\\

            Route::resource('people/suppliers', 'SuppliersController');
            Route::post('get_suppliers_datatable', 'SuppliersController@get_suppliers_datatable')->name('get_suppliers_datatable');

            Route::post("suppliers/delete/by_selection", "SuppliersController@delete_by_selection");
            Route::get('get_provider_debt_total/{id}', 'SuppliersController@get_provider_debt_total');
            Route::post('providers_pay_due', 'SuppliersController@providers_pay_due');

            Route::get('get_provider_debt_return_total/{id}', 'SuppliersController@get_provider_debt_return_total');
            Route::post('providers_pay_return_due', 'SuppliersController@providers_pay_return_due');

            //------------------------------- clients --------------------------\\
            // HRM routes
            Route::prefix('hrm')->group(function () {
                // Company
                Route::get('/company', 'CompanyController@index')->name('company.index');
                Route::get('/company/create', 'CompanyController@create')->name('company.create');
                Route::post('/company/store', 'CompanyController@store')->name('company.store');
                Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.edit');
                Route::put('/company/update/{id}', 'CompanyController@update')->name('company.update');
                Route::get('/company/getData', 'CompanyController@getData')->name('company.getData');
                Route::post('/company/delete', 'CompanyController@delete')->name('company.delete');


                // departements
                Route::get('/departments', 'DepartmentController@index')->name('department.index');
                Route::get('departments/create', 'DepartmentController@create')->name('department.create');
                Route::post('departments/store', 'DepartmentController@store')->name('department.store');
                Route::get('/departments/edit/{id}', 'DepartmentController@edit')->name('department.edit');
                Route::put('/departments/{department}', 'DepartmentController@update')->name('department.update');
                Route::get('/departments/getData', 'DepartmentController@getData')->name('department.getData');
                Route::post('/departments/delete', 'DepartmentController@delete')->name('department.delete');


                // designations
                Route::get('/designations', 'DesignationsController@index')->name('designations.index');
                Route::get('/designations/create', 'DesignationsController@create')->name('designations.create');
                Route::post('/designations/store', 'DesignationsController@store')->name('designations.store');
                Route::get('/designations/edit/{id}', 'DesignationsController@edit')->name('designations.edit');
                Route::put('/designations/{designation}', 'DesignationsController@update')->name('designations.update');
                Route::get('/designations/getData', 'DesignationsController@getData')->name('designations.getData');
                Route::post('/designations/delete', 'DesignationsController@delete')->name('designations.delete');
                // Route::get('/designations', 'DesignationsController@show')->name('designations.show')
                // Route::delete('/designations/{designation}', 'DesignationsController@delete')->name('designations.delete');
                // Route::delete('/designations/AjaxGetData', 'DesignationsController@AjaxGetData')->name('designations.AjaxGetData');

                // OFFICE SHIFT
                // Route::resource('/office', 'OfficeController');
                Route::get('/office', 'OfficeController@index')->name('office.index');
                Route::get('/office/create', 'OfficeController@create')->name('office.create');
                Route::post('/office/store', 'OfficeController@store')->name('office.store');
                Route::get('/office/printData', 'OfficeController@printData')->name('office.printData');
                Route::post('/office/delete', 'OfficeController@delete')->name('office.delete');
                Route::get('/office/edit/{id}', 'OfficeController@edit')->name('office.edit');
                Route::put('/office/update/{id}', 'OfficeController@update')->name('office.update');


                // Employee Routes
                Route::get('/employee', 'EmployeeController@index')->name('employee.index');
                Route::get('/employee/create', 'EmployeeController@create')->name('employees.create');
                Route::post('/employee/store', 'EmployeeController@store')->name('employees.store');
                Route::get('/employee/getData', 'EmployeeController@getData')->name('employees.getData');
                Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employees.edit');
                Route::get('/employee/show/{id}', 'EmployeeController@show')->name('employees.show');
                Route::put('/employee/{employee}', 'EmployeeController@update')->name('employees.update');
                Route::post('/employee/delete', 'EmployeeController@deleteEmployee')->name('employees.delete');
                // Route::get('/employee/print', 'EmployeeController@employeesPrint')->name('employees.show.print');
                // Route::get('/employee/store', 'EmployeeController@store')->name('employee.store');

                // Attendance Routes
                Route::get('/attendance', 'AttendanceController@index')->name('attendance.index');
                Route::get('/attendance/create', 'AttendanceController@create')->name('attendance.create');
                Route::post('/attendance/store', 'AttendanceController@store')->name('attendance.store');
                Route::get('/attendance/getData', 'AttendanceController@getData')->name('attendance.getData');
                Route::get('/attendance/edit/{id}', 'AttendanceController@edit')->name('attendance.edit');
                Route::put('/attendance/update/{id}', 'AttendanceController@update')->name('attendance.update');
                Route::post('/attendance/delete', 'AttendanceController@delete')->name('attendance.delete');
                // leaveType Routes
                Route::get('/leave-type', 'LeaveTypeController@index')->name('leaveType.index');
                Route::get('/leave-type/create', 'LeaveTypeController@create')->name('leaveType.create');
                Route::post('/leave-type/store', 'LeaveTypeController@store')->name('leaveType.store');
                Route::get('/leave-type/edit/{id}', 'LeaveTypeController@edit')->name('leaveType.edit');
                Route::put('/leave-type/update/{id}', 'LeaveTypeController@update')->name('leaveType.update');
                Route::post('/hrm/leave-type/delete', 'LeaveTypeController@deleteLeaveType')->name('leave-type.delete');
                Route::get('/leave-type/getData', 'LeaveTypeController@getData')->name('leaveType.getData');

                // leave Request Routes
                Route::get('/leave/request', 'LeaveRequestController@index')->name('leaveRequest.index');
                Route::get('/leave/request/create', 'LeaveRequestController@create')->name('leaveRequest.create');
                Route::post('/leave/request/store', 'LeaveRequestController@store')->name('leaveRequest.store');
                Route::get('/leave/request/getData', 'LeaveRequestController@getData')->name('leaveRequest.getData');
                Route::get('/leave/request/edit/{id}', 'LeaveRequestController@edit')->name('leaveRequest.edit');
                Route::put('/leave/request/update/{id}', 'LeaveRequestController@update')->name('leaveRequest.update');
                Route::post('/leave/request/delete', 'LeaveRequestController@deleteRequest')->name('leaveRequest.delete');

                // holidays Routes
                Route::get('/holidays', 'HolidayController@index')->name('holiday.index');
                Route::get('/holidays/create', 'HolidayController@create')->name('holiday.create');
                Route::post('/holidays/store', 'HolidayController@store')->name('holiday.store');
                Route::get('/holidays/getData', 'HolidayController@getData')->name('holiday.getData');
                Route::get('/holidays/edit/{id}', 'HolidayController@edit')->name('holiday.edit');
                Route::put('/holidays/update/{id}', 'HolidayController@update')->name('holiday.update');
                Route::post('/holidays/delete', 'HolidayController@deleteholiday')->name('holiday.delete');
            });

            Route::resource('people/clients', 'ClientController');
            Route::post('get_clients_datatable', 'ClientController@get_clients_datatable')->name('clients_datatable');

            Route::get('get_client_plafond/{id}', 'ClientController@get_client_plafond');

            Route::get('get_client_debt_total/{id}', 'ClientController@get_client_debt_total');
            Route::get('get_client_debt_return_total/{id}', 'ClientController@get_client_debt_return_total');

            Route::post('clients_pay_due', 'ClientController@clients_pay_due');
            Route::post('clients_pay_return_due', 'ClientController@clients_pay_return_due');

            Route::get('import_clients', 'ClientController@import_clients_page')->name('import_clients');
            Route::post('import_clients', 'ClientController@import_clients');

            //------------------------------- Pos Product --------------------------\\
            Route::prefix('pos-product')->group(function () {
                Route::get('/', 'PosProductController@index')->name('pos-product.index');
                Route::get('/getPosProducts', 'PosProductController@getPosProducts')->name('pos-product.getPosProducts');
                Route::get('/create', 'PosProductController@create')->name('pos-product.create');
                Route::post('/store', 'PosProductController@store')->name('pos-product.store');
                Route::get('/edit/{id}', 'PosProductController@edit')->name('pos-product.edit');
                Route::put('/products/{id}', 'PosProductController@update')->name('pos-product.update');
                Route::delete('/delete', 'PosProductController@delete')->name('pos-product.delete');
                Route::post('/product-ingredients', 'PosProductController@product_ingredients')->name('pos-product.product_ingredients');
            });

            Route::post('customeradd', 'PosProductController@addCustomer')->name('customeradd');
            Route::get('searchcustomer', 'PosProductController@searchCustomer')->name('searchCustomer');

            //------------------------------------Points Routes---------------------------------\\
            Route::get('clients/points', 'PointController@points')->name('clients.points');
            Route::get('clients/getPoints', 'PointController@getPoints')->name('clients.getPoints');

            //------------------------------- users & permissions --------------------------\\
            Route::prefix('user-management')->group(function () {
                Route::resource('users', 'UserController');
                // users print
                Route::get('UsersPrint', 'UserController@printblade')->name('usermanagement.printblade');

                Route::post('assignRole', 'UserController@assignRole');

                Route::resource('permissions', 'PermissionsController');
                // Roles Print
                Route::get('/print', 'PermissionsController@printblade')->name('permissions.printblade');
            });
            //-------------------------------  --------------------------\\

            //------------------------------- Profile --------------------------\\
            //----------------------------------------------------------------\\
            Route::put('updateProfile/{id}', 'ProfileController@updateProfile');
            Route::resource('profile', 'ProfileController');

            //-------------------------------  Print & PDF ------------------------\\

            Route::get('Sale_PDF/{id}', 'SalesController@Sale_PDF');
            Route::get('Quote_PDF/{id}', 'QuotationsController@Quotation_pdf');
            Route::get('Purchase_PDF/{id}', 'PurchasesController@Purchase_pdf');
            Route::get('Payment_Purchase_PDF/{id}', 'PaymentPurchasesController@Payment_purchase_pdf');
            Route::get('payment_Sale_PDF/{id}', 'PaymentSalesController@payment_sale');
            Route::get('return_sale_pdf/{id}', 'SalesReturnController@Return_pdf');
            Route::get('return_purchase_pdf/{id}', 'PurchasesReturnController@Return_pdf');
            Route::get('payment_return_sale_pdf/{id}', 'PaymentSaleReturnsController@payment_return');
            Route::get('payment_return_purchase_pdf/{id}', 'PaymentPurchaseReturnsController@payment_return');

            //------------------------------- SEND SMS --------------------------\\
            Route::post('sales_send_sms', 'SalesController@Send_SMS');
            Route::post('purchase_send_sms', 'PurchasesController@Send_SMS');
            Route::post('quotation_send_sms', 'QuotationsController@Send_SMS');
            Route::post('purchase_payment_send_sms', 'PaymentPurchasesController@Send_SMS');
            Route::post('sell_payment_send_sms', 'PaymentSalesController@Send_SMS');
            Route::post('sell_return_payment_send_sms', 'PaymentSaleReturnsController@Send_SMS');

            //------------------------------- Settings --------------------------\\
            //----------------------------------------------------------------\\

            Route::prefix('settings')->group(function () {
                Route::resource('system_settings', 'SettingController');
                Route::resource('currency', 'CurrencyController');
                Route::resource('backup', 'BackupController');
                Route::resource('email_settings', 'EmailSettingController');
                Route::get('pos_settings', 'SettingController@get_pos_Settings');
                Route::put('pos_settings/{id}', 'SettingController@update_pos_settings');

                //------------------------------- SMS Settings ------------------------\\


                Route::get('sms_settings', 'Sms_SettingsController@get_sms_config');
                Route::put('update_Default_SMS', 'Sms_SettingsController@update_Default_SMS');
                Route::post('update_twilio_config', 'Sms_SettingsController@update_twilio_config');
                Route::post('update_nexmo_config', 'Sms_SettingsController@update_nexmo_config');
                Route::post('update_infobip_config', 'Sms_SettingsController@update_infobip_config');

                // notifications_template
                Route::get('sms_template', 'Notifications_Template@get_sms_template');
                Route::put('update_sms_body', 'Notifications_Template@update_sms_body');

                Route::get('emails_template', 'Notifications_Template@get_emails_template');
                Route::put('update_custom_email', 'Notifications_Template@update_custom_email');

                // update_backup_settings
                Route::post('update_backup_settings', 'SettingController@update_backup_settings');
            });

            Route::get('GenerateBackup', 'BackupController@GenerateBackup');

            //------------------------------- clear_cache --------------------------\\

            Route::get("clear_cache", "SettingController@Clear_Cache");



            //------------------------------- Accounting -----------------------\\
            //----------------------------------------------------------------\\
            Route::prefix('accounting')->group(function () {
                Route::resource('account', 'AccountController');
                Route::resource('deposit', 'DepositController');
                Route::resource('expense', 'ExpenseController');
                Route::resource('expense_category', 'ExpenseCategoryController');
                Route::resource('deposit_category', 'DepositCategoryController');
                Route::resource('payment_methods', 'PaymentMethodController');

                Route::post("account/delete/by_selection", "AccountController@delete_by_selection");
                Route::post("deposit/delete/by_selection", "DepositController@delete_by_selection");
                Route::post("expense/delete/by_selection", "ExpenseController@delete_by_selection");
                Route::post("expense_category/delete/by_selection", "ExpenseCategoryController@delete_by_selection");
                Route::post("deposit_category/delete/by_selection", "DepositCategoryController@delete_by_selection");
                Route::post("payment_methods/delete/by_selection", "PaymentMethodController@delete_by_selection");
            });
        });


        //------------------------------- url_invoice_sms--------------------------\\
        Route::get('sell_url/{id}', 'SalesController@Sale_PDF');
        Route::get('purchase_url/{id}', 'PurchasesController@Purchase_pdf');
        Route::get('quotation_url/{id}', 'QuotationsController@Quote_PDF');

        //------------------------------- Add To Cart --------------------------\\
        Route::post('add_to_cart', 'AddToCartController@add_to_cart')->name('add_to_cart');
        Route::post('add_to_cart_with_quantity', 'AddToCartController@add_to_cart_with_quantity')->name('add_to_cart_with_quantity');
        Route::post('delete_product_from_cart', 'AddToCartController@deleteProductFromCart')->name('delete_product_from_cart');
        Route::post('add_qty', 'AddToCartController@addQty')->name('add_qty');
        Route::post('remove_qty', 'AddToCartController@removeQty')->name('remove_qty');
    });
} else {

    Route::get(
        '/{vue?}',
        function () {
            return redirect('/setup');
        }
    )->where('vue', '^(?!setup).*$');


    Route::get('/setup', [
        'uses' => 'SetupController@viewCheck',
    ])->name('setup');

    Route::get('/setup/step-1', [
        'uses' => 'SetupController@viewStep1',
    ]);

    Route::post('/setup/step-2', [
        'as' => 'setupStep1',
        'uses' => 'SetupController@setupStep1',
    ]);

    Route::post('/setup/testDB', [
        'as' => 'testDB',
        'uses' => 'TestDbController@testDB',
    ]);

    Route::get('/setup/step-2', [
        'uses' => 'SetupController@viewStep2',
    ]);

    Route::get('/setup/step-3', [
        'uses' => 'SetupController@viewStep3',
    ]);

    Route::get('/setup/finish', function () {

        return view('setup.finishedSetup');
    });

    Route::get('/setup/getNewAppKey', [
        'as' => 'getNewAppKey',
        'uses' => 'SetupController@getNewAppKey',
    ]);

    Route::get('/setup/getPassport', [
        'as' => 'getPassport',
        'uses' => 'SetupController@getPassport',
    ]);

    Route::get('/setup/getMegrate', [
        'as' => 'getMegrate',
        'uses' => 'SetupController@getMegrate',
    ]);

    Route::post('/setup/step-3', [
        'as' => 'setupStep2',
        'uses' => 'SetupController@setupStep2',
    ]);

    Route::post('/setup/step-4', [
        'as' => 'setupStep3',
        'uses' => 'SetupController@setupStep3',
    ]);

    Route::post('/setup/step-5', [
        'as' => 'setupStep4',
        'uses' => 'SetupController@setupStep4',
    ]);

    Route::post('/setup/lastStep', [
        'as' => 'lastStep',
        'uses' => 'SetupController@lastStep',
    ]);

    Route::get('setup/lastStep', function () {
        return redirect('/setup', 301);
    });
}
