<script>
	
	$(document).ready(function(){

		//LLamamos la funcion para mostrar los datos en la tabla
		mostrarDatos();

		function mostrarDatos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('sintomaEstudianteController/get_sintoma_estudiante') ?>',
				dataType: 'json',

				success: function(datos){
					var tabla = '';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){
						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].first_name+' '+datos[i].last_name+'</td>'+
						'<td>'+datos[i].nombre_sintoma+'</td>'+
                        '<td> <button class="pd-setting">Active</button></td>'+
						'<td>'+'<a href="javascript:;" class="edit" data="'+datos[i].id_sint_est+'" > <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  '+
						'<td>'+'<a href="javascript:;" class="borrar" data="'+datos[i].id_sint_est+'" > <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a>'+
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
        $('#modalAgregar').find('.modal-title').text('Nuevo sintoma del estudiante');
        //modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
        $('#formulario').attr('action','<?= base_url('sintomaEstudianteController/ingresar')?>');   
        });


        // Funcion ajax para el proceso de peticion de los datos de estudiante
        get_estudiante();

        function get_estudiante(){
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('sintomaEstudianteController/get_estudiante') ?>',
                dataType: 'json',

                success: function(datos){
                    var opt = '';
                    var i;

                    opt +="<option value=''>--Seleccione un estudiante--</option>";

                    for(i=0; i<datos.length; i++){
                        opt +="<option value='"+datos[i].id_datos+"'>"+datos[i].first_name+" "+datos[i].last_name+"</option>";
                    }
                    $('#estudiante').html(opt);
                }
            });

        }//fin funcion


        // Funcion ajax para el proceso de peticion de los datos de sintomas
        get_sintoma();//llamado a la funcion

        function get_sintoma(){
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('sintomaEstudianteController/get_sintoma') ?>',
                dataType: 'json',

                success: function(datos){
                    var opt = '';
                    var i;

                    opt +="<option value=''>--Seleccione una sintoma--</option>";

                    for(i=0; i<datos.length; i++){
                        opt +="<option value='"+datos[i].id_sintoma+"'>"+datos[i].nombre_sintoma+"</option>";
                    }
                    $('#sintoma').html(opt);
                }
            });

        }//fin funcion


        // Funcion ajax para la accion del boton guardar
        $('#btnGuardar').click(function(){
            $url = $('#formulario').attr('action');
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
            $('#modalAgregar').find('.modal-title').text('Editar sintoma del estudiante');
            $('#formulario').attr('action', '<?= base_url('sintomaEstudianteController/actualizar') ?>');
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url('sintomaEstudianteController/get_datos') ?>',
                data: {id:id},
                dataType: 'json',
                success: function(datos){
                    $('#id').val(datos.id_sint_est);
                    $('#estudiante').val(datos.id_datos);
                    $('#sintoma').val(datos.id_sintoma);
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
                    url: '<?= base_url('sintomaEstudianteController/eliminar') ?>',
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