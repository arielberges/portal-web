@extends('layouts.public')

@section('styles')
	<link href="/css/public.css" rel="stylesheet">
@endsection

@section('content')

<div class="edit-webinar">
    
    <div class="row">
    	<div class="col-md-12">
					
			<table id="webinar-table" class="table table-bordered table-hover">
            	<tbody>
        			<tr>
        				<td>Code</td>
        				<td>{{ $webinar->code }}</td>
        			</tr>
        			<tr>
        				<td>Title</td>
        				<td>{{ $webinar->title }}</td>
        			</tr>
        			<tr>
        				<td>Channel</td>
        				<td>{{ $webinar->channel->name }}</td>
        			</tr>
        			<tr>
        				<td>Image</td>
        				<td>
        					<img alt="thumbnail" src="{{ $webinar->thumbnail }}" style="width: 300px;">
        				</td>
        			</tr>
        			<tr>
        				<td>Start Time</td>
        				<td>{{ $webinar->start_time_for_view() }}</td>
        			</tr>
        			<tr>
        				<td>End Time</td>
        				<td>{{ $webinar->end_time_for_view() }}</td>
        			</tr>
        			<tr>
        				<td>Authors</td>
        				<td>
        					@foreach($webinar->users as $author)
        						{{$author->name}}<br>
        					@endforeach
        				</td>
        			</tr>
            	</tbody>
            </table>
						
    	</div>
    </div>
</div>

@endsection


<script>

</script>