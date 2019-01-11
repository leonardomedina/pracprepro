<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practica extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Practica');
		$this->load->model('Model_Anuncio');
		$this->load->model('Model_Asesor');
		$this->load->model('Model_Revisor');
		$this->load->model('Model_Infinal');
		$this->load->model('Model_Infavance');
		$this->load->model('Model_Plan');
		$this->load->model('Model_Alumno');
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

		$config['base_url'] = base_url()."practica/pagina/";
		$config['total_rows'] = count($this->Model_Practica->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."practica";

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
		
		$data['contenido'] = "practica/index";
		$data['contenido2'] = "practica/nav";
		$data['sel_Practica'] = $this->Model_Practica->sel_Practica();
		$data['list_Practica'] = $this->Model_Practica->sel_Practica();
		$data['sel_Anuncio'] = $this->Model_Anuncio->sel_Anuncio();
		$data['sel_Asesor'] = $this->Model_Asesor->sel_Asesor();
		$data['list_asesor'] = $this->Model_Asesor->sel_Asesor();
		$data['list_alumno'] = $this->Model_Alumno->sel_Alumno();
		$data['sel_Infavance'] = $this->Model_Infavance->sel_Infavance();
		$data['sel_Infinal'] = $this->Model_Infinal->sel_Infinal();
		$data['sel_Plan'] = $this->Model_Plan->sel_Plan();
		$data['buscar_practica'] = $this->Model_Practica->buscar($buscador,$inicio,$mostrarpor);
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('practica');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('practica');
		
	}

	public function insertar_practica()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txtins = $datos['txtanu'];
			$txtreq = $datos['txtase'];
			$txtfun = $datos['txtalu'];
			$txtben = $datos['txtsem'];
			$txtarea = $datos['txtest'];
			$txttip = $datos['txtava'];
			$txtsal = $datos['txtpla'];
			$txtfecha = $datos['txtifi'];
			$txtest = $datos['txtiav'];
			$txtfec = $datos['txtfec'];
			$this->Model_Practica->ins_practica($txtcod,$txtins,$txtreq,$txtfun,$txtben,$txtarea,$txttip,$txtsal,$txtfecha,$txtest,$txtfec);
			redirect('practica/');
		}
	}

	public function eliminar($cod_prac = NULL)
	{
		if($cod_prac != NULL)
		{
			$this->Model_Practica->borrar_Practica($cod_prac);
			redirect('practica/');
		}
	}

	public function editar($cod_prac= NULL)
	{
		if($cod_prac != NULL)
		{
			$data['contenido2']='practica/nav';
			$data['contenido']='practica/edicion';
			$data['datos_Practica']=$this->Model_Practica->editar_Practica($cod_prac);
			$data['list_asesor'] = $this->Model_Asesor->sel_Asesor();
			$data['sel_Anuncio'] = $this->Model_Anuncio->sel_Anuncio();
			$data['sel_Asesor'] = $this->Model_Asesor->sel_Asesor();
			$data['sel_Revisor'] = $this->Model_Revisor->sel_Revisor();
			$data['list_alumno'] = $this->Model_Alumno->sel_Alumno();
			$data['sel_Infavance'] = $this->Model_Infavance->sel_Infavance();
			$data['sel_Infinal'] = $this->Model_Infinal->sel_Infinal();
			$data['sel_Plan'] = $this->Model_Plan->sel_Plan();
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
			$txtins = $datos['txtpos'];
			$txtreq = $datos['txtase'];
			$txtfun = $datos['txtalu'];
			$txtben = $datos['txtsem'];
			$txtarea = $datos['txtest'];
			$txttip = $datos['txtava'];
			$txtsal = $datos['txtpla'];
			$txtfecha = $datos['txtifi'];
			$txtest = $datos['txtiav'];
			$txtfec = $datos['txtfec'];
			$this->Model_Practica->actualizar_practica($txtcod,$txtins,$txtreq,$txtfun,$txtben,$txtarea,$txttip,$txtsal,$txtfecha,$txtest,$txtfec);
			redirect('practica/');
		}
		
	}

}
