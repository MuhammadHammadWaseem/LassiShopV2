<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->CompanyName }} - Ultimate Inventory Management System with POS</title>

    <!-- Favicon icon -->
    <link rel=icon href={{ asset('images/' . $settings->logo) }}>
    <!-- Base Styling  -->

    <link rel="stylesheet" href="{{ asset('assets/pos/main/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pos/main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/iconsmind/iconsmind.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/bootstrap-vue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/vue-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/nprogress.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/autocomplete.css') }}">

    <script src="{{ asset('assets/js/axios.js') }}"></script>
    <script src="{{ asset('assets/js/vue-select.js') }}"></script>
    <script src="{{ asset('assets/pos/plugins/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/flatpickr.min.css') }}">
    <style>
        body {
            background-color: #2a2a2a !important;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px
        }

        .image {
            max-width: 270px;
            max-height: 200px;
        }

        .order-list-sec .main-img-box img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .order-list-sec .main-img-box h6 {
            color: rgb(255, 255, 255);
            font-size: 20px;
            font-weight: 600;
        }

        /* .order-list-sec .main-img-box {
            background-color: white;
            border-radius: 10px;
            max-width: 550px !important;
            width: 550px !important;
            display: flex !important;
            flex-direction: column;
        } */

        /* width */
        .order-list-sec .new-align-boxes .main-align-orders-box .main-order-box::-webkit-scrollbar {
            width: 5px;
            height: 10px;
        }

        /* Track */
        .order-list-sec .new-align-boxes .main-align-orders-box .main-order-box::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px rgba(128, 128, 128, 0);
            border-radius: 10px;
        }

        /* Handle */
        .order-list-sec .new-align-boxes .main-align-orders-box .main-order-box::-webkit-scrollbar-thumb {
            background: rgb(0, 0, 0);
            border-radius: 10px;
        }

        /* Handle on hover */
        .order-list-sec .new-align-boxes .main-align-orders-box .main-order-box::-webkit-scrollbar-thumb:hover {
            background: #2b2b2b;
        }

        .order-list-sec .main-img-box p {
            font-size: 18px;
            margin: 0;
            margin-bottom: 10px;
            color: white;
            font-weight: 900;
        }


        .order-list-sec .main-img-box .btn-align-box button {
            background-color: #000000;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 5px 15px;
            transition: .3s;
            font-size: 12px;
        }


        /* .order-list-sec .main-oder-box {
            background-color: #bf1e2e;
            padding: 20px;
            border-radius: 10px;
            display: -webkit-inline-box;
            flex-wrap: nowrap;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            column-gap: 25px;
            width: 100%;
            overflow: auto;
            margin: auto;
            align-content: center;
            margin-top: 0px;
        } */

        .order-list-sec .main-img-box {
            width: 100% !important;
            max-width: 100% !important;
        }


        .order-list-sec .main-img-box .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
        }

        .order-list-sec .customer-details {
            background-color: #bf1e2e;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 10px 10px 0px 0px;
            max-width: 100%;
            margin: auto;
            padding: 10px 20px;
            margin-bottom: -10px;
        }

        .order-list-sec .customer-details p {
            margin: 0;
            color: white;
        }

        .order-list-sec .main-img-box .btn-align-box button:hover {
            background-color: rgb(255, 255, 255);
            color: #bf1e2e;
        }

        /* .order-list-sec .main-align-orders-box {
            width: 610px;
            display: block;
            background-color: #bf1e2e;
            padding: 10px;
            border-radius: 10px;
        } */

        /* .order-list-sec .new-align-boxes {
            display: flex;
            justify-content: space-between;
            column-gap: 40px;
            flex-wrap: wrap;
            row-gap: 40px;
        } */

        /* .order-list-sec .new-align-boxes .main-align-orders-box {
            width: 30%;
            max-width: 30%;
        } */

        .order-list-sec .pagenations {
            display: flex;
            column-gap: 20px;
            align-items: center;
            justify-content: flex-start;
            padding: 50px 0 30px;
            overflow-x: auto !important;
            margin-bottom: 30px;
        }


        .order-list-sec .pagenations::-webkit-scrollbar {
            width: 5px;
            height: 10px;
        }

        /* Track */
        .order-list-sec .pagenations::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px rgba(128, 128, 128, 0);
            border-radius: 10px;
        }

        /* Handle */
        .order-list-sec .pagenations::-webkit-scrollbar-thumb {
            background: red;
            border-radius: 10px;
        }

        /* Handle on hover */
        .order-list-sec .pagenations::-webkit-scrollbar-thumb:hover {
            background: white;
        }


        .order-list-sec .pagenations button {
            background-color: #bf1e2e;
            color: white;
            font-size: 18px;
            border: none;
            padding: 5px 15px;
            border-radius: 10px;
            transition: .3s;
        }

        .order-list-sec .pagenations button.page-btn {
            width: 5% !important;
        }

        .order-list-sec .pagenations a {
            color: white;
            font-size: 16px;
            transition: .3s;
        }

        .order-list-sec .pagenations button:hover {
            background-color: black;
        }

        .order-list-sec .pagenations a:hover {
            color: #bf1e2e;
        }

        .order-list-sec .new-align-boxes .main-align-orders-box {
            display: flex;
            width: 100%;
            flex-wrap: wrap;
            flex-direction: row;
            column-gap: 30px;
            row-gap: 30px;
            justify-content: center;
            align-items: center;
        }

        .order-list-sec .new-align-boxes .main-align-orders-box .main-order-box {
            display: flex;
            width: 30% !important;
            max-width: 30% !important;
            flex-direction: row;
            flex-wrap: nowrap;
            overflow: hidden;
            overflow-x: scroll;
            justify-content: flex-start;
            column-gap: 20px;
            margin: 15px 0;
            position: relative;
            background-color: #bf1e2e;
            padding: 0;
            border-radius: 10px;
        }

        .order-list-sec .new-align-boxes .main-align-orders-box .main-order-box .main-oder-box {
            max-width: 100% !important;
            width: 100% !important;
            display: flex;
        }

        .order-list-sec .new-align-boxes .main-align-orders-box .main-order-box p.orderNo {
            color: white !important;
            position: absolute;
            background-color: green;
            top: 0px;
            left: 0;
            right: 0;
            margin: auto;
            text-align: left;
            padding: 10px 10px 10px 20px;
        }

        .order-list-sec .new-align-boxes .main-align-orders-box .main-order-box .main-oder-box .main-img-box img {
            width: 389px !important;
            height: 300px;
            object-fit: cover !important;
            max-width: 400px !important;
            margin-top: 40px;
        }
    </style>

    {{-- Alpine Js --}}
    <script defer src="{{ asset('js/plugin-core/alpine-collapse.js') }}"></script>
    <script defer src="{{ asset('js/plugin-core/alpine.js') }}"></script>
    <script src="{{ asset('js/plugin-script/alpine-data.js') }}"></script>
    <script src="{{ asset('js/plugin-script/alpine-store.js') }}"></script>

