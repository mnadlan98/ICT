<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Pengajuan_model extends CI_Model{

     function daftar($data)
     {
          $this->db->insert('pengajuan',$data);
     }

     public function insertReport($data)
     {
          $this->db->insert('report',$data);
     }

     public function insertFotoReport($data = array())
     {       
          $this->db->select('id_report');
          $this->db->from('report');
          $this->db->order_by('id_report', 'DESC');
          $this->db->limit(1);

          $query = $this->db->get();
          $row  = $query->row();
          $id = (int)$row->id_report;

          for($x = 0; $x < count($data); $x++){
              $data[$x]['id_report'] = $id;
          }
          $this->db->insert_batch('galeri_report',$data);
     }
     


     function updatePengajuan($id,$data)
     {
          $this->db->update('pengajuan', $data, array('id_pengajuan' => $id));
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

     function get_PengajuanbyId($id_pengajuan){
          $this->db->select('*');
          $this->db->from('pengajuan');
          $this->db->join('witel', 'pengajuan.id_witel=witel.id_witel');
          $this->db->join('sto', 'pengajuan.id_sto=sto.id_sto');
          $this->db->join('user', 'pengajuan.id_user=user.id_user');
          $this->db->where('pengajuan.id_pengajuan', $id_pengajuan);
          return $this->db->get()->row();
     }

     function getSekolah(){
          return $this->db->get('sekolah')->result();
     }

     function getDatel(){
          return $this->db->get('datel')->result();
     }

     function addDatel($data)
     {
          $this->db->insert('datel',$data);
     }

     function editDatel($id,$data)
     {
          $this->db->update('datel', $data, array('id_datel' => $id));
     }

     function getWilayah(){
          return $this->db->get('wilayah')->result();
     }

     function addWilayah($data)
     {
          $this->db->insert('wilayah',$data);
     }

     function editWilayah($id,$data)
     {
          $this->db->update('wilayah', $data, array('id_wilayah' => $id));
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
}
