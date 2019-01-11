<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infinal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Infinal');
		$this->load->model('Model_Revisor');
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

		$config['base_url'] = base_url()."infinal/pagina/";
		$config['total_rows'] = count($this->Model_Infinal->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."infinal";

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
		
		$data['contenido'] = "infinal/index";
		$data['contenido2'] = "infinal/nav";
		$data['buscar_infinal'] = $this->Model_Infinal->buscar($buscador,$inicio,$mostrarpor);
		$data['list_infinal'] = $this->Model_Infinal->sel_Infinal();
		$data['list_revisor'] = $this->Model_Revisor->sel_Revisor();
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('infinal');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('infinal');
		
	}
	public function insertar_Infinal()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtifi = $datos['txtifi'];
			$txtcer = $datos['txtcer'];
			$txtacu = $datos['txtacu'];
			$txthos = $datos['txthos'];
			$txtest = $datos['txtest'];
			$txtrev = $datos['txtrev'];
			$this->Model_Infinal->ins_Infinal($txtifi,$txtcer,$txtacu,$txthos,$txtest,$txtrev);
			redirect('infinal/');
		}
	}

	public function eliminar($cod_avance = NULL)
	{
		if($cod_avance != NULL)
		{
			$this->Model_Infinal->borrar_Infinal($cod_avance);
			redirect('infinal/');
		}
	}

	public function editar($cod_final= NULL)
	{
		if($cod_final != NULL)
		{
			$data['contenido2'] = "infinal/nav";
			$data['contenido']="infinal/edicion";
			$data['list_Infinal']=$this->Model_Infinal->editar_Infinal($cod_final);
			$data['list_revisor'] = $this->Model_Revisor->sel_Revisor();
			$this->load->view("plantilla",$data);
		}
		else{
			redirect('infinal/');
		}
	}

	public function actualizar()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtifi = $datos['txtifi'];
			$txtcer = $datos['txtcer'];
			$txtacu = $datos['txtacu'];
			$txthos = $datos['txthos'];
			$txtest = $datos['txtest'];
			$txtrev = $datos['txtrev'];
			$this->Model_Infinal->actualizar_Infinal($txtifi,$txtcer,$txtacu,$txthos,$txtest,$txtrev);
			redirect('infinal/');
		}
	}

	public function do_upload()
        {
                $config['upload_path']          = './infinales/alumno';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('infinal/upload_form', $error);
                }
                else
                {
                        $data = $this->upload->data();
                        $txtdoc=$config['upload_path']."/".$data['file_name'];
						$datos=$this->input->post();
						if (isset($datos)) {
						$txtcod = $datos['txtcod'];
						$this->Model_Infinal->ins_Docinfinal($txtdoc,$txtcod);
                        $data2['contenido2'] = "infinal/nav";
						$data2['contenido']='infinal/upload_success';
                        $data2['list_infinal'] = $this->Model_Infinal->sel_Infinal();
                        $this->load->view('plantilla',$data2);
                }
        }
    }
    public function do_upload_ase()
    {
                $config['upload_path']          = './infinales/asesor';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('infinal/upload_form', $error);
                }
                else
                {
                       $data = $this->upload->data();
                        $txtdoc=$config['upload_path']."/".$data['file_name'];
						$datos=$this->input->post();
						if (isset($datos)) {
						$txtcod = $datos['txtcod'];
						$this->Model_Infinal->ins_DocInfinfase($txtdoc,$txtcod);
                        $data2['contenido2'] = "infinal/nav";
						$data2['contenido']='infinal/upload_success';
                        $data2['list_infinal'] = $this->Model_Infinal->sel_Infinal();
                        $this->load->view('plantilla',$data2);
                }
        }
    }

    public function do_upload_act()
        {
                $config['upload_path']          = './infinales/actas';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('infinal/upload_form', $error);
                }
                else
                {
                        $data = $this->upload->data();
                        $txtdoc=$config['upload_path']."/".$data['file_name'];
						$datos=$this->input->post();
						if (isset($datos)) {
						$txtcod = $datos['txtcod'];
						$this->Model_Infinal->ins_ActaCul($txtdoc,$txtcod);
                        $data2['contenido2'] = "infinal/nav";
						$data2['contenido']='infinal/upload_success';
                        $data2['list_infinal'] = $this->Model_Infinal->sel_Infinal();
                        $this->load->view('plantilla',$data2);
                }
        }
    }
    public function do_upload_hosup()
    {
                $config['upload_path']          = './infinales/hojas_sup';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('infinal/upload_form', $error);
                }
                else
                {
                       $data = $this->upload->data();
                        $txtdoc=$config['upload_path']."/".$data['file_name'];
						$datos=$this->input->post();
						if (isset($datos)) {
						$txtcod = $datos['txtcod'];
						$this->Model_Infinal->ins_DocHosup($txtdoc,$txtcod);
                        $data2['contenido2'] = "infinal/nav";
						$data2['contenido']='infinal/upload_success';
                        $data2['list_infinal'] = $this->Model_Infinal->sel_Infinal();
                        $this->load->view('plantilla',$data2);
                }
        }
    }
}
