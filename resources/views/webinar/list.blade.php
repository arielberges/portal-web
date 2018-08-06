@extends('layouts.public')

@section('styles')
	<link href="/css/public.css" rel="stylesheet">
@endsection

@section('content')

<div class="edit-webinar">
    
    <div class="row">
    	<div class="col-md-12">
					
    			<table id="webinar-table" class="table table-bordered table-hover">
                	<thead>
                		<tr>
                			<th>Code</th>
                			<th>Title</th>
                			<th>Start Time</th>
                			<th>Link</th>
                		</tr>
                	</thead>
                	<tbody>
                		@if(isset($webinars))
                			@foreach($webinars as $webinar)
                			<tr>
                				<td>{{ $webinar->code }}</td>
                				<td>{{ $webinar->title }}</td>
                				<td>{{ $webinar->start_time_for_view() }}</td>
                				<td class="event-action-column">
                					<a class="btn-edit" href="javascript:void(0);" 
                						onclick="window.open('/webinar/show/{{$webinar->id}}');">
                						<i class="fa fa-eye" aria-hidden="true"></i>
                					</a>
                				</td>
                			</tr>
                			@endforeach
                		@endif
                	</tbody>
                </table>
						
    	</div>
    </div>
</div>

@endsection


<script>

</script>