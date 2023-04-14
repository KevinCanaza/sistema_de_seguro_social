<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grupoController extends Verificacion_Controller {


	public $site_title;
	public function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Grupos';
		$this->load->model('grupoModel');
	}
	public function index()
	{
		$this->load->view('gruposVista');
	}

	public function get_grupo(){
		$respuesta = $this->grupoModel->get_grupo();
		echo json_encode($respuesta);
	}



	// Insertando grupo
	public function ingresar(){
		$datos['nombre'] = $this->input->post('name');
		$datos['descripcion'] = $this->input->post('description');

		$respuesta = $this->grupoModel->set_grupo($datos);
		echo json_encode($respuesta);
	}


	// Actualizando datos
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->grupoModel->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['nombre'] = $this->input->post('name');
		$datos['descripcion'] = $this->input->post('description');

		$respuesta = $this->grupoModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// Eliminando datos
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->grupoModel->eliminar($id);
		echo json_encode($respuesta);
	}

}




	

