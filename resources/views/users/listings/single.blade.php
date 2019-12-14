@extends('users.master')

@section('main-content')
<div v-cloak>
    <single-listing-component type="{{ $type }}" :auth-id="{{ Auth::check() ? Auth::id() : 'null' }}" listing-id="{{ $listing_id }}"></single-listing-component>
</div>
@endsection