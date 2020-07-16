<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class kontak_model extends CI_Model{

     public function insert($data)
     {
        
        $this->db->insert('kontak', $data);
     }

     public function delete($id)
     {
        return $this->db->delete($this->_table, array("id_witel" => $id));
     }

     public function getAll()
     {
        return $this->db->get('kontak')->result();
     }
     public function getById($id)
     {
        return $this->db->get_where('form', ["id_witel" => $id])->row();
     }
}
