<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Plan');
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

		$config['base_url'] = base_url()."plan/pagina/";
		$config['total_rows'] = count($this->Model_Plan->buscar($buscador));
		$config['per_page'] = $mostrarpor; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."plan";

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
		
		$data['contenido'] = "plan/index";
		$data['contenido2'] = "plan/nav";
		$data['buscar_plan'] = $this->Model_Plan->buscar($buscador,$inicio,$mostrarpor);
		$data['list_revisor'] = $this->Model_Revisor->sel_Revisor();
		$data['sel_Plan'] = $this->Model_Plan->sel_Plan();
		$this->load->view("plantilla",$data);
	}

	public function mostrar()
	{
		$this->session->unset_userdata('busqueda');
		redirect('plan');
	}

	public function busqueda()
	{
		$this->session->set_userdata("busqueda",$this->input->post("busqueda"));
		redirect('plan');
		
	}


	public function insertar_Plan()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txttit = $datos['txttit'];
			$txtins = $datos['txtins'];
			$txtfin = $datos['txtfin'];
			$txtrev = $datos['txtrev'];
			$this->Model_Plan->ins_Plan($txtcod,$txttit,$txtins,$txtfin,$txtrev);
			redirect('plan');
		}
	}

	public function eliminar($cod_plan = NULL)
	{
		if($cod_plan != NULL)
		{
			$this->Model_Plan->borrar_Plan($cod_plan);
			redirect('plan');
		}
	}

	public function editar($cod_plan= NULL)
	{
		if($cod_plan != NULL)
		{
			$data['contenido2'] = "plan/nav";
			$data['contenido']='plan/edicion';
			$data['datos_Plan']=$this->Model_Plan->editar_Plan($cod_plan);
			$data['list_revisor'] = $this->Model_Revisor->sel_Revisor();
			$this->load->view('plantilla',$data);
			
		}
		else{
			redirect('plan');
		}

	}

	public function actualizar()
	{
		$datos=$this->input->post();
		if (isset($datos)) {
			$txtcod = $datos['txtcod'];
			$txttit = $datos['txttit'];
			$txtins = $datos['txtins'];
			$txtfin = $datos['txtfin'];
			$txtrev = $datos['txtrev'];;
			$this->Model_Plan->actualizar_Plan($txtcod,$txttit,$txtins,$txtfin,$txtrev);
			redirect('plan');
		}
	}

	public function do_upload()
        {
                $config['upload_path']          = './plan_prac';
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
						$this->Model_Plan->ins_Dociplan($txtdoc,$txtcod);
                        $data2['contenido2'] = "plan/nav";
						$data2['contenido']='plan/upload_success';
                        $data2['list_plan'] = $this->Model_Plan->sel_Plan();
                        $this->load->view('plantilla',$data2);
                }
        }
    }

}
