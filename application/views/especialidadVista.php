<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Llamado al encabezado -->
<?php $this->load->view('secciones-dashboard/header') ?>

<?php $this->load->helper('ajax_especialidad') ?>
<body>
<!-- Llamado al menu lateral -->
<?php $this->load->view('secciones-dashboard/sidebar') ?>


    <!-- Llamado al Inicio Área de bienvenida -->
    <div class="all-content-wrapper">


        <!-- Llamado al Encabezado de opciones -->
        <?php $this->load->view('secciones-dashboard/header-advanced') ?>
        
        <!-- Tabla de vista de datos -->
        <div class="product-status mg-b-30">
                                
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Products List</h4>
                            <div class="add-product">
                                <a id="agregar">Añadir Especialidad</a>
                            </div>
							
                            <table id="my_tabla">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Especialidad</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Eliminar</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla_datos">
                                    
                                </tbody>		
                            </table>

						<!-- Modal para confirmacion de borrar -->
						<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
								<div class="modal-dialog" role="document">
									<div class="modal-contenedor">
										<div class="modal-cabecera">
											<h5 class="modal-title">Confirmacion de eliminar</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-cuerpo">
											<p>Realmente desea eliminar el registro?</p>
										</div>
										<div class="modal-pie">
											<button type="button" class="btn btn-primary" id="btnBorrar">Si, borrar</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										</div>
									</div>
								</div>
							</div>
						<!-- Fin del modal para de borrar -->
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
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Especialidad</span>
									<input type="text" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="nombre_especialidad" id="especialidad">
								</div>
							</div>
							<div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Tipo especialidad</span>
									<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="tipo_especialidad" id="tipo">
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
    <?php $this->load->view('secciones-dashboard/footer') ?>