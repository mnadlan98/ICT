<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Editprofil_model extends CI_Model
{
    public $nama_user;
    public $email_user;
    public $notelp_user;
    public $nama_sekolah;
    public $email_sekolah;
    public $notelp_sekolah;
    

    public function rules()
    {
        return [
            ['field' => 'nama_user',
            'label' => 'Nama User',
            'rules' => 'required'],

            ['field' => 'email_user',
            'label' => 'Email User',
            'rules' => 'valid_email'],
            
            ['field' => 'notelp_user',
            'label' => 'No. Telp User',
            'rules' => 'numeric'],

            ['field' => 'nama_sekolah',
            'label' => 'Nama Sekolah',
            'rules' => 'required'],

            ['field' => 'email_sekolah',
            'label' => 'Email Sekolah',
            'rules' => 'valid_email'],

            ['field' => 'notelp_sekolah',
            'label' => 'No. Telp Sekolah',
            'rules' => 'numeric']
        ];
    }


    public function update()
    {
        $id = $this->session->userdata("user")['nama_user'];
        $post = $this->input->post();
        $this->db->set('nama_user', $post["nama_user"]);
        $this->db->set('email_user', $post["email_user"]);
        $this->db->set('notelp_user', $post["notelp_user"]);
        $this->db->set('nama_sekolah', $post["nama_sekolah"]);
        $this->db->set('email_sekolah', $post["email_sekolah"]);
        $this->db->set('notelp_sekolah', $post["notelp_sekolah"]);
        $this->db->where('id_user',$id);  
        return $this->db->insert('user');
    }
}