@extends('master')

@section('content')

	 <div class="container">
	 	<div class="row">
	 		<div class="col-sm-4" data-value="{{ session('nickname') }}">
	 			<h1 class="{{ session('nickname') }}"> {{session('nickname')}} </h1>
	 		</div>
	 		<div class="col-sm-4" data-value="{{ session('nickname') }}">
	 			<h1 class="{{ session('nickname') }}"> {{session('nickname')}} </h1>
	 		</div>
	 	</div>
@section('bottom-scripts')
	<script>
	 	var name = $(".{{ session('nickname') }}").data();
	 	//really not sure what to do with this ^
	 	//will eventually need to loop through all the database user names
	 	//and use the nickname to find the api content & return the JSON
	</script>
@stop