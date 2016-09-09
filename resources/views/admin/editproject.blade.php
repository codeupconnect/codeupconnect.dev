@extends('layout.master')

@section('content')
<div class="container">	
	<div class="form-container container">
		<h2 id="edit-data" class="text-center">Edit and Approve</h2>
		<form method="POST" action="{{ action('ProjectsController@update', $boolean['id']) }}"> 
			<div class="edit">
	            {!! csrf_field() !!}
	            {!! method_field('PUT') !!}
				@foreach ($data as $key => $value)
					<div class="form-group">
						<h4 class="static-option">{{ $key }}: {{ $value }}</h4>
						<input name="{{ $key }}" style="display:none;" type="text" class="form-control edit-option" value="{{ $value }}" >
					</div>
				@endforeach
			</div>
			<div class="container edit">
				<h3 class="text-center">Additional Preferences</h3>
					@foreach ($boolean as $key => $value)
						@if ($value == 0)
				  			<h4> {{ $key }} </h4>
				  		@endif
					@endforeach
			</div>

			<button class="btn btn-success" id="single-button">Accept</button>
			

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
 

