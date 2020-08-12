<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Pengajuan extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('Pengajuan_Model'); 
    }

    public function index() {
        
        $this->form_validation->set_rules('jumlah_siswa', 'Jumlah Siswa','trim|required|xss_clean');
        $this->form_validation->set_rules('pembimbing1', 'Nama Pembimbing 1','trim|required|xss_clean');
        $this->form_validation->set_rules('pembimbing2', 'Nama Pembimbing 2','trim|xss_clean');
        $this->form_validation->set_rules('tanggal_pelaksanaan', 'Tanggal Pelaksanaan','trim|required|xss_clean');

        if($this->form_validation->run() == FALSE) {
            site_url('pengajuan');
        }else{
            $this->id_user = $this->session->userdata("user")['id'];
            $this->jumlah_siswa = $this->input->post("jumlah_siswa",TRUE);
            $this->pembimbing1 = $this->input->post("pembimbing1",TRUE);
            $this->pembimbing2 = $this->input->post("pembimbing2",TRUE);
            $this->tanggal_pelaksanaan = $this->input->post("tanggal_pelaksanaan",TRUE);
            $this->surat_permohonan = $this->upload_surat();
            $this->daftar_peserta = $this->upload_peserta();
            if($this->surat_permohonan == null || $this->daftar_peserta == null){
              $this->session->set_flashdata('msge','Format file yang anda upload tidak sesuai');   
            }else{
              $this->id_sto = $this->input->post("sto",TRUE);
              $this->id_witel = $this->Pengajuan_Model->getWitel_bySto($this->id_sto);
              $this->checkbox_policy = $this->input->post('checkbox_policy',TRUE);
              $this->tanggal_pengajuan = date('Y-m-d');
              $this->status_pengajuan = 1;
              $data = array(
                'logged' => TRUE,
                'nama_user' => $this->session->userdata("user")['nama_user'],
                'email_user' => $this->session->userdata("user")['email_user'],
                'notelp_user' => $this->session->userdata("user")['notelp_user'],
                'nama_sekolah' => $this->session->userdata("user")['nama_sekolah'],
                'email_sekolah' => $this->session->userdata("user")['email_sekolah'],
                'notelp_sekolah' => $this->session->userdata("user")['notelp_sekolah'],
                'status_pengajuan' => 1,
                'eventover' => $this->session->userdata("user")['eventover'],
                'id' => $this->session->userdata("user")['id']
              );
              $this->session->set_userdata("user",$data);

              if($this->Pengajuan_Model->daftar($this)){
                $this->load->model("Auth_Model");
              $this->load->library('encryption');
              $config_email = $this->Auth_Model->get_config_email();
              $config = array();
              $config['charset'] = 'utf-8';
              $config['useragent'] = 'Codeigniter';
              $config['protocol']= $config_email->protocol;
              $config['mailtype']= $config_email->mail_type;
              $config['smtp_host']= $config_email->smtp_host;//pengaturan smtp
              $config['smtp_port']= $config_email->smtp_port;
              $config['smtp_timeout']= $config_email->smtp_timeout;
              $config['smtp_user']= $config_email->smtp_user;
              $config['smtp_pass']= $this->encryption->decrypt($config_email->smtp_pass);
              $config['crlf']="\r\n";
              $config['newline']="\r\n";
              $config['wordwrap'] = TRUE;

                $this->email->initialize($config);

                $this->email->from($config['smtp_user']);
                $this->email->to($this->session->userdata("user")['email_user']);
                $this->email->subject("Status Pengajuan");
                $this->email->message(" Pengajuan anda telah kami terima dan sedang dalam tahap review oleh admin. ");	
                $this->email->send();	             			                                   
              }
          }
            if($this->session->flashdata('msge')){
              redirect(site_url('pengajuan/index'));	
            }else{
              $this->session->set_flashdata('msg','Pengajuan berhasil dikirim');  
              redirect(site_url('review')); 
            }
				}
            
        if ($this->session->userdata('user')['logged']) {
          $data['title'] = 'Pengajuan';
          $data['wilayah'] = $this->Pengajuan_Model->get_wilayah();
          $data['term'] = $this->Pengajuan_Model->get_Term();
          $this->load->view('templates/header', $data);
          $this->load->view('home/pengajuan');
          $this->load->view('templates/footer');  
        }
        else{
          redirect(site_url('home'));
        }
        
    }

    function get_sto(){
        $id_wilayah = $this->input->post('id',TRUE);
        $data = $this->Pengajuan_Model->get_sto_byWilayah($id_wilayah);
        echo json_encode($data);
    }

    function upload_surat(){

      $config['upload_path']          = './upload/surat_permohonan/';
      $config['allowed_types']        = 'pdf';
      $config['max_size']             = 2048; // 2MB

      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if ($this->upload->do_upload('surat_permohonan')) {
        return $this->upload->data("file_name");
      }
    
      print_r($this->upload->display_errors());
      //  $this->surat_permohonan = $upload_data['file_name'];
      //if (!$this->upload->do_upload('surat_permohonan')) {
      //  $error = array('error' => $this->upload->display_errors());
      //  $this->load->view('home/pengajuan', $error);
      //}
      //else {
        //$data = array('upload_data' => $this->upload->data());
        //$this->load->view('upload_success', $data);
      //  $upload_data = $this->upload->data();
      //  $this->surat_permohonan = $upload_data['file_name'];
      //}
    }

    function upload_peserta(){

      $config['upload_path']          = './upload/daftar_peserta/';
      $config['allowed_types']        = 'csv|xlsx';
      $config['max_size']             = 2048; // 2MB

      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if ($this->upload->do_upload('daftar_peserta')) {
        return $this->upload->data("file_name");
      }
    
      print_r($this->upload->display_errors());

      //if (!$this->upload->do_upload('daftar_peserta')) {
        //$error = array('error' => $this->upload->display_errors());
        //$this->load->view('home/pengajuan', $error);
      //}
      //else {
        //$data = array('upload_data' => $this->upload->data());
        //$this->load->view('upload_success', $data);
        //$upload_data = $this->upload->data();
        //$this->daftar_peserta = $upload_data['file_name'];
      //}
    }
}
    
