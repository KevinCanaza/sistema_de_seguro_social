<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enfermedadEstudianteModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_enfermedad_estudiante(){
		$this->db->select('ee.*, en.nombre_enfermedad, e.first_name, e.last_name');
		$this->db->from('enfermedad_estudiante ee');

		$this->db->join('enfermedades en', 'en.id_enfermedad = ee.id_enfermedad');
		$this->db->join('datos_estudiante e', 'e.id_datos = ee.id_estudiante');

        $this->db->where('ee.estado = 1');

		$exe = $this->db->get();
		return $exe->result();
	}

    //obteniendo un listado de datos de cierta tabla
    public function get_enfermedad(){
		$this->db->select('*');
		$this->db->from('enfermedades');
        $this->db->where('estado_enfermedad = 1');
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
	public function set_enfermedad_estudiante($datos){
		$this->db->set('id_estudiante', $datos["estudiante"]);
		$this->db->set('id_enfermedad', $datos["enfermedad"]);
		
		$this->db->insert('enfermedad_estudiante');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_enfer_est',$id);
		$exe = $this->db->get('enfermedad_estudiante');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){


		$this->db->set('id_estudiante', $datos["estudiante"]);
		$this->db->set('id_enfermedad', $datos["enfermedad"]);

		$this->db->where('id_enfer_est', $datos['id']);
		$this->db->update('enfermedad_estudiante');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos en la base de datos
    public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id_enfer_est',$id);
		$this->db->update('enfermedad_estudiante');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}