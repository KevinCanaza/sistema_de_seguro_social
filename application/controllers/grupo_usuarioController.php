<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grupo_usuarioController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Grupos de usuarios';
		$this->load->model('grupoUsuarioModel');
	}
	public function index()
	{
		$this->load->view('grupos_usuariosVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_grupo_usuario(){
		$respuesta = $this->grupoUsuarioModel->get_grupo_usuario();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_usuario(){
		$respuesta = $this->grupoUsuarioModel->get_usuario();
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_grupo(){
		$respuesta = $this->grupoUsuarioModel->get_grupo();
		echo json_encode($respuesta);
	}	

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
		$datos['usuario'] = $this->input->post('usuarios');
		$datos['grupo'] = $this->input->post('grupos');

		$respuesta = $this->grupoUsuarioModel->set_grupo_usuario($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->grupoUsuarioModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['usuario'] = $this->input->post('usuarios');
		$datos['grupo'] = $this->input->post('grupos');

		$respuesta = $this->grupoUsuarioModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->grupoUsuarioModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
