<?php
class User_model extends CI_Model
{
	function checkUser($email,$password)
	{
		// $query = $this->db->query("SELECT g.name
		// from users u
		// INNER JOIN users_groups ug
		// ON ug.user_id = u.id
		// INNER JOIN groups g
		// ON ug.group_id = g.id
		// where u.email='$email' AND u.password='$password' AND u.active=1 AND ug.estado=1" );

		$fecha_date = date('Y-m-d', strtotime($password));
		$email_entero = intval($email);
		$fecha_objeto = DateTime::createFromFormat('Y-m-d', $fecha_date);
		if (!$fecha_objeto instanceof DateTime || !is_int($email_entero) || $email_entero == 0) {
			$encrypPassword = sha1($password);
			$query = $this->db->query("SELECT g.name
				from users u
				INNER JOIN users_groups ug
				ON ug.user_id = u.id
				INNER JOIN groups g
				ON ug.group_id = g.id
				where u.email='$email' AND u.password='$encrypPassword' AND u.active=1 AND ug.estado=1" );
		} else {
			$query = $this->db->query("SELECT g.name
				from users u
				INNER JOIN users_groups ug
				ON ug.user_id = u.id
				INNER JOIN groups g
				ON ug.group_id = g.id
				INNER JOIN datos_estudiante de
				ON de.id_usuario = u.id
				where de.CI='$email' AND de.fecha_nacimiento='$password' AND u.active=1 AND ug.estado=1 AND de.estado_datos=1");
		}

			

		if($query->num_rows()==1)
		{
			$fecha_actual = date('Y-m-d H:i:s');

			$this->db->set('last_login', $fecha_actual);

			$this->db->where(array('password' => $password, 'email' => $email));
			$this->db->update('users');
			return $query;
		}
		else
		{
			return false;
		}
	}
	//Obteniendo datos par la vista
	public function get_usuario(){
		$this->db->select('*');
		$this->db->where('active = 1');
		$this->db->from('users');

		$exe = $this->db->get();
		return $exe->result();
	}

	// insertar datos a la base de datos
	public function set_usuario($datos){
		$encryptPassword = sha1($datos["contrasena"]);
		$this->db->set('first_name', $datos["nombre"]);
		$this->db->set('last_name', $datos["apellidos"]);
		$this->db->set('username', $datos["nombreusuario"]);
		$this->db->set('email', $datos["correo"]);
		$this->db->set('password', $encryptPassword);
		$this->db->set('company', $datos["compania"]);
		$this->db->set('usuario_mae', $datos["usuariomae"]);
		$this->db->set('ip_address', $datos["ip"]);
		$this->db->set('ci_persona', $datos["ci"]);

		$fecha_actual = date('Y-m-d H:i:s');

		$this->db->set('created_on', $fecha_actual);		


		$this->db->insert('users');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	// Actualizando datos
	public function get_datos($id){
		$this->db->where('id',$id);
		$exe = $this->db->get('users');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){


		// $encryptPassword = sha1($datos["contrasena"]);

		$this->db->set('first_name', $datos["nombre"]);
		$this->db->set('last_name', $datos["apellidos"]);
		$this->db->set('username', $datos["nombreusuario"]);
		$this->db->set('email', $datos["correo"]);
		// $this->db->set('password', $encryptPassword);
		$this->db->set('company', $datos["compania"]);
		$this->db->set('ci_persona', $datos["ci"]);
		$this->db->set('usuario_mae', $datos["usuariomae"]);
		$this->db->set('ip_address', $datos["ip"]);

		$this->db->where('id', $datos['id']);
		$this->db->update('users');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}

	public function eliminar($id){
        $this->db->set('active','0');
		$this->db->where('id',$id);
		$this->db->update('users');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
            
		}
	}






	// function checkCurrentPassword($currentPassword)
	// {
	// 	$userid = $this->session->userdata('LoginSession')['id'];
	// 	$query = $this->db->query("SELECT * from users WHERE id='$userid' AND password='$currentPassword' ");
	// 	if($query->num_rows()==1)
	// 	{
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	// function updatePassword($password)
	// {
	// 	$userid = $this->session->userdata('LoginSession')['id'];
	// 	$query = $this->db->query("update  users set password='$password' WHERE id='$userid' ");
		
	// }


}