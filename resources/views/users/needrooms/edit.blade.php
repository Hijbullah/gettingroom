@extends('users.master')

@section('main-content')
<section v-cloak>
    <need-room-edit-form-component listing="{{ $needroom }}"></need-room-edit-form-component>
</section>
@endsection