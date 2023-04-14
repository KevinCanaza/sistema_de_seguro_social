<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginController extends MY_Controller {
	public function index()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules("email",'Email','required');
			$this->form_validation->set_rules("password",'Password','required');
			if($this->form_validation->run()==TRUE)
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				
				$this->load->model('user_model');
				$status = $this->user_model->checkUser($email,$password);

				if ($status) {
					$row = $status->row();
					$name = $row->name;
				}
				else{
					$name = '';
				}

				if($name=='Administrador')
				{
					$data = array(
						'username'=>$status->username,
						'email'=>$status->email,
						'id'=>$status->id,
					);
					$this->session->set_userdata('LoginSession',$data);
					redirect(base_url('admin/Dashboard/index'));

				}
				if ($name=='Usuario') {
					$data = array(
						'username'=>$status->username,
						'email'=>$status->email,
						'id'=>$status->id,
					);
					$this->session->set_userdata('LoginSession',$data);
					redirect(base_url('user/userController/index'));
				}
				if ($name=='Doctor') {
					$data = array(
						'username'=>$status->username,
						'email'=>$status->email,
						'id'=>$status->id,
					);
					$this->session->set_userdata('LoginSession',$data);
					redirect(base_url('doctor/doctorIndexController/index'));
				}
				else
				{
					$this->session->set_flashdata('error','Email Id or Password is Wrong');
					redirect(base_url('indexController'));
				}


			}
			else
			{
				$this->load->view('indexController');
			}
		}
		else
		{
			$this->load->view('indexController');
		}
		
	}
}
