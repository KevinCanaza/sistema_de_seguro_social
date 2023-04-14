<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class especialidadController extends CI_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Especialidades';
		$this->load->model('especialidadModel');
	}
	public function index()
	{
		$this->load->view('especialidadVista');
	}
	//Realizado peticion al modelo para nos devuelva datos
	public function get_especialidad(){
		$respuesta = $this->especialidadModel->get_especialidad();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['especialidad'] = $this->input->post('nombre_especialidad');
		$datos['tipo'] = $this->input->post('tipo_especialidad');

		$respuesta = $this->especialidadModel->set_especialidad($datos);
		echo json_encode($respuesta);
	}
	// 

	// Actualizando datos
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->especialidadModel->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['especialidad'] = $this->input->post('nombre_especialidad');
		$datos['tipo'] = $this->input->post('tipo_especialidad');

		$respuesta = $this->especialidadModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	//

	// Eliminando datos
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->especialidadModel->eliminar($id);
		echo json_encode($respuesta);
	}
}
