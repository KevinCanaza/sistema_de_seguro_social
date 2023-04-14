<!doctype html>
<html lang="en">

<!-- Mirrored from www.ecologytheme.com/theme/eduwise/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Aug 2021 21:42:41 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Ecology Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPEA - Seguro social</title>
    <link rel="shortcut icon" href="<?=base_url()?>principal/images/favicon.ico" type="image/x-icon">
    <!-- Goole Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/bootstrap.min.css">
    <!-- Font awsome CSS -->
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/font-awesome.min.css">    
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/flaticon.css">
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/magnific-popup.css">    
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/owl.theme.css">     
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/animate.css"> 
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/slick.css">  

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/revolution/layers.css">
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/revolution/navigation.css">
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/revolution/settings.css">    
    <!-- Mean Menu-->
    <link rel="stylesheet" href="<?=base_url()?>principal/css/assets/meanmenu.css">
    <!-- main style-->
    <link rel="stylesheet" href="<?=base_url()?>principal/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>principal/css/responsive.css">
    <!-- para las alertas -->
	<link rel="stylesheet" href="<?= base_url('dashboard/') ?>alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="<?= base_url('dashboard/') ?>alertifyjs/css/themes/default.min.css">

    <!-- jQuery v3.4.1 
		============================================ -->
  <!-- libreria jquery necesaria para el funcionamiento de AJAX y demas efectos -->
  <script src="<?= base_url('dashboard/bootstrap/js/jquery.js')  ?>"></script>
  <!-- libreria js necesaria para ejecutar las alertas -->
  <script src="<?= base_url('dashboard/alertifyjs/alertify.min.js')  ?>"></script>

  
</head>

<body>

<header class="header_tow">
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>    
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="info_wrapper">
                        <div class="contact_info">                   
        					<ul class="list-unstyled">
                                <li><i class="flaticon-phone-receiver"></i>Llamanos: +591 xxxx xxxx</li>
                                <li><i class="flaticon-mail-black-envelope-symbol"></i>Escríbenos: contact@eduwise.com</li>
        					</ul>                    
                        </div>
                        <div class="login_info">
                             <ul class="d-flex">
                                <li class="nav-item"><a href="#" class="nav-link sign-in js-modal-show"><i class="flaticon-user-male-black-shape-with-plus-sign"></i>Registrarse</a></li>
                                <li class="nav-item"><a href="#" class="nav-link join_now js-modal-show"><i class="flaticon-padlock"></i>Ingresar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="edu_nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light bg-faded">
                <a class="navbar-brand" href="<?=base_url('indexController/index')?>"><img src="<?=base_url()?>principal/images/logo2.png" alt="logo" width="40px" ></a>
                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav nav lavalamp ml-auto menu">
                        <li class="nav-item"><a href="<?=base_url('indexController/index')?>" class="nav-link active">Home</a>
                            
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Acerca de Nosotros</a>
                            <ul class="navbar-nav nav mx-auto">
                                <li class="nav-item"><a href="#mision-vision-valores" class="nav-link">Visión</a></li>
                                <li class="nav-item"><a href="#mision-vision-valores" class="nav-link">Misión</a></li>
                            </ul> 
                        </li>   
                        <li class="nav-item"><a href="contact.html" class="nav-link">Contactos</a></li>
                        <li class="nav-item"><a href="<?=base_url('indexController/ficha')?>" class="nav-link">Sacar Ficha</a></li>
                        <li class="nav-item"><a href="<?=base_url('indexController/ficha')?>" onclick="registro()" class="nav-link">Pre Afiliacion SSUE-UPEA</a></li>
                    </ul>
                </div>
                <div class="mr-auto search_area ">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><i class="search_btn flaticon-magnifier"></i>
                            <div id="search">
                                <button type="button" class="close">×</button>
                                 <form>
                                     <input type="search" value="" placeholder="Search here...."  required/>
                                 </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav><!-- END NAVBAR -->
        </div> 
    </div>