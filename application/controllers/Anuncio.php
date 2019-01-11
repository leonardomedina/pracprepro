<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Anuncio');
		$this->load->model('Model_Institucion');
	}

	public function index($nropagina = FALSE)
	{
		$inicio = 0;
		$mostrarpor = 2;
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

		$config['base_url'] = base_url()."anuncio/pagina/";
		$config['total_rows'] = count($this->Model_Anuncio->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."anuncio";

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
		
		$data['contenido'] = "anuncio/index";
		$data['contenido2'] = "anuncio/nav";
		$data['buscar_anuncio'] = $this->Model_Anuncio->buscar($buscador,$inicio,$mostrarpor);
		$data['datos_Anuncio2']=$this->Model_Institucion->sel_Institucion();
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('anuncio');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('anuncio');
		
	}
	public function insertar_anuncio()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txttit = $datos['txttit'];
			$txtins = $datos['txtins'];
			$txtreq = $datos['txtreq'];
			$txtfun = $datos['txtfun'];
			$txtben = $datos['txtben'];
			$txtarea = $datos['txtarea'];
			$txttip = $datos['txttip'];
			$txtsal = $datos['txtsal'];
			$txtfecha = $datos['txtfecha'];
			$txtest = $datos['txtest'];
			$this->Model_Anuncio->ins_anuncio($txtcod,$txttit,$txtins,$txtreq,$txtfun,$txtben,$txtarea,$txttip,$txtsal,$txtfecha,$txtest);
			redirect('anuncio');
		}
	}

	public function eliminar($cod_postulacion = NULL)
	{
		if($cod_postulacion != NULL)
		{
			$this->Model_Anuncio->borrar_Anuncio($cod_postulacion);
			redirect('anuncio');
		}
	}

	public function editar($cod_postulacion= NULL)
	{
		if($cod_postulacion != NULL)
		{
			$data['contenido2']='anuncio/nav';
			$data['contenido']='anuncio/edicion';
			$data['datos_Anuncio']=$this->Model_Anuncio->editar_Anuncio($cod_postulacion);
			$data['datos_Anuncio2']=$this->Model_Institucion->sel_Institucion();
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
			$txttil = $datos['txttil'];
			$txtins = $datos['txtins'];
			$txtreq = $datos['txtreq'];
			$txtfun = $datos['txtfun'];
			$txtben = $datos['txtben'];
			$txtarea = $datos['txtarea'];
			$txttip = $datos['txttip'];
			$txtsal = $datos['txtsal'];
			$txtfecha = $datos['txtfecha'];
			$txtest = $datos['txtest'];
			$this->Model_Anuncio->actualizar_anuncio($txtcod,$txttil,$txtins,$txtreq,$txtfun,$txtben,$txtarea,$txttip,$txtsal,$txtfecha,$txtest);
			redirect('anuncio');
		}
	}

}
