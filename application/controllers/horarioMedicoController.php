<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horarioMedicoController extends CI_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Horarios del doctor';
		$this->load->model('horarioMedicoModel');
	}
	public function index()
	{
		$this->load->view('horarioMedicoVista');
	}
	//Realizado peticion al modelo para nos devuelva datos
	public function get_horario(){
		$respuesta = $this->horarioMedicoModel->get_horario();
		echo json_encode($respuesta);
	}


	// rescatar datos del formulario para Insertar datos
    public function get_doctor(){
		$respuesta = $this->horarioMedicoModel->get_doctor();
		echo json_encode($respuesta);
	}	

	public function ingresar(){
		$dias_laborables = implode(',', $this->input->post('dia_laborable'));
		// $datos['dias'] = $this->input->post('dia_laborable');
		$datos['dias'] = $dias_laborables;
		$datos['entrada'] = $this->input->post('hora_inicio');
		$datos['salida'] = $this->input->post('hora_fin');
		$datos['duracion'] = $this->input->post('cita_duracion');
		$datos['doctor'] = $this->input->post('doctores');

		$respuesta = $this->horarioMedicoModel->set_horario($datos);
		echo json_encode($respuesta);
	}


	// Actualizando datos
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->horarioMedicoModel->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');
		$datos['dias'] = implode(',', $this->input->post('dia_laborable'));
		$datos['entrada'] = $this->input->post('hora_inicio');
		$datos['salida'] = $this->input->post('hora_fin');
        $datos['duracion'] = $this->input->post('cita_duracion');
		$datos['doctor'] = $this->input->post('doctores');
		
		$respuesta = $this->horarioMedicoModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// Eliminando datos
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->horarioMedicoModel->eliminar($id);
		echo json_encode($respuesta);
	}
}
