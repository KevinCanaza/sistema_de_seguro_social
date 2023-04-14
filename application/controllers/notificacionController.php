<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notificacionController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Notificaciones';
		$this->load->model('notificacionModel');
	}
	public function index()
	{
		$this->load->view('notificacionVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_notificacion(){
		$respuesta = $this->notificacionModel->get_notificacion();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_doctor(){
		$respuesta = $this->notificacionModel->get_doctor();
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_estudiante(){
		$respuesta = $this->notificacionModel->get_estudiante();
		echo json_encode($respuesta);
	}
    
    // Peticion de datos al modelo de cierta tabla en especifica
	public function get_usuario(){
		$respuesta = $this->notificacionModel->get_usuario();
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
        $datos['estudiante'] = $this->input->post('estudiantes');
        $datos['usuario'] = $this->input->post('usuarios');
        $datos['celular'] = $this->input->post('celular_emerg');
        $datos['comentario'] = $this->input->post('comentario');
        $datos['detalle'] = $this->input->post('detalle_not');
        $datos['unnamed2'] = $this->input->post('unnamed2');
        $datos['grado'] = $this->input->post('grado_incidente');
		$datos['doctor'] = $this->input->post('doctores');
        $datos['fecha'] = $this->input->post('fechas');

		$respuesta = $this->notificacionModel->set_notificacion($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->notificacionModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');

        $datos['estudiante'] = $this->input->post('estudiantes');
        $datos['usuario'] = $this->input->post('usuarios');
        $datos['celular'] = $this->input->post('celular_emerg');
        $datos['comentario'] = $this->input->post('comentario');
        $datos['detalle'] = $this->input->post('detalle_not');
        $datos['unnamed2'] = $this->input->post('unnamed2');
        $datos['grado'] = $this->input->post('grado_incidente');
		$datos['doctor'] = $this->input->post('doctores');
        $datos['fecha'] = $this->input->post('fechas');
        
		$respuesta = $this->notificacionModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->notificacionModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
