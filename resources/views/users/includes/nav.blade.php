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
                <input class="w-100 form-control border-0 font-18" value="{{ session('location') ? session('location')['location'] : '' }}" type="search" id="placesearch" placeholder="Search Place">
                <div id="place-content" class="place-content d-none"></div>
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
                <div class="b-r-1 px-3 py-2 d-md-block position-relative">
                    <a href="{{ url('/support') }}" class="">
                        <span class="text-success font-30"><i class="far fa-question-circle"></i></span>
                        @if($supportCount)
                        <span class="badge badge-danger message-badge">{{ $supportCount }}</span>
                        @endif
                    </a>
                </div>
                @auth
                <div class="border-left b-r-1 px-3 py-2 d-none d-md-block position-relative">
                    <a href="{{ url('/message') }}" class="">
                        <span class="text-success font-30"><i class="far fa-comment"></i></span>
                        @if($messageCount)
                        <span class="badge badge-danger message-badge">{{ $messageCount }}</span>
                        @endif
                    </a>
                </div>
                <div class="b-r-1 px-3 py-2">
                    <a href="#" id="account-dropdown" class="user" data-toggle="dropdown">
                        <img src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('frontend/images/user-defult.png') }}" alt="">
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
                                <a href="{{ url('/lists/offerrooms') }}" class="text-dark"><span class="mr-2 color-main-text"><i class="fas fa-search"></i></span>Browse Listings</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-dark" @click.prevent="openVerifyModal()"><span class="mr-2 color-main-text"><i class="fas fa-user-check"></i></span>Account Verification</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ url('/setting') }}" class="text-dark"><span class="mr-2 color-main-text"><i class="fas fa-cogs"></i></span>Setting</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ url('/support') }}" class="text-dark"><span class="mr-2 color-main-text"><i class="far fa-comments"></i></span>24/7 Supports</a>
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