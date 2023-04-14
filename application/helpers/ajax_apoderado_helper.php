<script>
	
	$(document).ready(function(){

		//LLamamos la funcion para mostrar los datos en la tabla
		mostrarDatos();

		function mostrarDatos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('apoderadoController/get_apoderado') ?>',
				dataType: 'json',

				success: function(datos){
					var tabla = '';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){
						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].first_name+'</td>'+
                        '<td>'+datos[i].last_name+'</td>'+
                        '<td>'+datos[i].ci+'</td>'+
                        '<td>'+datos[i].celular+'</td>'+
                        '<td>'+datos[i].fecha_nacimiento+'</td>'+
						'<td> <button class="pd-setting">Active</button></td>'+
						'<td>'+'<a href="javascript:;" class="edit" data="'+datos[i].id_apoderado+'" > <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  '+
						'<td>'+'<a href="javascript:;" class="borrar" data="'+datos[i].id_apoderado+'" > <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a>'+
						
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
		};//fin de la funcion para mostrar datos en la funcion


        // Funcion ajax para hacer el proceso de inserción de datos

        $('#agregar').click(function(){
        //mostramos el modal que tiene el formulario para agregar nuevo registro
        $('#modalAgregar').modal('show');
        //modificamos el titulo del modal
        $('#modalAgregar').find('.modal-title').text('Nuevo apoderado');
        //modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
        $('#formulario').attr('action','<?= base_url('apoderadoController/ingresar')?>');   
        });

        // Funcion ajax para la accion del boton guardar
        $('#btnGuardar').click(function(){
            $url = $('#formulario').attr('action');

			// Validar el campo "nombre"
			if (!/^[a-zA-Z\s]*$/.test($('#nombre').val())) {
				alertify.notify('El campo nombre sólo puede contener letras y, opcionalmente, espacios en blanco', 'error', 10, null);
				return;
			}
			// Validar el campo "apellidos"
			if (!/^[a-zA-Z\s]*$/.test($('#apellidos').val())) {
				alertify.notify('El campo nombre sólo puede contener letras y, opcionalmente, espacios en blanco', 'error', 10, null);
				return;
			}
			// Validar el campo "edad"
			if (!/^[0-9]+$/.test($('#ci').val())) {
				alertify.notify('El campo edad sólo puede contener números', 'error', 10, null);
				return;
			}
			// Obtener la fecha de nacimiento del campo correspondiente
			
			var fechaNacimiento = new Date($('#fecha_nacimiento').val());

			// Calcular la edad a partir de la fecha de nacimiento
			var edad = new Date().getFullYear() - fechaNacimiento.getFullYear();

			// Verificar si la edad es mayor o igual a 18 años
			if (edad < 18) {
				alertify.notify('Debes tener al menos 18 años', 'error', 10, null);
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
        });
                // fin del proceso de insertar datos



// Funcion ajax para hacer el proceso de edicion de datos

$('#tabla_datos').on('click', '.edit', function(){
            var id = $(this).attr('data');
            $('#modalAgregar').modal('show');
            $('#modalAgregar').find('.modal-title').text('Editar apoderado');
            $('#formulario').attr('action', '<?= base_url('apoderadoController/actualizar') ?>');
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url('apoderadoController/get_datos') ?>',
                data: {id:id},
                dataType: 'json',
                success: function(datos){
                    $('#id').val(datos.id_apoderado);
                    $('#nombre').val(datos.first_name);
                    $('#apellidos').val(datos.last_name);
                    $('#ci').val(datos.ci);
                    $('#celular').val(datos.celular);
                    $('#fecha_nacimiento').val(datos.fecha_nacimiento);
                }//fin de success
            });//fin de ajax
        });//fin del evento edit

// Funcion ajax para hacer el proceso de eliminacion lógica de datos
$('#tabla_datos').on('click', '.borrar', function(){
			$id = $(this).attr('data');
			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?= base_url('apoderadoController/eliminar') ?>',
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