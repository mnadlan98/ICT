<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {
    function checklogin($email_user,$password) {
        $this->db->where('email_user', $email_user);
        $this->db->where('password', md5($password));
        $query =  $this->db->get('user');
        return $query->num_rows();
    }
    function data_login($email_user,$password) {
        $this->db->where('email_user', $email_user);
        $this->db->where('password', $password);
        return $this->db->get('user')->row();
    }

    public function getuser($email_user){
		$this->db->where('email_user',$email_user);
		return $this->db->get('user')->result();
	}


}

