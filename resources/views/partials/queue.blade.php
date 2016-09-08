



	
<div class="">
	<h3>Queue</h3>
	<table class="table table-bordered table-striped table-hover" >
		<thead>
			<tr>
				<td>User ID</td>
				<td>Name</td>
				<td>Github</td>
				<td>URL</td>
				<td>Email</td>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr class="table-row">
				<td>{{ $user->id }}</td>
				<td><a href="{{ action('UsersController@show', $user->id) }}">{{ $user->name }}</a></td>
				<td>{{ $user->github_id }}</td>
				<td>{{ $user->url }}</td>
				<td>{{ $user->email }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>		


</div>

