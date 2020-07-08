<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Login_model");
        $this->load->library('form_validation');
    }


    public function inputlogin() {
        $this->form_validation->set_rules('email_user','email_user','trim|required');
        $this->form_validation->set_rules('password','password','trim|required');
        $data['title'] = "Login";
        if ($this->form_validation->run() == true) {
            $login = $this->Login_model->checklogin($this->input->post('email_user'), $this->input->post('password'));
            if ($login == 1) {
                $row = $this->Login_model->data_login($this->input->post('email_user'),$this->input->post('password'));
                $data = array(
                    'logged' => TRUE,
                    'nama_user' => $row->nama_user,
                    'email_user' => $row->email_user,
                    'notelp_user' => $row->notelp_user,
                    'nama_sekolah' => $row->nama_sekolah,
                    'email_sekolah' => $row->email_sekolah,
                    'notelp_sekolah' => $row->notelp_sekolah,
                    'id' => $row->id_user

                );
                $this->session->set_userdata("user",$data);
                redirect(site_url('MainController/index'));
            }else{
                $this->session->set_flashdata('message', 'Email / Password Salah');
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view("home/login",$data);
        $this->load->view('templates/footer');
        
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('MainController/index'));
    }


}

