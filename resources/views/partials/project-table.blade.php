<div>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<td>Site URL</td>
			<td>Desired Start</td>
			<td>Launch Date</td>
			<td>Point Person</td>
			<td>Phone</td>
			<td>Email</td>
			<td>Additional Details</td>
		<tbody>
			<tr class="table-row">
				<td>{{ $project->site_url }}</td>
				<td>{{ $project->start_date }}</td>
				<td>{{ $project->end_date }}</td>
				<td>{{ $project->point_person }}</td>
				<td>{{ $project->phone }}</td>
				<td>{{ $project->email }}</td>
				<td>{{ $project->project_details }}</td>
			</tr>
		</tbody>
	</table>		
</div>
<div>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr class="table-row">
				<td>Point Person</td>
			</tr>
			<tr class="table-row">	
				<td>Phone</td>
			</tr>
			<tr class="table-row">	
				<td>Email</td>
			</tr>
			<tr class="table-row">	
				<td>Additional Details</td>
			</tr>
		</thead>
		<tbody>
			<tr class="table-row">
				<td>{{ $project->point_person }}</td>
			</tr>
			<tr class="table-row">
				<td>{{ $project->phone }}</td>
			</tr>
			<tr class="table-row">
				<td>{{ $project->email }}</td>
			</tr>
			<tr class="table-row">
				<td>{{ $project->project_details }}</td>
			</tr>
		</tbody>
	</table>		
</div>