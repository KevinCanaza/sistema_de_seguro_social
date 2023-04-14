<?php defined('BASEPATH') or exit('');
class userController extends MY_Controller {
	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Usuario';
		// Llamado al modelo
		$this->load->model('usuario/sacarFichaModel');
	}

	function index()
	{
		$this->load->view('users/usuarioDashboard');
	}
	function sacarFicha()
	{
		$this->load->view('users/sacarFichaVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_ficha(){
		$respuesta = $this->sacarFichaModel->get_ficha();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_servicio(){
		$respuesta = $this->sacarFichaModel->get_servicio();
		echo json_encode($respuesta);
	}

    // Peticion de datos al modelo de cierta tabla en especifica
	public function get_doctor(){

		$respuesta = $this->sacarFichaModel->get_doctor();
	
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_estudiante(){
		$respuesta = $this->sacarFichaModel->get_estudiante();
		echo json_encode($respuesta);
	}	
    public function get_horario(){
		$respuesta = $this->sacarFichaModel->get_horario();
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
        $datos['ci'] = $this->input->post('ci');
		$datos['doctor'] = $this->input->post('doctores');
        $datos['dia'] = $this->input->post('dias');
		$datos['horario'] = $this->input->post('horarios');
        $datos['fecha_registro'] = $this->input->post('fecha_registro');
		$datos['fecha_ficha'] = $this->input->post('fecha_ficha');

		$respuesta = $this->sacarFichaModel->set_ficha($datos);
		echo json_encode($respuesta);
	}
	//
}