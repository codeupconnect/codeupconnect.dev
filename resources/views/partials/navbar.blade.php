
<nav class="navbar navbar-default navbar-fixed-top navbar-custom col-xs-12">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-logo" href="{{ action('HomeController@index') }}">
				<img height="50px" src="/images/header-logo.png">
			</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
	
		<!-- some kinda error here. unsure. -->
		<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
		@if(session()->has('login_' . md5("Illuminate\Auth\Guard")))
				<ul class="nav navbar-nav navbar-right">
			
					<li><a href="{{ action('UsersController@show', Auth::user()->id) }}">Welcome {{ Auth::user()->name }}</a></li>
					<li><a href="/">Home</a></li>
					<li role="separator" class="divider"></li>
					<li id="logout"><a href="{{action('Auth\AuthController@logout')}}">Logout</a></li>
			
				</ul>
		@else
			<ul class="nav navbar-nav navbar-right">
				<li data-slide="1" class="page-scroll"><a id="menu-link-1" href="/#slide-1" title="Next Section">Home</a></li>
				<li data-slide="2" class="page-scroll"><a id="menu-link-2" href="/#slide-2" title="Next Section"> Mission </a></li>
				<li data-slide="3" class="page-scroll"><a id="menu-link-3" href="/#slide-3" title="Next Section"> What's Codeup?</a></li>
				<li data-slide="4" class="page-scroll"><a id="menu-link-4" href="/#slide-4" title="Next Section"> Contact</a></li>
				<li><a href="/admin"> Admin</a></li>
			</ul>
			
		@endif
			
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->

</nav>