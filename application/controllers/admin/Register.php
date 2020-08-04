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
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean|callback_valid_password');
        $this->form_validation->set_rules('password_conf','Ulangi Password','trim|required|matches[password]|xss_clean');

        $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
        if ($this->form_validation->run()==true)
        {
            $data['username'] = $this->input->post('username',true);
            $data['password'] = $this->input->post('password',true);
            $data['level'] = $this->input->post('level',true);
            $data['role'] = $this->input->post('role',true);
            $data['id_witel'] = $this->input->post('id_witel',true);
            $data['nama'] = $this->input->post('nama',true);
            $data['id_unit'] = $this->input->post('unit',true);
            $data['update_by'] = $this->session->userdata('admin')['nama'];
            $data['update_date'] = date('Y-m-d');
            $this->Auth_Model->register_admin($data);
            $this->session->set_flashdata('msg','Proses Pendaftaran Berhasil');
        }
        else
        {
            $this->session->set_flashdata('msg', validation_errors());
        }
        redirect(site_url('admin/overview/admin_list'));
        
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

    public function edit_admin($id=null){
        $this->load->model('Pengajuan_Model');
        $this->load->model('Auth_Model');
        $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
        if ($this->form_validation->run()) {
            
            $data['nama'] = $this->input->post('nama',true);
            $data['level'] = $this->input->post('level',true);
            $data['role'] = $this->input->post('role',true);
            $data['id_witel'] = $this->input->post('id_witel',true);
            $data['nama'] = $this->input->post('nama',true);
            $data['id_unit'] = $this->input->post('unit',true);
            $data['update_by'] = $this->session->userdata('admin')['nama'];
            $data['update_date'] = date('Y-m-d');
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

