<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class doctorModel extends CI_Model {

	//Obteniendo datos par la vista
	public function get_doctor(){
		$this->db->select('*');
		$this->db->from('doctores');

        $this->db->where('estado_doctor=1');

		$exe = $this->db->get();
		return $exe->result();
	}
	

	public function set_doctor($datos){
		$this->db->set('nombre_doctor', $datos["nombre"]);
		$this->db->set('ci_doctor', $datos["ci"]);
		$this->db->set('celular_doctor', $datos["celular"]);
		$this->db->set('email_doctor', $datos["correo"]);
		// Verificar si la imagen debe ser actualizada o no
		if (!empty($datos["foto"])) {
			$this->db->set('imagen_doctor', $datos["foto"]);
		}
		$this->db->set('link_face', $datos["facebook"]);
		$this->db->set('link_twitter', $datos["twitter"]);

		$this->db->insert('doctores');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Actualizando datos
	public function get_datos($id){
		$this->db->where('id_doctor',$id);
		$exe = $this->db->get('doctores');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('nombre_doctor', $datos['doctor']);
		$this->db->set('ci_doctor', $datos['ci']);
		$this->db->set('celular_doctor', $datos['celular']);
		$this->db->set('email_doctor', $datos['email']);
	
		// Verificar si la imagen debe ser actualizada o no
		if (!empty($datos["foto"])) {
			$this->db->set('imagen_doctor', $datos["foto"]);
		}
	
		$this->db->set('link_face', $datos['facebook']);
		$this->db->set('link_twitter', $datos['twitter']);
	
		$this->db->where('id_doctor', $datos['id']);
		$this->db->update('doctores');
	
		if($this->db->affected_rows() > 0){
			return "edi";
		}
	}

	// Eliminando datos
	public function eliminar($id){
		$this->db->set('estado_doctor','0');
		$this->db->where('id_doctor',$id);
		$this->db->update('doctores');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}