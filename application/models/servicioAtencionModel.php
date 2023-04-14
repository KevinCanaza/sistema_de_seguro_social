<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class servicioAtencionModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_servicio_horario(){
		$this->db->select('sa.*, d.nombre_doctor');
		$this->db->from('servicios_de_atencion sa');

		$this->db->join('doctores d', 'd.id_doctor = sa.id_doctor_encargado');

        $this->db->where('sa.estado_servicio = 1');

		$exe = $this->db->get();
		return $exe->result();
	}

    //obteniendo un listado de datos de cierta tabla
    public function get_doctor(){
		$this->db->select('*');
		$this->db->from('doctores');
        $this->db->where('estado_doctor = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	// Insertando datos en la base de datos
	public function set_servicio_atencion($datos){
        $this->db->set('id_doctor_encargado', $datos["doctor"]);
        $this->db->set('gestion', $datos["gestion"]);
        $this->db->set('fecha_inicio', $datos["inicio"]);
        $this->db->set('fecha_fin', $datos["fin"]);
		$this->db->set('fuente', $datos["fuente"]);
		$this->db->set('descripcion', $datos["descripcion"]);
        // Verificar si la imagen debe ser actualizada o no
		if (!empty($datos["foto"])) {
			$this->db->set('foto_servicio', $datos["foto"]);
		}
		
		$this->db->insert('servicios_de_atencion');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_servicios',$id);
		$exe = $this->db->get('servicios_de_atencion');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){

        $this->db->set('id_doctor_encargado', $datos["doctor"]);
		$this->db->set('gestion', $datos["gestion"]);
        $this->db->set('fecha_inicio', $datos["inicio"]);
        $this->db->set('fecha_fin', $datos["fin"]);
		$this->db->set('fuente', $datos["fuente"]);
		$this->db->set('descripcion', $datos["descripcion"]);
        // Verificar si la imagen debe ser actualizada o no
		if (!empty($datos["foto"])) {
			$this->db->set('foto_servicio', $datos["foto"]);
		}

		$this->db->where('id_servicios', $datos['id']);
		$this->db->update('servicios_de_atencion');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos en la base de datos
    public function eliminar($id){
        $this->db->set('estado_servicio','0');
		$this->db->where('id_servicios',$id);
		$this->db->update('servicios_de_atencion');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}