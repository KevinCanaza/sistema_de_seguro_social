<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enfermedadController extends Verificacion_Controller {


	public $site_title;
	public function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Enfermedades';
		$this->load->model('enfermedadModel');
	}
	public function index()
	{
		$this->load->view('enfermedadVista');
	}

	public function get_enfermedad(){
		$respuesta = $this->enfermedadModel->get_enfermedad();
		echo json_encode($respuesta);
	}



	// Insertando grupo
	public function ingresar(){
		$datos['enfermedad'] = $this->input->post('nombre_enfermedad');

		$respuesta = $this->enfermedadModel->set_enfermedad($datos);
		echo json_encode($respuesta);
	}


	// Actualizando datos
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->enfermedadModel->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['enfermedad'] = $this->input->post('nombre_enfermedad');

		$respuesta = $this->enfermedadModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// Eliminando datos
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->enfermedadModel->eliminar($id);
		echo json_encode($respuesta);
	}

}




	

