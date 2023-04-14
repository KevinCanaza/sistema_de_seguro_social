<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grupoModel extends CI_Model {

	//Obteniendo datos par la vista
	public function get_grupo(){
		$this->db->select('*');
		$this->db->from('groups');

		$exe = $this->db->get();
		return $exe->result();
	}
	
	// insertar datos a la base de datos
	public function set_grupo($datos){
		$this->db->set('name', $datos["nombre"]);
		$this->db->set('description', $datos["descripcion"]);

		$this->db->insert('groups');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}
	// Actualizando datos
	public function get_datos($id){
		$this->db->where('id',$id);
		$exe = $this->db->get('groups');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('name', $datos['nombre']);
		$this->db->set('description', $datos['descripcion']);

		$this->db->where('id', $datos['id']);
		$this->db->update('groups');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos
	public function eliminar($id){
		$this->db->where('id',$id);
		$this->db->delete('groups');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}