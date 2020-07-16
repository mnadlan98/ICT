<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Review_model extends CI_Model{

     function getStatus()
     {
        $status = array();
        $user = $this->session->userdata("user")['id'];
        $this->db->select('status_pengajuan');
        $this->db->from('pengajuan');
        $this->db->where('id_user = '.$user);
        $this->db->order_by('id_pengajuan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $data  = $query->row();

        $value = (int)$data->status_pengajuan;

        if($value == 5){
            $status[0] = '"col-xs-3 bs-wizard-step complete"';
            $status[1] = '"col-xs-3 bs-wizard-step complete"';
            $status[2] = '"col-xs-3 bs-wizard-step complete"';
            $status[3] = '"col-xs-3 bs-wizard-step decline"';
        }else if($value == 4){
            $status[0] = '"col-xs-3 bs-wizard-step complete"';
            $status[1] = '"col-xs-3 bs-wizard-step complete"';
            $status[2] = '"col-xs-3 bs-wizard-step complete"';
            $status[3] = '"col-xs-3 bs-wizard-step accepted"';
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
        $status[4] = $value;
        return $status;
     }
    }