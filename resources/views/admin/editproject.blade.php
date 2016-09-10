@extends('layout.master')

@section('content')
<div class="container">	
	<div class="form-container container">
		<h2 id="edit-data" class="text-center teal-font">Edit and Approve</h2>
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
			<div class="container col-md-3">
				<div class="profile-sidebar">
					<div class="profile-usermenu">
						
							<h4 class="text-center">Additional Preferences</h4>
							<ul class="nav">
								@foreach ($boolean as $key => $value)
									@if ($value == 0)
						  				<li><a> {{ $key }} </a></li>
						  			@endif
								@endforeach
							</ul>
						
					</div>
				</div>
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
 

