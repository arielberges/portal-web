@extends('layouts.public')

@section('styles')
	<link href="/css/public.css" rel="stylesheet">
@endsection

@section('content')

<div class="content-wrapper edit-webinar">
    
    <div class="row">
    	<div class="col-md-12">
		    {!! Form::open(array('id'=>'edit-webinar-form')) !!}
							
				<div class="box-body">
					
					<div class="col-md-6">
					
						<div class="form-group">
							<label for="channel_id">Channel</label>
							<?php echo Form::select('channel_id', $channels_list, null, array('id' => 'channel_id', 'class'=>'form-control')) ?>
						</div>
    					
						<button type="button" class="btn btn-primary" onclick="searchChannel();">Search</button>
					</div>
				</div>
				
			{!! Form::close() !!}
    	</div>
    </div>
</div>

@endsection


<script>

function searchChannel() {

	window.location = '/webinar/list/1'; 
	
}

</script>