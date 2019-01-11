<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descarga extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Descarga');
		$this->load->model('Model_Plan');
		$this->load->model('Model_Acta');
		$this->load->model('Model_Practica');
		$this->load->model('Model_Infavance');
		$this->load->model('Model_Infinal');
		$this->load->helper('download');
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

		$config['base_url'] = base_url()."descarga/pagina/";
		$config['total_rows'] = count($this->Model_Descarga->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."descarga";

		$config['full_tag_open'] = "<ul class='pagination'>";
		
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
		$config['full_tag_close'] ="</ul>";
		$this->pagination->initialize($config);

		$data['datos_Practica'] = $this->Model_Practica->sel_Practica();
		
		$data['contenido'] = "descarga/index";
		$data['contenido2'] = "descarga/nav";
		$data['buscar_acta'] = $this->Model_Descarga->buscar($buscador,$inicio,$mostrarpor);
		$data['list_Acta'] = $this->Model_Acta->sel_Acta();
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('descarga');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('descarga');
		
	}
	
	public function descargar($cod_registro = NULL)
	{		
		$this->Model_Descarga->descarga($cod_registro);
		force_download($query['doc_acta'], NULL);
		redirect('descarga');
	}
}
