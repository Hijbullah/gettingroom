@extends('users.master')
@section('title', 'Getting Room | Profile')
@section('main-content')
<section class="single-user-listing p-2 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-12">
                @if((Auth::check() && Auth::id() === $user->id) && (!$user->email_verified || !$user->phone_verified || !$user->subscribed('default')) )
                <div class="bg-success py-5 px-3 mb-2 text-center">
                    <p class="text-white mb-3">Account verification is incomplete.</p>
                    <a href="#" @click.prevent="openVerifyModal()" class="btn btn-light text-success rounded px-3 py-2 w-25 d-none d-md-inline-block">Verify</a>
                    <a href="{{ url('/verification') }}" class="btn btn-light text-success rounded px-3 py-2 w-25 d-md-none">Verify</a>
                </div>
                @endif
                <div class="user-profile bg-white py-5 px-3 mb-2 text-center">
                    <div class="single-user-img">
                        <a href="{{ url('/profile') . '/' . $user->id }}">
                            <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('frontend/images/user-defult.png') }}" alt="" class="profile-pic">
                        </a>
                    </div>
                    <div class="single-user-info py-3">
                        <a href="{{ url('/profile') . '/' . $user->id }}" class="text-success">
                            <h3 class="font-25 profile-name">
                                {{ $user->first_name . ' ' . $user->last_name }}
                                @if($user->email_verified && $user->phone_verified && $user->subscribed('default'))
                                <span class="badge badge-success profile-check"><i class="fas fa-check"></i></span>
                                @else
                                <span class="badge badge-secondary profile-check"><i class="fas fa-check"></i></span>
                                @endif
                            </h3>
                        </a>
                       
                        @if($user->dob)
                        <p class="font-20">{{ $user->dob ? Carbon\Carbon::parse($user->dob)->diffInYears(Carbon\Carbon::now()) : '' }}</p>
                        @endif
                    </div>
                    @if(Auth::check() && Auth::id() === $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-success w-75 my-4 py-2">
                        Edit Profile
                    </a>
                    @endif
                   
                    <div class="listing-user-social-verify-block font-12">
                        @if($user->email_verified)
                        <p class="text-right d-inline-block m-2">
                            <span class="badge badge-success rounded">
                                <i class="fas fa-check"></i>
                            </span> Email
                        </p>
                        @endif

                        @if($user->facebook_verified)
                        <p class="text-right d-inline-block m-2">
                            <span class="badge badge-success rounded">
                                <i class="fas fa-check"></i>
                            </span> Facebook
                        </p>
                        @endif

                        @if($user->twitter_verified)
                        <p class="text-right d-inline-block m-2">
                            <span class="badge badge-success rounded">
                                <i class="fas fa-check"></i>
                            </span> Twitter
                        </p>
                        @endif

                        @if($user->instagram_verified)
                        <p class="text-right d-inline-block m-2">
                            <span class="badge badge-success rounded">
                                <i class="fas fa-check"></i>
                            </span> Instagram
                        </p>
                        @endif

                        @if($user->google_verified)
                        <p class="text-right d-inline-block m-2">
                            <span class="badge badge-success rounded">
                                <i class="fas fa-check"></i>
                            </span> Google
                        </p>
                        @endif

                        @if($user->linkedin_verified)
                        <p class="text-right d-inline-block m-2">
                            <span class="badge badge-success rounded">
                                <i class="fas fa-check"></i>
                            </span> Linkedin
                        </p>
                        @endif

                        @if($user->phone_verified)
                        <p class="text-right d-inline-block m-2">
                            <span class="badge badge-success rounded">
                                <i class="fas fa-check"></i>
                            </span> Phone
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7 col-12">
                <div class="gr-content">
                    <div class="row">
                        @if (session('status'))
                        <div class="col">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                        @endif
                        @if($user->language || $user->city || $user->about)
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul class="list-group">
                                        @if($user->language)
                                        <li class="list-group-item"><b>Language: </b> {{ $user->language }}</li>
                                        @endif
                                        @if($user->city)
                                        <li class="list-group-item"><b>Hometown: </b> {{ $user->city }}</li>
                                        @endif
                                        @if($user->about)
                                        <li class="list-group-item" style="min-height: 100px;">{{ $user->about }}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(Auth::check() && Auth::id() === $user->id)
                        <div class="col-md-12">
                            <nav class="navbar nav nav-fill mb-3 font-16">
                                <li>
                                    <p>Listings({{ count($listings) }})</p>
                                </li>
                                <li>
                                    <a href="{{ url('/listingNew') }}" class="text-right color-main-text">
                                        <i class="fas fa-plus-circle"></i> add new listing
                                    </a>
                                </li>
                            </nav>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="listing-area">
                                <div class="grid-view">
                                    <div class="row">
                                        @foreach ($listings as $listing)
                                        <div class="col-md-6">
                                            <a href="{{ url('/listings') . '/' .$listing->listing_id }}">
                                                <div class="listing-single bg-white mar-bot-20 shadow-sm">
                                                    <div class="listing-img">
                                                        <div class="img-text-top clearfix w-100 px-3 py-2">
                                                            <div class="float-right text-light">
                                                                <span class="mr-2 font-14">{{ $listing->created_at->diffForHumans() }}</span> <br />
                                                            </div>
                                                        </div>
                                                        <div class="img-text-bottom clearfix w-100 p-2">
                                                            <div class="float-left text-light">
                                                                <span class="font-30 font-weight-bold">
                                                                    <sup class="font-20">$</sup> {{ $listing->monthly_rent }} <sup class="font-20">{{ $listing->rental_currency }}</sup>
                                                                </span>
                                                                <span class="font-20 font-weight-bold">per month</span>
                                                            </div>
                                                           
                                                        </div>
                                                        <img src="{{ $listing->images ? Storage::url(explode(',', $listing->images)[0]) : asset('no-image.png') }}" alt="" style="height: 200px;">
                                                    </div>
                                                    <div class="listing-contact mt-1 pb-2 pl-2">
                                                        <h2 class="font-16 my-1 text-dark">{{ str_limit($listing->title , 30) }}</h2>
                                                        <p class="font-12 mb-3 ">
                                                            <span class="text-dark">{{ str_limit($listing->location, 30) }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


