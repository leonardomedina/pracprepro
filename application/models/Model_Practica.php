<?php 
/**
* 
*/
class Model_Practica extends CI_Model
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
		$consulta = $this->db->get("rep_prac");
		return $consulta->result();
	}

	public function sel_Practica()
	{
		$query=$this->db->get('rep_prac');
		return $query->result();
	}

	public function ins_Practica($txtcod,$txtpos,$txtase,$txtalu,$txtsem,$txtest,$txtava,$txtpla,$txtifi,$txtiav,$txtfec)
	{
		$data = array(
        'cod_prac' => $txtcod,
        'cod_post' => $txtpos,
        'cod_asesor' => $txtase,
        'cod_alumno' => $txtalu,
        'semestre_academico' => $txtsem,
        'estado' => $txtest,
        'cod_avance' => $txtava,
        'cod_plan' => $txtpla,
        'cod_inf_final' => $txtifi,
        'cod_inf_ase' => $txtiav,
        'fecha_insc' => $txtfec
		);
		$this->db->insert('rep_prac', $data);
	}

	public function borrar_Practica($cod_postulacion)
	{
		$this->db->where('cod_prac',$cod_postulacion);
		$this->db->delete('rep_prac');
	}

	public function editar_Practica($cod_postulacion)
	{
		$this->db->where('cod_prac', $cod_postulacion);
		$this->db->from('rep_prac'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Practica($txtcod,$txtpos,$txtase,$txtalu,$txtsem,$txtest,$txtava,$txtpla,$txtifi,$txtiav,$txtfec)
	{
		$data = array(
        'cod_prac' => $txtcod,
        'cod_post' => $txtpos,
        'cod_asesor' => $txtase,
        'cod_alumno' => $txtalu,
        'semestre_academico' => $txtsem,
        'estado' => $txtest,
        'cod_avance' => $txtava,
        'cod_plan' => $txtpla,
        'cod_inf_final' => $txtifi,
        'cod_inf_ase' => $txtiav,
        'fecha_insc' => $txtfec
		);
		$this->db->where('cod_prac', $txtcod);
		$this->db->update('rep_prac', $data);
	}
}
 ?>