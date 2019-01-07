<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Site management description -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<meta name="description" content="A personal diary">
		<meta name="keywords" content="diary, personal">
		<meta name="author" content="Adeyinka M. Adefolurin">

		<!-- Head content - Favicon & Title -->
		<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
		<title>@yield('title') - DearDiary</title>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

		<!-- jQuery -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>

		<noscript>
        	<meta http-equiv="refresh" content="5; URL=http://www.enable-javascript.com">
        	Your browser does not support JavaScript. Please follow the next steps to enable it.
        </noscript>
	</head>
	<body>
		<div class="">
			@yield('header')

			<div class="offset-lg-3 col-lg-6 offset-md-2 col-md-8">
				@yield('content')
			</div>
		</div>

		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>