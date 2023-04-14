<script>
	
	$(document).ready(function(){

		//LLamamos la funcion para mostrar los datos en la tabla
		mostrarDatos();

		function mostrarDatos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('carreraController/get_carrera') ?>',
				dataType: 'json',

				success: function(datos){
					var tabla = '';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){
						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre_carrera+'</td>'+
                        '<td>'+datos[i].area+'</td>'+
						'<td> <button class="pd-setting">Active</button></td>'+
						'<td>'+'<a href="javascript:;" class="edit" data="'+datos[i].id_carrera+'" > <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  '+
						'<td>'+'<a href="javascript:;" class="borrar" data="'+datos[i].id_carrera+'" > <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a>'+
						
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
        $('#modalAgregar').find('.modal-title').text('Nueva carrera');
        //modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
        $('#formulario').attr('action','<?= base_url('carreraController/ingresar')?>');   
        });

        // Funcion ajax para la accion del boton guardar
        $('#btnGuardar').click(function(){
            $url = $('#formulario').attr('action');

// Validar el campo "nombre"
if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test($('#carrera').val())) {
    alertify.notify('El campo carrera sólo puede contener letras, espacios y tildes', 'error', 10, null);
    return;
}
// Validar el campo "nombre"
if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test($('#area').val())) {
    alertify.notify('El campo area sólo puede contener letras, espacios y tildes', 'error', 10, null);
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
            $('#modalAgregar').find('.modal-title').text('Editar carrera');
            $('#formulario').attr('action', '<?= base_url('carreraController/actualizar') ?>');
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url('carreraController/get_datos') ?>',
                data: {id:id},
                dataType: 'json',
                success: function(datos){
                    $('#id').val(datos.id_carrera);
                    $('#carrera').val(datos.nombre_carrera);
                    $('#area').val(datos.area);
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
					url: '<?= base_url('carreraController/eliminar') ?>',
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