<script>
	
	$(document).ready(function(){

		//LLamamos la funcion para mostrar los datos en la tabla
		mostrarDatos();

		function mostrarDatos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('datosEstudianteController/get_datos_estudiante') ?>',
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
                        '<td>'+datos[i].fecha_nacimiento+'</td>'+
						'<td>'+datos[i].CI+'</td>'+
                        '<td>'+datos[i].nombre_carrera+'</td>'+
						'<td>'+datos[i].direccion_est+'</td>'+
                        '<td>'+datos[i].telefono+'</td>'+
						'<td>'+datos[i].fecha_registro+'</td>'+
                        '<td>'+datos[i].fecha_fin_seguro+'</td>'+
                        '<td> <img src="<?=base_url()?>./uploads/'+datos[i].imagen+'"></td>'+
                        
                        '<td> <button class="pd-setting">Active</button></td>'+
                        '<td> <button type="button" class="btn btn-custon-rounded-three btn-danger">No</button></td>'+
						'<td>'+'<a href="javascript:;" class="edit" data="'+datos[i].id_datos+'" > <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  '+
						'<td>'+'<a href="javascript:;" class="borrar" data="'+datos[i].id_datos+'" > <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a>'+
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
            //mostramos el modal que tiene el formulario para ingresar nuevo registro
            $('#modalAgregar').modal('show');
            //modificamos el titulo del modal
            $('#modalAgregar').find('.modal-title').text('Nuevo estudiante');
            //modificamos el titulo del boton imagen
		    $('#subir-foto').text('Subir foto');
            //modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
            $('#formulario').attr('action','<?= base_url('datosEstudianteController/ingresar')?>');   
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

        // Funcion ajax para el proceso de peticion de los datos de usuario
        get_usuario();

        function get_usuario(){
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('datosEstudianteController/get_usuario') ?>',
                dataType: 'json',

                success: function(datos){
                    var opt = '';
                    var i;

                    opt +="<option value=''>--Seleccione un usuario--</option>";

                    for(i=0; i<datos.length; i++){
                        opt +="<option value='"+datos[i].id+"'>"+datos[i].username+"</option>";
                    }
                    $('#usuario').html(opt);
                }
            });

        }//fin funcion


        // Funcion ajax para el proceso de peticion de los datos de carreras
        get_carrera();//llamado a la funcion

        function get_carrera(){
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('datosEstudianteController/get_carrera') ?>',
                dataType: 'json',

                success: function(datos){
                    var opt = '';
                    var i;

                    opt +="<option value=''>--Seleccione una carrera--</option>";

                    for(i=0; i<datos.length; i++){
                        opt +="<option value='"+datos[i].id_carrera+"'>"+datos[i].nombre_carrera+"</option>";
                    }
                    $('#carrera').html(opt);
                }
            });

        }//fin funcion

        // Funcion ajax para la accion del boton guardar
        $('#btnGuardar').click(function(){
            $url = $('#formulario').attr('action');

            // Validar el campo "nombre"
            if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test($('#nombre').val())) {
                alertify.notify('El campo nombre sólo puede contener letras, espacios y tildes', 'error', 10, null);
                return;
            }
            // Validar el campo "apellidos"
            if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test($('#apellidos').val())) {
                alertify.notify('El campo apellidos sólo puede contener letras, espacios y tildes', 'error', 10, null);
                return;
            }
            // Obtener la fecha de nacimiento del campo correspondiente
                        
            var fechaNacimiento = new Date($('#fecha_nacimiento').val());

            // Calcular la edad a partir de la fecha de nacimiento
            var edad = new Date().getFullYear() - fechaNacimiento.getFullYear();

            // Verificar si la edad es mayor o igual a 18 años
            if (edad < 18) {
                alertify.notify('Debes tener al menos 18 años ', 'error', 10, null);
                return;
            }

            // Validar el campo "ci"
            if (!/^[0-9]+$/.test($('#ci').val())) {
                alertify.notify('El campo Cédula de identidad sólo puede contener números', 'error', 10, null);
                return;
            }

            // Validar el campo "telefono"
            if (!/^[0-9]+$/.test($('#telefono').val())) {
                alertify.notify('El campo telefono sólo puede contener números', 'error', 10, null);
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
        // fin del proceso de insertar datos

// Funcion ajax para hacer el proceso de edicion de datos
        $('#tabla_datos').on('click', '.edit', function(){
            var id = $(this).attr('data');

            $('#modalAgregar').modal('show');
            $('#modalAgregar').find('.modal-title').text('Editar grupo usuario');
            //modificamos el titulo del boton imagen
	        $('#subir-foto').text('Actualizar foto');
            $('#formulario').attr('action', '<?= base_url('datosEstudianteController/actualizar') ?>');
            
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url('datosEstudianteController/get_datos') ?>',
                data: {id:id},
                dataType: 'json',

                success: function(datos){
                    $('#id').val(datos.id_datos);
                    $('#nombre').val(datos.first_name);
                    $('#apellidos').val(datos.last_name);
                    $('#fecha_nacimiento').val(datos.fecha_nacimiento);
                    $('#ci').val(datos.CI);
                    $('#carrera').val(datos.carrera_unidad);
                    $('#direccion').val(datos.direccion_est);
                    $('#telefono').val(datos.telefono);
                    $('#fecha_registro').val(datos.fecha_registro);
                    $('#fecha_fin_seguro').val(datos.fecha_fin_seguro);

                    $('#mostrar-aqui').attr('src', '<?=base_url()?>uploads/'+datos.imagen);
                    
                    $('#usuario').val(datos.id_usuario);
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
                    url: '<?= base_url('datosEstudianteController/eliminar') ?>',
                    data: {id:$id},
                    dataType: 'json',
                    success: function(respuesta){
                        $('#modalBorrar').modal('hide');
                        if(respuesta == true){
                            alertify.notify('Eliminado exitosamente!', 'success', 10, null);
                            mostrarDatos();
                        }else{
                            // console.log()
                            alertify.notify('Error al eliminar!', 'error', 10, null);
                        }
                    }
                });
            });
		});//fin de eliminar

});//fin document

</script>