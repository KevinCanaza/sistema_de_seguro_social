<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carreraController extends CI_Controller {

	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Carreras';
		$this->load->model('carreraModel');
	}
	public function index()
	{
		$this->load->view('carreraVista');
	}
	//Realizado peticion al modelo para nos devuelva datos
	public function get_carrera(){
		$respuesta = $this->carreraModel->get_carrera();
		echo json_encode($respuesta);
	}

    // Recibimos los datos del formulario para mandar al modelo para su inserción

	public function ingresar(){
		$datos['carrera'] = $this->input->post('nombre_carrera');
		$datos['area'] = $this->input->post('area');

		$respuesta = $this->carreraModel->set_carrera($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->carreraModel->get_datos($id);
		echo json_encode($respuesta);
	}
	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['carrera'] = $this->input->post('nombre_carrera');
		$datos['area'] = $this->input->post('area');

		$respuesta = $this->carreraModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	//

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->carreraModel->eliminar($id);
		echo json_encode($respuesta);
	}
}
