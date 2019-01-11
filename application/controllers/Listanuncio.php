<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listanuncio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Listanuncio');
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

		$config['base_url'] = base_url()."listanuncio/pagina/";
		$config['total_rows'] = count($this->Model_Listanuncio->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."listanuncio";

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
		
		$data['contenido'] = "listanuncio/index";
		$data['contenido2'] = "listanuncio/nav";
		$data['buscar_listanuncio'] = $this->Model_Listanuncio->buscar($buscador,$inicio,$mostrarpor);
		$data['datos_Anuncio2']=$this->Model_Institucion->sel_Institucion();
		$this->load->view("plantilla",$data);
	}


	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('listanuncio');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('listanuncio');
		
	}

	public function sel_Listanuncio()
	{
		$query=$this->db->get('rep_anuncio');
		return $query->result();
	}

	public function ver($cod_postulacion= NULL)
	{
		if($cod_postulacion != NULL)
		{
			$data['contenido2']='listanuncio/nav';
			$data['contenido']='listanuncio/ver';
			$data['datos_Listanuncio']=$this->Model_Listanuncio->ver_Listanuncio($cod_postulacion);
			$this->load->view('plantilla',$data);
			
		}
		else{
			redirect('');
		}

	}
}
