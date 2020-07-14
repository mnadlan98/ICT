<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Pengajuan_model extends CI_Model{

     function daftar($data)
     {
          $this->db->insert('pengajuan',$data);
     }

     function get_kotakab(){
     	$query = $this->db->get('kota_kab');
     	return $query;
     }

     function get_datel($id_kotakab){
     	$query = $this->db->get_where('datel', array('id_kotakab' => $id_kotakab));
     	return $query;
     }
     function get_witel($id_datel){
     	$query = $this->db->get_where('datel', array('id_datel' => $id_datel));
     	$row = $query->row();
     	return $row->id_witel;
     }
}
