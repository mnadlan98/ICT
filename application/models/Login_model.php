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
        $this->db->where('password', md5($password));
        return $this->db->get('user')->row();
    }

}

