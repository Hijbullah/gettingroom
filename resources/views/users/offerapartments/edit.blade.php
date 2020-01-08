@extends('users.master')

@section('main-content')
<section class="main-container" v-cloak>
    <offer-apartment-edit-form-component listing="{{ $offerapartment }}"></offer-apartment-edit-form-component>
</section>
@endsection