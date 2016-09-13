<div class="profile-usermenu">
	<ul class="nav">
		<li>
			<a href="http://www.github.com/{{ $myUser->nickname }}">
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
		<li>
			<a href="{{ action('ApiController@viewTrelloLogin') }}">
			<i class="fa fa-trello"></i>
			Team Trello Board</a>
		</li>
	</ul>
</div>
