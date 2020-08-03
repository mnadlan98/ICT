<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class peserta_model extends CI_Model{

     public function insert($data)
     {
        
        $this->db->insert('peserta', $data);
     }

     public function delete($id)
     {
        return $this->db->delete($this->_table, array("id_peserta" => $id));
     }

     public function getAll()
     {
        return $this->db->get('peserta')->result();
     }
     public function getById($id)
     {
        return $this->db->get_where('peserta', ["id_peserta" => $id])->result();
     }
}
