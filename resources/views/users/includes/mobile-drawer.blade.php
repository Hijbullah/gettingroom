<div class="mobile-drawer">
    <nav class="drawer-nav" role="navigation">
        <div class="drawer-content">
            <div class="user-profile clearfix">
                @if(Auth::check())
                <div class="avatar float-left mr-2">
                    <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('frontend/images/user-defult.png') }}" alt="">
                </div>
                <div class="user-details float-left">
                    <h2 class="font-18 mt-2 text-white">{{ Auth::user()->first_name }}</h2>
                    <a href="#" class="font-16 color-main-text">My Profile</a>
                </div>
                @endif
            </div>
            <ul class="list-group list-group-flush font-16">
                @auth
                <li class="list-group-item color-main-bg">
                    <a href="{{ url('/upgrade/plans') }}" class="text-white"><span class="mr-2"><i
                                class="far fa-arrow-alt-circle-up"></i></span>Upgrade</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('/lists/offerrooms') }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                class="fas fa-search"></i></span>Browse Listings</a>
                </li>
                @else
                <li class="list-group-item">
                    <a href="{{ url('/listingNew') }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                class="fas fa-search"></i></span>Add Your Listings</a>
                </li>
                @endauth

                @auth
                <li class="list-group-item">
                    <a href="{{ url('/profile/') . '/' . Auth::id() }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                class="far fa-user"></i></span>My profile / Listings</a>
                </li>
                <li class="list-group-item d-none d-md-block">
                    <a href="#" class="text-dark" @click.prevent="openVerifyModal()"><span class="mr-2 color-main-text"><i
                                class="fas fa-user-check"></i></span>Account Verification</a>
                </li>
                <li class="list-group-item d-md-none">
                    <a href="{{ url('/verification') }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                class="fas fa-user-check"></i></span>Account Verification</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('/setting') }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                class="fas fa-cogs"></i></span>Setting</a>
                </li>
                @endauth
                <li class="list-group-item">
                    <a href="{{ url('/support') }}" class="text-dark"><span class="mr-2 color-main-text"><i
                                class="far fa-comments"></i></span>24/7 Supports</a>
                </li>
                @auth
                <li class="list-group-item">
                    <a class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form-drawer').submit();">
                        <span class="mr-2 color-main-text"><i class="fas fa-sign-out-alt"></i></span>
                        Logout
                    </a>
            
                    <form id="logout-form-drawer" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                <li class="list-group-item">
                    <a class="text-dark" href="{{ route('login') }}" >
                        <span class="mr-2 color-main-text"><i class="fas fa-sign-out-alt"></i></span>
                        Login
                    </a>
                </li>
                @endauth
            </ul>
            <div class="bottom-btn">
                <select class="selectpicker mr-1" data-width="120px" data-style="custom-picker-drawer">
                    <option>Enlisgh (US)</option>
                </select>
                <select class="selectpicker" data-width="80px" data-style="custom-picker-drawer">
                    <option>USD</option>
                </select>
            </div>
        </div>
    </nav>
</div>