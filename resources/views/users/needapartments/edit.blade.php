@extends('users.master')

@section('main-content')
<section>
    <div class="main-container" v-cloak>
        <need-apartment-edit-form-component listing="{{ $needapartment }}"></need-apartment-edit-form-component>
    </div>
</section>
@endsection