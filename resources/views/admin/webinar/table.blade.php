<table id="webinar-table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Channel</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@if(isset($webinars))
			@foreach($webinars as $webinar)
			<tr>
				<td>{{ $webinar->code }}</td>
				<td>{{ $webinar->title }}</td>
				<td>{{ $webinar->channel->code}}</td>
				<td>{{ $webinar->start_time_for_view() }}</td>
				<td>{{ $webinar->end_time_for_view() }}</td>
				<td class="event-action-column">
					<a class="btn-edit" href="/admin/webinar/edit/{{$webinar->id}}">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<a href="javascript:void(0);" class="btn-delete" onclick="delete_webinar('{{$webinar->id}}');">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
			@endforeach
		@endif
	</tbody>
</table>