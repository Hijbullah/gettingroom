<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }}">
		<link rel="manifest" href="{{ asset('frontend/images/site.webmanifest') }}">
		<link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free-5.11.2-web/css/all.min.css') }}">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap-select-1.13.9/dist/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/autocomplete.css') }}">
        @stack('page-css')
		<title>Getting Room | Home</title>
	</head>
	<body>
        <div id="app">
            @include('users.includes.nav')
            <main>
                @yield('main-content')
            </main>
            
            @include('users.includes.footer')
        </div>
		
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('frontend/plugins/bootstrap-select-1.13.9/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('js/placeAutocomplete.js') }} "></script>
        <script src="{{ asset('frontend/js/main.js') }} "></script>
        @stack('page-script')
	</body>
</html>