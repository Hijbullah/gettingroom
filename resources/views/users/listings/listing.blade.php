@extends('users.master')

@section('main-content')
<section class="gr-content pad-tb-20">
    <div class="main-container" v-cloak>
        <div class="container-fluid">
            <listing-component type="{{ $type }}" lat="{{ session('location')['lat'] }}" lng="{{ session('location')['lng'] }}"></listing-component>
        </div>   
    </div>
</section>
@endsection