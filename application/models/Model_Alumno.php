<?php 
/**
* 
*/
class Model_Alumno extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function sel_Alumno()
	{
		$query=$this->db->get('alumno');
		return $query->result();
	}
}	
 ?>

