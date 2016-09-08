@extends('layout.master')

@section('content')

<h2 class="title">Your Project, Should You Choose to Accept It</h2>

<div class="container">	
	
	<h4>Project</h4>
	<p><textarea>Yay project</textarea></p>
</div>
<div class="container button-container">	  
	  <a type="button" href="{{ action('UsersController@acceptInvite', $user->id) }}" class="btn btn-success" >Accept</a>
	  <a type="submit" href="{{ action('UsersController@rejectInvite', $user->id) }}" class="btn btn-danger" >Reject</a>
</div>




@stop