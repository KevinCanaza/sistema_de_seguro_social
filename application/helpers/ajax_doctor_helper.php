<script>
	
	$(document).ready(function(){

		//llamado de la funcion
		mostrarDatos();

		function mostrarDatos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('doctorController/get_doctor') ?>',
				dataType: 'json',

				success: function(datos){
					var tabla = '';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){
						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre_doctor+'</td>'+
                        '<td>'+datos[i].ci_doctor+'</td>'+
                        '<td>'+datos[i].celular_doctor+'</td>'+
                        '<td>'+datos[i].email_doctor+'</td>'+
                        '<td> <img src="<?=base_url()?>./uploads/'+datos[i].imagen_doctor+'"></td>'+
                        '<td>'+datos[i].link_face+'</td>'+
                        '<td>'+datos[i].link_twitter+'</td>'+
						'<td> <button class="pd-setting">Active</button></td>'+
						'<td>'+'<a href="javascript:;" class="edit" data="'+datos[i].id_doctor+'" > <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  '+
						'<td>'+'<a href="javascript:;" class="borrar" data="'+datos[i].id_doctor+'" > <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a>'+
						
						'</tr>';
						n++;
					}
					$('#tabla_datos').html(tabla);
					if ($.fn.DataTable.isDataTable('#my_tabla')) {
						// Si la tabla ya se ha inicializado, la destruimos para poder volverla a inicializar con los nuevos datos
						
					}
					else{
						// Inicializamos DataTables en la tabla
						$('#my_tabla').dataTable(
						{
							language: {
								"lengthMenu": "Mostrar _MENU_ registros",
								"zeroRecords": "No se encontraron resultados",
								"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
								"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
								"infoFiltered": "(filtrado de un total de _MAX_ registros)",
								"sSearch": "Buscar:",
								"oPaginate": {
									"sFirst": "Primero",
									"sLast":"Último",
									"sNext":"Siguiente",
									"sPrevious": "Anterior"
								},
								"sProcessing":"Procesando...",
							},
							//para usar los botones   
							responsive: "true",
							dom: 'Bfrtilp',       
							buttons:[ 
									{
										extend:    'excelHtml5',
										text:      '<i class="fas fa-file-excel"></i> ',
										titleAttr: 'Exportar a Excel',
										className: 'btn btn-success'
									},
									{
										extend:    'pdfHtml5',
										text:      '<i class="fas fa-file-pdf"></i> ',
										titleAttr: 'Exportar a PDF',
										className: 'btn btn-danger'
									},
									{
										extend:    'print',
										text:      '<i class="fa fa-print"></i> ',
										titleAttr: 'Imprimir',
										className: 'btn btn-info'
									},
							]
						});
					}
				}
			});
		};//fin de la funcion mostrarDatos

	// Funcion ajax para hacer el proceso de inserción de datos
	// 	agregamos un evento al boton para agregar nuevo alumno
	$('#agregar').click(function(){
		//mostramos el modal que tiene el formulario para ingresar un alumno
		$('#modalAgregar').modal('show');
		//modificamos el titulo del modal
		$('#modalAgregar').find('.modal-title').text('Nuevo Doctor');
		//modificamos el titulo del boton imagen
		$('#subir-foto').text('Subir foto');
		//modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
		$('#formulario').attr('action','<?= base_url('doctorController/ingresar')?>');
	});

	// Esperar a que se seleccione un archivo en el input con id "foto"
	$('#foto').on('change', function() {
		// Obtener el archivo seleccionado
		var archivo = $(this)[0].files[0];
		// Crear un objeto FileReader
		var lector = new FileReader();
		// Definir una función para ejecutar cuando la imagen se cargue
		lector.onload = function(e) {
			// Establecer el atributo "src" de la imagen con id "mostrar-aqui" al resultado de la carga de la imagen
			$('#mostrar-aqui').attr('src', e.target.result);
		};
		// Iniciar la carga de la imagen
		lector.readAsDataURL(archivo);
		
	});
	
	$('#btnGuardar').click(function(){
		$url = $('#formulario').attr('action');

		// Validar el campo "nombre"
		if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test($('#doctor').val())) {
			alertify.notify('El campo Nombre sólo puede contener letras, espacios y tildes', 'error', 10, null);
			return;
		}
		// Validar el campo "ci"
		if (!/^[0-9]+$/.test($('#ci').val())) {
			alertify.notify('El campo Cédula de identidad sólo puede contener números', 'error', 10, null);
			return;
		}
		// Validar el campo "celular"
		if (!/^[0-9]+$/.test($('#celular').val())) {
			alertify.notify('El campo Celular de identidad sólo puede contener números', 'error', 10, null);
			return;
		}
		// Validar el campo "email"
		if (!/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test($('#correo').val())) {
			alertify.notify('Por favor, ingrese una dirección de correo electrónico válida', 'error', 10, null);
			return;
		}

		$data = $('#formulario').serialize();

		$.ajax({
			url: $url,
			type: 'POST',
			data: new FormData($('#formulario')[0]),
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(respuesta){
				$('#modalAgregar').modal('hide');
				if(respuesta=='add'){
					alertify.notify('Ingresado exitosamente!', 'success', 10, null);
				}else if(respuesta =='edi'){
					alertify.notify('Actualizado exitosamente!', 'success', 10, null);
				}else{
					alertify.notify('Error al realizar la operacion!', 'error', 10, null);
				}
				$('#formulario')[0].reset();
				mostrarDatos();
			},
			error: function(respuesta) {
				console.log("Error en la solicitud AJAX:", respuesta);
			}
		});
	});
	// Fin del procedimiento insertar datos

// Funcion ajax para hacer el proceso de edicion de datos
$('#tabla_datos').on('click', '.edit', function(){
	var id = $(this).attr('data');

	$('#modalAgregar').modal('show');
	$('#modalAgregar').find('.modal-title').text('Editar doctor');
	//modificamos el titulo del boton imagen
	$('#subir-foto').text('Actualizar foto');
	$('#formulario').attr('action', '<?= base_url('doctorController/actualizar') ?>');

	$.ajax({
		type: 'ajax',
		method: 'post',
		url: '<?= base_url('doctorController/get_datos') ?>',
		data: {id:id},
		dataType: 'json',

		success: function(datos){
			$('#id').val(datos.id_doctor);
            $('#doctor').val(datos.nombre_doctor);
			$('#ci').val(datos.ci_doctor);
			$('#celular').val(datos.celular_doctor);
			$('#correo').val(datos.email_doctor);

			$('#mostrar-aqui').attr('src', '<?=base_url()?>uploads/'+datos.imagen_doctor);
			
			$('#facebook').val(datos.link_face);
			$('#twitter').val(datos.link_twitter);
		}//fin de success
	});//fin de ajax
});//fin del evento edit

//proceso de eliminar
$('#tabla_datos').on('click', '.borrar', function(){
			$id = $(this).attr('data');
			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?= base_url('doctorController/eliminar') ?>',
					data: {id:$id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta == true){
							alertify.notify('Eliminado exitosamente!', 'success', 10, null);
							mostrarDatos();
						}else{
							alertify.notify('Error al eliminar!', 'error', 10, null);
						}
					}
				});
			});
		});//fin de eliminar

});//fin document

</script>