<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Register_model extends CI_Model{

       function daftar($data)
       {
            $this->db->insert('user',$data);
       }
  }
