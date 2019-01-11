<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asesor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Asesor');
	}

	/*public function index()
	{		
		$data['contenido2'] = "asesor/nav";
		$data['contenido'] = "asesor/index";
		$data['sel_Asesor'] = $this->Model_Asesor->sel_Asesor();
		$data['list_Asesor'] = $this->Model_Asesor->sel_Asesor();
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

		$config['base_url'] = base_url()."asesor/pagina/";
		$config['total_rows'] = count($this->Model_Asesor->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."asesor";

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
		
		$data['contenido'] = "asesor/index";
		$data['contenido2'] = "asesor/nav";
		$data['buscar_asesor'] = $this->Model_Asesor->buscar($buscador,$inicio,$mostrarpor);
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('asesor');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('asesor');
		
	}

	public function cantidad(){
		$this->session->set_userdata("cantidad",$this->input->post("cantidad"));
	}

	public function insertar_Asesor()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txtnom = $datos['txtnom'];
			
			$this->Model_Asesor->ins_asesor($txtcod,$txtnom);
			redirect('asesor');
		}
	}

	public function eliminar($cod_asesor = NULL)
	{
		if($cod_asesor != NULL)
		{
			$this->Model_Asesor->borrar_Asesor($cod_asesor);
			redirect('asesor');
		}
	}

	public function editar($cod_asesor= NULL)
	{
		if($cod_asesor != NULL)
		{
			$data['contenido2'] = "asesor/nav";
			$data['contenido']='asesor/edicion';
			$data['datos_Asesor']=$this->Model_Asesor->editar_Asesor($cod_asesor);
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
			$txtcod = $datos['txtcodi'];
			$txtnom = $datos['txtnom'];
			$this->Model_Asesor->actualizar_Asesor($txtcod,$txtnom);
			redirect('asesor');
		}
	}

}
