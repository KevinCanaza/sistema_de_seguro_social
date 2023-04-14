<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Llamado al encabezado -->
<?php $this->load->view('secciones-dashboard/header') ?>

<?php $this->load->helper('ajax_servicio_atencion') ?>
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
                                <a id="agregar">Añadir servicio</a>
                            </div>
							
                            <table id="my_tabla">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Doctor</th>
                                        <th>Gestión</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de fin</th>
                                        <th>Fuente</th>
                                        <th>Descripcion</th>
                                        <th>Foto</th>
										<th>Estado</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
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
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Doctor</span>
									<select name="doctores" id="doctor" class="form-control">
										<option value="">-- Seleccione un doctor--</option>
									</select>
								</div>
							</div>
                            <div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Gestión</span>
									<input type="month" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="gestiones" id="gestion">
								</div>
							</div>
						</div>
                        <div class="fila">
                            <div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Fecha de inicio</span>
									<input type="datetime-local" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="fecha_inicio" id="inicio">
								</div>
							</div>
                            <div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Fecha de fin</span>
									<input type="datetime-local" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="fecha_fin" id="fin">
								</div>
							</div>
						</div>
                        <div class="fila">
                            <div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Fuente</span>
									<input type="text" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="fuentes" id="fuente">
								</div>
							</div>
                            <div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Descripcion</span>
									<input type="text" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="descripciones" id="descripcion">
                                </div>
							</div>
						</div>
                        <div class="fila">
                            <div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Foto</span>
									<div class="image-preview">
										<img src="" alt="Foto del servicio" id="mostrar-aqui">
									</div>
									<label for="foto" id="subir-foto" class="btn btn-primary"></label>
									<input type="file" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="foto_servicio" id="foto" style="display: none;">
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