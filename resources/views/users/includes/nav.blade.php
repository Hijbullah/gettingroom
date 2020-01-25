<!--  Top Navigation Bar-->
<div class="main-menu sticky-top">
    <nav class="">
        <div class="d-flex">
            <div class="px-3 b-r-1  py-2">
                <a href="{{ url('/') }}" class="navbar-brand m-0">
                    <img src="{{ asset('frontend/images/logo/logo-sm.webp') }} " alt="logo" class="gr-logo-sm">
                </a>
            </div>
            <div class="search-box w-100">
                @if(request()->is('lists*') || request()->is('listings/*'))
                <input class="w-100 form-control border-0 font-18 nav-search"
                    value="{{ session('location') ? session('location')['location'] : '' }}" type="text"
                    id="autocomplete" placeholder="Search Place" autocomplete="off">
                <span class="clearsearch d-none text-danger"><i class="fas fa-times"></i></span>
                @endif
            </div>
            <div class="border-left px-3 py-2 d-none d-md-block">
                <select class="selectpicker show-tick" data-size="3" data-width="100%" data-style="custom-picker">
                    <option>Enlisgh (US)</option>
                </select>
            </div>
            <div class="pr-3 py-2 d-none d-md-block border-right">
                <select class="selectpicker show-tick" data-size="3" data-width="100%" data-style="custom-picker">
                    <option>USD</option>
                </select>
            </div>

            @guest
            <div class="px-3 py-2 d-none d-md-block">
                <select class="selectpicker form-control auth-social" data-width="300" id="loginwith"
                    data-style="custom-picker-auth" title="Login with Socials or Email ...">
                    <option class="facebook-auth pad-tb-5 pl-3"
                        data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Facebook.webp' /> <span class='ml-2'>Login With Facebook</span>">
                        Login With Facebook</option>
                    <option class="google-auth pad-tb-5 pl-3"
                        data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Google.webp' /> <span class='ml-2'>Login With Google</span>">
                        Login With Google</option>
                    <option class="linkedin-auth pad-tb-5 pl-3"
                        data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Linkedin.webp' /> <span class='ml-2'>Login With Linkedin</span>">
                        Login With Linkedin</option>
                    <option class="instagram-auth pad-tb-5 pl-3"
                        data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Instagram.webp' /> <span class='ml-2'>Login With Instagram</span>">
                        Login With Instagram</option>
                    <option class="twitter-auth pad-tb-5 pl-3"
                        data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Twitter.webp' /> <span class='ml-2'>Login With Twitter</span>">
                        Login With Linkedin</option>
                    <option class="email-auth pad-tb-5 pl-3"
                        data-content="<img height='30' width='30' src='/frontend/images/social-icon/webp/Email.webp' /> <span class='ml-2'>Login With Email</span>">
                        Login With Email</option>
                </select>
            </div>
            @endguest
            <div class="b-r-1 px-3 py-2 d-none d-md-block position-relative">
                <a href="{{ url('/support') }}" class="">
                    {{-- <span class="text-success font-30"><i class="far fa-question-circle"></i></span> --}}
                    <img src="{{ asset('frontend/images/546042c1a6139c4cd7a33a524e77d0e3.svg') }}" alt="support-icon"
                        style="width: 30px; height: 30px;" class="d-inline-block mt-2">
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
            <div class="b-r-1 px-3 py-2 d-none d-md-block">
                <a href="#" id="account-dropdown" class="user" data-toggle="dropdown">
                    <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('frontend/images/user-defult.png') }}"
                        alt="">
                </a>
                <div class="dropdown-menu account dropdown-menu-left py-0" aria-labelledby="account-dropdown">
                    <ul class="list-group list-group-flush font-16">
                        <li class="list-group-item color-main-bg">
                            <a href="{{ url('/upgrade/plans') }}" class="text-white"><span class="mr-2"><i
                                        class="far fa-arrow-alt-circle-up"></i></span>Upgrade</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/profile/') . '/' . Auth::id() }}" class="text-dark"><span
                                    class="mr-2 color-main-text"><i class="far fa-user"></i></span>My profile /
                                Listings</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/lists/offerrooms') }}" class="text-dark"><span
                                    class="mr-2 color-main-text"><i class="fas fa-search"></i></span>Browse Listings</a>
                        </li>
                        <li class="list-group-item d-none d-md-block">
                            <a href="#" class="text-dark" @click.prevent="openVerifyModal()"><span
                                    class="mr-2 color-main-text"><i class="fas fa-user-check"></i></span>Account
                                Verification</a>
                        </li>
                        <li class="list-group-item d-md-none">
                            <a href="{{ url('/verification') }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                        class="fas fa-user-check"></i></span>Account Verification</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/setting') }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                        class="fas fa-cogs"></i></span>Setting</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/support') }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                        class="far fa-comments"></i></span>24/7 Supports</a>
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
                <a href="{{ url('/login') }}" class="color-main-text px-4 py-2 d-inline-block">
                    <span class="font-30 "><i class="fas fa-sign-in-alt"></i></span>
                </a>
            </div>
            @endauth
            <div class="drawer-toggle px-3 pt-2 d-md-none">
                <a href="#" class="color-main-text font-30"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </nav>
</div>