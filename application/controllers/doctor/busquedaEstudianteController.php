<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class busquedaEstudianteController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Busqueda de Estudiantes';
		$this->load->model('doctor/busquedaEstudianteModel');
	}
	public function index()
	{
		$this->load->view('doctor/busquedaEstudianteVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_datos_estudiante(){
		$respuesta = $this->busquedaEstudianteModel->get_datos_estudiante();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_usuario(){
		$respuesta = $this->datosEstudianteModel->get_usuario();
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_carrera(){
		$respuesta = $this->datosEstudianteModel->get_carrera();
		echo json_encode($respuesta);
	}	

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
        $datos['nombre'] = $this->input->post('first_name');
		$datos['apellidos'] = $this->input->post('last_name');
        $datos['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
		$datos['ci'] = $this->input->post('ci');
        $datos['carrera'] = $this->input->post('carreras');
		$datos['direccion'] = $this->input->post('direccion_est');
        $datos['telefono'] = $this->input->post('telefono');
		$datos['inicio_seguro'] = $this->input->post('fecha_registro');
		$datos['fin_seguro'] = $this->input->post('fecha_fin_seguro');
		$datos['usuario'] = $this->input->post('usuarios');

		$respuesta = $this->datosEstudianteModel->set_datos_estudiante($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->datosEstudianteModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');

        $datos['nombre'] = $this->input->post('first_name');
		$datos['apellidos'] = $this->input->post('last_name');
        $datos['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
		$datos['ci'] = $this->input->post('ci');
        $datos['carrera'] = $this->input->post('carreras');
		$datos['direccion'] = $this->input->post('direccion_est');
        $datos['telefono'] = $this->input->post('telefono');
		$datos['inicio_seguro'] = $this->input->post('fecha_registro');
		$datos['fin_seguro'] = $this->input->post('fecha_fin_seguro');
		$datos['usuario'] = $this->input->post('usuarios');

		$respuesta = $this->datosEstudianteModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->datosEstudianteModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
