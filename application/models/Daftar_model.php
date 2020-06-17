<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_model extends CI_Model
{
    private $_table = "user";

    public $id_user;
    public $kode_sekolah;
    public $nama_sekolah;
    public $email_sekolah;
    public $alamat_sekolah;
    public $notelp_sekolah;
    public $email_user;
    public $password;
    public $re_password;


    public function rules()
    {
        return [
            ['field' => 'kode_sekolah',
            'label' => 'Kode_Sekolah',
            'rules' => 'required'],

            ['field' => 'nama_sekolah',
            'label' => 'Nama_Sekolah',
            'rules' => 'required'],

            ['field' => 'email_sekolah',
            'label' => 'Email_Sekolah',
            'rules' => 'required'],

            ['field' => 'alamat_sekolah',
            'label' => 'Alamat_Sekolah',
            'rules' => 'required'],
            
            ['field' => 'notelp_sekolah',
            'label' => 'NoTelp_Sekolah',
            'rules' => 'required']

            ['field' => 'email_user',
            'label' => 'Email_User',
            'rules' => 'required']

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required']

            ['field' => 're_password',
            'label' => 're_password',
            'rules' => 'required']
        ];
    }

    public function save()
    {
        $post = $this->input->post();

        $this->id_user = $post["id_user"];
        $this->kode_sekolah = $post["kode_sekolah"];
        $this->nama_sekolah = $post["nama_sekolah"];
        $this->email_sekolah = $post["email_sekolah"];
        $this->notelp_sekolah = $post["notelp_sekolah"];
        $this->email_user = $post["email_user"];
        $this->password = $post["password"];
        $this->re_password = $post["re_password"];
        $this->db->insert($this->_table, $this);
    }

    public function checkUsername($username)
    {
        return $this->db->query("SELECT * FROM `user` where `username` = '$username' ")->num_rows();
    }





}