@extends('layouts.public')

@section('styles')
	<link href="/css/public.css" rel="stylesheet">
@endsection

@section('content')

<div class="content-wrapper edit-page">
    
	
    <div class="row">
    	<div class="col-md-12">
		    <?php echo $page->description;?>
    	</div>
    </div>
</div>

@endsection
