@extends('layouts.admin')

@section('styles')
	<link href="/css/admin.css" rel="stylesheet">
@endsection

@section('header-title')
Page Header
@endsection

@section('header-description')
Optional description
@endsection

@section('content')

<div class="content-wrapper edit-page">
    
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
		    {!! Form::open(array('id'=>'edit-page-form')) !!}
							
				<input type="hidden" name="id" value="{{ $page->id }}">
						
				<div class="box-body">
				
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">T&iacute;tulo</label>
							<input type="text" class="form-control" id="title" name="title" value="{{ null !== Request::old('title') ? Request::old('title') : $page->title }}" placeholder="Completar Título">
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label for="name">Descripci&oacute;n</label>
							<textarea type="text" class="form-control" id="description" name="description" placeholder="Completar Descripción">{{ null !== Request::old('description') ? Request::old('description') : $page->description }}</textarea>
						</div>
					</div>
					
					<div class="col-md-12">
						<button type="button" class="btn btn-primary" onclick="submitForm();">Guardar</button>
						<a href="/admin/page" class="btn btn-success">Volver</a>
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
			"textcolor colorpicker"
	    ],
	    toolbar1: "bold italic underline strikethrough sizeselect fontsizeselect | bullist numlist | forecolor backcolor",
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

    $('#edit-page-form').submit();
}

</script>

@endsection

@section('bredcrumb')
<?php 	$breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;
  		$breadcrumbs->setDivider('<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;');
		$breadcrumbs->addCrumb('Admin', '/admin/page');
		$breadcrumbs->addCrumb('Page', '/admin/page');
		if($page->id) {
			$breadcrumbs->addCrumb('Save', '/admin/page');
		} else {
			$breadcrumbs->addCrumb('Back', '/admin/page');
		}
		echo $breadcrumbs->render();
?>
@endsection