<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
  class Profil_model extends CI_Model{

    public function getAll()
    {
      $user = $this->session->userdata("user")['id'];
      $this->db->select('jumlah_siswa,pembimbing1,pembimbing2,tanggal_pelaksanaan,nama_kotakab,nama_datel,nama_witel,tanggal_pengajuan,status_pengajuan');
      $this->db->from('pengajuan');
      $this->db->join('kota_kab', 'pengajuan.id_kotakab = kota_kab.id_kotakab');
      $this->db->join('datel', 'pengajuan.id_datel = datel.id_datel');
      $this->db->join('witel', 'pengajuan.id_witel = witel.id_witel');
      $this->db->where('pengajuan.id_user = '.$user);
      $query = $this->db->get();
      return $query->result();
    }
  }