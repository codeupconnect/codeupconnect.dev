@extends('layout.master')

@section('content')

@include('partials.single-project-view')

	</div>
</div>
	<div class="container button-container col-xs-12" id="single-button">
 		<div class="col-xs-4" >
 			<form method="POST" action="{{ action('UsersController@acceptInvite') }}">
 	   			{!! csrf_field() !!}  
 				<button name="id" value="{{ $user->id }}" class="btn btn-success" >Accept</button>
 			</form>
 		</div>
 		<div class="col-xs-4 ">
 			<form method="POST" action="{{ action('UsersController@rejectInvite') }}">
 		    	{!! csrf_field() !!}    
 				<button name="id" value="{{ $user->id }}" class="btn btn-danger" >Pass</button>
 			</form>
 		</div>
	</div>
</div>


@stop