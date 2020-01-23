@extends('users.master')
@section('title', 'Getting Room | An entire apartment')
@section('main-content')
<section>
    <div class="main-container" v-cloak>
        <need-apartment-edit-form-component listing="{{ $needapartment }}"></need-apartment-edit-form-component>
    </div>
</section>
@endsection