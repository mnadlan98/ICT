<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Profile_model');
		$this->load->model('kontak_model');
		$this->load->model('galeri_model');
		$this->load->helper('url');
		
	}

	public function index()
	{
		$data['title'] = 'Selamat Datang';
		$data['feedback'] = $this->Profile_model->getAllFeedback();
		$data['kontak'] = $this->kontak_model->getAll();
		$data['galeri'] = $this->galeri_model->getAll();
		$this->load->view('templates/header', $data);
		$this->load->view('home/home');
		$this->load->view('templates/footer');
	}

    public function viewRegistrasi(){
		$data['title'] = 'Registrasi';
		$this->load->view('templates/header', $data);
		$this->load->view('home/registrasi');
		$this->load->view('templates/footer');	
	}
    
    public function viewLogin(){
		$data['title'] = 'Login';
		$this->load->view('templates/header', $data);
		$this->load->view('home/login');
		$this->load->view('templates/footer');	
	}

	public function viewProfil(){
		$data['profil'] = $this->Profile_model->getPengajuan();
		$data['title'] = 'Profil';
		$this->load->view('templates/header', $data);
		$this->load->view('home/profil');
		$this->load->view('templates/footer');	
	}

	public function editProfile(){	
		$edit = $this->Profile_model;
        $validation = $this->form_validation;
        $validation->set_rules($edit->rules());
        if ($validation->run()) {
			$edit->updateProfile();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('MainController/viewProfil'));
        }
    
		$data['title'] = 'Edit Profil';
		$this->load->view('templates/header', $data);
		$this->load->view('home/editprofil');
		$this->load->view('templates/footer');
	}

	public function viewReview(){
		$data['title'] = 'Review';
        $data['status'] = $this->Profile_model->getStatus();
		$this->load->view('templates/header', $data);
		$this->load->view('home/review');
		$this->load->view('templates/footer');
	}

	public function viewPengajuan(){
		$data['title'] = 'Pengajuan';
		$this->load->view('templates/header', $data);
		$this->load->view('home/pengajuan');
		$this->load->view('templates/footer');	
	}

	public function viewFeedback(){
		$data['title'] = 'Feedback';
		$this->load->view('templates/header', $data);
		$this->load->view('home/feedback');
		$this->load->view('templates/footer');	
	}

	public function viewAdminlogin(){
		$data['title'] = 'Admin';
		$this->load->view('templates/header', $data);
		$this->load->view('home/adminlogin');
		$this->load->view('templates/footer');	
	}

	public function userpage()
	{
		$data['title'] = 'Selamat Datang';
		$this->load->view('templates/header', $data);
		$this->load->view('home/userhomepage');
		$this->load->view('templates/footer');
	}

	public function review()
	{
		$data['title'] = 'ICT Tour';
		$this->load->view('templates/header', $data);
		$this->load->view('home/review');
		$this->load->view('templates/footer');
	}

	public function history()
	{
		$data['title'] = 'ICT Tour';
		$this->load->view('templates/header', $data);
		$this->load->view('home/history');
		$this->load->view('templates/footer');
	}
	
	public function admin()
	{
	
		$this->load->view('admin/navbar');
		$this->load->view('admin/index');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'/MainController/index');
	}

}
