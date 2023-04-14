<?php
class especialidadModel extends CI_Model
{
    //Obteniendo datos par la vista
	public function get_especialidad()
	{
        $this->db->select('*');
		$this->db->from('especialidades');
        $this->db->where('estado=1');

		$exe = $this->db->get();
		return $exe->result();
	}
	

	public function set_especialidad($datos){
		$this->db->set('nombre_especialidad', $datos["especialidad"]);
		$this->db->set('tipo_especialidad', $datos["tipo"]);
		$this->db->insert('especialidades');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Actualizando datos
	public function get_datos($id){
		$this->db->where('id_especialidades',$id);
		$exe = $this->db->get('especialidades');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('nombre_especialidad', $datos['especialidad']);
		$this->db->set('tipo_especialidad', $datos['tipo']);

		$this->db->where('id_especialidades', $datos['id']);
		$this->db->update('especialidades');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id_especialidades',$id);
		$this->db->update('especialidades');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}