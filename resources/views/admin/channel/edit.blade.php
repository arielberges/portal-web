@extends('layouts.admin')

@section('styles')
	<link href="/css/admin.css" rel="stylesheet">
@endsection

@section('header-title')
Channel
@endsection

@section('content')

<div class="content-wrapper edit-channel">
    
	@if (count($errors) > 0)
	<div class="row">
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
		    {!! Form::open(array('id'=>'edit-channel-form')) !!}
							
				<input type="hidden" name="id" value="{{ $channel->id }}">
						
				<div class="box-body">
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Code</label>
							<input type="text" class="form-control" id="code" name="code" value="{{ null !== Request::old('code') ? Request::old('code') : $channel->code }}" placeholder="Complete code">
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="{{ null !== Request::old('name') ? Request::old('name') : $channel->name }}" placeholder="Complete title">
						</div>
					</div>
					
					<div class="col-md-12">
						<button type="button" class="btn btn-primary" onclick="submitForm();">Save</button>
						<a href="/admin/channel" class="btn btn-success">Return</a>
					</div>
				</div>
				
			{!! Form::close() !!}
    	</div>
    </div>
</div>

<script src="/js/tinymce/tinymce.min.js"></script>

<script>
					
function loadPanelHtmlEditor() {
	tinyMCE.remove();
	tinymce.init({
	    selector: "textarea#description",
	    theme: "modern",
	    skin: 'light',
	    plugins: [
			"textcolor colorpicker image"
	    ],
	    toolbar1: "bold italic underline strikethrough sizeselect fontsizeselect | bullist numlist | forecolor backcolor | image",
	    fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
	    height: 100,
	    menubar: false,
	    statusbar: false,
	    content_css : "/css/custom_tinymce.css"
	});
}	

$(document).ready(function(){
	loadPanelHtmlEditor();
});

function submitForm() {
	if(tinyMCE.activeEditor !== null){
        $('#description').val(tinyMCE.activeEditor.getContent());
    }

    $('#edit-channel-form').submit();
}

</script>

@endsection

@section('bredcrumb')
<?php 	$breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;
  		$breadcrumbs->setDivider('<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;');
		$breadcrumbs->addCrumb('Admin', '/admin/channel');
		$breadcrumbs->addCrumb('Channel', '/admin/channel');
		if($channel->id) {
			$breadcrumbs->addCrumb('Save', '/admin/channel');
		} else {
			$breadcrumbs->addCrumb('Back', '/admin/channel');
		}
		echo $breadcrumbs->render();
?>
@endsection