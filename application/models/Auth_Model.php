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
            'id_witel'=>$data['id_witel'],
            'nama'=>$data['nama'],
            'id_unit'=>$data['id_unit'],
            'update_by'=>$data['update_by'],
            'update_date'=>$data['update_date']
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
                    'nama' => $row->nama,
                    'id_unit' => $row->id_unit,
                    'id' => $row->id_admin
                    );
                }
                else{
                    $data = array(
                    'logged' => TRUE,
                    'username' => $row->username,
                    'level' => $row->level,
                    'nama' => $row->nama,
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
            $this->db->select('status_pengajuan,eventover');
            $this->db->from('pengajuan');
            $this->db->where('id_user = '.$row->id_user);
            $this->db->order_by('tanggal_pengajuan','ASC');
            $this->db->limit(1);
            $query = $this->db->get();
            $d  = $query->row();
            if (password_verify($password, $row->password)) {
                if ($row->active == 0) {
                    return 1;
                }
                else{
                    $data = array(
                    'logged' => TRUE,
                    'nama_user' => $row->nama_user,
                    'email_user' => $row->email_user,
                    'notelp_user' => $row->notelp_user,
                    'nama_sekolah' => $row->nama_sekolah,
                    'email_sekolah' => $row->email_sekolah,
                    'notelp_sekolah' => $row->notelp_sekolah,
                    'status_pengajuan' => $d->status_pengajuan,
                    'eventover' => $d->eventover,
                    'active' => $row->active,
                    'id' => $row->id_user
                    );
                    $this->session->set_userdata("user",$data);
                    return 2;
                }    
            } 
            else {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    function daftar($data)
    {
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }

    public function update_reset_key($email,$reset_key){
        $this->db->where('email_user',$email);
        $this->db->set('reset_key', $reset_key);
        $this->db->update('user');
        if ($this->db->affected_rows()>0) {
            return true;
        }
        else{
            return false;
        }
    }

    function update_password($password,$reset_key){
        $this->db->where('reset_key',$reset_key);
        $this->db->set('password', $password);
        $this->db->set('reset_key', null);
        $this->db->update('user');
        if ($this->db->affected_rows()>0) {
            return true;
        }
        else{
            return false;
        }
    }

    function changeActiveState($key)
    {
        
        $id = base64_decode($key);
        $this->db->where('id_user', $id);
        $this->db->set('active', 1);
        $this->db->update('user');
        return true;
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

    function editAdmin($id,$data)
     {
          $this->db->update('admin', $data, array('id_admin' => $id));
     }
	
	function editUser($id,$data)
     {
          $this->db->update('user', $data, array('id_user' => $id));
     }

    function deleteUser($id)
     {
          return $this->db->delete('user', array("id_user" => $id));
     }

     function deleteAdmin($id)
     {
          return $this->db->delete('admin', array("id_admin" => $id));
     }

    function get_adminwitel(){
        $this->db->select('id_admin,username,level,role,nama_witel,update_by,update_date,nama');
        $this->db->from('admin');
        $this->db->join('witel', 'admin.id_witel=witel.id_witel');
        return $this->db->get()->result_array();
    }

    function get_admintreg(){
        $this->db->join('unit', 'admin.id_unit=unit.id_unit');
        return $this->db->get('admin')->result_array();
    }
    function get_user(){
        return $this->db->get('user')->result();
    }

    function get_unit(){
        return $this->db->get('unit')->result();
    }

    function addUnit($data)
    {
        $this->db->insert('unit',$data);
    }

    function editUnit($id,$data)
     {
          $this->db->update('unit', $data, array('id_unit' => $id));
     }

     function deleteUnit($id)
     {
          return $this->db->delete('unit', array("id_unit" => $id));
     }
}

