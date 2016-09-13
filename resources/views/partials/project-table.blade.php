<div>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<td>Site URL</td>
			<td>Desired Start</td>
			<td>Launch Date</td>
		<tbody>
			<tr class="table-row">
				<td>{{ $project->site_url }}</td>
				<td>{{ $project->start_date }}</td>
				<td>{{ $project->end_date }}</td>
			</tr>
		</tbody>
	</table>		
</div>
<div>
	<table class="table table-bordered table-striped table-hover">
		<tbody>
			<tr class="table-row">
				<td><h3>Point Person</h3></td>
				<td>{{ $project->point_person }}</td>
		
			<tr class="table-row">	
				<td><h3>Phone</h3></td>
				<td>{{ $project->phone }}</td>
			
			<tr class="table-row">	
				<td><h3>Email</h3></td>
				<td>{{ $project->email }}</td>
			
			<tr class="table-row">	
				<td><h3>Additional Details</h3></td>
				<td>{{ $project->project_details }}</td>
			</tr>
		</tbody>
	</table>		
</div>