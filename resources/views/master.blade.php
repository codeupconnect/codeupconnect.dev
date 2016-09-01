<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Stylesheets -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/main.css" rel="stylesheet">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Antic+Slab" rel="stylesheet">

		<title>CodeupConnect</title>
	
	</head>
	<body>
		
		@include('navbar')
	
		@yield('content')


		@include('footer')
		

		
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script   src="https://code.jquery.com/jquery-3.1.0.slim.min.js"   integrity="sha256-cRpWjoSOw5KcyIOaZNo4i6fZ9tKPhYYb6i5T9RSVJG8="   crossorigin="anonymous"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/common.js"></script>
		
	</body>

</html>