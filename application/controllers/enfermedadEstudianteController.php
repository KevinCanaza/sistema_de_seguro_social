<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enfermedadEstudianteController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Enfermedad Estudiantes';
		$this->load->model('enfermedadEstudianteModel');
	}
	public function index()
	{
		$this->load->view('enfermedadEstudianteVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_enfermedad_estudiante(){
		$respuesta = $this->enfermedadEstudianteModel->get_enfermedad_estudiante();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_enfermedad(){
		$respuesta = $this->enfermedadEstudianteModel->get_enfermedad();
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_estudiante(){
		$respuesta = $this->enfermedadEstudianteModel->get_estudiante();
		echo json_encode($respuesta);
	}	

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
        $datos['estudiante'] = $this->input->post('estudiantes');
		$datos['enfermedad'] = $this->input->post('enfermedades');

		$respuesta = $this->enfermedadEstudianteModel->set_enfermedad_estudiante($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->enfermedadEstudianteModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');

        $datos['estudiante'] = $this->input->post('estudiantes');
		$datos['enfermedad'] = $this->input->post('enfermedades');

		$respuesta = $this->enfermedadEstudianteModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->enfermedadEstudianteModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
