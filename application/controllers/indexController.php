<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class indexController extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
	public function ficha()
	{
		$this->load->view('ficha/sacaFicha');
	}
	public function F()
	{
		$this->load->view('ficha/sacaF');
	}
	public function FE()
	{
		$this->load->view('ficha/sacaFE');
	}
	function logout()
	{
		session_unset();
		session_destroy();
		redirect(base_url('indexController'));
	}
}
