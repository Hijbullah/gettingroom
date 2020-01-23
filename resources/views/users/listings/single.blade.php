@extends('users.master')
@section('title', $title->title)
@section('main-content')
<div class="main-container" v-cloak>
    <single-listing-component type="{{ $type }}" :subscribed="{{ (Auth::check() && Auth::user()->subscribed('default')) ? 1 : 0 }}" :auth-id="{{ Auth::check() ? Auth::id() : 'null' }}" listing-id="{{ $listing_id }}"></single-listing-component>
</div>
@endsection