
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$this->site_title?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" /> -->
  
    <!-- CSS personalizado  -->
    <link rel="stylesheet" href="<?= base_url('dashboard/datatables/')?>main.css">  
      

    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="<?= base_url('dashboard/datatables/') ?>datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 

	<!-- para las alertas -->
	<link rel="stylesheet" href="<?= base_url('dashboard/') ?>alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="<?= base_url('dashboard/') ?>alertifyjs/css/themes/default.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
  <!-- jquery
		============================================ -->
  <!-- libreria jquery necesaria para el funcionamiento de AJAX y demas efectos -->
  <script src="<?= base_url('dashboard/bootstrap/js/jquery.js')  ?>"></script>
  <!-- <script src="<?= base_url('dashboard/bootstrap/js/bootstrap.js')  ?>"></script>-->
  <!-- libreria js necesaria para ejecutar las alertas -->
  <script src="<?= base_url('dashboard/alertifyjs/alertify.min.js')  ?>"></script>

  <!-- sweet alert
		============================================ -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('dashboard/')?>img/favicon.ico">
    <!-- Google Fonts''
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/font-awesome.min.css">
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/owl.theme.css">
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('dashboard/')?>css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?=base_url('dashboard/')?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>