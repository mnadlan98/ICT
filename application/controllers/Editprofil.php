<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Editprofil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Editprofil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->Editprofil_model->rules());
        if ($validation->run()) {
            $this->Editprofil_model->update();
            redirect(site_url('MainController/viewProfil'));
        }
		$data['title'] = 'Profil';
		$this->load->view('templates/header', $data);
		$this->load->view('home/editprofil');
		$this->load->view('templates/footer');
    }

}