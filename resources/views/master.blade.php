<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Stylesheets -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/main.css" rel="stylesheet">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Antic+Slab" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

		<title>CodeupConnect</title>
	
	</head>
	<body>
		
		@include('navbar')
	
		@yield('content')

		@include('footer')

		

		
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/common.js"></script>	
		
		@yield('bottom-scripts')
		
	</body>

</html>