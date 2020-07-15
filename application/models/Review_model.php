<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model
{

private $_table = "pengajuan";

public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id_user])->row();
    }


}