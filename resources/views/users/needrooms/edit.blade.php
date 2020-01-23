@extends('users.master')
@section('title', 'Getting Room | Looking for a room')
@section('main-content')
<section>
    <div class="main-container" v-cloak>
        <need-room-edit-form-component listing="{{ $needroom }}"></need-room-edit-form-component>
    </div>
</section>
@endsection