@extends('layout.master')

@section('content')

<div class="container">	
	<div class="form-container container">
		<h3 id="header-spacing">{{ $project->organization_name }}</h3>

			@foreach ($data as $key => $value)
				<div class="form-group">
					<h3 class="static-option">{{ $key }}: {{ $value }}</h3>
					<input name="{{ $key }}" style="display:none;" type="text" class="form-control" value="{{ $value }}" >
				</div>
			@endforeach

			@foreach ($boolean as $key => $value)
				@if ($value == 0)
			  	<h4> {{ $key }} </h4>
			  	@endif
			@endforeach

	</div>
</div>

@section('bottom-scripts')


@stop


