<!--  Top Navigation Bar-->
<div class="main-menu sticky-top">
    <nav class="">
        <div class="d-flex">
            <div class="px-3 b-r-1  py-2">
                <a href="{{ url('/') }}" class="navbar-brand m-0">
                    <img src="{{ asset('frontend/images/logo-sm.png') }} " alt="logo" class="gr-logo-sm">
                </a>
            </div>
            <div class="search-box py-2 px-3" style="width: 100%">
                <input class="w-100 form-control border-0 font-18" type="search" id="placesearch-nav" placeholder="Search Place">
            </div>
            <div class="border-left px-3 py-2 d-none d-md-block">
                <select class="selectpicker" data-size="3" data-width="100%">
                    <option value="">Enlisgh (US)</option>
                    <option value="">English (UK)</option>
                </select>
            </div>
            <div class="pr-3 py-2 d-none d-md-block border-right">
                <select class="selectpicker" data-size="3" data-width="100%">
                    <option value="">USD</option>
                    <option value="">USD</option>
                    <option value="">USD</option>
                    <option value="">USD</option>
                    <option value="">USD</option>
                </select>
            </div>
            
            @guest
                <div class="px-3 py-2 d-none d-md-block">
                    <select class="selectpicker" id="loginwith" data-width="200" title="Login With...">
                        <option>Login With Facebook</option>
                        <option>Login With Google</option>
                        <option>Login With Linkedin</option>
                        <option>Login With Instagram</option>
                        <option>Login With Email</option>
                    </select>
                </div>
                @endguest
                <div class="b-r-1 px-3 py-2 ">
                    <a href="#" class="">
                        <span class="text-success font-30"><i class="far fa-question-circle"></i></span>
                        {{-- <span class="text-success font-30"><img height="" src="{{ asset('frontend/images/546042c1a6139c4cd7a33a524e77d0e3.svg') }}" alt=""></span> --}}

                    </a>
                </div>
                @auth
                <div class="border-left b-r-1 px-3 py-2 d-none d-md-block">
                    <a href="#" class="">
                        <span class="text-success font-30"><i class="far fa-comment"></i></span>
                    </a>
                </div>
                <div class="b-r-1 px-3 py-2">
                    <a href="#" id="account-dropdown" class="user" data-toggle="dropdown">
                        <img src="{{ asset('frontend/images/user-defult.png') }}" alt="">
                    </a>
                    <div class="dropdown-menu account dropdown-menu-left py-0" aria-labelledby="account-dropdown">
                        <ul class="list-group list-group-flush font-16">
                            <li class="list-group-item color-main-bg">
                                <a href="{{ url('/upgrade/plans') }}" class="text-white"><span class="mr-2"><i class="far fa-arrow-alt-circle-up"></i></span>Upgrade</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ url('/profile/') . '/' . Auth::id() }}" class="text-dark"><span class="mr-2 color-main-text"><i class="far fa-user"></i></span>My profile / Listings</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-dark" @click.prevent="openVerifyModal()"><span class="mr-2 color-main-text"><i class="fas fa-user-check"></i></span>Account Verification</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-dark"><span class="mr-2 color-main-text"><i class="fas fa-cogs"></i></span>Setting</a>
                            </li>
                            <li class="list-group-item">
                                <a class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span class="mr-2 color-main-text"><i class="fas fa-sign-out-alt"></i></span>
                                    Logout
                                </a>
                            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                
            @else    
                <div class="d-md-none">
                    <a href="#" class="text-dark px-4 py-2 d-inline-block">
                        <span class="font-30 "><i class="fas fa-sign-in-alt"></i></span>
                    </a>
                </div>
            @endauth
            <div class=" px-3 py-2 color-main-bg d-none">
                <a href="#" class="text-white font-30"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </nav>
</div>

{{-- <drawer-nav :direction="'left'" :exist="true" ref="navDrawer" v-cloak>
    <ul>
        <li>menu list 1</li>
        <li>menu list 2</li>
        <li>menu list 3</li>
        <li>menu list 4</li>
        <li>menu list 5</li>
    </ul>
</drawer-nav> --}}