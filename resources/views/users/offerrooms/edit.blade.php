@extends('users.master')

@section('main-content')
<section v-cloak>
    <offer-room-edit-form-component listing="{{ $offerroom }}"></offer-room-edit-form-component>
</section>
@endsection