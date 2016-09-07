@extends('layout.master')

@section('content')
<h2 class="title">Edit Project</h2>

<div class="container">	
	<div class="form-container container">
		<h1 id="edit-data">Edit</h1>
		<form>
			@foreach ($project['attributes'] as $data)
		  <div class="form-group">
			<h2 class="static-option">{{ $data }}</h2>
			<input name="{{ $data }}" style="display:none;" type="text" class="form-control edit-option" value="{{ $data }}" >
		  </div>
		  @endforeach

		  @foreach ($boolean['attributes'] as $data)
		  	<h4> {{ $data }} </h4>
		  	@endforeach

		  <div class="radio">
			<label>
			  <input type="radio" name="project" value="accept"> Accept
			</label>
			<label>
			  <input type="radio" name='project' value="reject"> Reject
			</label>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
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