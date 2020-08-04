<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Profile_model extends CI_Model{

    public function getPengajuan()
    {
      $user = $this->session->userdata("user")['id'];
      $this->db->select('jumlah_siswa,pembimbing1,pembimbing2,tanggal_pelaksanaan,wilayah,datel,nama_witel,keterangan,tanggal_pengajuan,status_pengajuan,approved,tanggal_persetujuan');
      $this->db->from('pengajuan');
      $this->db->join('sto', 'pengajuan.id_sto = sto.id_sto');
      $this->db->join('wilayah', 'sto.id_wilayah = wilayah.id_wilayah');
      $this->db->join('datel', 'sto.id_datel = datel.id_datel');
      $this->db->join('witel', 'pengajuan.id_witel = witel.id_witel');
      $this->db->where('pengajuan.id_user = '.$user);
      $query = $this->db->get();
      return $query->result();
    }

    public function getPengajuanTerbaru()
    {
      $user = $this->session->userdata("user")['id'];
      $this->db->select('jumlah_siswa,pembimbing1,pembimbing2,tanggal_pelaksanaan,wilayah,datel,nama_witel,keterangan,tanggal_pengajuan,status_pengajuan,approved,tanggal_persetujuan');
      $this->db->from('pengajuan');
      $this->db->join('sto', 'pengajuan.id_sto = sto.id_sto');
      $this->db->join('wilayah', 'sto.id_wilayah = wilayah.id_wilayah');
      $this->db->join('datel', 'sto.id_datel = datel.id_datel');
      $this->db->join('witel', 'pengajuan.id_witel = witel.id_witel');
      $this->db->where('pengajuan.id_user = '.$user);
      $this->db->order_by('id_pengajuan', 'DESC');
      $this->db->limit(1);
      $query = $this->db->get();
      return $query->result();
    }

    public function getAllFeedback()
    {
      $this->db->select('nama_user,nama_sekolah,komen,rating');
      $this->db->from('user');
      $this->db->join('feedback', 'feedback.id_user = user.id_user');
      $this->db->order_by('feedback.id_user', 'DESC');
      $this->db->limit(7);
      $query = $this->db->get();
      return $query->result();
    }

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

     public function rules()
     {
         return [
             ['field' => 'nama_user',
             'label' => 'Nama User',
             'rules' => 'required'],
 
             ['field' => 'email_user',
             'label' => 'Email User',
             'rules' => 'valid_email'],
             
             ['field' => 'notelp_user',
             'label' => 'No. Telp User',
             'rules' => 'numeric'],
 
             ['field' => 'nama_sekolah',
             'label' => 'Nama Sekolah',
             'rules' => 'required'],
 
             ['field' => 'email_sekolah',
             'label' => 'Email Sekolah',
             'rules' => 'valid_email'],
 
             ['field' => 'notelp_sekolah',
             'label' => 'No. Telp Sekolah',
             'rules' => 'numeric']
         ];
     }
 
 
 
    public function updateProfile()
    {
        $id = $this->session->userdata("user")['id'];
        $post = $this->input->post();
        $this->db->set('nama_user', $post["nama_user"]);
        $this->db->set('email_user', $post["email_user"]);
        $this->db->set('notelp_user', $post["notelp_user"]);
        $this->db->set('nama_sekolah', $post["nama_sekolah"]);
        $this->db->set('email_sekolah', $post["email_sekolah"]);
        $this->db->set('notelp_sekolah', $post["notelp_sekolah"]);
        $this->db->where('id_user',$id);  
        $data = array(
          'logged' => TRUE,
          'nama_user' => $post["nama_user"],
          'email_user' => $post["email_user"],
          'notelp_user' => $post["notelp_user"],
          'nama_sekolah' => $post["nama_sekolah"],
          'email_sekolah' => $post["email_sekolah"],
          'notelp_sekolah' => $post["notelp_sekolah"],
          'status_pengajuan' => $this->session->userdata("user")['status_pengajuan'],
          'eventover' => $this->session->userdata("user")['eventover'],
          'id' => $id
        );
        $this->session->set_userdata("user",$data);
        return $this->db->update('user');  
    }

    function getIdPengajuan()
     {
        $user = $this->session->userdata("user")['id'];
        $this->db->select('id_pengajuan');
        $this->db->from('pengajuan');
        $this->db->where('id_user = '.$user);
        $this->db->order_by('id_pengajuan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $data  = $query->row();
        return (int)$data->id_pengajuan;
    }

    public function approved($value,$alasan){
        $id = $this->Profile_model->getIdPengajuan();
        if($value==1 || $value==2){
            $status = 3;
        }
        $this->db->set('status_pengajuan',$status);
        $this->db->set('approved', $value);
        $this->db->set('alasan', $alasan);
        $this->db->where('id_pengajuan', $id);
        $this->db->update('pengajuan');
    } 

    function getReport(){
        return $this->db->get('report',1)->result();          
    }

    function getIdReport(){
        $id = $this->Profile_model->getIdPengajuan();
        $this->db->select('id_report');
        $this->db->from('report');
        $this->db->where('id_pengajuan = '.$id);
        $this->db->order_by('id_pengajuan', 'DESC');
        $this->db->limit(1);
        
        $query = $this->db->get();
        $data  = $query->row();
        return (int)$data->id_report;   
    }

    function getFotoReport($id){
        return $this->db->get_where('galeri_report', array('id_report' => $id))->result();                 
    }


    

  }