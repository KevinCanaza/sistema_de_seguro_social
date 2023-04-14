<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grupoUsuarioModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_grupo_usuario(){
		$this->db->select('ug.id, u.username, g.name, ug.estado');
		$this->db->from('users_groups ug');
        $this->db->where('ug.estado = 1');
		$this->db->join('users u', 'u.id = ug.user_id');
		$this->db->join('groups g', 'g.id = ug.group_id');

		$exe = $this->db->get();
		return $exe->result();
	}

    //obteniendo un listado de datos de cierta tabla
    public function get_usuario(){
		$this->db->select('*');
		$this->db->from('users');
        $this->db->where('active = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	//obteniendo un listado de datos de cierta tabla
	public function get_grupo(){
		$this->db->select('*');
		$this->db->from('groups');
        $this->db->where('estado = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	// Insertando datos en la base de datos
	public function set_grupo_usuario($datos){
		$this->db->set('user_id', $datos["usuario"]);
		$this->db->set('group_id', $datos["grupo"]);
		$this->db->insert('users_groups');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id',$id);
		$exe = $this->db->get('users_groups');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){
		$this->db->set('user_id', $datos['usuario']);
		$this->db->set('group_id', $datos['grupo']);

		$this->db->where('id', $datos['id']);
		$this->db->update('users_groups');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos en la base de datos
    public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id',$id);
		$this->db->update('users_groups');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}