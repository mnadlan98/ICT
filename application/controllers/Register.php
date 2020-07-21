<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Register extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('Auth_Model'); 
    }
 
    public function index() {
        $title['title'] = "Daftar";
        $this->form_validation->set_rules('kota_sekolah', 'Kota/Kabupaten Sekolah','trim|required|xss_clean');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah','trim|required|xss_clean');
        $this->form_validation->set_rules('email_sekolah', 'Email Sekolah','trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('notelp_sekolah', 'No Telp Sekolah','trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User','trim|required|xss_clean');
        $this->form_validation->set_rules('email_user','Email Pengguna','trim|required|xss_clean|valid_email|is_unique[user.email_user]');
        $this->form_validation->set_rules('notelp_user', 'No Telp User','trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('password','Kata Sandi','trim|required|min_length[6]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('password_conf','Ulangi Kata Sandi','trim|required|matches[password]|xss_clean');
        if($this->form_validation->run() == FALSE) {
            site_url('Register/index');
        }else{
    
            $data['jenjang_sekolah']   =  $this->input->post('jenjang_sekolah',true);
            $data['kota_sekolah']   =  $this->input->post('kota_sekolah',true);
            $data['nama_sekolah']   =  $this->input->post('nama_sekolah',true);
            $data['email_sekolah']  =  $this->input->post('email_sekolah',true);
            $data['notelp_sekolah'] =  $this->input->post('notelp_sekolah',true);
            $data['nama_user']   =  $this->input->post('nama_user',true);
            $data['email_user']     =  $this->input->post('email_user',true);
            $data['notelp_user'] =  $this->input->post('notelp_user',true);
            $data['password']       =  password_hash($this->input->post('password',true),PASSWORD_BCRYPT);
 
            $this->Auth_Model->daftar($data);
            $this->session->set_flashdata('sukses', 'Anda telah berhasil melakukan pendaftaran, silahkan masuk menggunakan akun yang telah terdaftar untuk mengajukan pengajuan.');
            redirect(site_url('MainController/index')); 
        }
        $this->load->view('templates/header',$title);
        $this->load->view("home/registrasi");
        $this->load->view('templates/footer');
    }

    function get_namasekolah(){
        if (isset($_GET['term'])) {
            $result = $this->Auth_Model->search_nama($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->Nama_Sekolah;
                echo json_encode($arr_result);
            }
        }
    }
    function get_kotasekolah(){
        if (isset($_GET['term'])) {
            $result = $this->Auth_Model->search_kota($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->KabupatenKota;
                echo json_encode($arr_result);
            }
        }
    }
}
