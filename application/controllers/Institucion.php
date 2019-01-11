<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Institucion');
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

		$config['base_url'] = base_url()."institucion/pagina/";
		$config['total_rows'] = count($this->Model_Institucion->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."institucion";

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
		
		$data['contenido'] = "institucion/index";
		$data['contenido2'] = "institucion/nav";
		$data['buscar_institucion'] = $this->Model_Institucion->buscar($buscador,$inicio,$mostrarpor);
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('institucion');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('institucion');
		
	}

	public function insertar_Institucion()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtnom = $datos['txtnom'];
			$txtdir = $datos['txtdir'];
			$this->Model_Institucion->ins_institucion($txtnom,$txtdir);
			redirect('institucion');
		}
	}

	public function eliminar($nombre_institucion = NULL)
	{
		if($nombre_institucion != NULL)
		{
			$this->Model_Institucion->borrar_Institucion($nombre_institucion);
			redirect('institucion');
		}
	}

	public function editar($nombre_institucion= NULL)
	{
		if($nombre_institucion != NULL)
		{
		$data['contenido2'] = "institucion/nav";
		$data['contenido'] = "institucion/edicion";
		$data['list_Institucion'] = $this->Model_Institucion->editar_Institucion($nombre_institucion);
		$this->load->view("plantilla",$data);
			
		}
		else{
			redirect('institucion');
		}

	}

	public function actualizar()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtnom = $datos['txtnom'];
			$txtdir = $datos['txtdir'];
			$this->Model_Institucion->actualizar_Institucion($txtnom,$txtdir);
			redirect('institucion');
		}
	}

}
