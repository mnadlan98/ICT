<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Pengajuan extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('Pengajuan_Model'); 
    }

    public function index() {
        $data['kotakab'] = $this->Pengajuan_Model->get_kotakab()->result();

        $this->form_validation->set_rules('jumlah_siswa', 'Jumlah Siswa','required');
        $this->form_validation->set_rules('pembimbing1', 'Nama Pembimbing 1','required');
        $this->form_validation->set_rules('pembimbing2', 'Nama Pembimbing 2','required');
        $this->form_validation->set_rules('tanggal_pelaksanaan', 'Tanggal Pelaksanaan','required');
        $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan');
        $this->form_validation->set_rules('daftar_peserta','Daftar Peserta');
       
        if($this->form_validation->run() == FALSE) {
            site_url('pengajuan');
        }else{
            $post = $this->input->post();
            $this->id_user = $this->session->userdata("user")['id'];
            $this->jumlah_siswa = $post["jumlah_siswa"];
            $this->pembimbing1 = $post["pembimbing1"];
            $this->pembimbing2 = $post["pembimbing2"];
            $this->tanggal_pelaksanaan = $post["tanggal_pelaksanaan"];
            $this->surat_permohonan = $this->upload_surat();
            $this->daftar_peserta = $this->upload_peserta();
            $this->id_kotakab = $post["kotakab"];
            $this->id_datel = $post["datel"];
            $this->id_witel = $this->Pengajuan_Model->get_witel($this->id_datel);
            $this->checkbox_policy = $post["checkbox_policy"];
            $this->tanggal_pengajuan = date('Y-m-d');
            $this->status_pengajuan = 'Diajukan';
            $this->Pengajuan_Model->daftar($this);

            redirect(site_url('MainController/review')); 
        }
        $data['title'] = 'Pengajuan';
        $this->load->view('templates/header', $data);
        $this->load->view('home/pengajuan');
        $this->load->view('templates/footer');	
    }

    function get_datel(){
        $id_kotakab = $this->input->post('id',TRUE);
        $data = $this->Pengajuan_Model->get_datel($id_kotakab)->result();
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
    
