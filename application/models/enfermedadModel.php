<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enfermedadModel extends CI_Model {

	//Obteniendo datos par la vista
	public function get_enfermedad(){
		$this->db->select('*');
		$this->db->from('enfermedades');

		$exe = $this->db->get();
		return $exe->result();
	}
	
	// insertar datos a la base de datos
	public function set_enfermedad($datos){
		$this->db->set('nombre_enfermedad', $datos["enfermedad"]);

		$this->db->insert('enfermedades');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}
	// Actualizando datos
	public function get_datos($id){
		$this->db->where('id_enfermedad',$id);
		$exe = $this->db->get('enfermedades');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('nombre_enfermedad', $datos['enfermedad']);

		$this->db->where('id_enfermedad', $datos['id']);
		$this->db->update('enfermedades');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos
	public function eliminar($id){
		$this->db->where('id_enfermedad',$id);
		$this->db->delete('enfermedades');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}