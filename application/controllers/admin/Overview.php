<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

	}

	public function index()
	{
		if ($this->session->userdata("admin")['logged']) {

			$this->load->model('Pengajuan_Model');

			if ($this->session->userdata("admin")['level']==1) {
				$data["pengajuan"] = $this->Pengajuan_Model->getAll();
				$data["list"] = $this->Pengajuan_Model->getWitel();
				$data["count"] = array();
				foreach ($data["list"] as $w) {
					array_push($data["count"],$this->Pengajuan_Model->count_rows($w->id_witel));
				}
			}
			else{
				$data["witel"] = $this->Pengajuan_Model->getWitel_byId($this->session->userdata('admin')['id_witel']);
				$data["count"] = $this->Pengajuan_Model->count_rows($this->session->userdata('admin')['id_witel']);
			}

			$this->load->view('admin/index',$data);
		}
		else{
			redirect(site_url('login/index'));
		}   
	}

	public function Witel($id=null)
	{
		if ($this->session->userdata("admin")['logged']) {

			$this->load->model('Pengajuan_Model');
			if ($this->session->userdata("admin")['level']==1) {
				$data["list"] = $this->Pengajuan_Model->getWitel();
			}
			$data["witel"] = $this->Pengajuan_Model->getWitel_byId($id);
			$data["pengajuan"] = $this->Pengajuan_Model->getAll_byId($id);

			$this->load->view('admin/list',$data);
		}
		else{
			redirect(site_url('login/index'));
		}   
	}

	public function review($id = null)
    {
       if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==2) {

	$this->load->model('Pengajuan_Model');
		   
        $this->form_validation->set_rules('jumlah_siswa', 'Jumlah Siswa','trim|required|xss_clean');
        $this->form_validation->set_rules('pembimbing1', 'Nama Pembimbing 1','trim|required|xss_clean');
        $this->form_validation->set_rules('pembimbing2', 'Nama Pembimbing 2','trim|xss_clean');
		$this->form_validation->set_rules('tanggal_pelaksanaan', 'Tanggal Pelaksanaan','trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal_persetujuan', 'Tanggal Persetujuan','trim|required|xss_clean');
		$this->form_validation->set_rules('status_pengajuan', 'Persetujuan','trim|required|xss_clean');

		$data['status'] = $this->Pengajuan_Model->getStatus($id);
		$data["pengajuan"] = $this->Pengajuan_Model->get_PengajuanbyId($id);
		$data["witel"] = $this->Pengajuan_Model->getWitel_byId($this->session->userdata('admin')['id_witel']);
		$data['wilayah'] = $this->Pengajuan_Model->get_wilayah();  

		$this->load->view("admin/review",$data);
        
        if ($this->form_validation->run()) {

            $this->jumlah_siswa = $this->input->post("jumlah_siswa",TRUE);
            $this->pembimbing1 = $this->input->post("pembimbing1",TRUE);
            $this->pembimbing2 = $this->input->post("pembimbing2",TRUE);
			$this->tanggal_pelaksanaan = $this->input->post("tanggal_pelaksanaan",TRUE);
			$this->tanggal_persetujuan = $this->input->post("tanggal_persetujuan",TRUE);
            $this->id_sto = $this->input->post("sto",TRUE);
            $this->id_witel = $this->Pengajuan_Model->getWitel_bySto($this->id_sto);
            $this->status_pengajuan = $this->input->post("status_pengajuan",TRUE);
            if($this->Pengajuan_Model->updatePengajuan($id,$this)){
				$this->session->set_flashdata('msg','Berhasil Diupdate');
				
				$this->load->library('email');

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'sibola124@gmail.com';
				$config['smtp_pass']    = 'SIBOLA124';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);


				$this->email->from($config['smtp_user']);
				$this->email->to($data["pengajuan"]->email_user);
				$this->email->subject("Status Pengajuan");
				if($this->input->post("status_pengajuan")==2){
					$this->email->message(" Pengajuan anda telah direview oleh admin. Silahkan login untuk melakukan konfirmasi ".site_url("login/index"));	
					$this->email->send();				
				}else if($this->input->post("status_pengajuan")==3){
					$this->email->message(" Pengajuan anda telah direview oleh admin");	
					$this->email->send();				
				}else if($this->input->post("status_pengajuan")==4){
					$this->email->message(" Pengajuan anda telah disetujui oleh pihak telkom. Hubungi kontak yang tersedia bila ada pertanyaan lebih lanjut");
					$this->email->send();
				}else if($this->input->post("status_pengajuan")==5){
					$this->email->message(" Pengajuan anda telah ditolak oleh pihak telkom ");
					$this->email->send();
				}
				redirect(site_url('admin/overview/review/'.$id));	
				
			}                      
        }else{
        	$this->session->set_flashdata('msg',validation_errors());
        	
		}



        	if (!$data["pengajuan"]) show_404();
        	
       }else{
       	redirect(site_url('admin/overview/'));
       }
        
    }

	public function term(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$data['term'] = $this->Pengajuan_Model->get_Term();
			$data["list"] = $this->Pengajuan_Model->getWitel();
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/syarat',$data);
	}
	public function add_term(){

		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('syarat', 'Syarat dan Ketentuan','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->kalimat = $this->input->post('syarat',true);
			$this->Pengajuan_Model->addTerm($this);
			$this->session->set_flashdata('msg','Berhasil Disimpan');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/term'));
	}

	public function add_unit(){

		$this->load->model('Auth_Model');
		$this->form_validation->set_rules('nama_unit', 'Nama Unit','trim|required|xss_clean|is_unique[unit.nama_unit]');
		if ($this->form_validation->run()) {
			$this->nama_unit = $this->input->post('nama_unit',true);
			$this->Auth_Model->addUnit($this);
			$this->session->set_flashdata('msg','Berhasil Disimpan');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/unit'));
	}

	public function add_witel(){

		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('nama_witel', 'Nama Witel','trim|required|xss_clean|is_unique[witel.nama_witel]');
		if ($this->form_validation->run()) {
			$this->nama_witel = $this->input->post('nama_witel',true);
			$this->Pengajuan_Model->addWitel($this);
			$this->session->set_flashdata('msg','Berhasil Disimpan');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/witel_list'));
	}

	public function add_datel(){

		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('datel1', 'Nama Datel','trim|required|xss_clean|is_unique[datel.datel]');
		if ($this->form_validation->run()) {
			$this->datel = $this->input->post('datel1',true);
			$this->id_witel = $this->input->post('witel',true);
			$this->Pengajuan_Model->addDatel($this);
			$this->session->set_flashdata('msg','Berhasil Disimpan');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/datel_list'));
	}

	public function add_wilayah(){

		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('wilayah1', 'Nama Wilayah','trim|required|xss_clean|is_unique[wilayah.wilayah]');
		
		if ($this->form_validation->run()) {
			$this->wilayah = $this->input->post('wilayah1',true);
			$this->id_witel = $this->input->post('witel',true);
			$this->Pengajuan_Model->addWilayah($this);
			$this->session->set_flashdata('msg','Berhasil Disimpan');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/wilayah_list'));
	}

	public function add_sto(){

		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('sto', 'STO','trim|required|xss_clean|is_unique[sto.sto]');
		$this->form_validation->set_rules('keterangan', 'Keterangan STO','trim|required|xss_clean|is_unique[sto.keterangan]');
		if ($this->form_validation->run()) {
			$this->sto = $this->input->post('sto',true);
			$this->keterangan = $this->input->post('keterangan',true);
			$this->id_wilayah = $this->input->post('wilayah',true);
			$this->id_witel = $this->input->post('witel',true);
			$this->id_datel = $this->input->post('datel',true);
			$this->Pengajuan_Model->addSto($this);
			$this->session->set_flashdata('msg','Berhasil Disimpan');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/sto_list'));
	}

	public function add_kontak(){

		$this->load->model('kontak_model');
		$this->form_validation->set_rules('alamat', 'Alamat Witel','trim|required|xss_clean');
		$this->form_validation->set_rules('notelp', 'No Telepon','trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('email_kontak', 'Email Witel','trim|required|xss_clean|valid_email');
		if ($this->form_validation->run()) {
			$this->alamat_witel = $this->input->post('alamat',true);
			$this->no_telp_witel = $this->input->post('notelp',true);
			$this->email_witel = $this->input->post('email_kontak',true);
			$this->id_witel = $this->session->userdata('admin')['id_witel'];
			$this->kontak_model->insert($this);
			$this->session->set_flashdata('msg','Berhasil Disimpan');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/kontak'));
	}

	public function add_gallery(){
		$this->load->model('galeri_model');
		$this->form_validation->set_rules('judul', 'Nama Sekolah','trim|required|xss_clean');
		$config['upload_path']          = './images/galery';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 6000; // 6MB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

		if($this->form_validation->run() == TRUE){
            if ($this->upload->do_upload('foto')) {
                $file = $this->upload->data();
                $this->judul = $this->input->post('judul',TRUE);
                $this->foto = $file['file_name'];
                $this->galeri_model->insert($this);
                $this->session->set_flashdata('msg','Berhasil Disimpan');
            }
            else{
                $this->session->set_flashdata('msg',$this->upload->display_errors());
            } 
        }
        else{
            $this->session->set_flashdata('msg',validation_errors());
        }
		redirect(site_url('admin/overview/gallery'));
	}

	public function edit_term($id=null){
		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('syarat', 'Syarat dan Ketentuan','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->kalimat = $this->input->post('syarat',true);
			$this->Pengajuan_Model->editTerm($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/term'));
	}

	public function edit_unit($id=null){

		$this->load->model('Auth_Model');
		$this->form_validation->set_rules('nama_unit', 'Nama Unit','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->nama_unit = $this->input->post('nama_unit',true);
			$this->Auth_Model->editUnit($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/unit'));
	}

	public function edit_witel($id=null){
		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('nama_witel', 'Nama Witel','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->nama_witel = $this->input->post('nama_witel',true);
			$this->Pengajuan_Model->editWitel($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/witel_list'));
	}

	public function edit_datel($id=null){
		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('datel1', 'Nama Datel','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->datel = $this->input->post('datel1',true);
			$this->id_witel = $this->input->post('witel',true);
			$this->Pengajuan_Model->editDatel($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/datel_list'));
	}

	public function edit_wilayah($id=null){
		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('wilayah1', 'Nama Wilayah','trim|required|xss_clean');
		
		if ($this->form_validation->run()) {
			$this->wilayah = $this->input->post('wilayah1',true);
			$this->id_witel = $this->input->post('witel',true);
			$this->Pengajuan_Model->editWilayah($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/wilayah_list'));
	}

	public function edit_sto($id=null){
		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('wilayah', 'Nama Wilayah','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->sto = $this->input->post('sto',true);
			$this->keterangan = $this->input->post('keterangan',true);
			$this->id_wilayah = $this->input->post('wilayah',true);
			$this->id_witel = $this->input->post('witel',true);
			$this->id_datel = $this->input->post('datel',true);
			$this->Pengajuan_Model->editSto($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/sto_list'));
	}

	public function edit_kontak($id=null){
		$this->load->model('kontak_model');
		$this->form_validation->set_rules('alamat', 'Alamat Witel','trim|required|xss_clean');
		$this->form_validation->set_rules('notelp', 'No Telepon','trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('email_kontak', 'Email Witel','trim|required|xss_clean|valid_email');
		if ($this->form_validation->run()) {
			$this->alamat_witel = $this->input->post('alamat',true);
			$this->no_telp_witel = $this->input->post('notelp',true);
			$this->email_witel = $this->input->post('email_kontak',true);
			$this->id_witel = $this->input->post('idwitel',true);
			$this->kontak_model->edit($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/kontak'));
	}
	
	public function edit_config_email($id=null){
		$this->load->model('Auth_Model');
		$this->load->library('encryption');
		$this->form_validation->set_rules('protocol', 'protocol','trim|required|xss_clean');
		$this->form_validation->set_rules('mailtype', 'mailtype','trim|required|xss_clean');
		$this->form_validation->set_rules('smtp_host', 'smtp_host','trim|required|xss_clean');
		$this->form_validation->set_rules('smtp_port', 'smtp_port','trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('smtp_timeout', 'smtp_timeout','trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('smtp_user', 'smtp_user','trim|required|xss_clean');
		$this->form_validation->set_rules('smtp_pass', 'smtp_pass','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->protocol = $this->input->post('protocol',true);
			$this->mail_type = $this->input->post('mailtype',true);
			$this->smtp_host = $this->input->post('smtp_host',true);
			$this->smtp_port = $this->input->post('smtp_port',true);
			$this->smtp_timeout = $this->input->post('smtp_timeout',true);
			$this->smtp_user = $this->input->post('smtp_user',true);
			$this->smtp_pass = $this->encryption->encrypt($this->input->post('smtp_pass',true));
			$this->Auth_Model->editConfig_email($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/config_email'));
	}

	public function edit_gallery($id=null){
		$this->load->model('galeri_model');
		$this->form_validation->set_rules('judul', 'Nama Sekolah','trim|required|xss_clean');
		$config['upload_path']          = './images/galery';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 6000; // 6MB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

		if($this->form_validation->run() == TRUE){
            if ($this->upload->do_upload('foto')) {
                $file = $this->upload->data();
                $this->judul = $this->input->post('judul',TRUE);
                $this->foto = $file['file_name'];
                $this->galeri_model->edit($id,$this);
                $this->session->set_flashdata('msg','Berhasil Diupdate');
            }
            else{
                $this->session->set_flashdata('msg',$this->upload->display_errors());
            } 
        }
        else{
            $this->session->set_flashdata('msg',validation_errors());
        }
		redirect(site_url('admin/overview/gallery'));
	}

	public function delete_kontak($id=null){
		$this->load->model('kontak_model');
		if (!isset($id)) show_404();
        
        if ($this->kontak_model->delete($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/kontak'));
	}

	public function delete_term($id=null){
		$this->load->model('Pengajuan_Model');
		if (!isset($id)) show_404();
        
        if ($this->Pengajuan_Model->deleteTerm($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/term'));
	}

	public function delete_unit($id=null){
		$this->load->model('Auth_Model');
		if (!isset($id)) show_404();
        
        if ($this->Auth_Model->deleteUnit($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/unit'));
	}

	public function delete_user($id=null){
		$this->load->model('Auth_Model');
		if (!isset($id)) show_404();
        
        if ($this->Auth_Model->deleteUser($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/user_list'));
	}

	public function delete_sto($id=null){
		$this->load->model('Pengajuan_Model');
		if (!isset($id)) show_404();
        
        if ($this->Pengajuan_Model->deleteSto($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/sto_list'));
	}

	public function delete_witel($id=null){
		$this->load->model('Pengajuan_Model');
		if (!isset($id)) show_404();
        
        if ($this->Pengajuan_Model->deleteWitel($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/witel_list'));
	}

	public function delete_datel($id=null){
		$this->load->model('Pengajuan_Model');
		if (!isset($id)) show_404();
        
        if ($this->Pengajuan_Model->deleteDatel($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/datel_list'));
	}

	public function delete_wilayah($id=null){
		$this->load->model('Pengajuan_Model');
		if (!isset($id)) show_404();
        
        if ($this->Pengajuan_Model->deleteWilayah($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/wilayah_list'));
	}

	public function delete_gallery($id=null){
		$this->load->model('galeri_model');
		if (!isset($id)) show_404();
        
        if ($this->galeri_model->delete($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/gallery'));
	}


	public function sekolah()
	{
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {

			$this->load->model('Pengajuan_Model');
			if ($this->session->userdata("admin")['level']==1) {
				$data["list"] = $this->Pengajuan_Model->getWitel();
			}
			
			$data["sekolah"] = $this->Pengajuan_Model->getSekolah();

			$this->load->view('admin/sekolah',$data);
		}
		else{
			redirect(site_url('login/index'));
		}   
	}

	public function add_sekolah(){

		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('npsn', 'NPSN','trim|required|numeric|xss_clean|is_unique[sekolah.NPSN]');
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->NPSN = $this->input->post('npsn',true);
			$this->Nama_Sekolah = $this->input->post('nama_sekolah',true);
			$this->BP = $this->input->post('bp',true);
			$this->KabupatenKota = $this->input->post('KabupatenKota',true);
			$this->Pengajuan_Model->addSekolah($this);
			$this->session->set_flashdata('msg','Berhasil Disimpan');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/sekolah'));
	}

	public function edit_sekolah($id=null)
	{
		$this->load->model('Pengajuan_Model');
		$this->form_validation->set_rules('npsn', 'NPSN','trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->NPSN = $this->input->post('npsn',true);
			$this->Nama_Sekolah = $this->input->post('nama_sekolah',true);
			$this->BP = $this->input->post('bp',true);
			$this->KabupatenKota = $this->input->post('KabupatenKota',true);
			$this->Pengajuan_Model->editSekolah($id,$this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/sekolah')); 
	}

	public function delete_sekolah($id=null){
		$this->load->model('Pengajuan_Model');
		if (!isset($id)) show_404();
        
        if ($this->Pengajuan_Model->deleteSekolah($id)) {
        	$this->session->set_flashdata('msg','Berhasil Dihapus');
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        }
        redirect(site_url('admin/overview/sekolah'));
	}

	public function admin_list(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$this->load->model('Auth_Model');
			$result = $this->Auth_Model->get_adminwitel();
			$data["list"] = $this->Pengajuan_Model->getWitel();
			$data["admintreg"] = $this->Auth_Model->get_admintreg();
			$data["unit"] = $this->Auth_Model->get_unit();
			foreach ($result as &$r) {

				if ($r['level'] == 1) {
					$r['level'] = 'Admin T-Reg';
					$r['role']	= '';
					$r['nama_witel'] = 'Semua Witel';
				}
				else{
					$r['level'] = 'Admin Witel';
					if ($r['role']==1) {
						$r['role'] = 'Viewer';
					}
					else{
						$r['role'] = 'Editor';
					}
				}
			}
			unset($r);
			$data["adminwitel"] = $result;
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/admin',$data);
	}

	public function user_list(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$this->load->model('Auth_Model');
			$data["user"] = $this->Auth_Model->get_user();
			$data["list"] = $this->Pengajuan_Model->getWitel();
			
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/user',$data);
	}

	public function witel_list(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$data["list"] = $this->Pengajuan_Model->getWitel();
			
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/witel',$data);
	}

	public function datel_list(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$data["list"] = $this->Pengajuan_Model->getWitel();
			$data["datel"] = $this->Pengajuan_Model->getDatel();
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/datel',$data);
	}

	public function wilayah_list(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$data["list"] = $this->Pengajuan_Model->getWitel();
			$data["wilayah"] = $this->Pengajuan_Model->getWilayah();
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/wilayah',$data);
	}

	public function sto_list(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$data["list"] = $this->Pengajuan_Model->getWitel();
			$data["sto"] = $this->Pengajuan_Model->getSto();
			$data["datel"] = $this->Pengajuan_Model->getDatel();
			$data["wilayah"] = $this->Pengajuan_Model->getWilayah();
		
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/sto',$data);
	}

	public function gallery(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==2 && $this->session->userdata("admin")['role']==2) {
			$this->load->model('Pengajuan_Model');
			$this->load->model('galeri_model');
			$data['gallery'] = $this->galeri_model->getAll();
			$data["witel"] = $this->Pengajuan_Model->getWitel_byId($this->session->userdata('admin')['id_witel']);
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/gallery',$data);
	}

	public function kontak(){
		$this->load->model('Pengajuan_Model');
		$this->load->model('kontak_model');

		if ($this->session->userdata("admin")['logged']) {
			if ($this->session->userdata("admin")['level']==2) {
				if ($this->session->userdata("admin")['role']==2) {
					$data['kontak'] = $this->kontak_model->getbyWitel($this->session->userdata("admin")["id_witel"]);
					$data["witel"] = $this->Pengajuan_Model->getWitel_byId($this->session->userdata('admin')['id_witel']);
				}
				else{
					redirect(site_url('admin/Overview'));
				}
			}
			else{
				$data['kontak'] = $this->kontak_model->getAll();
				$data["list"] = $this->Pengajuan_Model->getWitel();
			}
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/kontak',$data);
	}

	public function unit(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$this->load->model('Auth_Model');
			$data['unit'] = $this->Auth_Model->get_unit();
			$data["list"] = $this->Pengajuan_Model->getWitel();
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/unit',$data);
	}
	
	public function config_email(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$this->load->model('Auth_Model');
			$this->load->library('encryption');
			$data['config_email'] = $this->Auth_Model->get_config_email();
			$data['config_email']->smtp_pass = $this->encryption->decrypt($data['config_email']->smtp_pass);
			$data["list"] = $this->Pengajuan_Model->getWitel();
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/config_email',$data);
	}
	
	function get_datel(){
		$this->load->model('Pengajuan_Model');
        $id_witel = $this->input->post('id',TRUE);
        $data = $this->Pengajuan_Model->get_datel_byWitel($id_witel);
        echo json_encode($data);
    }
    function get_wilayah(){
		$this->load->model('Pengajuan_Model');
        $id_witel = $this->input->post('id',TRUE);
        $data = $this->Pengajuan_Model->get_wilayah_byWitel($id_witel);
        echo json_encode($data);
    }

    public function report($id = null)
    {
       if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==2) {
		
		$this->load->model('Pengajuan_Model');
		$this->load->library('Pdf');
		$data['title'] = 'Daftar Peserta';
		$dhadir = $this->Pengajuan_Model->getDHadirByPengajuan($id);
		if(!empty($dhadir)){
			$data['dhadir'] = $dhadir;
		}else{
			$data['dhadir'] = null;
		}
        $data["pengajuan"] = $this->Pengajuan_Model->get_PengajuanbyId($id);
        $data["witel"] = $this->Pengajuan_Model->getWitel_byId($this->session->userdata('admin')['id_witel']);
		$data['wilayah'] = $this->Pengajuan_Model->get_wilayah();
		$data['foto'] = $this->Pengajuan_Model->getReportbyIdPengajuan($id);
        $this->load->view("admin/report",$data);
		
		$this->form_validation->set_rules('materi','materi');
		$this->form_validation->set_rules('daftar_siswa','daftar siswa');
		$this->form_validation->set_rules('cek','cek','required');
		$this->form_validation->set_rules('gambar1','Upload Gambar');
		$this->form_validation->set_rules('gambar2','Upload Gambar');
		$this->form_validation->set_rules('gambar3','Upload Gambar');
		$this->form_validation->set_rules('gambar4','Upload Gambar');
		$this->form_validation->set_rules('gambar5','Upload Gambar');
		       
        if ($this->form_validation->run()) {
			
			$this->id_user = $this->Pengajuan_Model->getIdUserByPengajuan($id);
			$this->id_pengajuan = $id;

			$this->daftar_siswa = $this->upload_dhadir();
			$this->daftarmateri = $this->upload_materi();
			
			$this->gambar1 = $this->upload_gambar(1);
			$this->gambar2 = $this->upload_gambar(2);
			$this->gambar3 = $this->upload_gambar(3);
			$this->gambar4 = $this->upload_gambar(4);
			$this->gambar5 = $this->upload_gambar(5);
			

			if($this->materi != null && $this->daftar_siswa != null || $this->gambar1 != null){
				$this->Pengajuan_Model->insertReport($this);
				if($this->Pengajuan_Model->updatePengajuan($id,array('eventover' => TRUE))){
						$this->session->set_flashdata('msg','Berhasil Disubmit');
						$config = array();
						$config['charset'] = 'utf-8';
						$config['useragent'] = 'Codeigniter';
						$config['protocol']= "smtp";
						$config['mailtype']= "html";
						$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
						$config['smtp_port']= "465";
						$config['smtp_timeout']= "400";
						$config['smtp_user']= "sibola124@gmail.com";
						$config['smtp_pass']= "SIBOLA124";
						$config['crlf']="\r\n";
						$config['newline']="\r\n";
						$config['wordwrap'] = TRUE;

						$this->email->initialize($config);

						$this->email->from($config['smtp_user']);
						$this->email->to($data["pengajuan"]->email_user);
						$this->email->subject("Status Pengajuan");					
						$this->email->message(" Admin telah melakukan report terkait kunjungan anda. Silahkan melakukan login dan kunjungi website ICT Tour untuk melihat hasil report");	
						$this->email->send();																																				
				}
			}else{
					$this->session->set_flashdata('msg','Format file yang anda upload tidak sesuai');   					
			}
		}else{
			$this->session->set_flashdata('msg',validation_errors());				
		}
		if($this->session->flashdata('msg')){
			redirect(site_url('admin/overview/report/'.$id));	
		}								
       }else{
		redirect(site_url('admin/overview/'));
	   }      
	}

	public function editreport($id = null)
    {
       if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==2) {
		
		$this->load->model('Pengajuan_Model');
		$this->load->library('Pdf');
		$data['title'] = 'Daftar Peserta';
		$dhadir = $this->Pengajuan_Model->getDHadirByPengajuan($id);
		if(!empty($dhadir)){
			$data['dhadir'] = $dhadir;
		}else{
			$data['dhadir'] = null;
		}
        $data["pengajuan"] = $this->Pengajuan_Model->get_PengajuanbyId($id);
        $data["witel"] = $this->Pengajuan_Model->getWitel_byId($this->session->userdata('admin')['id_witel']);
        $data['wilayah'] = $this->Pengajuan_Model->get_wilayah();
        $this->load->view("admin/report",$data);
		
		$this->form_validation->set_rules('materi','materi');
		$this->form_validation->set_rules('daftar_siswa','daftar siswa');
		$this->form_validation->set_rules('cek','cek','required');
		$this->form_validation->set_rules('gambar1','Upload Gambar');
		$this->form_validation->set_rules('gambar2','Upload Gambar');
		$this->form_validation->set_rules('gambar3','Upload Gambar');
		$this->form_validation->set_rules('gambar4','Upload Gambar');
		$this->form_validation->set_rules('gambar5','Upload Gambar');
		       
        if ($this->form_validation->run()) {
			
			$this->id_user = $this->Pengajuan_Model->getIdUserByPengajuan($id);
			$this->id_pengajuan = $id;

			$this->daftar_siswa = $this->upload_dhadir();
			$this->daftarmateri = $this->upload_materi();
			
			$this->gambar1 = $this->upload_gambar(1);
			$this->gambar2 = $this->upload_gambar(2);
			$this->gambar3 = $this->upload_gambar(3);
			$this->gambar4 = $this->upload_gambar(4);
			$this->gambar5 = $this->upload_gambar(5);
			
			$report = $this->Pengajuan_Model->getIdReportByPengajuan($id);
		

			if($this->materi != null && $this->daftar_siswa != null || $this->gambar1 != null){
				$this->Pengajuan_Model->updateReport($report,$this);
				$this->Pengajuan_Model->updatePengajuan($id,array('eventover' => TRUE));	
				$this->session->set_flashdata('msg','Data report berhasil diupdate');  																																		
			}else{
					$this->session->set_flashdata('msg','Format file yang anda upload tidak sesuai');   					
			}
		}else{
			$this->session->set_flashdata('msg',validation_errors());				
		}
		if($this->session->flashdata('msg')){
			redirect(site_url('admin/overview/report/'.$id));	
		}								
       }else{
		redirect(site_url('admin/overview/'));
	   }      
	}

	function upload_gambar($id){

		$config['upload_path']          = './upload/report/gambar';
		$config['allowed_types']        = 'jpg|jpeg|png|gif';
		$config['max_size']             = 8192; // 8MB
  
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('gambar'.$id)) {
		  return $this->upload->data("file_name");
		}
	}
		

	function upload_materi(){

		$config['upload_path']          = './upload/report/daftarmateri';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 8192; // 8MB
  
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('materi')) {
		  return $this->upload->data("file_name");
		}else{
		  return $this->session->set_flashdata('msg',$this->upload->display_errors());
		}
	}

	function upload_dhadir(){

		$config['upload_path']          = './upload/report/daftar_siswa';
		$config['allowed_types']        = 'xlsx';
		$config['max_size']             = 8192; // 8MB
  
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('daftar_siswa')) {
		  return $this->upload->data("file_name");
		}else{
		  return $this->session->set_flashdata('msg',$this->upload->display_errors());
		}
	}

	public function printout($id)
        {
			$this->load->library('Pdf');
            $data['peserta'] = array(
				'nama_peserta' => $this->input->post('nama_peserta'),
				'nama_sekolah' => $this->input->post('nama_sekolah'),
				'tanggal_tour' => $this->input->post('tanggal_tour'),
				'lokasi_tour' => $this->input->post('lokasi_tour'),
				'nama_pejabat' => $this->input->post('nama_pejabat'),
				'gelar_pejabat' => $this->input->post('gelar_pejabat'),
				'nama_witel' => $this->input->post('nama_witel'),
				'tanggal' => date('d-m-Y'),
			);
			
            if(!empty($data)){
                $this->load->view('admin/cetak_produk', $data);
            }
            else{
                redirect('admin/overview/report/'.$id);
            }
        }

}
