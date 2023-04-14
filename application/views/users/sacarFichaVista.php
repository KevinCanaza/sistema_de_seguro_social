<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Llamado al encabezado -->
<?php $this->load->view('secciones-dashboard/header') ?>
<?php $this->load->helper('usuario/ajax_sacar_ficha') ?>
<body>
<!-- Llamado al menu lateral -->
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
        
        <div class="author-area-pro">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="personal-info-wrap">
                            <div class="widget-head-info-box">
                                <div class="persoanl-widget-hd">
                                    <h2>Jon Royita</h2>
                                    <p>Founder of Uttara It Park</p>
                                </div>
                                <img src="<?=base_url('dashboard/')?>img/notification/5.jpg" class="img-circle circle-border m-b-md" alt="profile">
                                <div class="social-widget-result">
                                    <span>100 Tweets</span> |
                                    <span>350 Following</span> |
                                    <span>610 Followers</span>
                                </div>
                            </div>
                            <div class="widget-text-box">
                                <h4>Jhon Royita</h4>
                                <p>To all the athaists attacking me right now, I can't make you believe in God, you have to have faith.</p>
                                <div class="text-right like-love-list">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="author-widgets-single res-mg-t-30">
                            <div class="author-wiget-inner">
                                <div class="perso-img">
                                    <img src="<?=base_url('dashboard/')?>img/notification/6.jpg" class="img-circle circle-border m-b-md" alt="profile">
                                </div>
                                <div class="persoanl-widget-hd persoanl1-widget-hd">
                                    <h2>Sacar ficha</h2>
                                    <p>UPEA</p>
                                    <p>Al servio dek estamento estudiantil</p>
                                </div>
                                <div class="social-widget-result social-widget1-result">
                                    <button id="sacaFicha">Sacar Ficha</button>
                                </div>
                            </div>
                            <div class="widget-text-box">
                                <h4>Fire Foxy</h4>
                                <p>To all the athaists attacking me right now, I can't make you believe in God, you have to have faith.</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="personal-info-wrap personal-info-ano res-mg-t-30">
                            <div class="widget-head-info-box">
                                <div class="persoanl-widget-hd">
                                    <h2>Jon Royita</h2>
                                    <p>Founder of Uttara It Park</p>
                                </div>
                                <img src="<?=base_url('dashboard/')?>img/contact/2.jpg" class="img-circle circle-border m-b-md" alt="profile">
                                <div class="social-widget-result">
                                    <span>100 Tweets</span> |
                                    <span>350 Following</span> |
                                    <span>610 Followers</span>
                                </div>
                            </div>
                            <div class="widget-text-box">
                                <h4>Jhon Royita</h4>
                                <p>To all the athaists attacking me right now, I can't make you believe in God, you have to have faith.</p>
                                <div class="text-right like-love-list">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-status mg-b-30">
            <div class="modal fade" id="modalAgregar">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-contenedor">
                        <div class="modal-cabecera">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                        </div>
                        <!-- Modal  para ingresar datos-->
                        <div class="modal-cuerpo">
                            <form action="" id="formulario" method="POST">
                                <input type="hidden" name="id_dato" id="id" value="0">
                                <div class="fila">
                                    <div class="columna">
                                        <div class="entrada-grupo">
                                            <span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Servicio</span>
                                            <select name="servicios" id="servicio" class="form-control">
                                                <option value="">-- Seleccione un servicio--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="columna">
                                        <div class="entrada-grupo">
                                            <span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Doctor</span>
                                            <select name="doctores" id="doctor" class="form-control">
                                                <option value="">-- Seleccione un doctor--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="fila">
                                    <div class="columna">
                                        <div class="entrada-grupo">
                                            <span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Estudiante</span>
                                            <select name="estudiantes" id="estudiante" class="form-control">
                                                <option value="">-- Seleccione un estudiante--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="columna">
                                        <div class="entrada-grupo">
                                            <span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Horario</span>
                                            <select name="horarios" id="horario" class="form-control">
                                                <option value="">-- Seleccione un horario--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="fila">
                                    <div class="columna">
                                        <div class="entrada-grupo">
                                            <span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Fecha registro</span>
                                            <input type="datetime-local" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="fecha_registro" id="fecha_registro">
                                        </div>
                                    </div>
                                    <div class="columna">
                                        <div class="entrada-grupo">
                                            <span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Fecha ficha</span>
                                            <input type="datetime-local" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="fecha_ficha" id="fecha_ficha">
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-pie">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                        </div>
                        <!-- Final Modal  para ingresar datos-->
                    </div>
                </div>
            </div>
        </div>
        

<?php $this->load->view('secciones-dashboard/footer') ?>