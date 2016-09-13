<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- Stylesheets -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/main.css" rel="stylesheet">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Lato|Source+Sans+Pro" rel="stylesheet">

		<link rel="shortcut icon" href="images/icon.png" type="favicon/ico" />

		@yield('head-includes')		

		<title>CodeupConnect</title>
	
	</head>
	<body>
		
		@include('partials.navbar')

		@if (Auth::check() && Auth::user()->invite != null)
			{{ session(['invite' => Auth::user()->invite]) }}
		@else
			{{ session()->forget('invite') }}
		@endif
		
		@yield('content')

		
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/common.js"></script>	
		<script src="/js/trello-logout.js"></script>
		@yield('bottom-scripts')

		
	</body>

</html>