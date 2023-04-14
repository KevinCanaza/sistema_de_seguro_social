<script>
	$(document).ready(function(){


        // Funcion ajax para hacer el proceso de inserción de datos
        $('#sacaFicha').click(function(){
        //mostramos el modal que tiene el formulario para ingresar nuevo registro
        $('#modalAgregar').modal('show');
        //modificamos el titulo del modal
        $('#modalAgregar').find('.modal-title').text('Nueva ficha');
        //modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
        $('#formulario').attr('action','<?= base_url('user/userController/ingresar')?>');   
        });


        // // Funcion ajax para el proceso de peticion de los datos de sintomas
        // get_servicio();//llamado a la funcion

        // function get_servicio(){
        //     $.ajax({
        //         type: 'ajax',
        //         url: '<?= base_url('user/userController/get_servicio') ?>',
        //         dataType: 'json',

        //         success: function(datos){
        //             var opt = '';
        //             var i;

        //             opt +="<option value=''>--Seleccione un servicio--</option>";

        //             for(i=0; i<datos.length; i++){
        //                 opt +="<option value='"+datos[i].id_servicios+"'>"+datos[i].descripcion+"</option>";
        //             }
        //             $('#servicio').html(opt);
        //         }
        //     });

        // }//fin funcion

        get_doctor();

        // Funcion ajax para el proceso de peticion de los datos
        
        function get_doctor(){
            $.ajax({
                
                type: 'ajax',
                url: '<?= base_url('user/userController/get_doctor') ?>',
                dataType: 'json',

                success: function(datos){
                    var opt = '';
                    var i;

                    opt +="<option value=''>--Seleccione un doctor--</option>";

                    for(i=0; i<datos.length; i++){
                        opt +="<option value='"+datos[i].id_doctor+"'>"+datos[i].nombre_doctor+"</option>";
                    }
                    $('#doctor').html(opt);

                    var opt = '';
                    var i;

                    opt +="<option value=''>--Seleccione un dia--</option>";

                    for(i=0; i<datos.length; i++){
                        opt +="<option value='"+datos[i].id_horario_medico+"'>"+datos[i].dia_laborable+" "+datos[i].hora_inicio+"-"+datos[i].hora_fin+"</option>";
                    }
                    $('#dias').html(opt);

                },
                
                error: function(respuesta) {
                    console.log("Error en la solicitud AJAX:", respuesta);
                },
            });

        }//fin funcion 
        

        // // Funcion ajax para el proceso de peticion de los datos de estudiante
        // get_estudiante();

        // function get_estudiante(){
        //     $.ajax({
        //         type: 'ajax',
        //         url: '<?= base_url('user/userController/get_estudiante') ?>',
        //         dataType: 'json',

        //         success: function(datos){
        //             var opt = '';
        //             var i;

        //             opt +="<option value=''>--Seleccione un estudiante--</option>";

        //             for(i=0; i<datos.length; i++){
        //                 opt +="<option value='"+datos[i].id_datos+"'>"+datos[i].first_name+" "+datos[i].last_name+"</option>";
        //             }
        //             $('#estudiante').html(opt);
        //         }
        //     });

        // }//fin funcion

        // // Funcion ajax para el proceso de peticion de los datos de estudiante
        // get_horario();

        // function get_horario(){
        //     $.ajax({
        //         type: 'ajax',
        //         url: '<?= base_url('user/userController/get_horario') ?>',
        //         dataType: 'json',

        //         success: function(datos){
        //             var opt = '';
        //             var i;

        //             opt +="<option value=''>--Seleccione un horario--</option>";

        //             for(i=0; i<datos.length; i++){
        //                 opt +="<option value='"+datos[i].id_horario_medico+"'>"+datos[i].hora_inicio+" "+datos[i].hora_fin+"</option>";
        //             }
        //             $('#horario').html(opt);
        //         }
        //     });

        // }//fin funcion
        


        // Funcion ajax para la accion del boton guardar
        $('#btnIngresar').click(function(){
            event.preventDefault(); // prevenir comportamiento predeterminado del botón
            // Modificar la acción del formulario
            $('#formulario').attr('action', '<?= base_url('user/userController/ingresar')?>');
            $url = $('#formulario').attr('action');
            
            $data = $('#formulario').serialize();

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: $url,
                data: $data,
                dataType: 'json',

                success: function(respuesta){
                    if(respuesta=='add'){
                        alertify.notify('Ingresado exitosamente!', 'success', 10, null);
                        $('#formulario')[0].reset();
                    } else if(respuesta =='edi'){
                        alertify.notify('Actualizado exitosamente!', 'success', 10, null);
                        $('#formulario')[0].reset();
                    } else {
                        alertify.notify('Error al realizar la operacion!', 'error', 10, null);
                    }
                }
            });
        });
        // fin del proceso de insertar datos

// Funcion ajax para hacer el proceso de edicion de datos
        $('#tabla_datos').on('click', '.edit', function(){
            var id = $(this).attr('data');
            $('#modalAgregar').modal('show');
            $('#modalAgregar').find('.modal-title').text('Editar ficha');
            $('#formulario').attr('action', '<?= base_url('fichaController/actualizar') ?>');
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url('fichaController/get_datos') ?>',
                data: {id:id},
                dataType: 'json',
                success: function(datos){
                    $('#id').val(datos.id_ficha);
                    $('#servicio').val(datos.id_servicio);
                    $('#doctor').val(datos.id_doctor);
                    $('#estudiante').val(datos.id_datos_estudiante);
                    $('#horario').val(datos.id_horario_doctor);
                    $('#fecha_registro').val(datos.fecha_registro);
                    $('#fecha_ficha').val(datos.fecha_ficha);
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
                    url: '<?= base_url('fichaController/eliminar') ?>',
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