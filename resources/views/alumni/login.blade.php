@extends('layout.master')



@section('content')
	<h1 class="header-title text-center title teal-font">Login</h1>
	<div class="container-fluid col-xs-12">
		<div class="edit text-center login-margins col-xs-3">
			<h2>Welcome to CodeupConnect!</h2>
			<h3 class="teal-font">You’ve learned a ton and earned your skills.</h3> 
			<h4 class="text-left">Whether you are looking for the job of your dreams, or already landed it, we know that the more we code, the better we get. CodeupConnect connects you, your fellow Codeup grads, and the San Antonio community organizations in need of web development help. Gain valuable experience, team building and organizational skills while working on exciting projects that help our community. </h4>
			
		</div>
		<div class="edit login-margins col-xs-3">
			<h2 class="teal-font text-center">How Does it Work?</h2>
			<ol>
				<li> A queue is set up for grads that want to work on projects</li>
				<li> A queue is set up for projects</li>
				<li> CodeupConnect connects the grad to a project (grads can ‘PASS’ on a project if they want)</li>
				<li> Once the grad accepts the project he/she can solicit and choose a teammate, or two, from anyone in the queue</li>
				<li> Set up a meeting with the organization</li>
				<li> Work with your team with the use of our Trello API</li>
				<li> Code away!</li>
			</ol>
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