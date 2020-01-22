<!DOCTYPE html>
<html>
<head>
  @yield('title')
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('page-title')</title>
  <link href="{{ asset('admins/css/app.css') }}" rel="stylesheet">
   @stack('page-css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('admins.include.nav')


  @include('admins.include.sidebar')


  <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col">
              <h1 class="m-0 text-dark">@yield('page-header')</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        @yield('main-content')
      </section>
  </div>

 
  @include('admins.include.footer')


</div>
<script src="{{ asset('admins/js/app.js') }}"></script>
@stack('page-script')

</body>
</html>
