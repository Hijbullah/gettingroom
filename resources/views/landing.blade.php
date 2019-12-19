<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon-32x32.png') }} ">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }} ">
    <link rel="manifest" href="{{ asset('frontend/images/site.webmanifest') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free-5.11.2-web/css/all.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap-4.3.1/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap-select-1.13.9/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/autocomplete.css') }}">
    <title>Getting Room | Home</title>
</head>

<body>
    <!--  Top Navigation Bar-->

    <div class="main-menu px-3 sticky-top">
        <ul class="nav">
            <li class="float-left b-r-1 menu-width-45 py-2">
                <a href="#">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" class="gr-logo d-none d-md-block d-sm-none">
                    <img src="{{ asset('frontend/images/logo-sm.png') }}" alt="logo" class="gr-logo-sm d-none d-md-none d-sm-block d-block">
                </a>
            </li>
            <li class="float-left b-lr-1 menu-width-45 py-2 px-2">
                <div class="row no-gutters">
                    <div class="col-md-3 col-sm-6 col-6">
                        <select class="selectpicker" data-size="3" data-width="97%">
                            <option value="">English (US)</option>
                            <option value="">English (UK)</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                        <select class="selectpicker" data-size="3" data-width="97%">
                            <option value="">USD</option>
                        </select>
                    </div>

                    <div class="col-md-6 d-none d-md-block">
                        <select class="selectpicker" id="loginwith" data-width="100%" title="Login With...">
                            <option>Login With Facebook</option>
                            <option>Login With Google</option>
                            <option>Login With Linkedin</option>
                            <option>Login With Instagram</option>
                            <option>Login With Email</option>
                        </select>
                    </div>
                </div>
            </li>
            <li class="menu-width-10 py-2 px-2 text-right">
                <a href="{{ route('login') }}" class="font-18 text-secondary d-none d-md-none d-inline-block">
                    Login
                </a>
                <a href="#" class="ml-2">
                    <span class="font-18 text-secondary d-none d-md-inline-block">Help</span>
                    <img src="{{ asset('frontend/images/546042c1a6139c4cd7a33a524e77d0e3.svg') }}" alt="" class="w-f-25 ml-1">
                </a>
            </li>
        </ul>
    </div>
    <!--  slider With Title-->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="gr-search">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <a href="{{ route('listings.all', 'offerrooms') }}" data-type="offerrooms" class="gr-sb gr-active searchtype">Room </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('listings.all', 'needapartments') }}" data-type="needapartments" class="gr-sb searchtype">Entire Place </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('listings.all', 'needrooms') }}" data-type="needrooms" class="gr-sb searchtype">Roommate </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('listings.all', 'offerapartments') }}" data-type="offerapartments" class="gr-sb searchtype">Tenant </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-box">
                                <label class="sr-only" for="placesearch">Enter an address, neighborhood, city or
                                    ZIP code</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control gr-text" id="placesearch"
                                        placeholder="Enter an address, neighborhood, city or ZIP code">
                                </div>
                                <div id="place-content" class="place-content d-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url({{ asset('frontend/images/Slider/1.jpg') }})">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-5 text-light">
                            Find great places & people to <br> <span class="gr-text-yellow">share a home with</span>.
                        </h2>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url({{ asset('frontend/images/Slider/2.jpg') }})">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-5 text-light">
                            We believe in the potentialof people <br> <span class="gr-text-yellow">when they can come together</span>.
                        </h2>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url({{ asset('frontend/images/Slider/3.jpg') }})">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-5 text-light">
                            Live together with people who will <br> <span class="gr-text-yellow">
                                inspire you</span>.
                        </h2>
                    </div>
                </div>
                <!-- Slide Four - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url({{ asset('frontend/images/Slider/4.jpg') }})">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-5 text-light">Focus on what's important and <br> <span class="gr-text-yellow">
                                spend less on rent</span>.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Search Listings in Top Cities -->
    <section class="gr-ct-lst-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="gr-ct-lst">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-center text-capitalize text-dark mb-3">Search Listings in Top Cities
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <a href="#">
                                    <div class="city-box">
                                        <img src="{{ asset('frontend/images/top-city/Atlanta.jpg') }}">
                                        <div class="content">
                                            <h2>Atlanta</h2>
                                            <div class="overlay"></div>
                                            <h3><i class="fab fa-searchengin"></i> Atlanta Listings</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <a href="#">
                                    <div class="city-box">
                                        <img src="{{ asset('frontend/images/top-city/Boston.jpg') }}">
                                        <div class="content">
                                            <h2>Boston</h2>
                                            <div class="overlay"></div>
                                            <h3> <i class="fab fa-searchengin"></i>Boston Listings</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Chicago.jpg') }}">
                                    <div class="content">
                                        <h2>Chicago</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Chicago Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Dallas.jpeg') }}">
                                    <div class="content">
                                        <h2>Dallas</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Dallas Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Denver.jpg') }}">
                                    <div class="content">
                                        <h2>Denver</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Denver Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Houston.jpg') }}">
                                    <div class="content">
                                        <h2>Houston</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Houston Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/LasVegas.jpg') }}">
                                    <div class="content">
                                        <h2>Las Vegas</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Las Vegas Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/LosAngeles.png') }}">
                                    <div class="content">
                                        <h2>Los Angeles</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Los Angeles Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Miami.jpg') }}">
                                    <div class="content">
                                        <h2>Miami</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Miami Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/NewYorkCity.jpg') }}">
                                    <div class="content">
                                        <h2>New York City</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> New York City Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Philadelphia.jpg') }}">
                                    <div class="content">
                                        <h2>Philadelphia</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Philadelphia Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Phoenix.jpg') }}">
                                    <div class="content">
                                        <h2>Phoenix</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Phoenix Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/SanFrancisco.jpg') }}">
                                    <div class="content">
                                        <h2>San Francisco</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> San Francisco Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Seattle.jpg') }}">
                                    <div class="content">
                                        <h2>Seattle</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Seattle Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/WashingtonDC.jpg') }}">
                                    <div class="content">
                                        <h2>Washington DC</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Washington DC Listings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3 same">
                                <div class="city-box">
                                    <img src="{{ asset('frontend/images/top-city/Athens.jpeg') }}">
                                    <div class="content">
                                        <h2>Athens</h2>
                                        <div class="overlay"></div>
                                        <h3> <i class="fab fa-searchengin"></i> Athens Listings</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- add listing arear -->
    <section class="gr-add-lst bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="pos-relative">
                        <div class="gr-btn">
                            <a href="{{ url('/listingNew') }}" class="btn btn-lg btn-success text-light px-5 py-2">
                                <i class="fas fa-plus font-18"></i> &nbsp; &nbsp;
                                Add Your Listing
                            </a>
                        </div>
                        <div class="text text-white">
                            <p class="font-20">Tell us what you are looking for.</p>
                            <p class="font-20">Create your listings in less than 1 minute.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pos-relative">
                        <div class="gr-about-us">
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <p class="font-18">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque blanditiis sint incidunt ipsa
                                a voluptate, placeat commodi provident animi temporibus libero eum sunt dolor nam laboriosam
                                saepe veritatis aliquam corrupti.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gr-services bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-box">
                        <i class="fas fa-user-friends icon"></i>
                        <h2>Discover amazing <br>people</h2>
                        <p>Connect with users using <br> Roomster mailbox and <br> Social connect.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-box">
                        <i class="fas fa-house-damage icon"></i>
                        <h2>Find a home</h2>
                        <p class="mt-4">Search Roommates, Rooms, <br> Apartments & Sublets for rent</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-box">
                        <i class="fas fa-cat icon"></i>
                        <h2>Pets</h2>
                        <p class="mt-3">Use search filters to find <br> places and people that are pet <br> friendly</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <!-- inportent Pages Links -->
        <section class="inf-links">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" class="grf-img">
                    </div>
                </div>
                <div class="row gr-border-t">
                    <div class="col-md-4">
                        <ul class="nav flex-column pt-3">
                            <li><a href="">Gettingroom Team</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Sitemap</a></li>
                            <li><a href="">Setting</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="nav flex-column pt-3">
                            <li><a href="">Mailbox</a></li>
                            <li><a href="">Megaphone</a></li>
                            <li><a href="">Bookmarks</a></li>
                            <li><a href="">24/7 Support</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="nav flex-column pt-3">
                            <li><a href="">Tutorial</a></li>
                            <li><a href="">Help Center</a></li>
                            <li><a href="">Fair housing</a></li>
                            <li><a href="">Affiliate Program</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Social Links -->
        <section class="grs-area">
            <div class="container">
                <div class="row gr-border-t">
                    <div class="col-md-12">
                        <div class="grs ">
                            <div class="row">
                                <div class="col-md-5 mx-auto mt-3">
                                    <div class="box"><i class="fab fa-facebook-square f16"></i></div>
                                    <div class="box"><i class="fab fa-twitter f16"></i></div>
                                    <div class="box"><i class="fab fa-instagram f16"></i></div>
                                    <div class="box"><i class="fab fa-google f16"></i></div>
                                    <div class="box"><i class="fab fa-linkedin-in f16"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Citys Link -->
        <section class="cities">
            <div class="container">
                <div class="row gr-border-t">
                    <div class="col">
                        <div class="pt-3">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <h5>Top Cities</h5>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <nav class="nav gr-city-nav">
                                        <li class="nav-link"><a href="#">New York</a></li>
                                        <li class="nav-link"><a href="#">Los Angeles</a></li>
                                        <li class="nav-link"><a href="#">Chicago</a></li>
                                        <li class="nav-link"><a href="#">Houston</a></li>
                                        <li class="nav-link"><a href="#">Phoenix</a></li>
                                        <li class="nav-link"><a href="#">Philadelphia</a></li>
                                        <li class="nav-link"><a href="#">San Antonio</a></li>
                                        <li class="nav-link"><a href="#">San Diego</a></li>
                                        <li class="nav-link"><a href="#">Dallas</a></li>
                                        <li class="nav-link"><a href="#">Austin</a></li>
                                        <li class="nav-link"><a href="#">Jacksonville</a></li>
                                        <li class="nav-link"><a href="#">Columbus</a></li>
                                        <li class="nav-link"><a href="#">San Francisco</a></li>
                                        <li class="nav-link"><a href="#">Charlotte</a></li>
                                        <li class="nav-link"><a href="#">Indianapolis</a></li>
                                        <li class="nav-link"><a href="#">Seattle</a></li>
                                        <li class="nav-link"><a href="#">Denver</a></li>
                                        <li class="nav-link"><a href="#">Washington DC</a></li>
                                        <li class="nav-link"><a href="#">Boston</a></li>
                                        <li class="nav-link"><a href="#">El Paso</a></li>
                                        <li class="nav-link"><a href="#">Detroit</a></li>
                                        <li class="nav-link"><a href="#">Nashville</a></li>
                                        <li class="nav-link"><a href="#">Portland</a></li>
                                        <li class="nav-link"><a href="#">Memphis</a></li>
                                        <li class="nav-link"><a href="#">Oklahoma City</a></li>
                                        <li class="nav-link"><a href="#">Las Vegas</a></li>
                                        <li class="nav-link"><a href="#">Louisville</a></li>
                                        <li class="nav-link"><a href="#">Baltimore</a></li>
                                        <li class="nav-link"><a href="#">Milwaukee</a></li>
                                        <li class="nav-link"><a href="#">Albuquerque</a></li>
                                        <li class="nav-link"><a href="#">Tucson</a></li>
                                        <li class="nav-link"><a href="#">Fresno</a></li>
                                        <li class="nav-link"><a href="#">Sacramento</a></li>
                                        <li class="nav-link"><a href="#">Atlanta</a></li>
                                        <li class="nav-link"><a href="#">Kansas City</a></li>
                                        <li class="nav-link"><a href="#">Colorado Springs</a></li>
                                        <li class="nav-link"><a href="#">Miami</a></li>
                                        <li class="nav-link"><a href="#">Raleigh</a></li>
                                        <li class="nav-link"><a href="#">Omaha</a></li>
                                        <li class="nav-link"><a href="#">Minneapolis</a></li>
                                        <li class="nav-link"><a href="#">Tulsa</a></li>
                                        <li class="nav-link"><a href="#">Tampa</a></li>
                                        <li class="nav-link"><a href="#">New Orleans</a></li>
                                        <li class="nav-link"><a href="#">Jersey Shore</a></li>
                                        <li class="nav-link"><a href="#">Birmingham</a></li>
                                        <li class="nav-link"><a href="#">Delaware</a></li>
                                        <li class="nav-link"><a href="#">Orlando</a></li>
                                        <li class="nav-link"><a href="#">Ann Arbor</a></li>
                                        <li class="nav-link"><a href="#">New Hampshire</a></li>
                                        <li class="nav-link"><a href="#">Asheville</a></li>
                                        <li class="nav-link"><a href="#">Athens</a></li>
                                        <li class="nav-link"><a href="#">Cincinnati</a></li>
                                        <li class="nav-link"><a href="#">Rhode Island</a></li>
                                        <li class="nav-link"><a href="#">Columbia</a></li>
                                        <li class="nav-link"><a href="#">Charleston</a></li>
                                        <li class="nav-link"><a href="#">Hampton</a></li>
                                        <li class="nav-link"><a href="#">Madison</a></li>
                                        <li class="nav-link"><a href="#">Mobile</a></li>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer Area Content -->

        <section class="container">
            <div class="row gr-border-t py-3">
                <div class="col-md-4">
                    <p class="copyright-text">Getting Room &copy; 2019</p>
                </div>
                <div class="col-md-4 text-center">
                    <a href="#" class="gr-link">Terms of Use</a>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" class="gr-link">Privacy Policy</a>
                </div>
            </div>
        </section>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('frontend/plugins/bootstrap-select-1.13.9/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/placeAutocomplete.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>