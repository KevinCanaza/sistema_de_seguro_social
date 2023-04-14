<script>
	
	$(document).ready(function(){

		//LLamamos la funcion para mostrar los datos en la tabla
		mostrarDatos();

		function mostrarDatos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('servicioAtencionController/get_servicio_horario') ?>',
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
						'<td>'+datos[i].gestion+'</td>'+
                        '<td>'+datos[i].fecha_inicio+'</td>'+
                        '<td>'+datos[i].fecha_fin+'</td>'+
                        '<td>'+datos[i].fuente+'</td>'+
                        '<td>'+datos[i].descripcion+'</td>'+
                        '<td> <img src="<?=base_url()?>./uploads/'+datos[i].foto_servicio+'"></td>'+
                        '<td> <button class="pd-setting">Active</button></td>'+
						'<td>'+'<a href="javascript:;" class="edit" data="'+datos[i].id_servicios+'" > <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  '+
						'<td>'+'<a href="javascript:;" class="borrar" data="'+datos[i].id_servicios+'" > <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a>'+
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
            $('#modalAgregar').find('.modal-title').text('Nuevo servicio');
            //modificamos el titulo del boton imagen
		    $('#subir-foto').text('Subir foto');
            //modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
            $('#formulario').attr('action','<?= base_url('servicioAtencionController/ingresar')?>');   
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

        // Funcion ajax para el proceso de peticion de los datos de sintomas
        get_doctor();//llamado a la funcion

        function get_doctor(){
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('servicioAtencionController/get_doctor') ?>',
                dataType: 'json',

                success: function(datos){
                    var opt = '';
                    var i;

                    opt +="<option value=''>--Seleccione un doctor--</option>";

                    for(i=0; i<datos.length; i++){
                        opt +="<option value='"+datos[i].id_doctor+"'>"+datos[i].nombre_doctor+"</option>";
                    }
                    $('#doctor').html(opt);
                }
            });

        }//fin funcion


        // Funcion ajax para la accion del boton guardar
        $('#btnGuardar').click(function(){
            $url = $('#formulario').attr('action');
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
            $('#modalAgregar').find('.modal-title').text('Editar servicio');
            //modificamos el titulo del boton imagen
	        $('#subir-foto').text('Actualizar foto');
            $('#formulario').attr('action', '<?= base_url('servicioAtencionController/actualizar') ?>');
            
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url('servicioAtencionController/get_datos') ?>',
                data: {id:id},
                dataType: 'json',
                success: function(datos){
                    $('#id').val(datos.id_servicios);
                    $('#doctor').val(datos.id_doctor_encargado);
                    $('#gestion').val(datos.gestion);
                    $('#inicio').val(datos.fecha_inicio);
                    $('#fin').val(datos.fecha_fin);
                    $('#fuente').val(datos.fuente);
                    $('#descripcion').val(datos.descripcion);

                    $('#mostrar-aqui').attr('src', '<?=base_url()?>uploads/'+datos.foto_servicio);
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
                    url: '<?= base_url('servicioAtencionController/eliminar') ?>',
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