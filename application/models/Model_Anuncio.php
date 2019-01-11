<?php 
/**
* 
*/
class Model_Anuncio extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("titulo_anuncio",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("rep_anuncio");
		return $consulta->result();
	}

	public function sel_Anuncio()
	{
		$query=$this->db->get('rep_anuncio');
		return $query->result();
	}

	public function ins_Anuncio($txtcod,$txttit,$txtins,$txtreq,$txtfun,$txtben,$txtarea,$txttip,$txtsal,$txtfecha,$txtest)
	{
		$data = array(
        'cod_postulacion' => $txtcod,
        'titulo_anuncio' => $txttit,
        'nombre_institucion' => $txtins,
        'requisitos' => $txtreq,
        'funciones' => $txtfun,
        'beneficios' => $txtben,
        'area' => $txtarea,
        'tipo_puesto' => $txttip,
        'salario' => $txtsal,
        'fecha_pub' => $txtfecha,
        'estado' => $txtest
		);
		$this->db->insert('rep_anuncio', $data);
	}

	public function borrar_Anuncio($cod_postulacion)
	{
		$this->db->where('cod_postulacion',$cod_postulacion);
		$this->db->delete('rep_anuncio');
	}

	public function editar_Anuncio($cod_postulacion)
	{
		$this->db->where('cod_postulacion', $cod_postulacion);
		$this->db->from('rep_anuncio'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_Anuncio($txtcod,$txttit,$txtins,$txtreq,$txtfun,$txtben,$txtarea,$txttip,$txtsal,$txtfecha,$txtest)
	{
		$data = array(
        'cod_postulacion' => $txtcod,
        'titulo_anuncio' => $txttit,
        'nombre_institucion' => $txtins,
        'requisitos' => $txtreq,
        'funciones' => $txtfun,
        'beneficios' => $txtben,
        'area' => $txtarea,
        'tipo_puesto' => $txttip,
        'salario' => $txtsal,
        'fecha_pub' => $txtfecha,
        'estado' => $txtest
		);
		$this->db->where('cod_postulacion', $txtcod);
		$this->db->update('rep_anuncio', $data);
	}
}
 ?>