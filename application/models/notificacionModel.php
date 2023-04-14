<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notificacionModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_notificacion(){
		$this->db->select('n.*, u.username, d.nombre_doctor ,e.first_name nombre_estudiante, e.last_name apellido_estudiante');
		$this->db->from('notificaciones n');

		$this->db->join('users u', 'u.id = n.user2');
        $this->db->join('doctores d', 'd.id_doctor = n.id_doctor');
		$this->db->join('datos_estudiante e', 'e.id_datos = n.id_datos');

        $this->db->where('n.estado = 1');

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

	//obteniendo un listado de datos de cierta tabla
	public function get_estudiante(){
		$this->db->select('*');
		$this->db->from('datos_estudiante');
        $this->db->where('estado_datos = 1');
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

	// Insertando datos en la base de datos
	public function set_notificacion($datos){
		$this->db->set('id_datos', $datos["estudiante"]);
        $this->db->set('user2', $datos["usuario"]);
        $this->db->set('celular_emerg', $datos["celular"]);
        $this->db->set('comentario', $datos["comentario"]);
        $this->db->set('detalle_not', $datos["detalle"]);
        $this->db->set('unnamed2', $datos["unnamed2"]);
        $this->db->set('grado_incidente', $datos["grado"]);
		$this->db->set('id_doctor', $datos["doctor"]);
        $this->db->set('fecha', $datos["fecha"]);
		
		$this->db->insert('notificaciones');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_notificacion',$id);
		$exe = $this->db->get('notificaciones');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){


		$this->db->set('id_datos', $datos["estudiante"]);
        $this->db->set('user2', $datos["usuario"]);
        $this->db->set('celular_emerg', $datos["celular"]);
        $this->db->set('comentario', $datos["comentario"]);
        $this->db->set('detalle_not', $datos["detalle"]);
        $this->db->set('unnamed2', $datos["unnamed2"]);
        $this->db->set('grado_incidente', $datos["grado"]);
		$this->db->set('id_doctor', $datos["doctor"]);
        $this->db->set('fecha', $datos["fecha"]);

		$this->db->where('id_notificacion', $datos['id']);
		$this->db->update('notificaciones');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos en la base de datos
    public function eliminar($id){
        $this->db->set('estado','0');
		$this->db->where('id_notificacion',$id);
		$this->db->update('notificaciones');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}