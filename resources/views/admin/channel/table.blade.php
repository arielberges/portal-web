<table id="channel-table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Code</th>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@if(isset($channels))
			@foreach($channels as $channel)
			<tr>
				<td>{{ $channel->code }}</td>
				<td>{{ $channel->name }}</td>
				<td class="event-action-column">
					<a class="btn-edit" href="/admin/channel/edit/{{$channel->id}}">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<a href="javascript:void(0);" class="btn-delete" onclick="delete_channel('{{$channel->id}}');">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
			@endforeach
		@endif
	</tbody>
</table>