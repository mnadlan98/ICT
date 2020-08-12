<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Register extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('Auth_Model'); 
    }
 
    public function index() {
        
        $this->form_validation->set_rules('kota_sekolah', 'Kota/Kabupaten Sekolah','trim|required|xss_clean');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah','trim|required|xss_clean');
        $this->form_validation->set_rules('email_sekolah', 'Email Sekolah','trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('notelp_sekolah', 'No Telp Sekolah','trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User','trim|required|xss_clean');
        $this->form_validation->set_rules('email_user','Email Pengguna','trim|required|xss_clean|valid_email|is_unique[user.email_user]');
        $this->form_validation->set_rules('notelp_user', 'No Telp User','trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('password','Kata Sandi','trim|required|xss_clean|callback_valid_password');
        $this->form_validation->set_rules('password_conf','Ulangi Kata Sandi','trim|required|matches[password]|xss_clean');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|xss_clean|callback_cek_captcha');
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
            $data['active'] = 0;
            $captcha = $this->input->post('captcha');

            $id = $this->Auth_Model->daftar($data);
            $encrypted_id = base64_encode($id);
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
            $this->email->to($data['email_user']);
            $this->email->subject("Verifikasi Akun");
            $this->email->message(" Silahkan klik link untuk melakukan verifikasi akun anda <br><br>".site_url("Register/verification/".$encrypted_id));
            
            if($this->email->send()){
 
                $this->session->set_flashdata('msg', 'Anda telah berhasil melakukan pendaftaran, silahkan periksa email untuk melakukan verifikasi akun');
                 
            }
            else{
                //notifikasi jika email sudah terkirim atau belum terkirim
                 
                 $this->session->set_flashdata('msg', 'Gagal Mengirim Email Verifikasi, Silahkan Hubungi Kontak Admin');
            }
            redirect(site_url('home')); 
        }
        $vals = array(
        'img_path' => './captcha/',
        'img_url' => base_url().'captcha/',
        'font_size'     => 64,
        'font_path' => './font/timesbd.ttf',
        'img_width' => 170,
        'img_height' => 45,
        'word_length'   => 5,
        'pool'          => '0123456789',

        'expiration' => 180
        );
        $cap = create_captcha($vals);
        $this->session->set_userdata('keycode',$cap['word']);
        $data['captcha_img'] = $cap['image'];
        $data['title'] = "Daftar";

        $this->load->view('templates/header',$data);
        $this->load->view("home/registrasi");
        $this->load->view('templates/footer');
    }

    public function verification($key)
    {
        if ($this->Auth_Model->changeActiveState($key)) {
            $this->session->set_flashdata('msg', 'Akun anda telah berhasil diverifikasi, silahkan melakukan login untuk melakukan pengajuan ICT Tour');
        }
        else{
            $this->session->set_flashdata('msg', 'Gagal');
        }
        redirect(site_url('home')); 
    }

    public function cek_captcha($input)
    {
        if($input === $this->session->userdata('keycode')){
            $this->session->unset_userdata('keycode');
            return TRUE;
        } else {
            $this->form_validation->set_message('cek_captcha', '%s yang anda input salah!');
            return FALSE;
        }
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
	
				public function edit_user($id=null) {
        
        $this->form_validation->set_rules('kota_sekolah', 'Kota/Kabupaten Sekolah','trim|required|xss_clean');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah','trim|required|xss_clean');
        $this->form_validation->set_rules('email_sekolah', 'Email Sekolah','trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('notelp_sekolah', 'No Telp Sekolah','trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User','trim|required|xss_clean');
        $this->form_validation->set_rules('email_user','Email Pengguna','trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('notelp_user', 'No Telp User','trim|required|xss_clean|numeric');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg',validation_errors());
        }
        else{
            $data['jenjang_sekolah']   =  $this->input->post('jenjang_sekolah',true);
            $data['kota_sekolah']   =  $this->input->post('kota_sekolah',true);
            $data['nama_sekolah']   =  $this->input->post('nama_sekolah',true);
            $data['email_sekolah']  =  $this->input->post('email_sekolah',true);
            $data['notelp_sekolah'] =  $this->input->post('notelp_sekolah',true);
            $data['nama_user']   =  $this->input->post('nama_user',true);
            $data['email_user']     =  $this->input->post('email_user',true);
            $data['notelp_user'] =  $this->input->post('notelp_user',true);
            $data['active'] = $this->input->post('active',true);;
            $id = $this->Auth_Model->editUser($id,$data);
            $this->session->set_flashdata('msg','Berhasil Diupdate');
        }
        redirect(site_url('admin/overview/user_list'));
        
    }

    public function valid_password($password)
    {

        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        

        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

            return FALSE;
        }

        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

            return FALSE;
        }

        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

            return FALSE;
        }


        if (strlen($password) < 8)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 8 characters in length.');

            return FALSE;
        }

        return TRUE;
    }

    public function reset_password($reset_key = null){
        $this->form_validation->set_rules('password','Kata Sandi','trim|required|xss_clean|callback_valid_password');
        $this->form_validation->set_rules('password_conf','Ulangi Kata Sandi','trim|required|matches[password]|xss_clean');
        if ($this->form_validation->run()){
            $password = password_hash($this->input->post('password',true),PASSWORD_BCRYPT);

            if ($this->Auth_Model->update_password($password,$reset_key)) {
                $this->session->set_flashdata('login','Berhasil Reset Password, Silahkan Melakukan Login');
            }
            else{
                $this->session->set_flashdata('login','Gagal Melakukan Reset Password, Silahkan Coba Lagi');
            }
            redirect(site_url('login/index'));
        }
        $data['title'] = "Reset Password";
        $this->load->view('templates/header',$data);
        $this->load->view("home/reset_password");
        $this->load->view('templates/footer');
    }
}
