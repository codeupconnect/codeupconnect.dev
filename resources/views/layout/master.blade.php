<!DOCTYPE html>
<html lang="en">
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- Stylesheets -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="fancybox/jquery.fancybox-v=2.1.5.css" type="text/css" media="screen">
		<link href="/css/main.css" rel="stylesheet">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Antic+Slab" rel="stylesheet">


		

		<title>CodeupConnect</title>
	
	</head>
	<body>
		
		@include('partials.navbar')
	
		@yield('content')

		@include('partials.footer')

		

		
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/common.js"></script>	
		
		@yield('bottom-scripts')
		
	</body>

</html>