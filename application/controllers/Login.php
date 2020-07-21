<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_Model");
        $this->load->library('form_validation');
    }


    public function index() {
        $this->form_validation->set_rules('username','username','trim|required|xss_clean');
        $this->form_validation->set_rules('password','password','trim|required|xss_clean');
        $data['title'] = "Login";
        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username',true);
            $password = $this->input->post('password',true);
            if($this->Auth_Model->login_user($username,$password))
            {
                $this->session->set_flashdata('msg','Berhasil Login');
                redirect(site_url('MainController/index'));
            }
            else{
                if($this->Auth_Model->login_admin($username,$password))
                {
                    $this->session->set_flashdata('msg','Berhasil Login');
                    redirect(site_url('admin/overview'));
                }
                else
                {
                    $this->session->set_flashdata('msg','Username / Password salah');
                }
            }
            
        }
        $this->load->view('templates/header', $data);
        $this->load->view("home/login",$data);
        $this->load->view('templates/footer');
        
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('login/index'));
    }


}

