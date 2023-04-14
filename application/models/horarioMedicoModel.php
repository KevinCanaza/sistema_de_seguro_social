<?php
class horarioMedicoModel extends CI_Model
{

	//Obteniendo datos par la vista
	public function get_horario(){
		$this->db->select('hm.id_horario_medico,hm.dia_laborable,hm.hora_inicio,hm.hora_fin,hm.cita_duracion,hm.id_medico, d.nombre_doctor');
        $this->db->from('horario_medico hm');
		$this->db->where('estado_horario = 1');
		$this->db->join('doctores d', 'd.id_doctor = hm.id_medico');

		$exe = $this->db->get();
		return $exe->result();
	}

	// insertar datos a la base de datos
    public function get_doctor(){
		$this->db->select('*');
		$this->db->from('doctores');
        $this->db->where('estado_doctor = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	public function set_horario($datos){
		

		$this->db->set('dia_laborable', $datos["dias"]);
		$this->db->set('hora_inicio', $datos["entrada"]);
		$this->db->set('hora_fin', $datos["salida"]);
		$this->db->set('cita_duracion', $datos["duracion"]);
		$this->db->set('id_medico', $datos["doctor"]);	


		$this->db->insert('horario_medico');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Actualizando datos
	public function get_datos($id){
		$this->db->where('id_horario_medico',$id);
		$exe = $this->db->get('horario_medico');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){

		$this->db->set('dia_laborable', $datos["dias"]);
		$this->db->set('hora_inicio', $datos["entrada"]);
		$this->db->set('hora_fin', $datos["salida"]);
		$this->db->set('cita_duracion', $datos["duracion"]);
		$this->db->set('id_medico', $datos["doctor"]);

		$this->db->where('id_horario_medico', $datos['id']);
		$this->db->update('horario_medico');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	public function eliminar($id){
        $this->db->set('estado_horario','0');
		$this->db->where('id_horario_medico',$id);
		$this->db->update('horario_medico');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}