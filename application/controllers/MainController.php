<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function __construct(){
		parent::__construct();
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

	public function Profil(){
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
			$this->session->set_flashdata('msg', 'Perubahan berhasil disimpan');
            redirect(site_url('MainController/editProfile'));
        } 
		$data['title'] = 'Edit Profil';		
		$this->load->view('templates/header', $data);
		$this->load->view('home/editprofil');
		$this->load->view('templates/footer');
	}

	public function Review(){
		$data['title'] = 'Review';
		$data['profil'] = $this->Profile_model->getPengajuanTerbaru();
		$data['status'] = $this->Profile_model->getStatus();
		$this->form_validation->set_rules('alasan','alasan','trim|xss_clean');
		$value = $this->input->post("status");
		$alasan = $this->input->post("alasan");
		if ($this->form_validation->run()==TRUE) {
			$this->Profile_model->approved($value,$alasan);
			if($value==1){
				$this->session->set_flashdata('tolak', 'Persetujuan telah anda tolak');
			}else if($value==2){
				$this->session->set_flashdata('setuju', 'Persetujuan telah anda setujui');
			}
			redirect(site_url('MainController/Review'));
		}	
		$this->load->view('templates/header', $data);
		$this->load->view('home/review');
		$this->load->view('templates/footer');
	}


	public function Feedback(){
		$data['title'] = 'Feedback';
		$data['report'] = $this->Profile_model->getReport();
		$data['foto'] = $this->Profile_model->getFotoReport($this->Profile_model->getIdReport());
		$this->load->view('templates/header', $data);
		$this->load->view('home/feedback');
		$this->load->view('templates/footer');	
	}

	public function forgetpass(){
		$this->load->view('templates/header');
		$this->load->view('home/reset_password');
		$this->load->view('templates/footer');	
	}




}
