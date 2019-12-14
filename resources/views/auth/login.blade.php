<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/images/site.webmanifest') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css"
        integrity="sha256-4w9DunooKSr3MFXHXWyFER38WmPdm361bQS/2KUWZbU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
     <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <title>Getting Room | Login</title>
</head>

<body>
    <div class="main-menu px-5 fixed-top">
        <ul class="nav">
            <li class="py-2">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" class="gr-logo d-none d-md-block d-sm-none">
                    <img src="{{ asset('frontend/images/logo-sm.png') }}" alt="logo" class="gr-logo-sm d-none d-md-none d-sm-block d-block">
                </a>
            </li>
            <li class="py-2 px-2 ml-auto">
                <a href="#" class="ml-2">
                    <span class="font-18 text-white d-none d-md-inline-block">Help</span>
                    <img src="{{ asset('frontend/images/546042c1a6139c4cd7a33a524e77d0e3.svg') }}" alt="" class="w-f-25 ml-1 text-white">
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-8 col-md-8 mx-auto">
                        <!-- form card login -->
                        <div class="row no-gutters">
                            <div class="col-md-5 order-1 order-md-0">
                                <div class="left bg-dark-blue p-3 h-100 mt-5 mt-md-0">

                                    <div class="or border rounded-circle p-2 border-light d-inline-block">OR</div>
                                    <div class="social-link mt-3 text-center">
                                        <div class="position-center">
                                            <a href="#" class="mb-2">
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/instra-sm.svg') }}" alt="">
                                                <span class="d-sm-inline-block d-md-none icon instagram mr-2">
                                                    <i class="fab fa-instagram"></i>
                                                </span>
                                            </a>
                                            <a href="{{ url('/login/facebook') }}" class="mb-2">
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/facebook.svg') }}"
                                                    alt="">
                                                <span class="d-sm-inline-block d-md-none icon facebook mr-2">
                                                    <i class="fab fa-facebook-f"></i>
                                                </span>
                                            </a>
                                            <a href="{{ url('/login/google') }}" class="mb-2">
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/google.svg') }}"
                                                    alt="">
                                                <span class="d-sm-inline-block d-md-none icon facebook mr-2">
                                                    <i class="fab fa-facebook-f"></i>
                                                </span>
                                            </a>
                                            <a href="#" class="mb-2">
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/twitter.svg') }}"
                                                    alt="">
                                                <span class="d-sm-inline-block d-md-none icon twitter  mr-2">
                                                    <i class="fab fa-twitter"></i>
                                                </span>
                                            </a>
                                            <a href="{{ url('/login/linkedin') }}" class="">
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/linkedin.sv') }}g"
                                                    alt="">
                                                <span class="d-sm-inline-block d-md-none icon facebook mr-2">
                                                    <i class="fab fa-facebook-f"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 order-0 order-md-1">
                                <div class="right text-white h-100 px-5 py-4 ">
                                    <h2 class="font-20 mb-3 text-uppercase text-center">Login</h2>
                                    <p>Don't have a account? <a href="{{ route('register') }}" class="text-success"> Sign Up Free!</a></p>
                                    <div class="form-body mt-3">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control form-control-sm bg-transparent @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group text-light">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control form-control-sm bg-transparent @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember">Remember</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="{{ route('password.request') }}" class="text-success">Forgot Password</a>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-success w-50 mt-1 rounded-0 text-uppercase btn-sm">Login</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>