<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    function register_admin($data)
    {
        $data_user = array(
            'username'=>$data['username'],
            'password'=>password_hash($data['password'],PASSWORD_BCRYPT),
            'level'=>$data['level'],
            'role'=>$data['role'],
            'id_witel'=>$data['id_witel']
        );
        $this->db->insert('admin',$data_user);
    }

    function login_admin($username,$password)
    {
        $query = $this->db->get_where('admin',array('username'=>$username));
        if($query->num_rows() > 0)
        {
            $row = $query->row();
            if (password_verify($password, $row->password)) {
                if ($row->level==1) {
                    $data = array(
                    'logged' => TRUE,
                    'username' => $row->username,
                    'level' => $row->level,
                    'id' => $row->id_admin
                    );
                }
                else{
                    $data = array(
                    'logged' => TRUE,
                    'username' => $row->username,
                    'level' => $row->level,
                    'role' => $row->role,
                    'id_witel' => $row->id_witel, 
                    'id' => $row->id_admin
                    );
                }
                
                $this->session->set_userdata("admin",$data);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

     function login_user($email_user,$password)
    {
        $query = $this->db->get_where('user',array('email_user'=>$email_user));
        if($query->num_rows() > 0)
        {
            $row = $query->row();
            if (password_verify($password, $row->password)) {
                $data = array(
                    'logged' => TRUE,
                    'nama_user' => $row->nama_user,
                    'email_user' => $row->email_user,
                    'notelp_user' => $row->notelp_user,
                    'nama_sekolah' => $row->nama_sekolah,
                    'email_sekolah' => $row->email_sekolah,
                    'notelp_sekolah' => $row->notelp_sekolah,
                    'id' => $row->id_user
                );
                $this->session->set_userdata("user",$data);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function daftar($data)
    {
        $this->db->insert('user',$data);
    }

    function search_nama($nama_sekolah){

        $this->db->like('Nama_Sekolah', $nama_sekolah , 'both');
        $this->db->order_by('Nama_Sekolah', 'ASC');
        $this->db->limit(10);
        return $this->db->get('sekolah')->result();
    }
    function search_kota($kota_sekolah){
        $this->db->select('DISTINCT(KabupatenKota)');
        $this->db->like('KabupatenKota', $kota_sekolah , 'both');
        $this->db->order_by('KabupatenKota', 'ASC');
        $this->db->limit(10);
        return $this->db->get('sekolah')->result();
    }

    function checklogin($email_user,$password) {
        $this->db->where('email_user', $email_user);
        $this->db->where('password', $password);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }
    function data_login($email_user,$password) {
        $this->db->where('email_user', $email_user);
        $this->db->where('password', md5($password));
        return $this->db->get('user')->row();
    }

    function editAdmin($id,$data)
     {
          $this->db->update('admin', $data, array('id_admin' => $id));
     }

    function deleteUser($id)
     {
          return $this->db->delete('user', array("id_user" => $id));
     }

     function deleteAdmin($id)
     {
          return $this->db->delete('admin', array("id_admin" => $id));
     }

    function get_admin(){
        $this->db->select('id_admin,username,level,role,nama_witel');
        $this->db->from('admin');
        $this->db->join('witel', 'admin.id_witel=witel.id_witel');
        return $this->db->get()->result_array();
    }
    function get_user(){
        return $this->db->get('user')->result();
    }
}

