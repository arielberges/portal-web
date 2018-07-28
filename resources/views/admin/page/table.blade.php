<table id="page-table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>T&iacute;tulo</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@if(isset($pages))
			@foreach($pages as $page)
			<tr>
				<td>{{ $page->title }}</td>
				<td class="event-action-column">
					<a class="btn-edit" href="/admin/page/edit/{{$page->id}}">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<a href="javascript:void(0);" class="btn-delete" onclick="delete_page('{{$page->id}}');">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
			@endforeach
		@endif
	</tbody>
</table>