<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class galeri_model extends CI_Model{

     public function insert($data)
     {
        
        $this->db->insert('galeri', $data);
     }

     public function delete($id)
     {
        return $this->db->delete('galeri', array("id_foto" => $id));
     }

     public function edit($id,$data)
     {
          $this->db->update('galeri', $data, array('id_foto' => $id));
     }

     public function getAll()
     {
        return $this->db->get('galeri')->result();
     }
     public function getById($id)
     {
        return $this->db->get_where('galeri', ["id_foto" => $id])->row();
     }
}
