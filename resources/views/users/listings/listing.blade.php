@extends('users.master')

@section('main-content')
<section class="pad-tb-20">
    <div class="main-container" v-cloak>
        <div class="container-fluid">
            <keep-alive>
            <component is="listing-component" type="{{ $type }}" lat="{{ session('location')['lat'] }}" lng="{{ session('location')['lng'] }}"></component>
            </keep-alive>    
        </div>   
    </div>
</section>
@endsection