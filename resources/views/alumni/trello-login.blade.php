@extends('layout.master')

@section('head-includes')
	<link href="/css/trello.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
@stop
@section('content')
    
	<form hidden id="operations" action="{{ action('ApiController@createTrelloBoard') }}" name='submit' method='post' style='display:none;'>
		{!! csrf_field() !!}
		<input hidden name="logged-in" value="true">
    	<input type="hidden" id="token" value="{{ session()->token() }}">
    	<input type="hidden" id="board-name" name="board_name" value="">
    	@if (isset($data))
    		<input hidden id="board-id" name="board-id" value="{{ $data['board_id'] }}">
			<input hidden id="project-id" name="project-id" value="{{ $data['project_id'] }}">
    	@else
    		<input type="hidden" id="board-id" name="board_id" value="">
    		<input type="hidden" id="project-id" name="project_id" value="">
		@endif
    </form>
    <div class="col-sm-12 title">
	    <a href="http://trello.com">
	    	<img src="/images/trello-logo.png" height="40px">
	    </a>
	   	<h1 id="project-name">
	   	@if (isset($data))
	   	{{ $data['board_name'] }}	      
	    @endif
	    </h1>	

	    <div id="lists" class="col-sm-12">
	    	<h1> Please Log In to View Your Project Board. </h1>
	    </div>
    </div>
		    
@stop

@section('bottom-scripts')

	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="https://api.trello.com/1/client.js?key=06255aa30ed43a51b57297877330a541"></script>
	<script src="js/trello.js"></script>
@stop