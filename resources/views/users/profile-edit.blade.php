@extends('users.master')

@section('main-content')
<section class="single-user-listing p-2 mt-4">
    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="user-profile bg-white py-5 px-3 mb-2 text-center">
                        <div class="img-holder">
                            <a href="#" title="Change Avatar">
                                <img src="{{ $user->avatar ? $user->avatar : asset('frontend/images/user-defult.png') }}" alt="" class="profile-pic" id="img-holder">
                            </a>
                            <input type="file" name="avatar" class="d-none form-control @error('avatar') is-invalid @enderror" id="profileUpload">
                            @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="single-user-info py-3">
                            <h3 class="font-25">{{ $user->first_name . ' ' . $user->last_name }}</h3>
                            <p class="font-20">{{ Carbon\Carbon::parse($user->dob)->diffInYears(Carbon\Carbon::now()) }}</p>
                        </div>
                        @if($user->avatar)
                        <a href="#" class="btn btn-success w-75 my-4 py-2" id="uploadBtn">
                            Change Profile Picture
                        </a>
                        @else
                        <a href="#" class="btn btn-success w-75 my-4 py-2" id="uploadBtn">
                            Upload Profile Picture
                        </a>
                        @endif
                    </div>
                </div>
    
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="gr-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="languge" class="label">Language</label>
                                            <input name="language" id="language" value="{{ old('language') ? old('language') : $user->language }}" type="text" class="form-control @error('language') is-invalid @enderror" placeholder="English, spanish, ...">
                                            @error('language')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="label">Hometown</label>
                                            <input name="city" id="city" type="text" value="{{ old('city') ? old('city') : $user->city }}" class="form-control @error('city') is-invalid @enderror" placeholder="New york, Washinton DC, ..">
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="dob" class="label">Date of Birth</label>
                                                <input type="date" id="dob" value="{{ old('dob') ? old('dob') : $user->dob }}" name="dob" class="form-control @error('dob') is-invalid @enderror">
                                                @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="gender">Gender</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if(!$user->phone)
                                        <div class="form-group">
                                            <label for="phone" class="label">Phone</label>
                                            <input type="tel" id="phone" value="{{ old('phone') }}" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone number.. with country code...">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        @endif
                                        @if(!$user->email)
                                        <div class="form-group">
                                            <label for="email" class="label">Email</label>
                                            <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email...">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="about" class="label">About Me</label>
                                            <textarea name="about" id="about" rows="5" class="form-control @error('about') is-invalid @enderror" placeholder="About me ...">{{ old('about') ? old('about') : $user->about }}</textarea>
                                            @error('about')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-5 text-center">
                                            <button type="submit" class="btn btn-lg btn-success text-white w-25 mr-2">Update Profile</button>
                                            <a href="{{ route('profile.show', $user->id) }}" class="btn btn-lg btn-warning text-white w-25" >Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

@push('page-script')
    <script>
        $('#uploadBtn').click(function(e){
            e.preventDefault();
            $('#profileUpload').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#img-holder').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
            }
        }
            
        $("#profileUpload").change(function() {
            readURL(this);
        });
    </script>
@endpush

@push('page-css')
<style>
    .img-holder a{
        display: inline-block;
        height: 200px;
        width: 200px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #ddd;
    }  
    .img-holder img{
        height: 100%;
    }  
</style>
@endpush

