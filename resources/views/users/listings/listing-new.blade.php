@extends('users.master')
@section('title', 'Getting Room | Listings')
@section('main-content')
<div class="main-container" v-cloak>
    <listing-new-component user-id = {{ Auth::user()->id }}></listing-new-component>
</div>
@endsection
