<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gradoParentescoModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_grado_parentesco(){
		$this->db->select('gp.*, a.first_name nombre_apoderado, a.last_name apellido_apoderado, e.first_name nombre_estudiante, e.last_name apellido_estudiante');
		$this->db->from('grado_parentesco gp');

		$this->db->join('apoderado a', 'a.id_apoderado = gp.id_apoderado');
		$this->db->join('datos_estudiante e', 'e.id_datos = gp.id_estudiante');

        $this->db->where('gp.estado = 1');

		$exe = $this->db->get();
		return $exe->result();
	}

    //obteniendo un listado de datos de cierta tabla
    public function get_apoderado(){
		$this->db->select('*');
		$this->db->from('apoderado');
        $this->db->where('estado = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	//obteniendo un listado de datos de cierta tabla
	public function get_estudiante(){
		$this->db->select('*');
		$this->db->from('datos_estudiante');
        $this->db->where('estado_datos = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	// Insertando datos en la base de datos
	public function set_grado_parentesco($datos){
        $this->db->set('grado_parentesco', $datos["grado"]);
		$this->db->set('id_estudiante', $datos["estudiante"]);
		$this->db->set('id_apoderado', $datos["apoderado"]);
		
		$this->db->insert('grado_parentesco');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_grado',$id);
		$exe = $this->db->get('grado_parentesco');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){


        $this->db->set('grado_parentesco', $datos["grado"]);
		$this->db->set('id_estudiante', $datos["estudiante"]);
		$this->db->set('id_apoderado', $datos["apoderado"]);

		$this->db->where('id_grado', $datos['id']);
		$this->db->update('grado_parentesco');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos en la base de datos
    public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id_grado',$id);
		$this->db->update('grado_parentesco');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}