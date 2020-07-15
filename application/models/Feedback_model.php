<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Feedback_model extends CI_Model{

    private $_table = "feedback";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
  }