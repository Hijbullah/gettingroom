@extends('users.master')

@section('main-content')
<section class="gr-content pad-tb-20">
    <div class="container-fluid" v-cloak>
        <listing-component type="{{ $type }}"></listing-component>
    </div>    
</section>
@endsection