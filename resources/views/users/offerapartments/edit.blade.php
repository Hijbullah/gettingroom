@extends('users.master')

@section('main-content')
<section v-cloak>
    <offer-apartment-edit-form-component listing="{{ $offerapartment }}"></offer-apartment-edit-form-component>
</section>
@endsection