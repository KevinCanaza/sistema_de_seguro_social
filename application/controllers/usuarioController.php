<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioController extends CI_Controller {
	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Usuarios';
		$this->load->model('User_model');
	}
	public function index()
	{
		$this->load->view('usuariosVista');
	}
	//Realizado peticion al modelo para nos devuelva datos
	public function get_usuario(){
		$respuesta = $this->User_model->get_usuario();
		echo json_encode($respuesta);
	}


	// rescatar datos del formulario para Insertar datos
	public function ingresar(){
		$datos['nombre'] = $this->input->post('firts_name');
		$datos['apellidos'] = $this->input->post('last_name');
		$datos['nombreusuario'] = $this->input->post('username');
		$datos['correo'] = $this->input->post('email');
		$datos['contrasena'] = $this->input->post('password');
		$datos['compania'] = $this->input->post('company');
		$datos['ci'] = $this->input->post('ci_persona');
		$datos['usuariomae'] = $this->input->post('usuario_mae');
		$datos['ip'] = $this->input->post('ip');

		$respuesta = $this->User_model->set_usuario($datos);
		echo json_encode($respuesta);
	}


	// Actualizando datos
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->User_model->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['nombre'] = $this->input->post('firts_name');
		$datos['apellidos'] = $this->input->post('last_name');
		$datos['nombreusuario'] = $this->input->post('username');
		$datos['correo'] = $this->input->post('email');
		// $datos['contrasena'] = $this->input->post('password');
		$datos['compania'] = $this->input->post('company');
		$datos['ci'] = $this->input->post('ci_persona');
		$datos['usuariomae'] = $this->input->post('usuario_mae');
		$datos['ip'] = $this->input->post('ip');

		$respuesta = $this->User_model->actualizar($datos);
		echo json_encode($respuesta);
	}
	// Eliminando datos
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->User_model->eliminar($id);
		echo json_encode($respuesta);
	}
}
