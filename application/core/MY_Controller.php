<?php defined('BASEPATH') or exit('direct script access not allowed');
class MY_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();

	}
}

class Verificacion_Controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('LoginSession'))
		{
			redirect(base_url('indexController'));
		}
	}
}