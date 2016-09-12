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
			</tr>
			<tr class="table-row">
				<td>{{ $project->start_date }}</td>
			<tr class="table-row">
				<td>{{ $project->end_date }}</td>
			<tr class="table-row">
				<td>{{ $project->point_person }}</td>
			<tr class="table-row">
				<td>{{ $project->phone }}</td>
			<tr class="table-row">
				<td>{{ $project->email }}</td>
			<tr class="table-row">
				<td>{{ $project->project_details }}</td>
			</tr>
		</tbody>
	</table>		
</div>