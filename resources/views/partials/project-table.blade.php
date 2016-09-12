<div>
	<table class="table table-bordered table-striped table-hover">
		<tbody>
			<tr class="table-row">
				<td>Site URL</td>
				<td>{{ $project->site_url }}</td>
			</tr>
			<tr class="table-row">
				<td>Desired Start</td>
				<td>{{ $project->start_date }}</td>
			<tr class="table-row">
				<td>Launch Date</td>
				<td>{{ $project->end_date }}</td>
			<tr class="table-row">
				<td>Point Person</td>
				<td>{{ $project->point_person }}</td>
			<tr class="table-row">
				<td>Phone</td>
				<td>{{ $project->phone }}</td>
			<tr class="table-row">
				<td>Email</td>
				<td>{{ $project->email }}</td>
			<tr class="table-row">
				<td>Additional Details</td>
				<td>{{ $project->project_details }}</td>
			</tr>
		</tbody>
	</table>		
</div>