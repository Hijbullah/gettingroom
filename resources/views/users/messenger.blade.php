@extends('users.master')

@section('main-content')
<section class="messenger mb-5">
    <messenger-component :user="{{ Auth::user() }}"></messenger-component>
</section>
@endsection


