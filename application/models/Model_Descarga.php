<?php 

class Model_Descarga extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("fecha_ins",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("libro_acta");
		return $consulta->result();
	}

	public function descarga($cod_registro = NULL)
	{		
		$this->db->where('cod_registro',$cod_registro);
		$this->db->from('libro_acta'); 
		$query = $this->db->get();
		
	}

}
 ?>