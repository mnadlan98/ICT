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
        $value = (int)$row['status_pengajuan'];

        if($value == 4){
            $status[0] = '"col-xs-3 bs-wizard-step complete"';
            $status[1] = '"col-xs-3 bs-wizard-step complete"';
            $status[2] = '"col-xs-3 bs-wizard-step complete"';
            $status[3] = '"col-xs-3 bs-wizard-step active"';
        }else if($value == 3){
            $status[0] = '"col-xs-3 bs-wizard-step complete"';
            $status[1] = '"col-xs-3 bs-wizard-step complete"';
            $status[2] = '"col-xs-3 bs-wizard-step active"';
            $status[3] = '"col-xs-3 bs-wizard-step disabled"';
        }else if($value == 2){
            $status[0] = '"col-xs-3 bs-wizard-step complete"';
            $status[1] = '"col-xs-3 bs-wizard-step active"';
            $status[2] = '"col-xs-3 bs-wizard-step disabled"';
            $status[3] = '"col-xs-3 bs-wizard-step disabled"';
        }else if($value == 1){
            $status[0] = '"col-xs-3 bs-wizard-step active"';
            $status[1] = '"col-xs-3 bs-wizard-step disabled"';
            $status[2] = '"col-xs-3 bs-wizard-step disabled"';
            $status[3] = '"col-xs-3 bs-wizard-step disabled"';
        }
        return $status;
     }
    }