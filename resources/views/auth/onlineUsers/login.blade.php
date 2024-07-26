<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=icon href={{ asset('images/' . $settings->logo) }}>

    <title>{{ __('translate.Sign_in') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/login_page.css') }}">

</head>


<body class="login-page">
    <div id="main-wrapper" class="show">

        <div class="login-posly">
            <div>

                <div class="login-main">
                    <form class="theme-form" id="form_login" method="POST" action="{{ route('login.auth') }}">
                        @csrf
                        <h4>{{ __('translate.Sign_in_to_account') }}</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('translate.Email') }}</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('translate.Password') }}</label>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            type="password" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit"
                                        id="btn_submit">{{ __('translate.Sign_in') }}</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS Libraies -->
    <script src="{{ asset('/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>

    <script>
        $(function() {
            $("#form_login").one("submit", function() {
                //enter your submit code
                $("#btn_submit").prop('disabled', true);
            });
        });
    </script>
</body>

</html>
