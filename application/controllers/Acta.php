<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Acta');
		$this->load->model('Model_Asesor');
		$this->load->model('Model_Practica');
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

		$config['base_url'] = base_url()."acta/pagina/";
		$config['total_rows'] = count($this->Model_Acta->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."acta";

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
		$data['datos_Asesor'] = $this->Model_Asesor->sel_Asesor();
		$data['contenido'] = "acta/index";
		$data['contenido2'] = "acta/nav";
		$data['buscar_acta'] = $this->Model_Acta->buscar($buscador,$inicio,$mostrarpor);
		$data['list_Acta'] = $this->Model_Acta->sel_Acta();
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('acta');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('acta');
		
	}

	public function cantidad(){
		$this->session->set_userdata("cantidad",$this->input->post("cantidad"));
	}

	public function insertar_Acta()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txtpra = $datos['txtpra'];
			$txtins = $datos['txtins'];
			$txtnum = $datos['txtnum'];
			$this->Model_Acta->ins_Acta($txtcod,$txtpra,$txtins,$txtnum);
			redirect('acta');
		}
	}

	public function eliminar($cod_registro = NULL)
	{
		if($cod_registro != NULL)
		{
			$this->Model_Acta->borrar_Acta($cod_registro);
			redirect('acta');
		}
	}

	public function editar($cod_registro= NULL)
	{
		if($cod_registro != NULL)
		{
			$data['contenido2']='acta/nav';
			$data['contenido']='acta/edicion';
			$data['datos_Acta']=$this->Model_Acta->editar_Acta($cod_registro);
			$data['list_Practica'] = $this->Model_Practica->sel_Practica();
			$this->load->view('plantilla',$data);
			
		}
		else{
			redirect('acta');
		}

	}

	public function actualizar()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txtpra = $datos['txtpra'];
			$txtins = $datos['txtins'];
			$txtnum = $datos['txtnum'];
			$this->Model_Acta->actualizar_Acta($txtcod,$txtpra,$txtins,$txtnum);
			redirect('acta');
		}
	}

	public function do_upload_act()
        {
                $config['upload_path']          = './actas/acta';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('infavance/upload_form', $error);
                }
                else
                {
                        $data = $this->upload->data();
                        $txtdoc=$config['upload_path']."/".$data['file_name'];
						$datos=$this->input->post();
						if (isset($datos)) {
						$txtcod = $datos['txtcod'];
						$this->Model_Acta->ins_Docacta($txtdoc,$txtcod);
                        $data2['contenido2'] = "acta/nav";
						$data2['contenido']='acta/upload_success';
                        $data2['list_revisor'] = $this->Model_Acta->sel_Acta();
                        $this->load->view('plantilla',$data2);
                }
        }
    }
    public function do_upload_cer()
    {
                $config['upload_path']          = './acta/certificado';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('acta/upload_form', $error);
                }
                else
                {
                       $data = $this->upload->data();
                        $txtdoc=$config['upload_path']."/".$data['file_name'];
						$datos=$this->input->post();
						if (isset($datos)) {
						$txtcod = $datos['txtcod'];
						$this->Model_Infavance->ins_Doccer($txtdoc,$txtcod);
                        $data2['contenido2'] = "acta/nav";
						$data2['contenido']='acta/upload_success';
                        $data2['list_revisor'] = $this->Model_Acta->sel_Acta();
                        $this->load->view('plantilla',$data2);
                }
        }
    }

}
