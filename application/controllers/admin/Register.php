<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_Model");
        $this->load->library('form_validation');
    }


    public function index() {
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|xss_clean|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'password','trim|required|min_length[6]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('password_conf','Confirm Password','trim|required|matches[password]|xss_clean');
        if ($this->form_validation->run()==true)
        {
            $data['username'] = $this->input->post('username',true);
            $data['password'] = $this->input->post('password',true);
            $data['level'] = $this->input->post('level',true);
            $data['role'] = $this->input->post('role',true);
            $data['id_witel'] = $this->input->post('id_witel',true);
            $this->Auth_Model->register_admin($data);
            $this->session->set_flashdata('msg','Proses Pendaftaran Berhasil');
        }
        else
        {
            $this->session->set_flashdata('msg', validation_errors());
        }
        redirect(site_url('admin/overview/admin_list'));
        
    }
    public function edit_admin($id=null){
        $this->load->model('Pengajuan_Model');
        $this->load->model('Auth_Model');
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|xss_clean');
        if ($this->form_validation->run()) {
            $data['username'] = $this->input->post('username',true);
            $data['level'] = $this->input->post('level',true);
            $data['role'] = $this->input->post('role',true);
            $data['id_witel'] = $this->input->post('id_witel',true);
            $this->Auth_Model->editAdmin($id,$data);
            $this->session->set_flashdata('msg','Berhasil Diupdate');
        }
        else{
            $this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/admin_list'));
    }

    public function delete_admin($id=null){
        $this->load->model('Auth_Model');
        if (!isset($id)) show_404();
        
        if ($this->Auth_Model->deleteAdmin($id)) {
            $this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
            $this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/admin_list'));
    }
}

