<?php
class carreraModel extends CI_Model
{
    //Obteniendo datos para la vista
	public function get_carrera()
	{
        $this->db->select('*');
		$this->db->from('carreras');
        $this->db->where('estado=1');

		$exe = $this->db->get();
		return $exe->result();
	}
	
    // Insertando datos en la base de datos
	public function set_carrera($datos){
		$this->db->set('nombre_carrera', $datos["carrera"]);
		$this->db->set('area', $datos["area"]);
		$this->db->insert('carreras');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	
	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_carrera',$id);
		$exe = $this->db->get('carreras');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){
		$this->db->set('nombre_carrera', $datos['carrera']);
		$this->db->set('area', $datos['area']);

		$this->db->where('id_carrera', $datos['id']);
		$this->db->update('carreras');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}
// Eliminando datos en la base de datos
	public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id_carrera',$id);
		$this->db->update('carreras');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}