</head>

<body class="sidebar-toggled sidebar-fixed-page pos-body order-list-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#"><img src="{{ asset('images/') }}/{{ $settings->logo }}" class="img-fluid"
                        width="120px" alt=""></a>
            </div>
        </div>
        <div class="new-align-boxes">
            <div class="main-align-orders-box" id="orderListContainer">
            </div>
        </div>


        <div class="pagenations" style="overflow-x: scroll" id="paginationContainer">
            {{-- <button class="prev-btn" id="prev-pagi">Prev</button> --}}
            <span id="pagination"></span>
            {{-- <button class="next-btn" id="next-pagi">Next</button> --}}
        </div>

    </div>
    <script src="{{ asset('assets/js/vue.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-vue.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/vee-validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/vee-validate-rules.min.js') }}"></script>
    <script src="{{ asset('/assets/js/moment.min.js') }}"></script>

    {{-- sweetalert2 --}}
    <script src="{{ asset('assets/js/vendor/sweetalert2.min.js') }}"></script>


    {{-- common js --}}
    <script src="{{ asset('assets/js/common-bundle-script.js') }}"></script>
    {{-- page specific javascript --}}
    @yield('page-js')

    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="{{ asset('assets/js/vendor/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.script.js') }}"></script>

    <script src="{{ asset('assets/js/customizer.script.js') }}"></script>
    <script src="{{ asset('assets/js/nprogress.js') }}"></script>


    <script src="{{ asset('assets/js/tooltip.script.js') }}"></script>
    <script src="{{ asset('assets/js/script_2.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>


    <script src="{{ asset('assets/js/compact-layout.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/4.1.0/pusher.js"
        integrity="sha512-j9r12+QK8+7+jQol1tecimg0nlLrKCkBuJJ3p1S+42LwAig2FYSwLhf1VTmms01YEOgzjtxhy6DSQVXXePM3ng=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        const container = $('#orderListContainer');
        const paginationContainer = $('#paginationContainer');
        let allOrders = []; // Store all orders
        let currentPage = 1; // Current page
        const ordersPerPage = 6; // Number of orders per page

        Pusher.logToConsole = true;
        var pusher = new Pusher("96010b48b2b6efb4c0f1", {
            cluster: "ap2",
            encrypted: false,
            useTls: false,
        });

        var channel = pusher.subscribe('order-list');

        function updateCounter(getTime, counterElement) {
            const orderCreatedAt = new Date(getTime);
            setInterval(function() {
                const currentTime = new Date();
                const timeDifference = currentTime - orderCreatedAt;

                const hours = Math.floor(timeDifference / (1000 * 60 * 60));
                const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                const formattedTimeDifference = `${hours} hours ${minutes} minutes ${seconds} seconds`;
                counterElement.text(formattedTimeDifference);
            }, 1000);
        }

        channel.bind('order-list', function(data) {
            // Merge new orders into allOrders
            allOrders = mergeOrders(allOrders, data.orders);
            renderOrders();
            renderPagination();
        });

        function mergeOrders(existingOrders, newOrders) {
            // Assuming newOrders is an array of arrays (similar to existingOrders)
            newOrders.forEach(newOrder => {
                existingOrders.push(newOrder);
            });
            // Sort orders in descending order based on ID
            existingOrders.sort((a, b) => b[0].id - a[0].id);
            return existingOrders;
        }

        function renderOrders() {
            container.empty(); // Clear the container before populating new orders

            const start = (currentPage - 1) * ordersPerPage;
            const end = start + ordersPerPage;
            const ordersToShow = allOrders.slice(start, end);

            ordersToShow.forEach(order => {
                let currentOrderNo = null;
                let currentOrderBox = null;
                const status = order[0].is_onilne == 1 ? 'Online Customer' : 'Walk-in Customer';

                order.forEach(item => {
                    if (item.order_no !== currentOrderNo) {
                        currentOrderBox = $('<div class="main-order-box"></div>');
                        currentOrderBox.append(`
                            <p class="orderNo">
                                ${item.order_no} &nbsp&nbsp | &nbsp ${status}
                                <span><button class="btn btn-primary" id="completeBtn" data-orderid="${item.order_no}">Complete</button></span>
                            </p>
                        `);
                        container.append(currentOrderBox);
                        currentOrderNo = item.order_no;
                    }

                    var imgPath = item.new_product.img_path ? item.new_product.img_path : 'no_image.jpg';
                    const itemHtml = `
                        <div class="main-oder-box">
                            <div class="main-img-box">
                                <img src="{{ asset('images/products') }}/${imgPath}" class="img-fluid" alt="">
                                <div class="content">
                                    <h6>${item.new_product.name}</h6>
                                    <p class="count">${item.quantity}</p>

                                    <p class="counter mt-3"></p>
                                    <p class="date"></p>
                                </div>
                            </div>
                        </div>
                    `;
                    currentOrderBox.append(itemHtml);
                    const counterElement = currentOrderBox.find('.counter');
                    updateCounter(item.created_at, counterElement);
                });
            });
        }

        function renderPagination() {
            paginationContainer.empty(); // Clear the pagination container

            const totalPages = Math.ceil(allOrders.length / ordersPerPage);

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = $('<button></button>').text(i).addClass('page-btn').data('page', i);
                if (i === currentPage) {
                    pageButton.addClass('active');
                }
                paginationContainer.append(pageButton);
            }
        }

        $(document).ready(function() {
            $.ajax({
                url: '{{ route('OrderList') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    allOrders = mergeOrders([], response
                        .orders); // Initialize allOrders with the fetched orders
                    renderOrders();
                    renderPagination();
                },
                error: function(error) {
                    console.error('Error fetching OrderList:', error);
                }
            });

            $("body").on('click', '#completeOrder', function() {
                const orderId = $(this).data('orderid');
                const productId = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('complete.order.pos', ['orderId' => '__orderId__', 'productId' => '__productId__']) }}'
                        .replace('__orderId__', orderId).replace('__productId__', productId),
                    data: {
                        _token: '{{ csrf_token() }}',
                        order_id: orderId,
                        product_id: productId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: 'json',
                    success: function(response) {
                        allOrders = mergeOrders([], response
                            .orders); // Update allOrders with the fetched orders
                        renderOrders();
                        renderPagination();
                    },
                    error: function(error) {
                        console.error('Error fetching OrderList:', error);
                    }
                });
            });

            $("body").on('click', '#undoOrder', function() {
                const orderId = $(this).data('orderid');
                const productId = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('undo.order.pos', ['orderId' => '__orderId__', 'productId' => '__productId__']) }}'
                        .replace('__orderId__', orderId).replace('__productId__', productId),
                    data: {
                        _token: '{{ csrf_token() }}',
                        order_id: orderId,
                        product_id: productId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: 'json',
                    success: function(response) {
                        allOrders = mergeOrders([], response
                            .orders); // Update allOrders with the fetched orders
                        renderOrders();
                        renderPagination();
                    },
                    error: function(error) {
                        console.error('Error fetching OrderList:', error);
                    }
                });
            });

            $("body").on('click', '#completeBtn', function() {
                const orderId = $(this).data('orderid');
                $.ajax({
                    type: 'POST',
                    url: 'complete/order',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order_id: orderId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: 'json',
                    success: function(response) {
                        allOrders = mergeOrders([], response
                            .orders); // Update allOrders with the fetched orders
                        renderOrders();
                        renderPagination();
                    },
                    error: function(error) {
                        console.error('Error fetching OrderList:', error);
                    }
                });
            });

            $("body").on('click', '.page-btn', function() {
                currentPage = $(this).data('page');
                renderOrders();
                renderPagination();
            });
        });
    </script>


</html>
