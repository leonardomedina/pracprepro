<?php 
/**
* 
*/
class Model_Plan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("titulo",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("rep_plan");
		return $consulta->result();
	}

	public function sel_Plan()
	{
		$query=$this->db->get('rep_plan');
		return $query->result();
	}

	public function ins_Plan($txtcod,$txttit,$txtins,$txtfin,$txtrev)
	{
		$data = array(
        'cod_plan' => $txtcod,
        'titulo' => $txttit,
        'fecha_inicio' => $txtins,
        'fecha_final' => $txtfin,
        'cod_revisor' => $txtrev
    );
		$this->db->insert('rep_plan', $data);
	}

	public function borrar_Plan($cod_plan)
	{
		$this->db->where('cod_plan',$cod_plan);
		$this->db->delete('rep_plan');
	}

	public function editar_Plan($cod_plan)
	{
		$this->db->where('cod_plan', $cod_plan);
		$this->db->from('rep_plan'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Plan($txtcod,$txttit,$txtins,$txtfin,$txtrev)
	{
		$data = array(
        'cod_plan' => $txtcod,
        'titulo' => $txttit,
        'fecha_inicio' => $txtins,
        'fecha_final' => $txtfin,
        'cod_revisor' => $txtrev
		);
		$this->db->where('cod_plan', $txtcod);
		$this->db->update('rep_plan', $data);
	}

	public function ins_Dociplan($txtdoc,$txtcod)
	{
		$this->db->set('plan_prac', $txtdoc);
		$this->db->where('cod_plan', $txtcod);
		$this->db->update('rep_plan'); 
	}
}
 ?>