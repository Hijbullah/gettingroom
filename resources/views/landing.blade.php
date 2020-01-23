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
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free-5.11.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/autocomplete.css') }}">
    <title>Getting Room | Home</title>
</head>

<body>
    <!--  Top Navigation Bar-->

    <div class="main-menu px-3 sticky-top d-none d-md-block">
        <ul class="nav">
            <li class="float-left menu-width-45 py-2">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('frontend/images/logo/logo.webp') }}" alt="logo" class="gr-logo">
                </a>
            </li>
            <li class="float-left border-left border-right menu-width-45 py-2 px-2 d-none d-md-block">
                <div class="row no-gutters">
                    <div class="col-md-3 col-sm-6 col-6">
                        <select class="selectpicker show-tick" data-size="3" data-width="97%" data-style="custom-picker">
                            <option>English (US)</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                        <select class="selectpicker show-tick" data-size="3" data-width="97%" data-style="custom-picker">
                            <option>USD</option>
                        </select>
                    </div>

                    <div class="col-md-6 d-none d-md-block">
                        <select class="selectpicker form-control auth-social" id="loginwith" data-style="custom-picker-auth" title="Login with Social or Email...">
                            <option class="facebook-auth pad-tb-5 pl-3" data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Facebook.webp' /> <span class='ml-2'>Login With Facebook</span>">Login With Facebook</option>
                            <option class="google-auth pad-tb-5 pl-3" data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Google.webp' /> <span class='ml-2'>Login With Google</span>">Login With Google</option>
                            <option class="linkedin-auth pad-tb-5 pl-3" data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Linkedin.webp' /> <span class='ml-2'>Login With Linkedin</span>">Login With Linkedin</option>
                            <option class="instagram-auth pad-tb-5 pl-3" data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Instagram.webp' /> <span class='ml-2'>Login With Instagram</span>">Login With Instagram</option>
                            <option class="twitter-auth pad-tb-5 pl-3" data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Twitter.webp' /> <span class='ml-2'>Login With Twitter</span>">Login With Linkedin</option>
                            <option class="email-auth pad-tb-5 pl-3" data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Email.webp' /> <span class='ml-2'>Login With Email</span>">Login With Email</option>
                        </select>
                    </div>
                </div>
            </li>
            <li class="menu-width-10 py-2 px-2 text-right">
                <a href="{{ route('login') }}" class="text-secondary d-md-none d-inline-block mobile-login">
                    Login
                </a>
                <a href="{{ url('/support') }}" class="ml-2 d-none d-md-inline-block">
                    <span class="font-18 text-secondary">Help</span>
                    <img src="{{ asset('frontend/images/546042c1a6139c4cd7a33a524e77d0e3.svg') }}" alt="" class="w-f-25 ml-1">
                </a>
            </li>
        </ul>
    </div>
    <div class="main-menu px-3 sticky-top d-md-none">
        <ul class="m-0 p-0" style="list-style: none;">
            <li class="float-left py-2">
                <a href="#">
                    <img src="{{ asset('frontend/images/logo/logo.webp') }}" alt="logo" class="gr-logo">
                </a>
            </li>
            <li class="py-2 px-2 float-right">
                <a href="{{ route('login') }}" class="text-secondary d-md-none d-inline-block mobile-login">
                    Login
                </a>
            </li>
        </ul>
    </div>
    <!--  slider With Title-->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="gr-search">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 col-sm-3">
                            <a href="{{ route('listings.all', 'offerrooms') }}" data-type="offerrooms" class="gr-sb gr-active searchtype">Room </a>
                        </div>
                        <div class="col-6 col-sm-3">
                            <a href="{{ route('listings.all', 'needapartments') }}" data-type="needapartments" class="gr-sb searchtype">Entire Place </a>
                        </div>
                        <div class="col-6 col-sm-3">
                            <a href="{{ route('listings.all', 'needrooms') }}" data-type="needrooms" class="gr-sb searchtype">Roommate </a>
                        </div>
                        <div class="col-6 col-sm-3">
                            <a href="{{ route('listings.all', 'offerapartments') }}" data-type="offerapartments" class="gr-sb searchtype">Tenant </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-box">
                                <label class="sr-only" for="placesearch">Enter an address, neighborhood, city or
                                    ZIP...</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control gr-text" id="autocomplete"
                                        placeholder="Enter an address, neighborhood, city or ZIP...">
                                </div>
                                <div id="place-content" class="place-content d-none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-lang-cur text-center mt-3 d-md-none">
                        <select class="selectpicker show-tick" data-width="120" data-style="custom-picker-mobile">
                            <option>English (US)</option>
                        </select>
                        <select class="selectpicker show-tick" data-width="80" data-style="custom-picker-mobile">
                            <option>USD</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url({{ asset('frontend/images/Slider/webp/1.webp') }})">
                    <div class="carousel-caption  d-md-block">
                        <h2 class="carosel-title text-light">
                            Find great places & people to <br><span class="gr-text-yellow">share a home with</span>.
                        </h2>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url({{ asset('frontend/images/Slider/webp/2.webp') }})">
                    <div class="carousel-caption  d-md-block">
                        <h2 class="carosel-title text-light">
                            We believe in the potential of people <br> <span class="gr-text-yellow">when they can come together</span>.
                        </h2>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url({{ asset('frontend/images/Slider/webp/3.webp') }})">
                    <div class="carousel-caption  d-md-block">
                        <h2 class="carosel-title text-light">
                            Live together with people who <br> will <span class="gr-text-yellow">inspire you</span>.
                        </h2>
                    </div>
                </div>
                <!-- Slide Four - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url({{ asset('frontend/images/Slider/webp/4.webp') }})">
                    <div class="carousel-caption  d-md-block">
                        <h2 class="carosel-title text-light">Focus on what's important <br> and <span class="gr-text-yellow">
                                spend  less on rent</span>.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Search Listings in Top Cities -->
    <section class="gr-city-gallery">
        <h2 class="text-center text-capitalize text-dark city-gallery-heading">Search Listings in Top Cities</h2>
        <div class="city-boxes">
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Atlanta, GA, USA&lat=33.7489954&lng=-84.3879824') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Atlanta.webp') }}">
                    <div class="content">
                        <h2>Atlanta</h2>
                        <div class="overlay"></div>
                        <h3><i class="fab fa-searchengin"></i> Atlanta <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Boston, MA, USA&lat=42.3600825&lng=-71.0588801') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Boston.webp') }}">
                    <div class="content">
                        <h2>Boston</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i>Boston <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Chicago, IL, USA&lat=41.8781136&lng=-87.6297982') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Chicago.webp') }}">
                    <div class="content">
                        <h2>Chicago</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Chicago <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/needrooms?loc=Dallas, TX, USA&lat=32.7766642&lng=-96.79698789999999') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Dallas.webp') }}">
                    <div class="content">
                        <h2>Dallas</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Dallas <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Denver, CO, USA&lat=39.7392358&lng=-104.990251') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Denver.webp') }}">
                    <div class="content">
                        <h2>Denver</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Denver <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Houston, TX, USA&lat=29.7604267&lng=-95.3698028') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Houston.webp') }}">
                    <div class="content">
                        <h2>Houston</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Houston <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Las Vegas, NV, USA&lat=36.1699412&lng=-115.1398296') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/LasVegas.webp') }}">
                    <div class="content">
                        <h2>Las Vegas</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Las <br> Vegas <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Los Angeles, CA, USA&lat=34.0522342&lng=-118.2436849') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/LosAngeles.webp') }}">
                    <div class="content">
                        <h2>Los Angeles</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Los <br> Angeles <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Miami, FL, USA&lat=25.7616798&lng=-80.1917902') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Miami.webp') }}">
                    <div class="content">
                        <h2>Miami</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Miami <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=New York, NY, USA&lat=40.7127753&lng=-74.0059728') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/NewYorkCity.webp') }}">
                    <div class="content">
                        <h2>New York</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> New York <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Philadelphia, PA, USA&lat=39.9525839&lng=-75.1652215') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Philadelphia.webp') }}">
                    <div class="content">
                        <h2>Philadelphia</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Philadelphia <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Phoenix, AZ, USA&lat=33.4483771&lng=-112.0740373') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Phoenix.webp') }}">
                    <div class="content">
                        <h2>Phoenix</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Phoenix <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=San Francisco, CA, USA&lat=37.7749295&lng=-122.4194155') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/SanFrancisco.webp') }}">
                    <div class="content">
                        <h2>San Francisco</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> San <br> Francisco <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Seattle, WA, USA&lat=47.6062095&lng=-122.3320708') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/Seattle.webp') }}">
                    <div class="content">
                        <h2>Seattle</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Seattle <br> Listings</h3>
                    </div>
                </a>
            </div>
            <div class="city-box same">
                <a href="{{ url('/lists/offerrooms?loc=Washington, DC, USA&lat=38.9071923&lng=-77.0368707') }}">
                    <img src="{{ asset('frontend/images/top-city/webp/WashingtonDC.webp') }}">
                    <div class="content">
                        <h2>Washington DC</h2>
                        <div class="overlay"></div>
                        <h3> <i class="fab fa-searchengin"></i> Washington <br> DC <br> Listings</h3>
                    </div>
                </a>
            </div>
        </div>        
    </section>
    <!-- add listing arear -->
    <section class="gr-add-lst bg-light">
        <div class="gr-btn">
            <a href="{{ url('/listingNew') }}" class="btn btn-lg btn-success px-5 py-2">
                <i class="fas fa-plus font-18"></i> &nbsp; &nbsp;
                Add Your Listing
            </a>
        </div>
        <div class="text text-white">
            <p class="font-20">Tell us what you are looking for.</p>
            <p class="font-20">Create your listings in less than 1 minute.</p>
        </div>       
    </section>
    <section class="gr-services bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-box">
                        <i class="fas fa-user-friends icon"></i>
                        <h2>Discover amazing people</h2>
                        <p class="mt-4">Connect with users using <br> <span class="color-text-main">GettingRoom mailbox</span> and <span class="color-text-main">Social connect</span>.</p>
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
                    <div class="col-12 text-center text-sm-left">
                        <img src="{{ asset('frontend/images/logo/logo.webp') }}" alt="logo" class="grf-img">
                    </div>
                </div>
                <div class="row gr-border-t">
                    <div class="col-6 col-sm-4">
                        <ul class="nav flex-column  pt-3">
                            <li><a href="">Gettingroom Team</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Sitemap</a></li>
                            <li><a href="">Setting</a></li>
                            <li class="d-sm-none"><a href="">Tutorial</a></li>
                            <li class="d-sm-none"><a href="">Help Center</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-4">
                        <ul class="nav flex-column  pt-3">
                            <li><a href="">Mailbox</a></li>
                            <li><a href="">Social Connects</a></li>
                            <li><a href="">Bookmarks</a></li>
                            <li><a href="">24/7 Support</a></li>
                            <li class="d-sm-none"><a href="">Fair housing</a></li>
                            <li class="d-sm-none"><a href="">Affiliate Program</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-4 d-none d-sm-block">
                        <ul class="nav flex-column  pt-3">
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
                <div class="row border-top">
                    <div class="col-12">
                        <div class="text-center mt-3">
                            <div class="box d-inline-block"><i class="fab fa-facebook-square f16"></i></div>
                            <div class="box d-inline-block"><i class="fab fa-twitter f16"></i></div>
                            <div class="box d-inline-block"><i class="fab fa-instagram f16"></i></div>
                            <div class="box d-inline-block"><i class="fab fa-google f16"></i></div>
                            <div class="box d-inline-block"><i class="fab fa-linkedin-in f16"></i></div>
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
                                <div class="col-md-9 d-none d-md-block">
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
                                <div class="col-4 d-md-none">
                                    <nav class="gr-city-nav">
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
                                    </nav>
                                </div>
                                <div class="col-4 d-md-none">
                                    <nav class=" gr-city-nav">
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
                                        
                                    </nav>
                                </div>
                                <div class="col-4 d-md-none">
                                    <nav class="gr-city-nav">
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
                                        <li class="nav-link"><a href="#">Minneapolis</a></li>
                                        <li class="nav-link"><a href="#">Tulsa</a></li>
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
                <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                    <p class="copyright-text">Getting Room &copy; {{ date("Y") }}</p>
                </div>
                <div class="col-6 col-sm-4 text-left text-sm-center ">
                    <a href="{{ url('/terms') }}" class="gr-link">Terms of Use</a>
                </div>
                <div class="col-6 col-sm-4 text-right">
                    <a href="{{ url('/privacy') }}" class="gr-link">Privacy Policy</a>
                </div>
            </div>
        </section>
    </footer>

    <script src="{{ asset('js/landing.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwyZimvA9z_SzFmL55fpJSoeYrloU6RF4&libraries=places">
    </script>
    <script src="{{ asset('js/googlePlaceAutocomplete.js') }} "></script>
</body>

</html>