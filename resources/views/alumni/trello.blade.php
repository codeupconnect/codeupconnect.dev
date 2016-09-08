@extends('layout.master')

@section('head-includes')

	<link href="/css/trello.css" rel="stylesheet">
@section('content')
    
	<form hidden id="operations" action='/accept-project' name='submit' method='post' style='display:none;'>
		{!! csrf_field() !!}
    	<input hidden id="token" value="{{ session()->token() }}">
    	<input hidden id="first-member" name="first_member" value=""></input>
    	<input hidden id="board-name" name="board_name" value=""></input>
    	<input hidden id="project-id" name="project_id" value=""></input>
    	<input hidden id="board-id" name="board_id" value=""></input>
    </form>
    <div class="container">		      
    	<h1>Trello Dashboard</h1>
<!--     	<button id="newBoard">New Board</button>		
      	<form class="form-horizontal" id="boards_form">		        
	      	<div class="form-group">
	      		<label class="control-label">Choose your board</label>
	      	    <select class="form-control" id="boards"></select>		        
	      	</div>    
	    </form> -->
	    <div id="lists">
	    </div>
    </div> 
		    


@section('bottom-scripts')

	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="https://api.trello.com/1/client.js?key=06255aa30ed43a51b57297877330a541"></script>
	<script src="js/trello.js"></script>
@stop