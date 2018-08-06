@extends('layouts.admin')

@section('styles')
	<link href="/css/admin.css" rel="stylesheet">
@endsection

@section('header-title')
Webinar
@endsection

@section('content')

<div class="content-wrapper edit-webinar">
    
	@if (count($errors) > 0)
	<div class="row"  style="margin-left: 25px;">
		<div class="col-md-4 alert alert-danger result-ko">
			<strong>ERROR!</strong> <span id="error-message"></span>
			<ul>
			@foreach ($errors->all() as $error)
				<li style="display: block;">{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	</div>
	@endif
    
    <div class="row">
    	<div class="col-md-12">
		    {!! Form::open(array('id'=>'edit-webinar-form')) !!}
							
				<input type="hidden" name="id" value="{{ $webinar->id }}">
						
				<div class="box-body">
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="code">Code</label>
							<input type="text" class="form-control" id="code" name="code" value="{{ null !== Request::old('code') ? Request::old('code') : $webinar->code }}" placeholder="Complete code">
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="title" name="title" value="{{ null !== Request::old('title') ? Request::old('title') : $webinar->title }}" placeholder="Complete title">
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="channel_id">Channel</label>
							<?php echo Form::select('channel_id', $channels_list, $webinar->channel_id, array('id' => 'channel_id', 'class'=>'form-control')) ?>
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group">
							<label for="thumbnail">Thumbnail link</label>
							<input type="text" class="form-control" id="thumbnail" name="thumbnail" value="{{ null !== Request::old('thumbnail') ? Request::old('thumbnail') : $webinar->thumbnail }}" placeholder="Complete thumbnail">
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
                  			<label for="name">Start Time</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="start_time" name="start_time" value="{{ null !== Request::old('start_time') ? Request::old('start_time') : $webinar->start_time_for_view() }}">
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
                  			<label for="name">End Time</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="end_time" name="end_time" value="{{ null !== Request::old('end_time') ? Request::old('end_time') : $webinar->end_time_for_view() }}">
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
					
	                	<div class="form-group picker-combo">
							<label for="name">Users:</label>
			              	<select class="selectpicker" multiple="" id="users-combo" name="user_ids[]" title="Select users...">
			              	
			              		@foreach($users as $user_id => $user_name)
				              		<option value="{{$user_id}}">{{$user_name}}</option>
			              		@endforeach
			              		
			              	</select>
						</div>
					</div>
					
					<div class="col-md-12">
						<button type="button" class="btn btn-primary" onclick="submitForm();">Save</button>
						<a href="/admin/webinar" class="btn btn-success">Return</a>
					</div>
				</div>
				
			{!! Form::close() !!}
    	</div>
    </div>
</div>

<script>
			
$(document).ready(function(){
	$('#start_time').daterangepicker({timePicker: true, timePickerIncrement: 15, format: 'DD/MM/YYYY h:mm A', singleDatePicker: true});
	$('#end_time').daterangepicker({timePicker: true, timePickerIncrement: 15, format: 'DD/MM/YYYY h:mm A', singleDatePicker: true});

	$('#users-combo').selectpicker();
	$('#users-combo').selectpicker('val', {{$user_ids}});
});

function submitForm() {
	$('#edit-webinar-form').submit();
}

</script>

@endsection