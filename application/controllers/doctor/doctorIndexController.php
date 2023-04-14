<?php defined('BASEPATH') or exit('');
class doctorIndexController extends Verificacion_Controller {
	public $site_title;
	function __construct()
	{
		parent::__construct();
		// Codigo para nombrar el titulo de la pagina
		$this->site_title='Seccion Doctor';
	}

	function index()
	{
		$this->load->view('doctor/doctorDashboard');
	}
}