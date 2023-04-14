<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sintomaEstudianteController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Sintomas Estudiantes';
		$this->load->model('sintomaEstudianteModel');
	}
	public function index()
	{
		$this->load->view('sintomaEstudianteVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_sintoma_estudiante(){
		$respuesta = $this->sintomaEstudianteModel->get_sintoma_estudiante();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_sintoma(){
		$respuesta = $this->sintomaEstudianteModel->get_sintoma();
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_estudiante(){
		$respuesta = $this->sintomaEstudianteModel->get_estudiante();
		echo json_encode($respuesta);
	}	

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
        $datos['estudiante'] = $this->input->post('estudiantes');
		$datos['sintoma'] = $this->input->post('sintomas');

		$respuesta = $this->sintomaEstudianteModel->set_sintoma_estudiante($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->sintomaEstudianteModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');

        $datos['estudiante'] = $this->input->post('estudiantes');
		$datos['sintoma'] = $this->input->post('sintomas');

		$respuesta = $this->sintomaEstudianteModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->sintomaEstudianteModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
