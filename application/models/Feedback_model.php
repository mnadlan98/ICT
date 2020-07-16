<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Feedback_model extends CI_Model{

    private $_table = "feedback";

    public function getAll()
    {
      $this->db->select('nama_user,nama_sekolah,komen,rating');
      $this->db->from('user');
      $this->db->join('feedback', 'feedback.id_user = user.id_user');
      $this->db->order_by('feedback.id_user', 'DESC');
      $this->db->limit(7);
      $query = $this->db->get();
      return $query->result();
    }
  }