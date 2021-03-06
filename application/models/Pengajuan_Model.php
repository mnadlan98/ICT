<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Pengajuan_model extends CI_Model{

     function daftar($data)
     {
          return $this->db->insert('pengajuan',$data);
     }

     public function insertReport($data)
     {
          $this->db->insert('report',$data);
     }

     public function getNamaSertif()
     {
          $this->db->select('nama_sertif');
          $this->db->from('sertif');
          $this->db->where("id_sertif = 1");

          $query = $this->db->get();
          $row  = $query->row();
          if(!empty($row)){
               return $row->nama_sertif;
          }else{
               return null;
          }
     }

     public function updateReport($id,$data)
     {
          $this->db->update('report',$data, array('id_report' => $id));
     }

     public function updateSertif($id,$data)
     {
          $this->db->set('nama_sertif', $data);
          $this->db->where('id_sertif', $id);
          $this->db->update('sertif');
     }
     
     public function getDHadirByPengajuan($id){
          $this->db->select('daftar_siswa');
          $this->db->from('report');
          $this->db->where("EXISTS(SELECT daftarmateri FROM report WHERE id_pengajuan = ".$id.")");
        
          $query = $this->db->get();
          $row  = $query->row();
          if(!empty($row)){
               return $row->daftar_siswa;
          }else{
               return null;
          }
     }

     function getReportbyIdPengajuan($id){
          return $this->db->get('report',array('id_pengajuan' => $id))->result();          
     }

     public function getIdUserByPengajuan($id){
          $query = $this->db->get_where('pengajuan', array('id_pengajuan' => $id));
          $data  = $query->row();
          return (int)$data->id_user;
     }

     public function getEventoverByIdwitel($id){
          $this->db->select('eventover');
          $this->db->from('pengajuan');
          $this->db->where('id_witel',$id);

          $query = $this->db->get();
          $row  = $query->result();
          if(!empty($row)){
               $count = 0;
               foreach($row as $r ){
                    if($r->eventover){
                         $count++;
                    }
               }
               return $count;
          }else{
               return 0;
          }   
     }

     public function getEventoverByTgl($id,$tgl1,$tgl2){
          $this->db->select('eventover');
          $this->db->from('pengajuan');
          $this->db->where('id_witel',$id);
          $this->db->where("tanggal_pelaksanaan BETWEEN '$tgl1' AND '$tgl2'", null, false);

          $query = $this->db->get();
          $row  = $query->result();
          if(!empty($row)){
               $count = 0;
               foreach($row as $r ){
                    if($r->eventover){
                         $count++;
                    }
               }
               return $count;
          }else{
               return 0;
          }   
     }

     public function getIdReportByPengajuan($id){
          $query = $this->db->get_where('report', array('id_pengajuan' => $id));
          $data  = $query->row();
          return (int)$data->id_report;
     }

     function updatePengajuan($id,$data)
     {
          return $this->db->update('pengajuan', $data, array('id_pengajuan' => $id));
     }

     function get_Term(){
          return $this->db->get('syarat')->result();    
     }

     function addTerm($data)
     {
          $this->db->insert('syarat',$data);
     }

     function editTerm($id,$data)
     {
          $this->db->update('syarat', $data, array('id_syarat' => $id));
     }

     function deleteTerm($id)
     {
          return $this->db->delete('syarat', array("id_syarat" => $id));
     }

     function updateStatus($id,$status)
     {
          $this->db->get_where('pengajuan',array('id_pengajuan' => $id_pengajuan));
          $value = array('status_pengajuan'=>$status);
          return $this->db->update('pengajuan',$value);
     }

     function get_wilayah(){
          return $this->db->get('wilayah')->result();
          
     }

     function get_sto_byWilayah($id_wilayah){
          return $this->db->get_where('sto', array('id_wilayah' => $id_wilayah))->result();
     }

     function getAll(){
          $this->db->select('*');
          $this->db->from('pengajuan');
          $this->db->join('witel', 'pengajuan.id_witel=witel.id_witel');
          $this->db->order_by('pengajuan.id_witel', 'ASC');
          return $this->db->get()->result();
     }

     function addWitel($data)
     {
          $this->db->insert('witel',$data);
     }

     function getWitel(){
          $this->db->select('*');
          $this->db->from('witel');
          $this->db->order_by('id_witel', 'ASC');
          return $this->db->get()->result();
     }


     function editWitel($id,$data)
     {
          $this->db->update('witel', $data, array('id_witel' => $id));
     }

     function deleteWitel($id)
     {
          return $this->db->delete('witel', array("id_witel" => $id));
     }

     function getWitel_bySto($id_sto){
          $row = $this->db->get_where('sto', array('id_sto' => $id_sto))->row();
          return $row->id_witel;
     }

     function getWitel_byId($id_witel){
          $this->db->where('id_witel', $id_witel);
          return $this->db->get('witel')->row();
     }

     function getAll_byId($id_witel){
          $this->db->select('*');
          $this->db->from('pengajuan');
          $this->db->join('witel', 'pengajuan.id_witel=witel.id_witel');
          $this->db->join('sto', 'pengajuan.id_sto=sto.id_sto');
          $this->db->join('user', 'pengajuan.id_user=user.id_user');
          $this->db->where('pengajuan.id_witel', $id_witel);
          return $this->db->get()->result();
     }

     function count_rows($id_witel) {
          $this->db->where(['id_witel' => $id_witel]);
          return $this->db->get('pengajuan')->num_rows();
     }

     function count_rows_bytgl($id_witel,$tgl1,$tgl2) {
          $this->db->where(['id_witel' => $id_witel]);
          $this->db->where("tanggal_pelaksanaan BETWEEN '$tgl1' AND '$tgl2'", null, false);
          return $this->db->get('pengajuan')->num_rows();
     }

     function get_PengajuanbyId($id_pengajuan){
          $this->db->select('*');
          $this->db->from('pengajuan');
          $this->db->join('witel', 'pengajuan.id_witel=witel.id_witel');
          $this->db->join('sto', 'pengajuan.id_sto=sto.id_sto');
          $this->db->join('user', 'pengajuan.id_user=user.id_user');
          $this->db->join('wilayah', 'sto.id_wilayah=wilayah.id_wilayah');
          $this->db->where('pengajuan.id_pengajuan', $id_pengajuan);
          return $this->db->get()->row();
     }

     function getSekolah(){
          return $this->db->get('sekolah')->result_array();
     }

     function addSekolah($data)
     {
          $this->db->insert('sekolah',$data);
     }

     function editSekolah($id,$data)
     {
          $this->db->update('sekolah', $data, array('NPSN' => $id));
     }

     function deleteSekolah($id)
     {
          return $this->db->delete('sekolah', array("NPSN" => $id));
     }

     function getDatel(){
          $this->db->join('witel', 'datel.id_witel=witel.id_witel');
          return $this->db->get('datel')->result();
     }

     function get_datel_byWitel($id_witel){
          return $this->db->get_where('datel', array('id_witel' => $id_witel))->result();
     }

     function addDatel($data)
     {
          $this->db->insert('datel',$data);
     }

     function editDatel($id,$data)
     {
          $this->db->update('datel', $data, array('id_datel' => $id));
     }

     function deleteDatel($id)
     {
          return $this->db->delete('datel', array("id_datel" => $id));
     }

     function getWilayah(){
          $this->db->join('witel', 'wilayah.id_witel=witel.id_witel');
          return $this->db->get('wilayah')->result();
     }

     function get_wilayah_byWitel($id_witel){
          return $this->db->get_where('wilayah', array('id_witel' => $id_witel))->result();
     }

     function addWilayah($data)
     {
          $this->db->insert('wilayah',$data);
     }

     function editWilayah($id,$data)
     {
          $this->db->update('wilayah', $data, array('id_wilayah' => $id));
     }

     function deleteWilayah($id)
     {
          return $this->db->delete('wilayah', array("id_wilayah" => $id));
     }

     function getSto(){
          $this->db->select('*');
          $this->db->from('sto');
          $this->db->join('witel', 'sto.id_witel=witel.id_witel');
          $this->db->join('datel', 'sto.id_datel=datel.id_datel');
          $this->db->join('wilayah', 'sto.id_wilayah=wilayah.id_wilayah');
          return $this->db->get()->result();
     }

     function addSto($data)
     {
          $this->db->insert('sto',$data);
     }

     function editSto($id,$data)
     {
          $this->db->update('sto', $data, array('id_sto' => $id));
     }

     function deleteSto($id)
     {
          return $this->db->delete('sto', array("id_sto" => $id));
     }

     function getStatus($id)
     {
        $status = array();
        $query = $this->db->get_where('pengajuan', array('id_pengajuan' => $id));
        $data  = $query->row();
        if(empty($data)){
            $value = 0;
        }else{
            $value = (int)$data->status_pengajuan;
        }

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
        }else if($value == 0){
            $status[0] = '"col-xs-3 bs-wizard-step disabled"';
            $status[1] = '"col-xs-3 bs-wizard-step disabled"';
            $status[2] = '"col-xs-3 bs-wizard-step disabled"';
            $status[3] = '"col-xs-3 bs-wizard-step disabled"';
        }
        $status[4] = $value;
        return $status;
     }


}
