<?php 
/**
* 
*/
class Model_Revisor extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("nombre_revisor",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("revisor");
		return $consulta->result();
	}
	public function sel_Revisor()
	{
		$query=$this->db->get('revisor');
		return $query->result();
	}

	public function ins_Revisor($txtcod,$txtnom)
	{
		$data = array(
        'cod_revisor' => $txtcod,
        'nombre_revisor' => $txtnom
    );
		$this->db->insert('revisor', $data);
	}

	public function borrar_Revisor($cod_revisor)
	{
		$this->db->where('cod_revisor',$cod_revisor);
		$this->db->delete('revisor');
	}

	public function editar_Revisor($cod_revisor)
	{
		$this->db->where('cod_revisor', $cod_revisor);
		$this->db->from('revisor'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Revisor($txtcod,$txtnom)
	{
		$data = array(
        'cod_revisor' => $txtcod,
        'nombre_revisor' => $txtnom
		);
		$this->db->where('cod_revisor', $txtcod);
		$this->db->update('revisor', $data);
	}
}
 ?>