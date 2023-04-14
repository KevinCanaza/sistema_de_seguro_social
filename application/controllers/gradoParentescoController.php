<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gradoParentescoController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Grado parentesco';
		$this->load->model('gradoParentescoModel');
	}
	public function index()
	{
		$this->load->view('gradoParentescoVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_grado_parentesco(){
		$respuesta = $this->gradoParentescoModel->get_grado_parentesco();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_apoderado(){
		$respuesta = $this->gradoParentescoModel->get_apoderado();
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_estudiante(){
		$respuesta = $this->gradoParentescoModel->get_estudiante();
		echo json_encode($respuesta);
	}	

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
        $datos['grado'] = $this->input->post('grado_parentesco');
        $datos['estudiante'] = $this->input->post('estudiantes');
		$datos['apoderado'] = $this->input->post('parientes');

		$respuesta = $this->gradoParentescoModel->set_grado_parentesco($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->gradoParentescoModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');

        $datos['grado'] = $this->input->post('grado_parentesco');
        $datos['estudiante'] = $this->input->post('estudiantes');
		$datos['apoderado'] = $this->input->post('parientes');

		$respuesta = $this->gradoParentescoModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->gradoParentescoModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
