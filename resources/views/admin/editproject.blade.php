<div class="col-xs-6 no-pad" id="user-info" data-value="{{ $user->url }}">

 @section('content')
  <h2 class="title">Edit Project</h2>

<<<<<<< HEAD
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
=======
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
>>>>>>> 5bc2ebea2ae4f4b0468e4eb9b78fbf4e0229ddc3
