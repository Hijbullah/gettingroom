@extends('users.master')

@section('main-content')
<!-- content area start-->
<section class="choose-package p-2 mt-5" style="min-height: 60vh">
    <div class="container">
        <div class="row">
            <div class="col-md-11 m-auto">
                <h1 class="p-3 mb-3 font-weight-normal text-center">Thank You!</h1>
                <div class="text-center mb-5">
                    <p class="font-20">You have successfully subscribed.</p>
                    <p class="font-18"><a href="{{ url('/setting#setting-subscriptions') }}" class="color-main-text">Explore about your Plans</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content area end -->
@endsection
