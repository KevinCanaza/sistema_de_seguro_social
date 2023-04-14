<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class servicioAtencionController extends Verificacion_Controller {


	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Servicios';
		$this->load->model('servicioAtencionModel');
	}
	public function index()
	{
		$this->load->view('servicioAtencionVista');
	}

	//Realizado peticion al modelo para nos devuelva datos
	public function get_servicio_horario(){
		$respuesta = $this->servicioAtencionModel->get_servicio_horario();
		echo json_encode($respuesta);
	}
	// 

	// Peticion de datos al modelo de cierta tabla en especifica
	public function get_doctor(){
		$respuesta = $this->servicioAtencionModel->get_doctor();
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su inserción
	public function ingresar(){
		if(isset($_FILES['foto_servicio']) && $_FILES['foto_servicio']['error'] != UPLOAD_ERR_NO_FILE) {
			// Cargar la biblioteca de carga de archivos de CodeIgniter
			$this->load->library('upload');
			
			// Configuración de carga de archivos
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';
			
			// Inicializar la configuración de carga de archivos
			$this->upload->initialize($config);
			
			// Procesar la carga de archivos
			if (!$this->upload->do_upload('foto_servicio')) {
				// Si la carga falla, mostrar un mensaje de error
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			} else {
				// Si la carga es exitosa, mostrar la imagen cargada
				$data = array('upload_data' => $this->upload->data());
				$nombre_imagen = $data['upload_data']['file_name'];
		
				$datos['doctor'] = $this->input->post('doctores');
				$datos['gestion'] = $this->input->post('gestiones');
				$datos['inicio'] = $this->input->post('fecha_inicio');
				$datos['fin'] = $this->input->post('fecha_fin');
				$datos['fuente'] = $this->input->post('fuentes');
				$datos['descripcion'] = $this->input->post('descripciones');

				$datos['foto'] = $nombre_imagen ;

				
				$respuesta = $this->servicioAtencionModel->set_servicio_atencion($datos);
				echo json_encode($respuesta);
			}
		}
		else{
			// Actualizar los datos
			$datos['doctor'] = $this->input->post('doctores');
			$datos['gestion'] = $this->input->post('gestiones');
			$datos['inicio'] = $this->input->post('fecha_inicio');
			$datos['fin'] = $this->input->post('fecha_fin');
			$datos['fuente'] = $this->input->post('fuentes');
			$datos['descripcion'] = $this->input->post('descripciones');
			
			$respuesta = $this->servicioAtencionModel->set_servicio_atencion($datos);
			echo json_encode($respuesta);
		}
	}
	// 

	// Realizamos la peticion de buscar al modelo el registro con el id mandado
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->servicioAtencionModel->get_datos($id);
		echo json_encode($respuesta);
	}

	// Recibimos los datos del formulario para mandar al modelo para su edición
	public function actualizar(){
		if(isset($_FILES['foto_servicio']) && $_FILES['foto_servicio']['error'] != UPLOAD_ERR_NO_FILE) {
			// Cargar la biblioteca de carga de archivos de CodeIgniter
			$this->load->library('upload');
			
			// Configuración de carga de archivos
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';
			
			// Inicializar la configuración de carga de archivos
			$this->upload->initialize($config);
			
			// Procesar la carga de archivos
			if (!$this->upload->do_upload('foto_servicio')) {
				// Si la carga falla, mostrar un mensaje de error
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			} else {
				// Si la carga es exitosa, mostrar la imagen cargada
				$data = array('upload_data' => $this->upload->data());
				$nombre_imagen = $data['upload_data']['file_name'];
		
				$datos['id'] = $this->input->post('id_dato');

				$datos['doctor'] = $this->input->post('doctores');
				$datos['gestion'] = $this->input->post('gestiones');
				$datos['inicio'] = $this->input->post('fecha_inicio');
				$datos['fin'] = $this->input->post('fecha_fin');
				$datos['fuente'] = $this->input->post('fuentes');
				$datos['descripcion'] = $this->input->post('descripciones');

				$datos['foto'] = $nombre_imagen ;
				
				$respuesta = $this->servicioAtencionModel->actualizar($datos);
				echo json_encode($respuesta);
			}
		}
		else{
			// Actualizar los datos
			$datos['id'] = $this->input->post('id_dato');

			$datos['doctor'] = $this->input->post('doctores');
			$datos['gestion'] = $this->input->post('gestiones');
			$datos['inicio'] = $this->input->post('fecha_inicio');
			$datos['fin'] = $this->input->post('fecha_fin');
			$datos['fuente'] = $this->input->post('fuentes');
			$datos['descripcion'] = $this->input->post('descripciones');
			
			$respuesta = $this->servicioAtencionModel->actualizar($datos);
			echo json_encode($respuesta);
		}
	}
	// 

	// Recibimos la peticion del formulario de eliminar para mandarle al modelo para su eliminacion logica
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->servicioAtencionModel->eliminar($id);
		echo json_encode($respuesta);
	}
	// 


}
