@extends('layout.master')

@section('content')
<h2 class="title">Edit Profile</h2>

<div class="container">	
	<div class="form-container container">
		<form>
		  <div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" placeholder="Name">
		  </div>
		  <div class="form-group">
			<label for="exampleInputFile">Upload Résumé</label>
			<input type="file" id="exampleInputFile">
		  </div>
		  <div class="checkbox">
			<label>
			  <input type="checkbox"> Preference
			</label>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>

	<h6 id="footnote">*Please note that we pull your profile information from Github so if you would like to change your picture or other information not listed on this page, you will have to visit Github to do so*</h6>
</div>
@stop

