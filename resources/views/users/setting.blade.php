@extends('users.master')
@section('title', 'Getting Room | Setting')
@section('main-content')
<section class="setting p-2 mt-4">
    <div class="container">
        <div class="row">
            @if(session('status'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="font-18"><strong>Success!</strong> {{ session('status') }}.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            
            <div class="col-md-8 offset-md-2">
                <h2 class="setting-header text-center mb-5">Setting</h2>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Email</h4>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-2">{{ Auth::user()->email }}</p>
                            <a href="#" class="color-main-text {{ $errors->has('email') ? 'd-none' : ' '  }}" id="change-email-button">Change Email</a>
                            <div class="email-block main-color-border radius-10 p-3 {{ $errors->has('email') ? ' ' : 'd-none'  }}" id="change-email-form">
                                <form action="{{ url('/setting/email') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" 
                                            id="email-form" 
                                            name="email" 
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}"
                                            placeholder="Enter a valid Email..." autocomplete="off" required autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Change Email</button>
                                        <button class="btn btn-warning" id="change-email-cancel">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Password</h4>
                        </div>
                        <div class="col-sm-9">
                            <a href="#" class="color-main-text {{ $errors->has('password') ? 'd-none' : '' }}" id="change-pass-button">Change Password</a>
                            <div class="password-block main-color-border radius-10 p-3 {{ $errors->has('password') ? '' : 'd-none' }}" id="change-pass-form">
                                <form action="{{ url('/setting/password') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <input type="password"
                                            id="pass-form"
                                            name="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                            placeholder="New Password"
                                            autocomplete="new-password" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror   
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Chage password</button>
                                        <button class="btn btn-warning" id="change-pass-cancel">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Language</h4>
                        </div>
                        <div class="col-sm-9">
                            <select class="selectpicker show-tick" data-style="custom-picker">
                                <option selected>English</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Currency</h4>
                        </div>
                        <div class="col-sm-9">
                            <select class="selectpicker show-tick" data-style="custom-picker">
                                <option selected>USD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3" id="setting-notifications">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="font-18 mb-3">Notifications</h4>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-2 color-main-text">Gettingroom notification settings allow you to control what notifications get
                                delivered via email to {{ Auth::user()->email }}</p>
                            <p class="py-2">New messages waiting <span class="d-sm-none"><br></span> in your mailbox
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                            <p class="py-2">Helpdesk activity updates
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                            <p class="py-2">Daily matches
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                            <p class="py-2">General account updates
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3" id="setting-account">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Status</h4>
                        </div>
                        <div class="col-sm-9">
                            <p>Active. Visible to Gettingroom <span class="d-sm-none"><br></span> users
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                            <a href="#" class="color-main-text">Delete Account</a>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3" id="setting-subscriptions">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Subscription</h4>
                        </div>
                        <div class="col-sm-9">
                            @if(!Auth::user()->subscribed('default'))
                                <p class="mb-3 font-weight-bold">You are a free user.</p>
                                <p class="mb-3">Upgrade and Unlock Gettingroom Mailbox <br> and Gettingroom Social Connect</p>
                                <a href="/upgrade/plans" class="btn btn-warning font-18">Upgrade Your Account</a>
                            @elseif(Auth::user()->subscription('default')->onGracePeriod())
                                <p class="mb-3">
                                    You have cancelled your Subscription. <br>
                                    Your subscription Period will end at <span class="color-main-text">{{ Auth::user()->subscriptions->first()->ends_at->toDayDateTimeString() }}</span><br>
                                    Till that you have fully access of the <span class="color-main-text font-wight-bold">Gettingroom Mailbox and Social Connect</span>
                                </p>
                                @if(Auth::user()->subscribedToPlan('311', 'default'))
                                <p class="mb-3">Your plan was: 5 Days at $9.99</p>
                                @endif
                                
                                @if(Auth::user()->subscribedToPlan('312', 'default'))
                                <p class="mb-3">Your plan was: 15 Days at $24.99</p>
                                @endif
                                
                                @if(Auth::user()->subscription('default')->onTrial())
                                <p class="mb-3">
                                    Your ware at 1 day Trial Period. <br>
                                </p>
                                @endif
                                
                                @if(Auth::user()->subscribedToPlan('313', 'default') && !Auth::user()->subscription('default')->onTrial())
                                <p class="mb-3">Your plan was: 30 Days at $39.99</p>
                                @endif
                            @else
                                <p class="font-weight-bold text-center text-sm-left">You are a Premium user.</p>
                                <p class="mb-3">Now you have fully access of the <span class="color-main-text font-wight-bold">Gettingroom Mailbox and Social
                                    Connect</span></p>
                                @if(Auth::user()->subscribedToPlan('311', 'default'))
                                <p class="mb-3">Your plan is: 5 Days at $9.99</p>
                                @endif

                                @if(Auth::user()->subscribedToPlan('312', 'default'))
                                <p class="mb-3">Your plan is: 15 Days at $24.99</p>
                                @endif

                                @if(Auth::user()->subscription('default')->onTrial())
                                <p class="mb-3">
                                    Your are at 1 day Trial Period. <br>
                                    After 1 Day you will autometically subscribe to 30 Days at $39.99.
                                </p>
                                @endif

                                @if(Auth::user()->subscribedToPlan('313', 'default') && !Auth::user()->subscription('default')->onTrial())
                                <p class="mb-3">Your plan is: 30 Days at $39.99</p>
                                @endif
                                <a href="/upgrade/cancel" class="btn btn-warning font-18">Cancel Subscription</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="setting-box py-3" id="setting-transctions">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mb-3 font-18">Transactions</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="color-main-text">
                                        <th>Date</th>
                                        <th>Duration</th>
                                        <th>price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(Auth::user()->subscribed('default'))
                                        @foreach (Auth::user()->invoices() as $invoice)
                                            <tr>
                                                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                                <td> 
                                                    @foreach ($invoice->subscriptions() as $subscription)
                                                            {{ $subscription->startDateAsCarbon()->formatLocalized('%B %e, %Y') }} -
                                                            {{ $subscription->endDateAsCarbon()->formatLocalized('%B %e, %Y') }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $invoice->total() }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page-script')
<script>
    $('#change-email-button').click(function(e){
        e.preventDefault();
        $(this).addClass('d-none');
        $('#change-email-form').removeClass('d-none');
    });
    $('#change-email-cancel').click(function(e){
        e.preventDefault();
        $('#email-form').val('');
        $('#email-form').removeClass('is-invalid');
        $('#change-email-form').addClass('d-none');
        $('#change-email-button').removeClass('d-none');
    });
    $('#change-pass-button').click(function(e){
        e.preventDefault();
        $(this).addClass('d-none');
        $('#change-pass-form').removeClass('d-none');
    });

    $('#change-pass-cancel').click(function(e){
        e.preventDefault();
        $('#pass-form').val('');
        $('#pass-form').removeClass('is-invalid');
        $('#change-pass-form').addClass('d-none');
        $('#change-pass-button').removeClass('d-none');
    })
</script>
@endpush

