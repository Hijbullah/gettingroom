@extends('users.master')

@section('title', 'Getting Room | Messenger')

@section('main-content')
<section class="messenger mb-5 main-container">
    <messenger-component :user="{{ Auth::user() }}"></messenger-component>
</section>
@endsection


