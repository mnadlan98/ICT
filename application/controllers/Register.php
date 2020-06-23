<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Register extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('Register_model'); 
    }
 
    public function index() {
 
        $this->form_validation->set_rules('kode_sekolah', 'Kode Sekolah','required');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah','required');
        $this->form_validation->set_rules('email_sekolah', 'Email Sekolah','required|valid_email');
        $this->form_validation->set_rules('alamat_sekolah', 'Alamat Sekolah','required');
        $this->form_validation->set_rules('notelp_sekolah', 'No Telp Sekolah','required');
        $this->form_validation->set_rules('email_user','Email Pengguna','required|valid_email');
        $this->form_validation->set_rules('password','Kata Sandi','required');
        $this->form_validation->set_rules('password_conf','Konfirmasi Ulang','required|matches[password]');
        if($this->form_validation->run() == FALSE) {
            $title['title'] = 'Registrasi';
            $this->load->view('templates/header', $title);
		    $this->load->view('home/registrasi');
            $this->load->view('templates/footer');
        }else{
            $data['id_user']        =  rand(0,1000);
            $data['kode_sekolah']   =  $this->input->post('kode_sekolah');
            $data['nama_sekolah']   =  $this->input->post('nama_sekolah');
            $data['email_sekolah']  =  $this->input->post('email_sekolah');
            $data['alamat_sekolah'] =  $this->input->post('alamat_sekolah');
            $data['notelp_sekolah'] =  $this->input->post('notelp_sekolah');
            $data['email_user']     =  $this->input->post('email_user');
            $data['password']       =  md5($this->input->post('password'));
 
            $this->Register_model->daftar($data);
            echo 'Pendaftaran Berhasil';
            $title['title'] = 'Registrasi';
            $this->load->view('templates/header', $title);
		    $this->load->view('home/registrasi');
            $this->load->view('templates/footer'); 
        }
    }
}
