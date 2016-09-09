@extends('layout.master')

@section('head-includes')

	<link href="/css/trello.css" rel="stylesheet">
@stop
@section('content')
    
	<form hidden id="operations" action="{{ action('ApiController@createTrelloBoard') }}" name='submit' method='post' style='display:none;'>
		{!! csrf_field() !!}
		<input hidden name="logged-in" value="true">
    	<input type="hidden" id="token" value="{{ session()->token() }}">
    	<input type="hidden" id="board-id" name="board_id" value="">
    	<input type="hidden" id="board-name" name="board_name" value="">
    	<input type="hidden" id="project-id" name="project_id" value="">
    </form>
    <div class="container">		      
<!--     	<button id="newBoard">New Board</button>		
      	<form class="form-horizontal" id="boards_form">		        
	      	<div class="form-group">
	      		<label class="control-label">Choose your board</label>
	      	    <select class="form-control" id="boards"></select>		        
	      	</div>    
	    </form> -->
	    <div id="lists" class="container text-center">
	    	<br><br><br>
	    	<h1> Please wait while we redirect you to your board. </h1>
	    </div>
    </div> 
		    
@stop

@section('bottom-scripts')

	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="https://api.trello.com/1/client.js?key=06255aa30ed43a51b57297877330a541"></script>
	<script src="js/trello.js"></script>
@stop