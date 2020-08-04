<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class kontak_model extends CI_Model{

     public function insert($data)
     {
        
        $this->db->insert('kontak', $data);
     }

     public function delete($id)
     {
        return $this->db->delete('kontak',array("id_kontak" => $id));
     }

     function edit($id,$data)
     {
          $this->db->update('kontak', $data, array('id_kontak' => $id));
     }

     public function getAll()
     {
        $this->db->select('*');
        $this->db->join('witel', 'kontak.id_witel=witel.id_witel');
        return $this->db->get('kontak')->result();
     }

     public function getbyWitel($id_witel)
     {
        $this->db->select('*');
       
        $this->db->join('witel', 'kontak.id_witel=witel.id_witel');
        $this->db->where('kontak.id_witel', $id_witel);
        return $this->db->get('kontak')->result();
     }

     public function getById($id)
     {
        return $this->db->get_where('form', ["id_kontak" => $id])->row();
     }
}
