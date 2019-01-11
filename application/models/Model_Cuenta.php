<?php 
/**
* 
*/
class Model_Cuenta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("usuario",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("cuenta");
		return $consulta->result();
	}

	public function sel_Cuenta()
	{
		$query=$this->db->get('cuenta');
		return $query->result();
	}

	public function ins_Cuenta($txtnom,$txtdir,$txtniv)
	{
		$data = array(
        'usuario' => $txtnom,
		'contraseña' => $txtdir,
		'nivel' => $txtniv
    );
		$this->db->insert('cuenta', $data);
	}

	public function borrar_Cuenta($txtusu)
	{
		$this->db->where('usuario',$txtusu);
		$this->db->delete('cuenta');
	}

	public function editar_Cuenta($txtusu)
	{
		$this->db->where('usuario', $txtusu);
		$this->db->from('cuenta'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Cuenta($txtusu,$txtcon,$txtniv)
	{
		$data = array(
        'usuario' => $txtusu,
		'contraseña' => $txtcon,
		'nivel' => $txtniv
		);
		$this->db->where('usuario', $txtusu);
		$this->db->update('cuenta', $data);
	}
}
 ?>