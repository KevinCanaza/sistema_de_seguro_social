<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sacarFichaModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_ficha(){
		$this->db->select('f.*, sa.descripcion, d.nombre_doctor, e.first_name, e.last_name, h.hora_inicio, h.hora_fin');
		$this->db->from('ficha f');

		$this->db->join('servicios_de_atencion sa', 'sa.id_servicios = f.id_servicio');
        $this->db->join('doctores d', 'd.id_doctor = f.id_doctor');
		$this->db->join('datos_estudiante e', 'e.id_datos = f.id_datos_estudiante');
        $this->db->join('horario_medico h', 'h.id_horario_medico = f.id_horario_doctor');

        $this->db->where('f.estado_ficha = 1');

		$exe = $this->db->get();
		return $exe->result();
	}

    //obteniendo un listado de datos de cierta tabla
    public function get_servicio(){
		$this->db->select('*');
		$this->db->from('servicios_de_atencion');
        $this->db->where('estado_servicio = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

    //obteniendo un listado de datos de cierta tabla
    public function get_doctor(){
		$this->db->select("d.*, hm.*");
		$this->db->from('doctores d');
		$this->db->join('horario_medico hm ', 'hm.id_medico = d.id_doctor');
        $this->db->where('d.estado_doctor = 1');

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
    //obteniendo un listado de datos de cierta tabla
	public function get_horario(){
		$this->db->select('*');
		$this->db->from('horario_medico');
        $this->db->where('estado_horario = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	// Insertando datos en la base de datos
	public function set_ficha($datos){
		$fecha_actual = date('Y-m-d H:i:s');

		
		if (!empty($datos["servicio"])) {
			$this->db->set('id_servicio', $datos["servicio"]);
		}
		$this->db->set('id_doctor', $datos["doctor"]);
		// Verificar si la imagen debe ser actualizada o no
		if (!empty($datos["estudiante"])) {
			$this->db->set('id_datos_estudiante', $datos["estudiante"]);
		}
        
		$this->db->set('id_horario_doctor', $datos["dia"]);
		$this->db->set('ci', $datos["ci"]);
        $this->db->set('fecha_registro', $fecha_actual);
		$this->db->set('fecha_ficha', $fecha_actual);
		
		$this->db->insert('ficha');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_ficha',$id);
		$exe = $this->db->get('ficha');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){


		$this->db->set('id_servicio', $datos["servicio"]);
		$this->db->set('id_doctor', $datos["doctor"]);
        $this->db->set('id_datos_estudiante', $datos["estudiante"]);
		$this->db->set('id_horario_doctor', $datos["horario"]);
        $this->db->set('fecha_registro', $datos["fecha_registro"]);
		$this->db->set('fecha_ficha', $datos["fecha_ficha"]);

		$this->db->where('id_ficha', $datos['id']);
		$this->db->update('ficha');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}
}