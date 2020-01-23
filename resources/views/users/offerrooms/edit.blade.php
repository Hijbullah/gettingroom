@extends('users.master')
@section('title', 'Getting Room | Offering a room')
@section('main-content')
<section class="main-container" v-cloak>
    <offer-room-edit-form-component listing="{{ $offerroom }}"></offer-room-edit-form-component>
</section>
@endsection