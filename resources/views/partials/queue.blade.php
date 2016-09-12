<div>
	<br><br><br>
	<h3>Queue</h3>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<td>User ID</td>
				<td>Name</td>
				<td>Email</td>
				@if (isset($invitable))
				<td>Send Invite?</td>
				@endif
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr class="table-row">
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				@if (isset($invitable))
				<td><button class="btn btn-success"><i class="glyphicon glyphicon-envelope"> Invite</i></button></td>
				@endif
			</tr>
		@endforeach
		</tbody>
	</table>		
</div>


