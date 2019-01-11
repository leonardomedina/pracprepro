<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data['contenido2'] = "principal/nav";
		$data['contenido'] = "principal/index";
		$this->load->view("plantilla",$data);
	}



	

}
