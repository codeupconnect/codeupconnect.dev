
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
			<a class="navbar-brand" href="/">CodeupConnect</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
	
		<!-- some kinda error here. unsure. -->
		@if(session()->has('login_' . md5("Illuminate\Auth\Guard")))
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
		 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome {{ Auth::user()->name }}<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{{ action('UsersController@show', Auth::user()->id) }}">Profile</a></li>
					<li><a href="#">Team Hub</a></li>
					<li role="separator" class="divider"></li>
					<li id="logout"><a href="{{action('Auth\AuthController@logout')}}">Logout</a></li>
				</ul>
			</li>	
		</ul>
		@else
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li data-slide="2"><a id="menu-link-2" href="/#slide-2" title="Next Section">Mission </a></li>
				<li><a>|</a></li>
				<li data-slide="3"><a id="menu-link-3" href="/#slide-3" title="Next Section">Portfolio</a></li>
				<li><a>|</a></li>
				<li data-slide="4"><a id="menu-link-4" href="/#slide-4" title="Next Section">Featured Freelancers</a></li>
				<li><a>|</a></li>
				<li><a href="/admin">Admin</a></li>
			</ul>
			
		@endif
			
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->

</nav>