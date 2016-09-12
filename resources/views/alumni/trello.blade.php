@extends('layout.master')

@section('head-includes')
	<link href="/css/trello.css" rel="stylesheet">
@stop

@section('content')
	<div id="operations">
		<input hidden name="logged-in" value="true">
		<input hidden name="board-id" value="{{ $data['board_id'] }}">
		<input hidden name="project-id" value="{{ $data['project_id'] }}">
	</div>
	<div class="container">
	    <div id="title" class="col-sm-12">
	    	<h1 id="board-name">{{ $data['board_name'] }}</h1>		      
		    <div id="lists" class="container text-center">
		    </div>
	    </div>    
	</div>
@stop

@section('bottom-scripts')

	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="https://api.trello.com/1/client.js?key=06255aa30ed43a51b57297877330a541"></script>
	<script src="js/trello.js"></script>
@stop