<!DOCTYPE html>
<html lang="en">
	<head>
		@if (Auth::check() && Auth::user()->invite != null)
			{{ session(['invite' => Auth::user()->invite]) }}
		@elseif (Auth::check() && Auth::user()->invite != 0)
			{{ session()->forget('invite') }}
		@endif
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- Stylesheets -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="fancybox/jquery.fancybox-v=2.1.5.css" type="text/css" media="screen">
		<link href="/css/main.css" rel="stylesheet">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Antic+Slab" rel="stylesheet">

		@yield('head-includes')		

		<title>CodeupConnect</title>
	
	</head>
	<body>
		<div id="wrapper">
		
		@include('partials.navbar')

		
		@yield('content')

		
		</div>
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/common.js"></script>	
		
		@yield('bottom-scripts')

		
	</body>

</html>