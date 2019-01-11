<?php 
/**
* 
*/
class Model_Acta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("cod_registro",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("libro_acta");
		return $consulta->result();
	}

	public function sel_Acta()
	{
		$query=$this->db->get('libro_acta');
		return $query->result();
	}

	public function ins_Acta($txtcod,$txtpra,$txtins,$txtnum)
	{
		$data = array(
        'cod_registro' => $txtcod,
        'cod_prac' => $txtpra,
        'fecha_ins' => $txtins,
        'num_cert' => $txtnum
    );
		$this->db->insert('libro_acta', $data);
	}

	public function borrar_Acta($cod_registro)
	{
		$this->db->where('cod_registro',$cod_registro);
		$this->db->delete('libro_acta');
	}

	public function editar_Acta($cod_registro)
	{
		$this->db->where('cod_registro', $cod_registro);
		$this->db->from('libro_acta'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Acta($txtcod,$txtpra,$txtins,$txtnum)
	{
		$data = array(
        'cod_registro' => $txtcod,
        'cod_prac' => $txtpra,
        'fecha_ins' => $txtins,
        'num_cert' => $txtnum
		);
		$this->db->where('cod_registro', $txtcod);
		$this->db->update('libro_acta', $data);
	}

	public function ins_Docacta($txtdoc,$txtcod)
	{
		$this->db->set('doc_acta', $txtdoc);
		$this->db->where('cod_registro', $txtcod);
		$this->db->update('libro_acta'); 
	}

	public function ins_Doccer($txtdoc,$txtcod)
	{
		$this->db->set('cod_cer', $txtdoc);
		$this->db->where('cod_registro', $txtcod);
		$this->db->update('libro_acta'); 
	}
}
 ?>