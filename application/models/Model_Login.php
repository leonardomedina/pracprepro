<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model
{
  var $table = "users";
  public function __construct()
  {
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
      $this->load->model('Model_Listanuncio');
  }

  public function login($username, $password)
  {

      $this->db->select('*');
      $this->db->from('cuenta');
      $this->db->where(['usuario'=>$username,'contraseña'=>$password]);
      $return = $this->db->get('');

      if ($return->num_rows() > 0) {
          foreach ($return->result()  as $row)
          {
            if ($row->nivel=="admin")
            {
            redirect('administracion');
            $session = array('level' =>$row);
            }
            elseif ($row->nivel=="alumno") {
              redirect('listanuncio');
              $session = array('level' =>$row);
            }
           
          }
          
      }
      else {
        $this->session->set_flashdata('mensaje','<strong>Usuario o Contraseña</strong></br> no son validos..!');
        redirect('login', 'refresh');
      }

  }


}
