<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Review_model extends CI_Model{

     function getStatus()
     {
        $status = array();
        $user = $this->session->userdata("user")['id'];
        $query = $this->db->get_where('pengajuan', array('id_user' => $user));
        $data   = $query->result_array();
        foreach ($data as $row){
          echo "<tr>
              <td>".$row['status_pengajuan']."</td>
                </tr>";
        }
        $status = (float)$row['status_pengajuan'] * 25;
        $status = '"width:'.$status.'%"';
        return $status
     }