@extends('users.master')

@section('main-content')
<section class="support pad-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p class="font-18"><strong>Error!</strong> Please, provide the all required info.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="font-18"><strong>Success!</strong> {{ session('status') }}.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="col-12">
                <h2 class="font-40 font-weight-normal text-center mb-4">24/7 Support</h2>
                <p class="bg-white p-3 text-danger font-18 font-weight-bold text-center radius-10">Important notice! GettingRoom will NEVER ask you to wire funds using Western Union, MoneyGram or a bank account.</p>
            </div>
        </div>    
        <div class="quick-links border-bottom pad-tb-40 py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="font-18 mb-3">Quick Links</h4>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('/profile/' . Auth::id()) }}" class="link">
                                Edit Profile
                                <i class="fas fa-angle-right font-16 float-right"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/setting#setting-account') }}" class="link">
                                Delete Account
                                <i class="fas fa-angle-right font-16"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/setting#setting-subscriptions') }}" class="link">
                                Cancel Subscriptions
                                <i class="fas fa-angle-right font-16"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/setting#setting-notifications') }}" class="link">
                                Notifications
                                <i class="fas fa-angle-right font-16"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/setting#setting-transctions') }}" class="link">
                                Transaction History
                                <i class="fas fa-angle-right font-16"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/setting#setting-account') }}" class="link">
                                Disable Account
                                <i class="fas fa-angle-right font-16"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/setting#setting-transctions') }}" class="link">
                                Prof of Subscription Purchase
                                <i class="fas fa-angle-right font-16"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="support-messages">
            @foreach ($messages as $message)
            <div class="message pad-tb-30 border-bottom">
                <div class="row">
                    <div class="col-md-4">
                        @if($message->admin)
                        <div class="info clearfix mb-3">
                            <img class="float-left" src="{{ asset('frontend/images/logo-sm.png') }}" alt="Logo">
                            <div class="title float-left ml-3 mt-1">
                                @if($message->admin == 'admin')
                                <p class="font-20 text-dark">Customer Support</p>
                                @else
                                <p class="font-20 text-dark">{{ $message->admin }}</p>
                                @endif
                                <span class="date font-16 d-block">{{ $message->created_at->toDayDateTimeString() }}</span>
                            </div>
                        </div>
                        @else
                        <div class="info clearfix mb-3">
                            <img class="float-left"
                                src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('frontend/images/user-defult.png') }}" alt="Logo">
                            <div class="title float-left ml-3 mt-1">
                                <p class="font-20 text-dark">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                                <span class="date font-16 d-block">{{ now()->toDayDateTimeString() }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="messate-text bg-white p-3 radius-10">
                            @if($message->subject)
                            <h4 class="font-20">{{ $message->subject }}</h4>
                            @endif
                            <p class="mt-2 font-16">
                                {!! $message->message !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="message-box message pad-tb-30 border-bottom">
            <div class="row">
                <div class="col-md-4">
                    <div class="info clearfix mb-3">
                        <img class="float-left"
                            src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('frontend/images/user-defult.png') }}"
                            alt="Logo">
                        <div class="title float-left ml-3 mt-1">
                            <p class="font-20 text-dark">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                            <span class="date font-16 d-block">{{ now()->toDayDateTimeString() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="support-form">
                        <form action="{{ url('/support') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <select name="subject" class="selectpicker show-tick" data-width="100%"
                                    data-style="custom-picker">
                                    <option>General</option>
                                    <option>Bug Report</option>
                                    <option>Feedback & Suggestions</option>
                                    <option>Help & Support</option>
                                    <option>Billing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Type your Message"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success btn-lg w-50">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


