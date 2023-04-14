<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class doctor_especialidadModel extends CI_Model {

	public function get_doctor_especialidad(){
		$this->db->select('de.id_doctor_especialidad, de.id_doctor, de.id_especialidad, de.estado, e.nombre_especialidad, d.nombre_doctor');
		$this->db->from('doctor_especialidad de');
        $this->db->where('de.estado = 1');
		$this->db->join('especialidades e', 'e.id_especialidades = de.id_especialidad');
		$this->db->join('doctores d', 'd.id_doctor = de.id_doctor');

		$exe = $this->db->get();
		return $exe->result();
	}

    //funciones para insertar datos
    public function get_especialidad(){
        $this->db->select('*');
		$this->db->from('especialidades');
        $this->db->where('estado = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	public function get_doctor(){
		$this->db->select('*');
		$this->db->from('doctores');
        $this->db->where('estado_doctor = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	public function set_doctor_especialidad($datos){
		$this->db->set('id_especialidad', $datos["especialidad"]);
		$this->db->set('id_doctor', $datos["doctor"]);
		$this->db->insert('doctor_especialidad');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	//Proceso para editar
	public function get_datos($id){
		$this->db->where('id_doctor_especialidad',$id);
		$exe = $this->db->get('doctor_especialidad');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('id_doctor', $datos['doctor']);
		$this->db->set('id_especialidad', $datos['especialidad']);

		$this->db->where('id_doctor_especialidad', $datos['id']);
		$this->db->update('doctor_especialidad');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

    public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id_doctor_especialidad',$id);
		$this->db->update('doctor_especialidad');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}