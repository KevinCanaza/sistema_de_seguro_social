<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('secciones-dashboard/header') ?>
<body>

<?php $this->load->view('secciones-dashboard/sidebarUsuario') ?>

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="<?=base_url('dashboard/')?>img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>

       <!-- Encabezado de opciones -->
       <?php $this->load->view('secciones-dashboard/header-advanced') ?>

<?php $this->load->view('secciones-dashboard/footer') ?>