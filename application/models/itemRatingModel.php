<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class itemRatingModel extends CI_Model {

	//Obteniendo datos para la vista
	public function get_item_rating(){
		$this->db->select('ir.*, u.username, n.detalle_not');
		$this->db->from('item_rating ir');

		$this->db->join('users u', 'u.id = ir.id_user');
		$this->db->join('notificaciones n', 'n.id_notificacion = ir.id_notificacion');

        $this->db->where('ir.estado_rating = 1');

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
	public function get_notificacion(){
		$this->db->select('*');
		$this->db->from('notificaciones');
        $this->db->where('estado = 1');
		$exe = $this->db->get();
		return $exe->result();
	}

	// Insertando datos en la base de datos
	public function set_item_rating($datos){
		$this->db->set('letra_rating', $datos["letra"]);
		$this->db->set('id_user', $datos["usuario"]);
        $this->db->set('unnamed2', $datos["unnamed2"]);
		$this->db->set('titulo', $datos["titulo"]);
        $this->db->set('comentario', $datos["comentario"]);
		$this->db->set('id_notificacion', $datos["notificacion"]);

        $fecha_actual = date('Y-m-d H:i:s');
        $this->db->set('creado', $fecha_actual);
		
		$this->db->insert('item_rating');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Realizando la busqueda por id en la base de datos
	public function get_datos($id){
		$this->db->where('id_rating',$id);
		$exe = $this->db->get('item_rating');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	// Actualizando datos en la base de datos
	public function actualizar($datos){


		$this->db->set('letra_rating', $datos["letra"]);
		$this->db->set('id_user', $datos["usuario"]);
        $this->db->set('unnamed2', $datos["unnamed2"]);
		$this->db->set('titulo', $datos["titulo"]);
        $this->db->set('comentario', $datos["comentario"]);
		$this->db->set('id_notificacion', $datos["notificacion"]);

        $fecha_actual = date('Y-m-d H:i:s');
        $this->db->set('modificado', $fecha_actual);

		$this->db->where('id_rating', $datos['id']);
		$this->db->update('item_rating');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	// Eliminando datos en la base de datos
    public function eliminar($id){
        $this->db->set('estado_rating','0');
		$this->db->where('id_rating',$id);
		$this->db->update('item_rating');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}
}