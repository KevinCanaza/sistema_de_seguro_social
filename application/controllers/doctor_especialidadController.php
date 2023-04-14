<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class doctor_especialidadController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Especialidades de doctores';
		$this->load->model('doctor_especialidadModel');
	}
	public function index()
	{
		$this->load->view('doctor_especialidadVista');
	}

	// le pedimos peticion al modelo para el listado de los datos
	public function get_doctor_especialidad(){
		$respuesta = $this->doctor_especialidadModel->get_doctor_especialidad();
		echo json_encode($respuesta);
	}
	// 

	// Peticiones para insertar datos
	public function get_especialidad(){
		$respuesta = $this->doctor_especialidadModel->get_especialidad();
		echo json_encode($respuesta);
	}

	public function get_doctor(){
		$respuesta = $this->doctor_especialidadModel->get_doctor();
		echo json_encode($respuesta);
	}	

	public function ingresar(){
		$datos['especialidad'] = $this->input->post('especialidades');
		$datos['doctor'] = $this->input->post('doctores');

		$respuesta = $this->doctor_especialidadModel->set_doctor_especialidad($datos);
		echo json_encode($respuesta);
	}
	// 

	// Actualizando datos
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->doctor_especialidadModel->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['doctor'] = $this->input->post('doctores');
		$datos['especialidad'] = $this->input->post('especialidades');

		$respuesta = $this->doctor_especialidadModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	//Ekiminando datos
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->doctor_especialidadModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
