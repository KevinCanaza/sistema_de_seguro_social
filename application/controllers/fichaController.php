<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fichaController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Ficha';
		$this->load->model('fichaModel');
	}
	public function index()
	{
		$this->load->view('fichaVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_ficha(){
		$respuesta = $this->fichaModel->get_ficha();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_servicio(){
		$respuesta = $this->fichaModel->get_servicio();
		echo json_encode($respuesta);
	}

    // Peticion de datos al modelo de cierta tabla en especifica
	public function get_doctor(){
		$respuesta = $this->fichaModel->get_doctor();
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_estudiante(){
		$respuesta = $this->fichaModel->get_estudiante();
		echo json_encode($respuesta);
	}	
    public function get_horario(){
		$respuesta = $this->fichaModel->get_horario();
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
        $datos['servicio'] = $this->input->post('servicios');
		$datos['doctor'] = $this->input->post('doctores');
        $datos['estudiante'] = $this->input->post('estudiantes');
		$datos['horario'] = $this->input->post('horarios');
        $datos['fecha_registro'] = $this->input->post('fecha_registro');
		$datos['fecha_ficha'] = $this->input->post('fecha_ficha');

		$respuesta = $this->fichaModel->set_ficha($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->fichaModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');

        $datos['servicio'] = $this->input->post('servicios');
		$datos['doctor'] = $this->input->post('doctores');
        $datos['estudiante'] = $this->input->post('estudiantes');
		$datos['horario'] = $this->input->post('horarios');
        $datos['fecha_registro'] = $this->input->post('fecha_registro');
		$datos['fecha_ficha'] = $this->input->post('fecha_ficha');
        
		$respuesta = $this->fichaModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->fichaModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
