<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class itemRatingController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Item rating';
		$this->load->model('itemRatingModel');
	}
	public function index()
	{
		$this->load->view('itemRatingVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_item_rating(){
		$respuesta = $this->itemRatingModel->get_item_rating();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_usuario(){
		$respuesta = $this->itemRatingModel->get_usuario();
		echo json_encode($respuesta);
	}

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_notificacion(){
		$respuesta = $this->itemRatingModel->get_notificacion();
		echo json_encode($respuesta);
	}	

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
        $datos['letra'] = $this->input->post('letras');
		$datos['usuario'] = $this->input->post('usuarios');
        $datos['unnamed2'] = $this->input->post('unnamed2');
		$datos['titulo'] = $this->input->post('titulos');
        $datos['comentario'] = $this->input->post('comentarios');
		$datos['notificacion'] = $this->input->post('notificaciones');


		$respuesta = $this->itemRatingModel->set_item_rating($datos);
		echo json_encode($respuesta);
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->itemRatingModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		$datos['id'] = $this->input->post('id_dato');

        $datos['letra'] = $this->input->post('letras');
		$datos['usuario'] = $this->input->post('usuarios');
        $datos['unnamed2'] = $this->input->post('unnamed2');
		$datos['titulo'] = $this->input->post('titulos');
        $datos['comentario'] = $this->input->post('comentarios');
		$datos['notificacion'] = $this->input->post('notificaciones');

		$respuesta = $this->itemRatingModel->actualizar($datos);
		echo json_encode($respuesta);
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->itemRatingModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
