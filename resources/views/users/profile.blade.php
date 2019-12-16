@extends('users.master')

@section('main-content')
<section class="single-user-listing p-2 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="bg-success py-5 px-3 mb-2 text-center">
                    <p class="text-white mb-3">Account verification is incomplete.</p>
                    <button class="btn btn-light text-success rounded px-3 py-2 w-25">Verify</button>
                </div>
                <div class="user-profile bg-white py-5 px-3 mb-2 text-center">
                    <div class="single-user-img">
                        <a href="#">
                            <img src="{{ asset('frontend/images/user-defult.png') }}" alt="" class="profile-pic">
                            <span class="badge badge-success profile-check"><i class="fas fa-check"></i></span>
                        </a>
                    </div>
                    <div class="single-user-info py-3">
                        <a href="{{ url('/profile') . '/' . $user->id }}" class="text-success"><h3 class="font-25">{{ $user->first_name . ' ' . $user->last_name }}</h3></a>
                        <p class="font-20">{{ Carbon\Carbon::parse($user->dob)->diffInYears(Carbon\Carbon::now()) }}</p>
                    </div>
                    @if(Auth::check() && Auth::user()->id === $user->id)
                    <a href="#" class="btn btn-success w-75 my-4 py-2">
                    Edit Profile
                    </a>
                    @endif
                   
                    <div class="listing-user-social-verify-block font-12">
                        @foreach ($user->identities as $identity)
                            <p class="text-left d-inline-block mr-3">
                                <span class="badge badge-success rounded">
                                    <i class="fas fa-check"></i>
                                </span> {{ ucfirst($identity->provider_name) }} Verified
                            </p>
                        
                        @endforeach
                        {{-- <p class="text-right d-inline-block">
                            <span class="badge badge-success rounded">
                                <i class="fas fa-check"></i>
                            </span> Email Verified
                        </p> --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-12">
                <div class="gr-content pad-tb-20">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">Language: English</li>
                                        <li class="list-group-item">Hometown: London</li>
                                        <li class="list-group-item">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam ipsum laborum ducimus vel nemo quos cupiditate. Perspiciatis doloribus sequi quas non amet! Illo ab exercitationem perspiciatis neque eos iste rem.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if(Auth::check() && Auth::user()->id === $user->id)
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
                        @endif
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
                                                        <img src="{{ $listing->images ? explode(',', $listing->images)[0] : asset('no-image.png') }}" alt="">
                                                    </div>
                                                    <div class="listing-contact mt-1 pb-2 pl-2">
                                                        <h2 class="font-16 my-1 text-dark">{{ $listing->title }}</h2>
                                                        <p class="font-12 mb-3 ">
                                                            <span class="color-main-text">Private Room</span> | <span class="text-dark">{{ $listing->location }}</span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


