<?php 
/**
* 
*/
class Model_Institucion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("nombre_institucion",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("institucion");
		return $consulta->result();
	}

	public function sel_Institucion()
	{
		$query=$this->db->get('institucion');
		return $query->result();
	}

	public function ins_Institucion($txtnom,$txtdir)
	{
		$data = array(
        'nombre_institucion' => $txtnom,
        'dir_institucion' => $txtdir
    );
		$this->db->insert('institucion', $data);
	}

	public function borrar_Institucion($txtnom)
	{
		$this->db->where('nombre_institucion',$txtnom);
		$this->db->delete('institucion');
	}

	public function editar_Institucion($txtnom)
	{
		$this->db->where('nombre_institucion', $txtnom);
		$this->db->from('institucion'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Institucion($txtnom,$txtdir)
	{
		$data = array(
        'nombre_institucion' => $txtnom,
        'dir_institucion' => $txtdir
		);
		$this->db->where('nombre_institucion', $txtnom);
		$this->db->update('institucion', $data);
	}
}
 ?>