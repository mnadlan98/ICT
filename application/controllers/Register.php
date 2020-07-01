<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Register extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('Register_model'); 
    }
 
    public function index() {
        $title['title'] = "Daftar";
        $this->form_validation->set_rules('jenjang_sekolah', 'Jenjang Sekolah','required');
        $this->form_validation->set_rules('kota_sekolah', 'Kota/Kabupaten Sekolah','required');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah','required');
        $this->form_validation->set_rules('email_sekolah', 'Email Sekolah','required|valid_email');
        $this->form_validation->set_rules('notelp_sekolah', 'No Telp Sekolah','required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User','required');
        $this->form_validation->set_rules('email_user','Email Pengguna','required|valid_email');
        $this->form_validation->set_rules('notelp_user', 'No Telp User','required|numeric');
        $this->form_validation->set_rules('password','Kata Sandi','required');
        $this->form_validation->set_rules('password_conf','Ulangi Kata Sandi','required|matches[password]');
        if($this->form_validation->run() == FALSE) {
            site_url('Register/index');
        }else{
            //$data['id_user']        =  rand(0,1000);
            $data['jenjang_sekolah']   =  $this->input->post('jenjang_sekolah');
            $data['kota_sekolah']   =  $this->input->post('kota_sekolah');
            $data['nama_sekolah']   =  $this->input->post('nama_sekolah');
            $data['email_sekolah']  =  $this->input->post('email_sekolah');
            $data['notelp_sekolah'] =  $this->input->post('notelp_sekolah');
            $data['nama_user']   =  $this->input->post('nama_user');
            $data['email_user']     =  $this->input->post('email_user');
            $data['notelp_user'] =  $this->input->post('notelp_user');
            $data['password']       =  md5($this->input->post('password'));
 
            $this->Register_model->daftar($data);
            $this->session->set_flashdata('sukses', 'Anda telah berhasil melakukan pendaftaran, silahkan masuk menggunakan akun yang telah terdaftar untuk mengajukan pengajuan.');
            redirect(site_url('MainController/index')); 
        }
        $this->load->view('templates/header',$title);
        $this->load->view("home/registrasi");
        $this->load->view('templates/footer');
    }

    function get_namasekolah(){
        if (isset($_GET['term'])) {
            $result = $this->Register_model->search_nama($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->Nama_Sekolah;
                echo json_encode($arr_result);
            }
        }
    }
    function get_kotasekolah(){
        if (isset($_GET['term'])) {
            $result = $this->Register_model->search_kota($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->KabupatenKota;
                echo json_encode($arr_result);
            }
        }
    }
}
