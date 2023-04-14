<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class apoderadoController extends CI_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Apoderados';
		$this->load->model('apoderadoModel');
	}
	public function index()
	{
		$this->load->view('apoderadoVista');
	}
	//Realizado peticion al modelo para nos devuelva datos
	public function get_apoderado(){
		$respuesta = $this->apoderadoModel->get_apoderado();
		echo json_encode($respuesta);
	}

    // Recibimos los datos del formulario para mandar al modelo para su inserción

	public function ingresar(){
		$datos['nombre'] = $this->input->post('first_name');
		$datos['apellidos'] = $this->input->post('last_name');
		$datos['ci'] = $this->input->post('ci');
		$datos['celular'] = $this->input->post('celular');
		$datos['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');

		$respuesta = $this->apoderadoModel->set_apoderado($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->apoderadoModel->get_datos($id);
		echo json_encode($respuesta);
	}
	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['nombre'] = $this->input->post('first_name');
		$datos['apellidos'] = $this->input->post('last_name');
		$datos['ci'] = $this->input->post('ci');
		$datos['celular'] = $this->input->post('celular');
		$datos['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');

		$respuesta = $this->apoderadoModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	//

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->apoderadoModel->eliminar($id);
		echo json_encode($respuesta);
	}
}
