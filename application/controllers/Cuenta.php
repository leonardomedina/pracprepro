<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Cuenta');
		$this->load->model('Model_Nivel');
	}

	public function index($nropagina = FALSE)
	{
		$inicio = 0;
		$mostrarpor = 4;
		$buscador = "";
		if ($this->session->userdata("cantidad")) {
			$mostrarpor =  $this->session->userdata("cantidad");
		}
		if ($this->session->userdata("busqueda")) {
			$buscador = $this->session->userdata("busqueda");
		}
		if ($nropagina) {
			$inicio = ($nropagina - 1) * $mostrarpor;
		}
		$this->load->library('pagination');

		$config['base_url'] = base_url()."cuenta/pagina/";
		$config['total_rows'] = count($this->Model_Cuenta->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."cuenta";

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='javascript:void(0)'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$this->pagination->initialize($config); 
		
		$data['contenido'] = "cuenta/index";
		$data['contenido2'] = "cuenta/nav";
		$data['buscar_cuenta'] = $this->Model_Cuenta->buscar($buscador,$inicio,$mostrarpor);
		$data['list_Nivel'] = $this->Model_Nivel->sel_Nivel();
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('cuenta');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('cuenta');
		
	}

	public function insertar_Cuenta()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtusu = $datos['txtusu'];
			$txtcon = $datos['txtcon'];
			$txtniv = $datos['txtniv'];
			$this->Model_Cuenta->ins_cuenta($txtusu,$txtcon,$txtniv);
			redirect('cuenta');
		}
	}

	public function eliminar($cuenta = NULL)
	{
		if($cuenta != NULL)
		{
			$this->Model_Cuenta->borrar_Cuenta($cuenta);
			redirect('');
		}
	}

	public function editar($usuario= NULL)
	{
		if($usuario != NULL)
		{
		$data['contenido2'] = "cuenta/nav";
		$data['contenido'] = "cuenta/edicion";
		$data['list_Cuenta'] = $this->Model_Cuenta->editar_Cuenta($usuario);
		$data['list_Nivel'] = $this->Model_Nivel->sel_Nivel();
		$this->load->view("plantilla",$data);
			
		}
		else{
			redirect('cuenta');
		}

	}

	public function actualizar()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtusu = $datos['txtusu'];
			$txtcon = $datos['txtcon'];
			$txtniv = $datos['txtniv'];
			$this->Model_Cuenta->actualizar_Cuenta($txtusu,$txtcon,$txtniv);
			redirect('cuenta');
		}
	}

}
