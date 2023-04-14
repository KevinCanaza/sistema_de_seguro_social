<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('secciones-homepage/header') ?>

<?php $this->load->view('secciones-homepage/login') ?>

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="publicaciones-block">
        <div class="container">
            <div class="row ">
                <div class="col-md-12  text-center colorlib-heading">
                    <h5 style="padding: 20px 0px 20px 0px; text-align: left;">Ficha en linea</h5>
                </div>  
            </div>
            <div class="row ">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <a href="<?=base_url('indexController/F')?>">
                    <div class="publicaciones" >
                       <img src="<?=base_url()?>principal/images/features/ficha.png" class="img-fluid" alt="SSU" style="">
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <a href="<?=base_url('indexController/FE')?>">
                    <div class="publicaciones" >
                       <img src="<?=base_url()?>principal/images/features/ficha_estudiantil.png" class="img-fluid" alt="SSU" style="">
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <a href="" style="color: red;">La presentación del Carnet de Asegurado es obligatoria para ser atendido en cualquiera de los servicios.<br></a>
            </div>

        </div>
    </div>
</div>
<hr>



<?php $this->load->view('secciones-homepage/footer') ?>