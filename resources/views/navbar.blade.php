
<nav class="navbar navbar-default navbar-fixed-top navbar-custom">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">CodeupConnect</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
				<li><a href="#">Mission <span class="sr-only">(current)</span></a></li>
				<li><a>|</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a>|</a></li>
				<li><a href="#">Featured Freelancers</a></li>
				<li><a>|</a></li>
				<li><button type="button" class="btn btn-default navbar-btn">Make a Request!</button></li>
				<li><a href="{{ action('Auth\AuthController@logout') }}">Logout!</a></li>
			  </ul>

			  		



			  <!-- <form class="navbar-form navbar-left">      <-nav search bar
				<div class="form-group">
				  <input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			  </form> -->
			  

	<!-- 		if/else logic for github login/welcome menu -->
			
			  <ul class="nav navbar-nav navbar-right">
			@if (isset($_SESSION))

				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Profile</a></li>
					<li><a href="#">Edit Profile</a></li>
					<li><a href="#">Logout</a></li>
					<li role="separator" class="divider"></li>

			@else

				<li>
					<div class="white-text">
			  			<a href="/login" class="btn btn-block btn-social btn-lg btn-github">
          				<i class="fa fa-github"></i>
          				Sign in with Github
        				</a>
        			</div>
    			</li>
    		@endif
				
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
