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
        if (isset($this->session->userdata('user')['logged']) || isset($this->session->userdata('admin')['logged'] )) {
            redirect(site_url('MainController/index'));       
        }
        else{
            if ($this->form_validation->run() == true) {
                $username = $this->input->post('username',true);
                $password = $this->input->post('password',true);
                if($this->Auth_Model->login_user($username,$password) == 2)
                {
                    $this->session->set_flashdata('msg','Berhasil Login');
                    redirect(site_url('MainController/index'));
                }
                if ($this->Auth_Model->login_user($username,$password) == 1) {
                    $this->session->set_flashdata('login','Akun Anda Belum Diverifikasi, Silahkan Cek Email Untuk Melakukan Verifikasi');
                    redirect(site_url('Login/index'));
                }
                if ($this->Auth_Model->login_user($username,$password) == 0) {
                    if($this->Auth_Model->login_admin($username,$password))
                    {
                        $this->session->set_flashdata('msg','Berhasil Login');
                        redirect(site_url('admin/overview/index'));
                    }
                    else
                    {
                        $this->session->set_flashdata('login','Username / Password salah');
                        redirect(site_url('Login/index'));
                    }
                }  
            }
            $this->load->view('templates/header', $data);
            $this->load->view("home/login",$data);
            $this->load->view('templates/footer');
        }
    }
        
    

    public function forget_password(){
        $this->form_validation->set_rules('email','email','trim|xss_clean');
        if ($this->form_validation->run()){
            $email = $this->input->post("email",TRUE);
            $reset_key = random_string('alnum',50);

            if ($this->Auth_Model->update_reset_key($email,$reset_key)) {
                $config = array();
                $config['charset'] = 'utf-8';
                $config['useragent'] = 'Codeigniter';
                $config['protocol']= "smtp";
                $config['mailtype']= "html";
                $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
                $config['smtp_port']= "465";
                $config['smtp_timeout']= "400";
                $config['smtp_user']= "sibola124@gmail.com";
                $config['smtp_pass']= "SIBOLA124";
                $config['crlf']="\r\n";
                $config['newline']="\r\n";
                $config['wordwrap'] = TRUE;

                $this->email->initialize($config);

                $this->email->from($config['smtp_user']);
                $this->email->to($email);
                $this->email->subject("Verifikasi Reset Password");
                $this->email->message(" Silahkan klik link untuk melakukan reset password akun anda <br><br>".site_url("Register/reset_password/".$reset_key));
                
                if($this->email->send()){
     
                    $this->session->set_flashdata('login','Berhasil Mengirim Verifikasi Reset Password, Silahkan Periksa Email Anda');
                     
                }
                else{
                    //notifikasi jika email sudah terkirim atau belum terkirim
                     
                     $this->session->set_flashdata('login','Gagal Mengirim Email Verifikasi Reset Password, Silahkan Coba Lagi');
                }
                
            }
            else{
                $this->session->set_flashdata('login','Email Tidak Terdaftar');
            }
        }
        else{
            $this->session->set_flashdata('login',validation_errors());
        }
        redirect(site_url('login/index'));
    }

    

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('login/index'));
    }


}

