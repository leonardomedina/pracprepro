<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nivel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
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

		$config['base_url'] = base_url()."nivel/pagina/";
		$config['total_rows'] = count($this->Model_Nivel->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."nivel";

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
		
		$data['contenido'] = "nivel/index";
		$data['contenido2'] = "nivel/nav";
		$data['buscar_nivel'] = $this->Model_Nivel->buscar($buscador,$inicio,$mostrarpor);
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('nivel');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('nivel');
		
	}

	public function insertar_nivel()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtnom = $datos['txtnom'];
			$this->Model_Nivel->ins_nivel($txtnom);
			redirect('nivel');
		}
	}

	public function eliminar($nombre_nivel = NULL)
	{
		if($nombre_nivel != NULL)
		{
			$this->Model_Nivel->borrar_nivel($nombre_nivel);
			redirect('nivel');
		}
	}

	public function editar($nombre_nivel= NULL)
	{
		if($nombre_nivel != NULL)
		{
		$data['contenido2'] = "nivel/nav";
		$data['contenido'] = "nivel/edicion";
		$data['list_Nivel'] = $this->Model_Nivel->editar_nivel($nombre_nivel);
		$this->load->view("plantilla",$data);
			
		}
		else{
			redirect('nivel');
		}

	}

	public function actualizar()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtnom = $datos['txtnom'];
			$this->Model_Nivel->actualizar_nivel($txtnom);
			redirect('nivel');
		}
	}

}
