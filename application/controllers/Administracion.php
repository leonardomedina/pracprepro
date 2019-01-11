<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Administracion');
	}

	public function index()
	{
		$data['contenido'] = "administracion/index";
		$data['contenido2'] = "administracion/nav";
		$this->load->view("plantilla",$data);
	}

}
