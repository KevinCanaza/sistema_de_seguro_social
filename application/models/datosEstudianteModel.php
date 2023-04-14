<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datosEstudianteModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_datos_estudiante(){
		$this->db->select('de.*, c.nombre_carrera, u.username');
		$this->db->from('datos_estudiante de');

		$this->db->join('carreras c', 'c.id_carrera = de.carrera_unidad');
		$this->db->join('users u', 'u.id = de.id_usuario');

        $this->db->where('de.estado_datos = 1');

		$exe = $this->db->get();
		return $exe->result();
	}

    //obteniendo un listado de datos de cierta tabla
    public function get_usuario(){
		$this->db->select('*');
		$this->db->from('users');
        $this->db->where('active = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	//obteniendo un listado de datos de cierta tabla
	public function get_carrera(){
		$this->db->select('*');
		$this->db->from('carreras');
        $this->db->where('estado = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	// Insertando datos en la base de datos
	public function set_datos_estudiante($datos){
		$this->db->set('first_name', $datos["nombre"]);
		$this->db->set('last_name', $datos["apellidos"]);
		$this->db->set('fecha_nacimiento', $datos["fecha_nacimiento"]);
		$this->db->set('ci', $datos["ci"]);
		$this->db->set('carrera_unidad', $datos["carrera"]);
		$this->db->set('direccion_est', $datos["direccion"]);
		$this->db->set('telefono', $datos["telefono"]);
		$this->db->set('fecha_registro', $datos["inicio_seguro"]);
		$this->db->set('fecha_fin_seguro', $datos["fin_seguro"]);
		// Verificar si la imagen debe ser actualizada o no
		if (!empty($datos["foto"])) {
			$this->db->set('imagen', $datos["foto"]);
		}
		$this->db->set('id_usuario', $datos["usuario"]);
		
		$this->db->insert('datos_estudiante');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_datos',$id);
		$exe = $this->db->get('datos_estudiante');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){


		$this->db->set('first_name', $datos["nombre"]);
		$this->db->set('last_name', $datos["apellidos"]);
		$this->db->set('fecha_nacimiento', $datos["fecha_nacimiento"]);
		$this->db->set('ci', $datos["ci"]);
		$this->db->set('carrera_unidad', $datos["carrera"]);
		$this->db->set('direccion_est', $datos["direccion"]);
		$this->db->set('telefono', $datos["telefono"]);
		$this->db->set('fecha_registro', $datos["inicio_seguro"]);
		$this->db->set('fecha_fin_seguro', $datos["fin_seguro"]);
		// Verificar si la imagen debe ser actualizada o no
		if (!empty($datos["foto"])) {
			$this->db->set('imagen', $datos["foto"]);
		}
		$this->db->set('id_usuario', $datos["usuario"]);

		$this->db->where('id_datos', $datos['id']);
		$this->db->update('datos_estudiante');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos en la base de datos
    public function eliminar($id){
        $this->db->set('estado_datos','0');
		$this->db->where('id_datos',$id);
		$this->db->update('datos_estudiante');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}