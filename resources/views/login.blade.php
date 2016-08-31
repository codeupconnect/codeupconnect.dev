@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form method="POST" action="{{ action('Auth\AuthController@redirectToProvider') }}">
				{{ csrf_field() }}
			  	<button type="submit" class="btn btn-success">Login</button>
			</form>
		</div>
	</div>
@stop