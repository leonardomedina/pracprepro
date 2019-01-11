<?php 
/**
* 
*/
class Model_Infavance extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("estado",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("rep_avance");
		return $consulta->result();
	}

	public function sel_Infavance()
	{
		$query=$this->db->get('rep_avance');
		return $query->result();
	}

	public function ins_Infavance($txtcod,$txtias,$txtest,$txtrev)
	{
		$data = array(
        'cod_avance' => $txtcod,
        'cod_inf_ase' => $txtias,
        'estado' => $txtest,
        'cod_revisor' => $txtrev
    );
		$this->db->insert('rep_avance', $data);
	}

	public function ins_Docinfavance($txtdoc,$txtcod)
	{
		$this->db->set('documento', $txtdoc);
		$this->db->where('cod_avance', $txtcod);
		$this->db->update('rep_avance'); 
	}

	public function ins_DocInfavanase($txtdoc,$txtcod)
	{
		$this->db->set('inf_ase', $txtdoc);
		$this->db->where('cod_avance', $txtcod);
		$this->db->update('rep_avance'); 
	}

	public function borrar_Infavance($cod_avance)
	{
		$this->db->where('cod_avance',$cod_avance);
		$this->db->delete('rep_avance');
	}

	public function editar_Infavance($cod_avance)
	{
		$this->db->where('cod_avance', $cod_avance);
		$this->db->from('rep_avance'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Infavance($txtcod,$txtias,$txtest,$txtrev)
	{
		$data = array(
        'cod_avance' => $txtcod,
        'cod_inf_ase' => $txtias,
        'estado' => $txtest,
        'cod_revisor' => $txtrev
		);
		$this->db->where('cod_avance', $txtcod);
		$this->db->update('rep_avance', $data);
	}
}
 ?>