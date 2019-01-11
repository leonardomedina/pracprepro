<?php 
/**
* 
*/
class Model_Infinal extends CI_Model
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
		$consulta = $this->db->get("rep_inf_final");
		return $consulta->result();
	}

	public function sel_Infinal()
	{
		$query=$this->db->get('rep_inf_final');
		return $query->result();
	}

	public function ins_Infinal($txtifi,$txtcer,$txtacu,$txthos,$txtest,$txtrev)
	{
		$data = array(
        'cod_inf_final' => $txtifi,
        'cod_cerins' => $txtcer,
        'cod_actcul' => $txtacu,
        'cod_hosup' => $txthos,
        'estado' => $txtest,
        'cod_revisor' => $txtrev
    );
		$this->db->insert('rep_inf_final', $data);
	}

	public function borrar_Infinal($cod_inf_final)
	{
		$this->db->where('cod_inf_final',$cod_inf_final);
		$this->db->delete('rep_inf_final');
	}

	public function editar_Infinal($cod_final)
	{
		$this->db->where('cod_inf_final', $cod_final);
		$this->db->from('rep_inf_final'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Infinal($txtifi,$txtcer,$txtacu,$txthos,$txtest,$txtrev)
	{
		$data = array(
        'cod_inf_final' => $txtifi,
        'cod_cerins' => $txtcer,
        'cod_actcul' => $txtacu,
        'cod_hosup' => $txthos,
        'estado' => $txtest,
        'cod_revisor' => $txtrev
		);
		$this->db->where('cod_inf_final', $txtifi);
		$this->db->update('rep_inf_final', $data);
	}

	public function ins_Docinfinal($txtdoc,$txtcod)
	{
		$this->db->set('docinf_final', $txtdoc);
		$this->db->where('cod_inf_final', $txtcod);
		$this->db->update('rep_inf_final'); 
	}

	public function ins_DocInfinfase($txtdoc,$txtcod)
	{
		$this->db->set('doccer_ins', $txtdoc);
		$this->db->where('cod_inf_final', $txtcod);
		$this->db->update('rep_inf_final'); 
	}

	public function ins_ActaCul($txtdoc,$txtcod)
	{
		$this->db->set('docact_cul', $txtdoc);
		$this->db->where('cod_inf_final', $txtcod);
		$this->db->update('rep_inf_final'); 
	}

	public function ins_DocHosup($txtdoc,$txtcod)
	{
		$this->db->set('docho_sup', $txtdoc);
		$this->db->where('cod_inf_final', $txtcod);
		$this->db->update('rep_inf_final'); 
	}
}
 ?>