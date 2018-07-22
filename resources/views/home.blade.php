@extends('layouts.admin')

@section('styles')
	<link href="/css/home.css" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
    

</div>

<script>

$(document).ready(function() {
	var showChar = 340;
	var ellipsestext = "...";
	var moretext = "Leer m&aacute;s  <i class='fa fa-arrow-right' aria-hidden='true'>";
	var lesstext = "Leer menos  <i class='fa fa-arrow-up' aria-hidden='true'>";

	
	$('.new-content-short').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar, content.length - showChar);

			var html = c + '<span class="moreelipses">'+ellipsestext+'</span>';

			$(this).html(html);
		}
	});
	
	

	$(".read-more").click(function(){

		id_news = $(this).data("id");
		
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}

		$("#news-" + id_news + " .new-content-short").toggle();
		$("#news-" + id_news + " .new-content-complete").toggle();
		
		$("#news-" + id_news + " .morecontent").toggle();
		$("#news-" + id_news + " .moreelipses").toggle();
		$("#news-" + id_news + " .new-files").toggle();
		$("#news-" + id_news + " .new-image").toggle();

		$("#news-" + id_news + " #less-link").toggle();
		$("#news-" + id_news + " #like-button").toggle();
		
		
		

		return false;
	});

	
});

function likeNews(id) {
	$("#news-" + id + " .thumbs-down").removeClass("like");
	$("#news-" + id + " .thumbs-up").addClass("like");
	
	$.ajax({
        type: "POST",
        url: '/like/noticia',
        data: { news_id: id, thumb_up: 1, _token: $('[name="_token"]').val() },
        success: function(data) {
        	if(data.result != 'OK') {
            	$("#news-" + id + " .thumbs-down").removeClass("like");
            	$("#news-" + id + " .thumbs-up").addClass("like");
			}
        },
        error: function(data){
        }
    });
}

function unlikeNews(id) {
	$("#news-" + id + " .thumbs-up").removeClass("like");
	$("#news-" + id + " .thumbs-down").addClass("like");
	
	$.ajax({
        type: "POST",
        url: '/like/noticia',
        data: { news_id: id, thumb_up: 0, _token: $('[name="_token"]').val() },
        success: function(data) {
        	if(data.result != 'OK') {
            	$("#news-" + id + " .thumbs-up").removeClass("like");
            	$("#news-" + id + " .thumbs-down").addClass("like");
			}
        },
        error: function(data){
        }
    });
}

</script>

@endsection

@section('bredcrumb')
<?php 	$breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;
  		$breadcrumbs->setDivider('<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>');
		$breadcrumbs->addCrumb('Inicio', '/');
		echo $breadcrumbs->render();
?>
@endsection

