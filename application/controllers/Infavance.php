<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infavance extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Infavance');
		$this->load->model('Model_Revisor');

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

		$config['base_url'] = base_url()."infavance/pagina/";
		$config['total_rows'] = count($this->Model_Infavance->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."infavance";

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
		
		$data['contenido'] = "infavance/index";
		$data['contenido2'] = "infavance/nav";
		$data['sel_Infavance'] = $this->Model_Infavance->sel_Infavance();
		$data['buscar_infavance'] = $this->Model_Infavance->buscar($buscador,$inicio,$mostrarpor);
		$data['list_revisor'] = $this->Model_Revisor->sel_Revisor();
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('infavance');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('infavance');
		
	}

	public function insertar_Infavance()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txtias = $datos['txtias'];
			$txtest = $datos['txtest'];
			$txtrev = $datos['txtrev'];
			
			$this->Model_Infavance->ins_Infavance($txtcod,$txtias,$txtest,$txtrev);
			redirect('infavance/');
		}
	}

	public function do_upload()
        {
                $config['upload_path']          = './avances/alumno';
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
						$this->Model_Infavance->ins_DocInfavance($txtdoc,$txtcod);
                        $data2['contenido2'] = "infavance/nav";
						$data2['contenido']='infavance/upload_success';
                        $data2['list_revisor'] = $this->Model_Revisor->sel_Revisor();
                        $this->load->view('plantilla',$data2);
                }
        }
    }
    public function do_upload_ase()
    {
                $config['upload_path']          = './avances/asesor';
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
						$this->Model_Infavance->ins_DocInfavanase($txtdoc,$txtcod);
                        $data2['contenido2'] = "infavance/nav";
						$data2['contenido']='infavance/upload_success';
                        $data2['list_revisor'] = $this->Model_Revisor->sel_Revisor();
                        $this->load->view('plantilla',$data2);
                }
        }
    }

	public function eliminar($cod_avance = NULL)
	{
		if($cod_avance != NULL)
		{
			$this->Model_Infavance->borrar_Infavance($cod_avance);
			redirect('infavance/');
		}
	}

	public function editar($cod_avance= NULL)
	{
		if($cod_avance != NULL)
		{
			$data['contenido2'] = "infavance/nav";
			$data['contenido']='infavance/edicion';
			$data['list_Infavance']=$this->Model_Infavance->editar_Infavance($cod_avance);
			$this->load->view('plantilla',$data);
		}
		else{
			redirect('infavance/');
		}
	}

	public function actualizar()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txtias = $datos['txtias'];
			$txtest = $datos['txtest'];
			$txtrev = $datos['txtrev'];
			$this->Model_Infavance->actualizar_Infavance($txtcod,$txtias,$txtest,$txtrev);
			redirect('infavance/');
		}
	}
}
