<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sintomaEstudianteModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_sintoma_estudiante(){
		$this->db->select('se.*, s.nombre_sintoma, e.first_name, e.last_name');
		$this->db->from('sintoma_estudiante se');

		$this->db->join('sintomas s', 's.id_sintoma = se.id_sintoma');
		$this->db->join('datos_estudiante e', 'e.id_datos = se.id_datos');

        $this->db->where('se.estado = 1');

		$exe = $this->db->get();
		return $exe->result();
	}

    //obteniendo un listado de datos de cierta tabla
    public function get_sintoma(){
		$this->db->select('*');
		$this->db->from('sintomas');
        $this->db->where('estado_sintoma = 1');
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
	public function set_sintoma_estudiante($datos){
		$this->db->set('id_datos', $datos["estudiante"]);
		$this->db->set('id_sintoma', $datos["sintoma"]);
		
		$this->db->insert('sintoma_estudiante');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_sint_est',$id);
		$exe = $this->db->get('sintoma_estudiante');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){


		$this->db->set('id_datos', $datos["estudiante"]);
		$this->db->set('id_sintoma', $datos["sintoma"]);

		$this->db->where('id_sint_est', $datos['id']);
		$this->db->update('sintoma_estudiante');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos en la base de datos
    public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id_sint_est',$id);
		$this->db->update('sintoma_estudiante');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}