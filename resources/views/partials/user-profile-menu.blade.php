<div class="profile-usermenu">
	<ul class="nav">
		<li>
			<a href="#">
			<i class="fa fa-github"></i>
			{{ $myUser->nickname }} </a>
		</li>
		<li>
			<a href="{{ action('UsersController@edit', Auth::user()->id) }}">
			<i class="glyphicon glyphicon-pencil"></i>
			Edit Profile </a>
		</li>
		<li>
			<a href="/{{ $myUser->resume_url }}">
			<i class="glyphicon glyphicon-user"></i>
			Résumé </a>
		</li>
		<li>
			<a href="{{ action('ProjectsController@index') }}">
			<i class="glyphicon glyphicon-briefcase"></i>
			Approved Projects</a>
		</li>
	</ul>
</div>
