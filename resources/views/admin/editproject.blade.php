@extends('layout.master')

@section('content')
<h2 class="title">Edit Project</h2>

<div class="form-container container">	
	<div class="container">
		<form>
		  <div class="form-group">
			<label>Project Name</label>
			<input type="text" class="form-control" placeholder="Name">
		  </div>
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


@stop