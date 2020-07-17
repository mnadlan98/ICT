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
        $edit = $this->Editprofil_model;
        $validation = $this->form_validation;
        $validation->set_rules($edit->rules());
        if ($validation->run()) {
            $edit->update();
            redirect(site_url('MainController/viewProfil'));
        }else{
            echo $edit->update();
        }
    
		$data['title'] = 'Edit Profil';
		$this->load->view('templates/header', $data);
		$this->load->view('home/editprofil');
		$this->load->view('templates/footer');
    }

}