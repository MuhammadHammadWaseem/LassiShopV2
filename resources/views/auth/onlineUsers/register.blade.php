<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=icon href={{ asset('images/'.$settings->logo) }}>

    <title>{{ __('translate.Sign_in') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/login_page.css')}}">

</head>


<body class="login-page">
    <div id="main-wrapper" class="show">

        <div class="login-posly">
            <div>  
                <div class="login-main">
                   <form class="theme-form" id="form_login" method="POST" action="{{ route('online-users.store') }}">
                        @csrf
                        <h4>Register</h4>
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label class="col-form-label">Name</label>
                                   <input class="form-control" type="text" name="name" placeholder="Enter Name" required>
                               </div>
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input class="form-control" type="text" name="email" placeholder="Enter email" required>
                            </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">City</label>
                                <input class="form-control" type="city" name="city" placeholder="Enter city" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Country</label>
                                <input class="form-control" type="country" name="country" placeholder="Enter country" required>
                            </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Adrress</label>
                                <input class="form-control" type="address" name="address" placeholder="Enter address" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                            </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone</label>
                                <input class="form-control" type="phone" name="phone" placeholder="Enter phone" required>
                            </div>
                        </div>
                       </div>

                            <div class="mt-3">
                            <button id="btn_submit" class="btn btn-primary w-100">Register</button>
                            </div>
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
    $(function () {
      $("#form_login").one("submit", function () {
      //enter your submit code
      $("#btn_submit").prop('disabled', true);
      });
    });
  </script>
</body>
</html>