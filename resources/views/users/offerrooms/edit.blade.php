@extends('users.master')

@section('main-content')
<section class="main-container" v-cloak>
    <offer-room-edit-form-component listing="{{ $offerroom }}"></offer-room-edit-form-component>
</section>
@endsection