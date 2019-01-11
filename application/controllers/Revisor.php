<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revisor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Revisor');
	}

	/*public function index()
	{
		$data['contenido2'] = "revisor/nav";
		$data['contenido'] = "revisor/index";
		$data['sel_revisor'] = $this->Model_Revisor->sel_Revisor();
		$data['list_revisor'] = $this->Model_Revisor->sel_Revisor();
		$this->load->view("plantilla",$data);
	}*/

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

		$config['base_url'] = base_url()."revisor/pagina/";
		$config['total_rows'] = count($this->Model_Revisor->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."revisor";

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
		
		$data['contenido'] = "revisor/index";
		$data['contenido2'] = "revisor/nav";
		$data['buscar_revisor'] = $this->Model_Revisor->buscar($buscador,$inicio,$mostrarpor);
		$this->load->view("plantilla",$data);
	}

		public function insertar_Revisor()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txtnom = $datos['txtnom'];
			
			$this->Model_Revisor->ins_revisor($txtcod,$txtnom);
			redirect('revisor');
		}
	}

	public function eliminar($cod_revisor = NULL)
	{
		if($cod_revisor != NULL)
		{
			$this->Model_Revisor->borrar_revisor($cod_revisor);
			redirect('revisor');
		}
	}

	public function editar($cod_revisor= NULL)
	{
		if($cod_revisor != NULL)
		{
			$data['contenido2'] = "revisor/nav";
			$data['contenido']='revisor/edicion';
			$data['datos_revisor']=$this->Model_Revisor->editar_revisor($cod_revisor);
			$this->load->view('plantilla',$data);
			
		}
		else{
			redirect('');
		}

	}

	public function actualizar()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txtnom = $datos['txtnom'];
			$this->Model_Revisor->actualizar_revisor($txtcod,$txtnom);
			redirect('revisor');
		}
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('revisor');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('revisor');
		
	}

}
