<?php 
/**
* 
*/
class Model_Asesor extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("nombre_asesor",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("asesor");
		return $consulta->result();
	}

	public function sel_Asesor()
	{
		$query=$this->db->get('asesor');
		return $query->result();
	}

	public function ins_Asesor($txtcod,$txtnom)
	{
		$data = array(
        'cod_asesor' => $txtcod,
        'nombre_asesor' => $txtnom
    );
		$this->db->insert('asesor', $data);
	}

	public function borrar_Asesor($cod_asesor)
	{
		$this->db->where('cod_asesor',$cod_asesor);
		$this->db->delete('asesor');
	}

	public function editar_Asesor($cod_asesor)
	{
		$this->db->where('cod_asesor', $cod_asesor);
		$this->db->from('asesor'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Asesor($txtcodi,$txtnom)
	{
		$data = array(
        'cod_asesor' => $txtcodi,
        'nombre_asesor' => $txtnom
		);
		$this->db->where('cod_asesor', $txtcodi);
		$this->db->update('asesor', $data);
	}
}
 ?>