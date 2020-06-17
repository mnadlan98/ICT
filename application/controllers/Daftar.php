<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Daftar_model");
        $this->load->library('form_validation');
    }

    public function input()
    {
        $data['judul'] = 'Daftar';
        $daftar = $this->Daftar_model;
        $validation = $this->form_validation;
        $validation->set_rules($daftar->rules());
        
        if ($validation->run()) {
            $username = $this->input->post('username');
            $checkusername = $this->Daftar_model->checkUsername($username);
            if ($checkusername>0)
            {
                $this->session->set_flashdata('message','username sudah terdaftar');
               
            }else{
                $daftar->save();
                $this->session->set_flashdata('message', 'Berhasil disimpan');
              
            }
            
        }
        
        $this->load->view('templates/Navbar', $data);
        $this->load->view("Daftar",$data);
        $this->load->view('templates/footer');
        
    }


}
