<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Pengajuan_model extends CI_Model{

     function daftar($data)
     {
          $this->db->insert('pengajuan',$data);
     }

     
}
