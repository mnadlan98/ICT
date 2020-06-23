<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Register extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('m_account'); //call model
    }
 
    public function index() {
 
        $this->form_validation->set_rules('kode_sekolah', 'KODE','required');
        $this->form_validation->set_rules('nama_sekolah', 'NAMA','required');
        $this->form_validation->set_rules('email_sekolah', 'EMAIL_SEKOLAH','required|valid_email');
        $this->form_validation->set_rules('alamat_sekolah', 'ALAMAT_SEKOLAH','required');
        $this->form_validation->set_rules('notelp_sekolah', 'NOTELP','required');
        $this->form_validation->set_rules('email_user','EMAIL_USER','required|valid_email');
        $this->form_validation->set_rules('password','PASSWORD','required');
        $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
        if($this->form_validation->run() == FALSE) {
            $this->load->view('account/v_register');
        }else{
 
            $data['nama']     =  $this->input->post('kode_sekolah');
            $data['nama']     =  $this->input->post('nama_sekolah');
            $data['nama']     =  $this->input->post('email_sekolah');
            $data['nama']     =  $this->input->post('alamat_sekolah');
            $data['username'] =  $this->input->post('notelp_sekolah');
            $data['email']    =  $this->input->post('email_user');
            $data['password'] =  md5($this->input->post('password'));
 
            $this->m_account->daftar($data);
             
            $pesan['message'] =    "Pendaftaran berhasil";
             
            $this->load->view('account/v_success',$pesan);
        }
    }
}
