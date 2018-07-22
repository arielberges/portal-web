<?php 
$current_screen = 1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Figured Blog</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/panel/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/panel/css/skins/_all-skins.css">
 
  <link rel="stylesheet" href="/plugins/Ion.RangeSlider/css/ion.rangeSlider.css">
  
  <link rel="stylesheet" href="/plugins/Ion.RangeSlider/css/ion.rangeSlider.skinHTML5.css">
   
	<!-- jQuery 2.2.0 -->
	<script src="/plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="/panel/js/app.min.js"></script>
	
	<script src="/plugins/Ion.RangeSlider/js/ion-rangeSlider/ion.rangeSlider.js"></script>
	
	<script src="/js/jquery.form.min.js"></script>
	<script src="/js/bootbox.min.js"></script>
	
	<link rel="stylesheet" href="/css/app.css">
  
	<link rel="stylesheet" type="text/css" href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css">
  
  	@yield('styles')   
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  
</head>

<?php $user = Auth::user();
      //$user_full_name = $user->name;
      $user_full_name = 'Pepe';
      //$is_admin = $user->isAdmin(); 
      $is_admin = true; 
      ?>

<body class="hold-transition skin-blue sidebar-mini" style="font-family: Lato">

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>FC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="/images/logo-asistente.png" style="width:144px"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <form class="navbar-form active" role="search">
		<div class="input-group">
			<input id="search-input-box" type="text" class="form-control pull-right search-input" placeholder="Escribí acá lo que buscás...">
				<span class="input-group-btn">
					<button type="reset" class="btn btn-nav-search" onclick="closeSearchBox()">
						<i class="mdi mdi-magnify"></i>
					</button>
					<button id="cancel-search" type="reset" class="btn btn-nav-search" onclick="closeSearchBox()">
						<i class="mdi mdi-window-close"></i>
					</button>
				</span>
			</div>
		</form>
      
		<div class="back-breadcrumb-btn <?php echo ($breadcrumbs->count() <= 1 ? 'hide' : '');?>">
			<i onclick="backBreadcrumb();"  role="button"
	         	class="mdi mdi-arrow-left header-arrow" aria-hidden="true"></i>
		</div>
      
      	<div class="breadcrumbs-container">
			<label>@yield('bredcrumb')</label>
		</div>
      

		<div class="navbar-custom-menu">
      
		      
	        <ul class="nav navbar-nav">
	          <!-- User Account: style can be found in dropdown.less -->
	          <li class="dropdown user user-menu">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-align: right">
	            	<div class="nav-image-box">
			            	<i class="mdi mdi-account"></i>
	            	</div>
	              	<span class="hidden-xs nav-profile-section">Hola, <?php echo $user_full_name;?> <i class="fa fa-angle-down" aria-hidden="true" style="margin-left: 10px; margin-right: 10px"></i></span>
	            </a>
	            <ul class="dropdown-menu" style=" background-color: #222d32; width: 133px; min-width: 133px">
	              <!-- Menu Body -->
	              <li class="user-body">
	                <div class="row">
	                  <div class="col-xs-12">
	                    <a href="/perfil" style="color: #FFF!important; background: none!important">Mi Perfil</a>
	                  </div>
	                  <div class="col-xs-12" style= "margin-top: 10px;">
	                    <a style="color: #FFF!important; background: none!important" href="{{ url('/logout') }}"
	                                        onclick="event.preventDefault();
	                                                 document.getElementById('logout-form').submit();">
	                                        Cerrar Sesi&oacute;n
	                                    </a>
	
	                                    <form id="logout-form" action="{{ url('/logout') }}" method="GET" style="display: none;">
	                                        {{ csrf_field() }}
	                                    </form>
	                  </div>
	                </div>
	                <!-- /.row -->
	              </li>
	            </ul>
	          </li>
	          <!-- Control Sidebar Toggle Button -->
	        </ul>
		</div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

  	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="treeview <?php echo $current_screen == HOME_SCREEN ? 'active' : '';?>">
				<a href="/home">
					<i class="mdi mdi-home"></i> <span>Inicio</span>
					<i class="mdi mdi-arrow-right pull-right"></i>
				</a>
			</li>
			<li class="treeview <?php echo $current_screen == PRODUCT_SCREEN ? 'active' : '';?>">
	          <a href="/productos">
	            <i class="mdi mdi-animation"></i> <span>Productos</span>
	            <i class="mdi mdi-arrow-right pull-right"></i>
	          </a>
	        </li>
	        <li class="treeview <?php echo $current_screen == SURVEY_SCREEN ? 'active' : '';?>">
				<a href="/encuestas">
					<i class="mdi mdi-file-document"></i> <span>Encuestas</span>
					<i class="mdi mdi-arrow-right pull-right"></i>
				</a>
			</li>
			<li class="treeview <?php echo $current_screen == COLLABORATION_SCREEN ? 'active' : '';?>">
				<a href="/colaboracion">
					<i class="mdi mdi-account-multiple"></i> <span>Colaboraci&oacute;n</span>
					<i class="mdi mdi-arrow-right pull-right"></i>
				</a>
			</li>
	        <li class="hide treeview <?php echo $current_screen == SURVEY_SCREEN ? 'active' : '';?>">
				<a href="/encuestas">
					<i class="mdi mdi-pencil-box"></i> <span>Encuestas</span>
					<i class="mdi mdi-arrow-right pull-right"></i>
				</a>
			</li>
	        <!-- li class="treeview <?php echo $current_screen == STADISTIC_SCREEN ? 'active' : '';?>">
				<a href="/estadisticas">
					<i class="mdi mdi-chart-bar"></i> <span>Estad&iacute;sticas</span>
					<i class="mdi mdi-arrow-right pull-right"></i>
				</a>
			</li> -->
			<li class="treeview <?php echo $current_screen == GLOSSARY_SCREEN ? 'active' : '';?>">
				<a href="/glosario">
					<i class="mdi mdi-help-circle"></i> <span>Glosario</span>
					<i class="mdi mdi-arrow-right pull-right"></i>
				</a>
			</li>
			<li class="treeview <?php echo $current_screen == PROFILE_SCREEN ? 'active' : '';?>">
				<a href="/perfil">
					<i class="mdi mdi-account"></i><span>Mi Perfil</span>
					<i class="mdi mdi-arrow-right pull-right"></i>
				</a>
			</li>
			
			@if($is_admin)
				<li class="treeview  <?php echo $current_screen == ADMIN_SCREEN ? 'active' : '';?>">
		          <a href="#">
		            <i class="mdi mdi-view-dashboard" style="font-size: 22px"></i> <span>Admin</span>
		            <i class="mdi mdi-arrow-right pull-right"></i>
		          </a>
		          <ul class="treeview-menu" style="background-color: #3c3c46!important">
		            <li><a href="/admin/companias" style="color: #ffffff"><i class="fa fa-circle-o"></i>Compañ&iacute;as</a></li>
		            <li><a href="/admin/productos" style="color: #ffffff"><i class="fa fa-circle-o"></i>Productos</a></li>
		            <li><a href="/admin/caracteristicas" style="color: #ffffff"><i class="fa fa-circle-o"></i>Caracter&iacute;sticas</a></li>
		            <li><a href="/admin/beneficios" style="color: #ffffff"><i class="fa fa-circle-o"></i>Beneficios</a></li>
		            <li><a href="/admin/desventajas" style="color: #ffffff"><i class="fa fa-circle-o"></i>Desventajas</a></li>
		            <li><a href="/admin/planes" style="color: #ffffff"><i class="fa fa-circle-o"></i>Planes</a></li>
		            <li><a href="/admin/detalles-de-planes" style="color: #ffffff"><i class="fa fa-circle-o"></i>Detalles de Planes</a></li>
		            <li><a href="/admin/sistemas-operativos" style="color: #ffffff"><i class="fa fa-circle-o"></i>Sistemas Operativos</a></li>
		            <li><a href="/admin/configuracion-servidores" style="color: #ffffff"><i class="fa fa-circle-o"></i>Configuraci&oacute;n de Servidores</a></li>
		            <li><a href="/admin/noticias" style="color: #ffffff"><i class="fa fa-circle-o"></i>Noticias</a></li>
		            <li><a href="/admin/encuestas" style="color: #ffffff"><i class="fa fa-circle-o"></i>Encuestas</a></li>
		            <li><a href="/admin/colaboracion" style="color: #ffffff"><i class="fa fa-circle-o"></i>Colaboraci&oacute;n</a></li>
		            <li><a href="/admin/glosario" style="color: #ffffff"><i class="fa fa-circle-o"></i>Glosario</a></li>
		          </ul>
		        </li>
	        @endif
			
		</ul>
	</section>
    <!-- /.sidebar -->
  </aside>

  	@if(isset($family_header))
  		@include('layouts.colored-menu')
  	@endif
  	
	@yield('content')    
  
  <div class="control-sidebar-bg"></div>
</div>

<script>
function backBreadcrumb() {
	$(".breadcrumbs li:not(.active):last a")[0].click();
}

function openSearchBox() {
	$(".navbar-static-top").addClass("searching");
	$("#search-input-box").val("");
	$("#search-input-box").focus();
}

function closeSearchBox() {
	$(".navbar-static-top").removeClass("searching");
	$("#search-input-box").val("");
}


</script>

</body>
</html>
