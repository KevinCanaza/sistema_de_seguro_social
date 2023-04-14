<script>
	
	$(document).ready(function(){

		//llamado de la funcion
		mostrarDatos();

		function mostrarDatos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('usuarioController/get_usuario') ?>',
				dataType: 'json',

				success: function(datos){
					var tabla = '';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){
						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].username+'</td>'+
						'<td>'+datos[i].email+'</td>'+ 
                        '<td> <button class="pd-setting">Active</button></td>'+
                        '<td>'+datos[i].company+'</td>'+
                        '<td>'+datos[i].first_name+'</td>'+ 
						'<td>'+datos[i].last_name+'</td>'+
                        '<td>'+datos[i].ci_persona+'</td>'+
                        '<td>'+datos[i].usuario_mae+'</td>'+ 
                        '<td>'+datos[i].ip_address+'</td>'+
						'<td>'+'<a href="javascript:;" class="edit" data="'+datos[i].id+'" > <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  '+
						'<td>'+'<a href="javascript:;" class="borrar" data="'+datos[i].id+'" > <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a>'+
						
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

// Procedimiento de insert
	//agregamos un evento al boton para agregar nuevo dato
	$('#agregar').click(function(){
		$("#pass").css("display", "show");
		//mostramos el modal que tiene el formulario para ingresar un dato
		$('#modalAgregar').modal('show');
		//modificamos el titulo del modal
		$('#modalAgregar').find('.modal-title').text('Nuevo Usuario');
		//modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
		$('#formulario').attr('action','<?= base_url('usuarioController/ingresar')?>');
	});
	
	$('#btnGuardar').click(function(){
	$url = $('#formulario').attr('action');

// Validar el campo "Nombre"
if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test($('#nombre').val())) {
    alertify.notify('El campo Nombre sólo puede contener letras, espacios y tildes', 'error', 10, null);
    return;
}
// Validar el campo "Apellidos"
if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test($('#apellidos').val())) {
    alertify.notify('El campo Apellidos sólo puede contener letras, espacios y tildes', 'error', 10, null);
    return;
}
// Validar el campo "nombre_usuario"
if (!/^[a-zA-Z0-9]+$/.test($('#nombreusuario').val())) {
    alertify.notify('El campo nombre de usuario solo puede contener letras y números', 'error', 10, null);
    return;
}
let password = $('#contrasena').val();

if (!/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password) || !/[$&+,:;=?@#|'<>.^*()%!-]/.test(password)) {
    alertify.notify('La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial', 'error', 10, null);
    
   
return;
}

// Validar el campo "correo electrónico"
if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test($('#correo').val())) {
    alertify.notify('El correo electrónico no tiene un formato válido', 'error', 10, null);
    return;
}
// Validar el campo "ci"
if (!/^[0-9]+$/.test($('#ci').val())) {
    alertify.notify('El campo Cédula de indentidad sólo puede contener números', 'error', 10, null);
    return;
}

	$data = $('#formulario').serialize();

	$.ajax({
		type: 'ajax',
		method: 'post',
		url: $url,
		data: $data,
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
		}
	});
	// Fin del procedimiento insertar
});

//proceso de editar

$('#tabla_datos').on('click', '.edit', function(){
	// $("#pass").css("display", "none");
	var id = $(this).attr('data');

	$('#modalAgregar').modal('show');
	$('#modalAgregar').find('.modal-title').text('Editar usuario');
	$('#formulario').attr('action', '<?= base_url('usuarioController/actualizar') ?>');

	$.ajax({
		type: 'ajax',
		method: 'post',
		url: '<?= base_url('usuarioController/get_datos') ?>',
		data: {id:id},
		dataType: 'json',

		success: function(datos){
			$('#id').val(datos.id);
			$('#nombre').val(datos.first_name);
			$('#apellidos').val(datos.last_name);
			$('#nombreusuario').val(datos.username);
            $('#correo').val(datos.email);
            $('#contrasena').val(datos.password);
			$('#compania').val(datos.company);
            $('#ci').val(datos.ci_persona);
			$('#usuario').val(datos.usuario_mae);

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
					url: '<?= base_url('usuarioController/eliminar') ?>',
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