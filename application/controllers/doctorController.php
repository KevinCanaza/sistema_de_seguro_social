<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class doctorController extends Verificacion_Controller {


	public $site_title;
	public function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Doctores';
		$this->load->model('doctorModel');
	}
	public function index()
	{
		$this->load->view('doctorVista');
	}

	public function get_doctor(){
		$respuesta = $this->doctorModel->get_doctor();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		if(isset($_FILES['imagen_doctor']) && $_FILES['imagen_doctor']['error'] != UPLOAD_ERR_NO_FILE) {
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
			if (!$this->upload->do_upload('imagen_doctor')) {
				// Si la carga falla, mostrar un mensaje de error
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			} else {
				// Si la carga es exitosa, mostrar la imagen cargada
				$data = array('upload_data' => $this->upload->data());
				$nombre_imagen = $data['upload_data']['file_name'];
		
				$datos['nombre'] = $this->input->post('nombre_doctor');
				$datos['ci'] = $this->input->post('ci_doctor');
				$datos['celular'] = $this->input->post('celular_doctor');
				$datos['correo'] = $this->input->post('email_doctor');
				$datos['foto'] = $nombre_imagen ;
				$datos['facebook'] = $this->input->post('link_face');
				$datos['twitter'] = $this->input->post('link_twitter');
				
				$respuesta = $this->doctorModel->set_doctor($datos);
				echo json_encode($respuesta);
			}
		}
		else{
			// Actualizar los datos
			$datos['nombre'] = $this->input->post('nombre_doctor');
			$datos['ci'] = $this->input->post('ci_doctor');
			$datos['celular'] = $this->input->post('celular_doctor');
			$datos['correo'] = $this->input->post('email_doctor');
			$datos['facebook'] = $this->input->post('link_face');
			$datos['twitter'] = $this->input->post('link_twitter');
			
			$respuesta = $this->doctorModel->set_doctor($datos);
			echo json_encode($respuesta);
		}
	}

	// Actualizando datos
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->doctorModel->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		if(isset($_FILES['imagen_doctor']) && $_FILES['imagen_doctor']['error'] != UPLOAD_ERR_NO_FILE) {
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
			if (!$this->upload->do_upload('imagen_doctor')) {
				// Si la carga falla, mostrar un mensaje de error
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			} else {

				// Si la carga es exitosa, mostrar la imagen cargada
				$data = array('upload_data' => $this->upload->data());
				$nombre_imagen = $data['upload_data']['file_name'];

				$datos['id'] = $this->input->post('id_dato');
				$datos['doctor'] = $this->input->post('nombre_doctor');
				$datos['ci'] = $this->input->post('ci_doctor');
				$datos['celular'] = $this->input->post('celular_doctor');
				$datos['email'] = $this->input->post('email_doctor');
				$datos['foto'] = $nombre_imagen ;
				$datos['facebook'] = $this->input->post('link_face');
				$datos['twitter'] = $this->input->post('link_twitter');
				
				$respuesta = $this->doctorModel->actualizar($datos);
				echo json_encode($respuesta);
			}
		}
		else{
		// Actualizar los datos
		$datos['id'] = $this->input->post('id_dato');
		$datos['doctor'] = $this->input->post('nombre_doctor');
		$datos['ci'] = $this->input->post('ci_doctor');
		$datos['celular'] = $this->input->post('celular_doctor');
		$datos['email'] = $this->input->post('email_doctor');
		$datos['facebook'] = $this->input->post('link_face');
		$datos['twitter'] = $this->input->post('link_twitter');

		$respuesta = $this->doctorModel->actualizar($datos);
		echo json_encode($respuesta);
		}
		
	}
	// Eliminando datos
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->doctorModel->eliminar($id);
		echo json_encode($respuesta);
	}
}




	

