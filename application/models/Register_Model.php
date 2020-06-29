<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Register_model extends CI_Model{

       function daftar($data)
       {
            $this->db->insert('user',$data);
       }

       function search_nama($nama_sekolah){

        $this->db->like('Nama_Sekolah', $nama_sekolah , 'both');
        $this->db->order_by('Nama_Sekolah', 'ASC');
        $this->db->limit(10);
        return $this->db->get('sekolah')->result();
    	}
  }
