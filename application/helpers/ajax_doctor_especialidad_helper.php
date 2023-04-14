<script>
	
	$(document).ready(function(){

		//llamado de la funcion para mostrar
		mostrarDatos();

		function mostrarDatos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('doctor_especialidadController/get_doctor_especialidad') ?>',
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
						'<td>'+datos[i].nombre_especialidad+'</td>'+
                        '<td> <button class="pd-setting">Active</button></td>'+
						'<td>'+'<a href="javascript:;" class="edit" data="'+datos[i].id_doctor_especialidad+'" > <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  '+
						'<td>'+'<a href="javascript:;" class="borrar" data="'+datos[i].id_doctor_especialidad+'" > <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a>'+
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
		};//fin de la funcion mostrar grupos de usuarios

        // Insertamos datos a la base de datos
        $('#agregar').click(function(){
        //mostramos el modal que tiene el formulario para ingresar un alumno
        $('#modalAgregar').modal('show');
        //modificamos el titulo del modal
        $('#modalAgregar').find('.modal-title').text('Nuevo Especialidad doctor');
        //modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
        $('#formulario').attr('action','<?= base_url('doctor_especialidadController/ingresar')?>');   
        });


        get_especialidad();//llamado a la funcion

        function get_especialidad(){
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('doctor_especialidadController/get_especialidad') ?>',
                dataType: 'json',

                success: function(datos){
                    var opt = '';
                    var i;

                    opt +="<option value=''>--Seleccione una especialidad--</option>";

                    for(i=0; i<datos.length; i++){
                        opt +="<option value='"+datos[i].id_especialidades+"'>"+datos[i].nombre_especialidad+"</option>";
                    }
                    $('#especialidad').html(opt);
                }
            });

        }//fin funcion get_usuario


        get_doctor();//llamado a la funcion

        function get_doctor(){
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('doctor_especialidadController/get_doctor') ?>',
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

        }//fin funcion get_curso



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
                // fin de insertar datos

        //proceso de editar
        $('#tabla_datos').on('click', '.edit', function(){
            var id = $(this).attr('data');
            $('#modalAgregar').modal('show');
            $('#modalAgregar').find('.modal-title').text('Editar grupo usuario');
            $('#formulario').attr('action', '<?= base_url('doctor_especialidadController/actualizar') ?>');
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url('doctor_especialidadController/get_datos') ?>',
                data: {id:id},
                dataType: 'json',
                success: function(datos){
                    $('#id').val(datos.id_doctor_especialidad);
                    $('#doctor').val(datos.id_doctor);
                    $('#especialidad').val(datos.id_especialidad);
                }//fin de success
            });//fin de ajax
        });//fin del evento edit
        
        $('#tabla_datos').on('click', '.borrar', function(){
            $id = $(this).attr('data');
            $('#modalBorrar').modal('show');
            $('#btnBorrar').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?= base_url('doctor_especialidadController/eliminar') ?>',
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