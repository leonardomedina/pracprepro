<?php 
/**
* 
*/
class Model_Nivel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("nombre_nivel",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("nivel");
		return $consulta->result();
	}

	public function sel_Nivel()
	{
		$query=$this->db->get('nivel');
		return $query->result();
	}

	public function ins_Nivel($txtnom)
	{
		$data = array(
        'nombre_Nivel' => $txtnom
    );
		$this->db->insert('nivel', $data);
	}

	public function borrar_Nivel($txtnom)
	{
		$this->db->where('nombre_nivel',$txtnom);
		$this->db->delete('nivel');
	}

	public function editar_Nivel($txtnom)
	{
		$this->db->where('nombre_Nivel', $txtnom);
		$this->db->from('Nivel'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Nivel($txtnom)
	{
		$data = array(
        'nombre_Nivel' => $txtnom
		);
		$this->db->where('nombre_nivel', $txtnom);
		$this->db->update('Nivel', $data);
	}
}
 ?>