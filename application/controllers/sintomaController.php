<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sintomaController extends CI_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Sintomas';
		$this->load->model('sintomaModel');
	}
	public function index()
	{
		$this->load->view('sintomasVista');
	}
	//Realizado peticion al modelo para nos devuelva datos
	public function get_sintoma(){
		$respuesta = $this->sintomaModel->get_sintoma();
		echo json_encode($respuesta);
	}

    // Recibimos los datos del formulario para mandar al modelo para su inserción

	public function ingresar(){
		$datos['sintoma'] = $this->input->post('nombre_sintoma');
	
		$respuesta = $this->sintomaModel->set_sintoma($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->sintomaModel->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['sintoma'] = $this->input->post('nombre_sintoma');

		$respuesta = $this->sintomaModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	//

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->sintomaModel->eliminar($id);
		echo json_encode($respuesta);
	}
}
