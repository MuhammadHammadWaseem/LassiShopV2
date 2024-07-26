<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon icon -->
    <link rel=icon href={{ asset('images/' . $settings->logo) }}>
    <title>Thank You For Shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        @font-face {
            font-family: 'lassi';
            src: url('{{ asset('/assets/fonts/YummiLassi.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Inter", sans-serif;
        }

        section.main-sec {
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            row-gap: 20px;
        }

        .thanks-title {
            font-size: 24px;
            font-family: 'lassi', sans-serif!important;
            font-size: 40px !important;
        }


        @media only screen and (max-width: 767px) {
            img.check-img {
                width: 100px;
                height: 100px;
            }

            h2.place-title {
                font-size: 18px;
            }

            h1 {
                font-size: 20px;
            }

            section.main-sec {
                row-gap: 15px;
            }
        }
    </style>
</head>

<body>
    <section class="main-sec" style="background-image: url({{ asset('images/OnlineSite/main-bg.png') }})">
        <img src="{{ asset('images/' . $settings->logo) }}" alt="" width="100px" height="100px">
        <h1 class="place-title"><span>{{ $setting[0]->app_name }}</span> </h1>
        <h2 class="thanks-title">Thank You For Shopping</h2>
        <img src="{{ asset('images/check.png') }}" class="check-img" width="200px" height="200px">
        <h2 class="place-title"><span>Order No:{{ $OrderNumber ?? '' }}</span></h2>
        <a href="{{ route('guest.index') }}" target="_blank" class="btn btn-danger text-center">Back To Home</a>
    </section>

</body>

</html>
