<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Llamado al encabezado -->
<?php $this->load->view('secciones-dashboard/header') ?>

<?php $this->load->helper('ajax_datos_estudiante') ?>
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
                                <a id="agregar">Añadir estudiante</a>
                            </div>
							
                            <table id="my_tabla">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Cédula de identidad</th>
                                        <th>Carrera</th>
                                        <th>Direccion est</th>
                                        <th>Telefono</th>
                                        <th>Fecha de registro</th>
                                        <th>Fin del seguro</th>
                                        <th>Foto</th>
                                        <th>Estado</th>
                                        <th>Estado revisión</th>
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
						    		<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Nombre</span>
						    		<input type="text" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="first_name" id="nombre">
						    	</div>
						    </div>
						    <div class="columna">
						    	<div class="entrada-grupo">
						    		<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Apellidos</span>
						    		<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="last_name" id="apellidos">
						    	</div>
						    </div>
						</div>
                        
                        <div class="fila">
						    <div class="columna">
						    	<div class="entrada-grupo">
						    		<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Fecha de nacimiento</span>
						    		<input type="date" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="fecha_nacimiento" id="fecha_nacimiento">
						    	</div>
						    </div>
						    <div class="columna">
						    	<div class="entrada-grupo">
						    		<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Cédula de identidad</span>
						    		<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="ci" id="ci">
						    	</div>
						    </div>
						</div>
                        <div class="fila">
                            <div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Carrera</span>
									<select name="carreras" id="carrera" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
										<option value="">-- Seleccione una carrera --</option>
									</select>
								</div>
							</div>
						    <div class="columna">
						    	<div class="entrada-grupo">
						    		<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Dirección</span>
						    		<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="direccion_est" id="direccion">
						    	</div>
						    </div>
						</div>
                        <div class="fila">
						    <div class="columna">
						    	<div class="entrada-grupo">
						    		<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Telefono</span>
						    		<input type="text" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="telefono" id="telefono">
						    	</div>
						    </div>
						    <div class="columna">
						    	<div class="entrada-grupo">
						    		<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Fecha registro</span>
						    		<input type="datetime-local" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="fecha_registro" id="fecha_registro" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+50 years')); ?>">
						    	</div>
						    </div>
						</div>
                        <div class="fila">
						    <div class="columna">
						    	<div class="entrada-grupo">
						    		<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Fecha fin de seguro</span>
						    		<input type="datetime-local" class="form-control" aria-label="Small" value="" aria-describedby="inputGroup-sizing-sm" name="fecha_fin_seguro" id="fecha_fin_seguro">
						    	</div>
						    </div>
						    <div class="columna">
						    	<div class="entrada-grupo">
						    		<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Foto</span>
						    		<input type="file" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="foto" id="foto">
						    	</div>
						    </div>
						</div>

                        <div class="fila">
							
							<div class="columna">
								<div class="entrada-grupo">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Usuario</span>
									<select name="usuarios" id="usuario" class="form-control">
										<option value="">-- Seleccione un usuario--</option>
									</select>
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
		<!-- Restringiendo la fecha de seleccion -->
		<script>
			// Para fecha de registro
			var dateTimeInput = document.getElementById('fecha_registro');

			var currentDate = new Date();
			var maxDate = new Date(currentDate.getFullYear() + 50, currentDate.getMonth(), currentDate.getDate());

			dateTimeInput.min = currentDate.toISOString().slice(0, 16);
			dateTimeInput.max = maxDate.toISOString().slice(0, 16);

			// Para fecha de registro
			var dateTimeInput2 = document.getElementById('fecha_fin_seguro');

			dateTimeInput2.min = currentDate.toISOString().slice(0, 16);
			dateTimeInput2.max = maxDate.toISOString().slice(0, 16);

		</script>
    <?php $this->load->view('secciones-dashboard/footer') ?>