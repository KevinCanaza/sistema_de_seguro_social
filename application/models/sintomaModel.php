<?php
class sintomaModel extends CI_Model
{
    //Obteniendo datos par la vista
	public function get_sintoma()
	{
        $this->db->select('*');
		$this->db->from('sintomas');
        $this->db->where('estado_sintoma=1');

		$exe = $this->db->get();
		return $exe->result();
	}
	
    // Insertando datos en la base de datos
	public function set_sintoma($datos){
		$this->db->set('nombre_sintoma', $datos["sintoma"]);
		$this->db->insert('sintomas');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Actualizando datos en la base de datos
	public function get_datos($id){
		$this->db->where('id_sintoma',$id);
		$exe = $this->db->get('sintomas');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('nombre_sintoma', $datos['sintoma']);

		$this->db->where('id_sintoma', $datos['id']);
		$this->db->update('sintomas');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}
// Eliminando datos en la base de datos
	public function eliminar($id){
        $this->db->set('estado_sintoma','0');
		$this->db->where('id_sintoma',$id);
		$this->db->update('sintomas');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}