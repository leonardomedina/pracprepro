<?php 
/**
* 
*/
class Model_Listanuncio extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("titulo_anuncio",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("rep_anuncio");
		return $consulta->result();
	}

	public function sel_Listanuncio()
	{
		$query=$this->db->get('rep_anuncio');
		return $query->result();
	}
	
	public function ver_Listanuncio($cod_postulacion)
	{
	$this->db->where('cod_postulacion', $cod_postulacion);
	$this->db->from('rep_anuncio'); 
	$query = $this->db->get();
	return $query->result();
	}
}
?>