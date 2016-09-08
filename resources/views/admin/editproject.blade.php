@extends('layout.master')

@section('content')
<h2 class="title">Edit/Accept Project</h2>

<div class="container">	
	<div class="form-container container">
		<h1 id="edit-data">Edit and Approve</h1>
		<form method="POST" action="{{ action('ProjectsController@update', $boolean['id']) }}">
            {!! csrf_field() !!}
			@foreach ($data as $key => $value)
				<div class="form-group">
					<h3 class="static-option">{{ $key }}: {{ $value }}</h3>
					<input name="{{ $key }}" style="display:none;" type="text" class="form-control edit-option" value="{{ $value }}" >
				</div>
			@endforeach

			@foreach ($boolean as $key => $value)
				@if ($value == 0)
			  	<h4> {{ $key }} </h4>
			  	@endif
			@endforeach

			<a type="submit" class="btn btn-success">Accept</a>
		</form>
	</div>
</div>

@section('bottom-scripts')

	<script>
		$('#edit-data').on('click', function()
		{
			$('.static-option').toggle();
			$('.edit-option').toggle();
		})
	</script>

@stop
 

