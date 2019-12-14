@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="label">{{ __('First Name') }}</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
    
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="label">{{ __('Last Name') }}</label>
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="birth_day" class="label">{{ __('Day') }}</label>
                                    <select name="birth_day" id="birth_day" class="form-control @error('birth_day') is-invalid @enderror" required>
                                        <option selected disabled>Day</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                        <option {{ old('birth_day') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('birth_day')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="birth_month" class="label">{{ __('Month') }}</label>
                                    <select name="birth_month" id="birth_month" class="form-control @error('birth_month') is-invalid @enderror" required>
                                        <option selected disabled>Month</option>
                                        <option {{ old('birth_month') == '1' ? 'selected' : '' }} value="1">Jan</option>
                                        <option {{ old('birth_month') == '2' ? 'selected' : '' }} value="2">Feb</option>
                                        <option {{ old('birth_month') == '3' ? 'selected' : '' }} value="3">Mar</option>
                                        <option {{ old('birth_month') == '4' ? 'selected' : '' }} value="4">Apr</option>
                                        <option {{ old('birth_month') == '5' ? 'selected' : '' }} value="5">May</option>
                                        <option {{ old('birth_month') == '6' ? 'selected' : '' }} value="6">Jun</option>
                                        <option {{ old('birth_month') == '7' ? 'selected' : '' }} value="7">Jul</option>
                                        <option {{ old('birth_month') == '8' ? 'selected' : '' }} value="8">Aug</option>
                                        <option {{ old('birth_month') == '9' ? 'selected' : '' }} value="9">Sep</option>
                                        <option {{ old('birth_month') == '10' ? 'selected' : '' }} value="10">Oct</option>
                                        <option {{ old('birth_month') == '11' ? 'selected' : '' }} value="11">Nov</option>
                                        <option {{ old('birth_month') == '12' ? 'selected' : '' }} value="12">Dec</option>
                                    </select>
                                    @error('birth_month')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="birth_year" class="label">{{ __('Year') }}</label>
                                    <select name="birth_year" id="birth_year" class="form-control @error('birth_year') is-invalid @enderror" required>
                                        <option selected disabled>Year</option>
                                        @for ($i = 2019; $i >= 1980; $i--)
                                        <option {{ old('birth_year') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('birth_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                    <h2 class="mt-5">Or, Login with: </h2>
                    <div class="form-group">
                        <a href="{{ url('/login/facebook') }}" class="btn btn-primary">Facebook</a>
                        <a href="{{ url('/login/google') }}" class="btn btn-primary">Google</a>
                        {{-- <a href="{{ url('/login/twitter') }}" class="btn btn-primary">Twitter</a> --}}
                        <a href="{{ url('/login/linkedin') }}" class="btn btn-primary">Linkedin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
