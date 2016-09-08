@if (session()->has('invite'))
	<div class="row">
		<div id="alert-notification" class="alert alert-warning" role="alert">
		  <a href="{{ action('ProjectsController@viewInvite') }}"><strong>Heads up!</strong> You have a project invitation to view.</a>
		</div>
	</div>
@endif