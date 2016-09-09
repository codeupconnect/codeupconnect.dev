<div>
	<h3>Queue</h3>
	<table class="table table-bordered table-striped table-hover" >
		<thead>
			<tr>
				<td>User ID</td>
				<td>Name</td>
				<td>Github</td>
				<td>URL</td>
				<td>Email</td>
				<td>Send Invite?</td>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr class="table-row">
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->github_id }}</td>
				<td>{{ $user->url }}</td>
				<td>{{ $user->email }}</td>
				<td><button class="btn btn-success"><i class="glyphicon glyphicon-envelope"> Invite</i></button></td>
			</tr>
		@endforeach
		</tbody>
	</table>		


</div>


