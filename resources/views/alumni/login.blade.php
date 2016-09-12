@extends('layout.master')



@section('content')
<div class="container title teal-font text-center">
	<h1 class="header-title">Login</h1>
	<div class="row edit">
		<h2>Welcome to CodeupConnect!</h2>
		<h3 class="teal-font">We are here to help you add projects to your portfolio so you keep up with your coding skills.</h3>
		<h4>We are reaching out to non-profit organizations and charities in need of website redesigns or just a website in general and when you add yourself to our Users Queue, we will send you a project invitation once we have a project ready for you.</h4>
		<div class="col-md-6 col-md-offset-3 " id="login">
			<a href="/login" class="btn btn-block btn-social btn-lg btn-github">
			<i class="fa fa-github"></i>
			Sign in with Github
			</a>
		</div>
	</div>
</div>
@stop