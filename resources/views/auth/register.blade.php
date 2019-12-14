<!DOCTYPE html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/images/site.webmanifest') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css"
        integrity="sha256-4w9DunooKSr3MFXHXWyFER38WmPdm361bQS/2KUWZbU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <title>Getting Room | Regist</title>
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
                    <div class="col-lg-9 col-md-8 mx-auto">
                        <!-- form card login -->
                        <div class="row no-gutters">
                            <div class="col-lg-5 col-md-4 order-1 order-md-0">
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
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/facebook.svg') }}" alt="">
                                                <span class="d-sm-inline-block d-md-none icon facebook mr-2">
                                                    <i class="fab fa-facebook-f"></i>
                                                </span>
                                            </a>
                                            <a href="{{ url('/login/google') }}" class="mb-2">
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/google.svg') }}" alt="">
                                                <span class="d-sm-inline-block d-md-none icon facebook mr-2">
                                                    <i class="fab fa-facebook-f"></i>
                                                </span>
                                            </a>
                                            <a href="#" class="mb-2">
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/twitter.svg') }}" alt="">
                                                <span class="d-sm-inline-block d-md-none icon twitter  mr-2">
                                                    <i class="fab fa-twitter"></i>
                                                </span>
                                            </a>
                                            <a href="{{ url('/login/linkedin') }}" class="">
                                                <img class="d-none d-md-block" src="{{ asset('frontend/images/social-icon/svg/linkedin.sv') }}g" alt="">
                                                <span class="d-sm-inline-block d-md-none icon facebook mr-2">
                                                    <i class="fab fa-facebook-f"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8 order-0 order-md-1">
                                <div class="right text-white h-100 px-5 py-4 registration">
                                    <h2 class="font-20 mb-3 text-uppercase text-center">Sign up</h2>
                                    <p>Already have an account? <a href="{{ route('login') }}" class="text-success"> Login With Email</a>
                                    </p>
                                    <div class="form-body mt-3">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-transparent @error('first_name') is-invalid @enderror" id="first_name"
                                                        placeholder="Enter first name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                                     @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-transparent @error('last_name') is-invalid @enderror" id="last_name"
                                                        placeholder="Enter last name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                                                     @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control form-control-sm bg-transparent @error('email') is-invalid @enderror"
                                                    id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                 @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6 col-md-3">
                                                    <label for="day" class="label">Day</label>
                                                    <select name="day" id="day" class="form-control form-control-sm custom-select bg-transparent @error('day') is-invalid @enderror" required>
                                                        <option selected disabled>Day</option>
                                                        @for ($i = 1; $i <= 31; $i++) 
                                                            <option {{ old('day') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>

                                                    @error('day')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="month" class="label">Month</label>
                                                    <select name="month" id="month" class="form-control form-control-sm custom-select bg-transparent @error('month') is-invalid @enderror" required>
                                                        <option selected disabled>Month</option>
                                                        <option {{ old('month') == '1' ? 'selected' : '' }} value="1">Jan</option>
                                                        <option {{ old('month') == '2' ? 'selected' : '' }} value="2">Feb</option>
                                                        <option {{ old('month') == '3' ? 'selected' : '' }} value="3">Mar</option>
                                                        <option {{ old('month') == '4' ? 'selected' : '' }} value="4">Apr</option>
                                                        <option {{ old('month') == '5' ? 'selected' : '' }} value="5">May</option>
                                                        <option {{ old('month') == '6' ? 'selected' : '' }} value="6">Jun</option>
                                                        <option {{ old('month') == '7' ? 'selected' : '' }} value="7">Jul</option>
                                                        <option {{ old('month') == '8' ? 'selected' : '' }} value="8">Aug</option>
                                                        <option {{ old('month') == '9' ? 'selected' : '' }} value="9">Sep</option>
                                                        <option {{ old('month') == '10' ? 'selected' : '' }} value="10">Oct</option>
                                                        <option {{ old('month') == '11' ? 'selected' : '' }} value="11">Nov</option>
                                                        <option {{ old('month') == '12' ? 'selected' : '' }} value="12">Dec</option>
                                                    </select>
                                                    @error('month')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="year" class="label">Year</label>
                                                    <select name="year" id="year" class="form-control form-control-sm custom-select bg-transparent @error('year') is-invalid @enderror" required>
                                                        <option selected disabled>Year</option>
                                                        @for ($i = 2019; $i >= 1980; $i--)
                                                        <option {{ old('year') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    @error('year')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="gender">Gender</label>
                                                    <select id="gender"
                                                        class="form-control form-control-sm custom-select bg-transparent @error('gender') is-invalid @enderror" name="gender" required>
                                                        <option value="male">Male</option>
                                                        <option value="female">Femail</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="password">Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-sm bg-transparent @error('password') is-invalid @enderror"
                                                        id="password" placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                                                     @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="cpassword">Confirm Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-sm bg-transparent"
                                                        id="cpassword" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="btn btn-success w-md-50 mt-1 rounded-0 text-uppercase btn-sm">Create
                                                New Account</button>
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