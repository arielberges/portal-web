@extends('layouts.admin')

@section('styles')
@endsection

@section('content')
  
<div class="content-wrapper">
    
    <div class="row">
		<div class="col-md-4 alert alert-danger result-ko hidden">
			  <strong>ERROR!</strong> <span id="error-message"></span>
		</div>
		@if (session('message'))
		 	<div class="col-md-6 alert alert-success result-ok">
		 	   {{ session('message') }}
			</div> 
	     @endif
	</div>
	
	<div class="row" style="padding: 25px;">
		<div class="col-xs-12">
			<div class="box">
				<div id="box-webinar-table" class="box-body">
					@include('admin.webinar.table')
				</div>
			</div>
			<a href="/admin/webinar/create" class="btn btn-primary">Add Element</a>
		</div>
	</div>
</div>

<script>
function delete_webinar(webinar_id) {
	bootbox.confirm({
	    message: "¿Estás seguro que querés eliminar este elemento?",
	    buttons: {
	        confirm: {
	            label: 'Sí',
	            className: 'btn-success'
	        },
	        cancel: {
	            label: 'No',
	            className: 'btn-danger'
	        }
	    },
	    callback: function (result) {
	    	if (result) {
				window.location = '/admin/webinar/delete/' + webinar_id
	        }
	    }
	});
}

</script>
 
 
@endsection

@section('bredcrumb')
<?php 	$breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;
  		$breadcrumbs->setDivider('<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;');
		$breadcrumbs->addCrumb('Admin', '/admin/webinar');
		$breadcrumbs->addCrumb('Webinar', '/admin/webinar');
		echo $breadcrumbs->render();
?>
@endsection