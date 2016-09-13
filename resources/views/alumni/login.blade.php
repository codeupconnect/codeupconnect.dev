@extends('layout.master')



@section('content')
	<h1 class="header-title text-center title teal-font">Login</h1>
	<div class="container-fluid col-xs-12">
		<div class="edit text-center login-margins col-xs-3">
			<h2>Welcome to CodeupConnect!</h2>

			<h3 class="teal-font">You’ve learned a ton and earned your skills.</h3> 

			<h4 class="text-left login-font">Whether you are looking for the job of your dreams, or already landed it, we know that the more we code, the better we get.<p></p>
				<p>CodeupConnect connects you, your fellow Codeup grads, and the San Antonio community organizations in need of web development help. Gain valuable experience, team building and organizational skills while working on exciting projects that help our community.</p> 
				 </h4>
			
		</div>
		<div class="edit login-margins col-xs-3">
			<h2 class="teal-font text-center">How Does it Work?</h2>
			<div class="login-font">
				 <h4><i class="fa fa-plus-square-o" aria-hidden="true"></i>   A queue is set up for grads that want to work on projects</h4>
				 <h4><i class="fa fa-plus-square-o" aria-hidden="true"></i>  A queue is set up for projects</h4>
				 <h4><i class="fa fa-plus-square-o" aria-hidden="true"></i>  CodeupConnect connects the grad to a project (grads can ‘PASS’ on a project if they want)</h4>
				 <h4><i class="fa fa-plus-square-o" aria-hidden="true"></i>  Once the grad accepts the project he/she can solicit and choose a teammate, or two, from anyone in the queue</h4>
				 <h4><i class="fa fa-plus-square-o" aria-hidden="true"></i>  Set up a meeting with the organization</h4>
				 <h4><i class="fa fa-plus-square-o" aria-hidden="true"></i>  Work with your team with the use of our Trello API</h4>
				 <h4><i class="fa fa-plus-square-o" aria-hidden="true"></i>  Code away!</h4>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-md-3" id="github-btn">
				<a href="/login" class="btn btn-block btn-social btn-lg btn-github">
				<i class="fa fa-github"></i>Sign in with Github
				</a>
			</div>
		</div>
	</div>
</div>
@stop