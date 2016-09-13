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