<?php
class apoderadoModel extends CI_Model
{
    //Obteniendo datos par la vista
	public function get_apoderado()
	{
        $this->db->select('*');
		$this->db->from('apoderado');
        $this->db->where('estado=1');

		$exe = $this->db->get();
		return $exe->result();
	}
	
    // Insertando datos en la base de datos
	public function set_apoderado($datos){
		$this->db->set('first_name', $datos["nombre"]);
		$this->db->set('last_name', $datos["apellidos"]);
		$this->db->set('ci', $datos["ci"]);
		$this->db->set('celular', $datos["celular"]);
		$this->db->set('fecha_nacimiento', $datos["fecha_nacimiento"]);

		$this->db->insert('apoderado');
		

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_apoderado',$id);
		$exe = $this->db->get('apoderado');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}
	// Actualizando datos en la base de datos
	public function actualizar($datos){
		$this->db->set('first_name', $datos['nombre']);
		$this->db->set('last_name', $datos['apellidos']);
		$this->db->set('ci', $datos['ci']);
		$this->db->set('celular', $datos['celular']);
		$this->db->set('fecha_nacimiento', $datos['fecha_nacimiento']);

		$this->db->where('id_apoderado', $datos['id']);
		$this->db->update('apoderado');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}
// Eliminando datos en la base de datos
	public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id_apoderado',$id);
		$this->db->update('apoderado');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}