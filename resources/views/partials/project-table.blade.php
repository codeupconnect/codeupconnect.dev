<div>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<td>Organization</td>
				<td>Website</td>
				<td>Timeframe</td>
				<td>Contact</td>
				<td>Phone Number</td>
				<td>Email</td>
				<td>Project Details</td>
			</tr>
		</thead>
		<tbody>
			<tr class="table-row">
				<td>{{ $project->site_url }}</td>
				<td>{{ $project->start_date }} - {{ $project->end_date }}</td>
				<td>{{ $project->point_person }}</td>
				<td>{{ $project->phone }}</td>
				<td>{{ $project->email }}</td>
				<td>{{ $project->project_details }}</td>
			</tr>
		</tbody>
	</table>		
</div>