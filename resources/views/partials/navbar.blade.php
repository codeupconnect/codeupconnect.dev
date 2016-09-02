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
			<a class="navbar-brand" href="#">CodeupConnect</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="#">Mission </a></li>
				<li><a>|</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a>|</a></li>
				<li><a href="#">Featured Freelancers</a></li>
				<li><a>|</a></li>
				<li><button type="button" class="btn btn-default navbar-btn">Make a Request!</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">

			@if (isset($_SESSION))

				<li class="dropdown">
			 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Profile</a></li>
							<li><a href="#">Edit Profile</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
				</li>	
			@else
				<div>
					<li>
						<a href="/login" class="btn btn-block btn-social btn-lg btn-github">
						<i class="fa fa-github"></i>
						Sign in with Github
						</a>
					</li>
				</div>
			@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>