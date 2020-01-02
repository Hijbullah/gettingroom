@extends('users.master')

@section('main-content')
<section v-cloak>
    <need-apartment-edit-form-component listing="{{ $needapartment }}"></need-apartment-edit-form-component>
</section>
@endsection