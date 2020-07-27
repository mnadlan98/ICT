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
        
        
        
        if ($this->form_validation->run()) {

            $this->jumlah_siswa = $this->input->post("jumlah_siswa",TRUE);
            $this->pembimbing1 = $this->input->post("pembimbing1",TRUE);
            $this->pembimbing2 = $this->input->post("pembimbing2",TRUE);
			$this->tanggal_pelaksanaan = $this->input->post("tanggal_pelaksanaan",TRUE);
			$this->tanggal_persetujuan = $this->input->post("tanggal_persetujuan",TRUE);
            $this->id_sto = $this->input->post("sto",TRUE);
            $this->id_witel = $this->Pengajuan_Model->getWitel_bySto($this->id_sto);
            $this->status_pengajuan = $this->input->post("status_pengajuan",TRUE);
            $this->Pengajuan_Model->updatePengajuan($id,$this);
            $this->session->set_flashdata('msg','Berhasil Diupdate');
           
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        	
        }
        $data["pengajuan"] = $this->Pengajuan_Model->get_PengajuanbyId($id);
        $data["witel"] = $this->Pengajuan_Model->getWitel_byId($this->session->userdata('admin')['id_witel']);
        $data['wilayah'] = $this->Pengajuan_Model->get_wilayah();
        if (!$data["pengajuan"]) show_404();
        $this->load->view("admin/review",$data);
       }
       else{
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
		$this->form_validation->set_rules('datel', 'Nama Datel','trim|required|xss_clean|is_unique[datel.datel]');
		if ($this->form_validation->run()) {
			$this->datel = $this->input->post('datel',true);
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
		$this->form_validation->set_rules('wilayah', 'Nama Wilayah','trim|required|xss_clean|is_unique[wilayah.wilayah]');
		if ($this->form_validation->run()) {
			$this->wilayah = $this->input->post('wilayah',true);
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
		$this->form_validation->set_rules('datel', 'Nama Datel','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->datel = $this->input->post('datel',true);
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
		$this->form_validation->set_rules('sto', 'STO','trim|required|xss_clean');
		$this->form_validation->set_rules('keterangan', 'Keterangan STO','trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$this->wilayah = $this->input->post('wilayah',true);
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
			$this->Pengajuan_Model->addSto($this);
			$this->session->set_flashdata('msg','Berhasil Diupdate');
		}
		else{
			$this->session->set_flashdata('msg',validation_errors());
		}
		redirect(site_url('admin/overview/sto_list'));
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
		if ($this->session->userdata("admin")['logged']) {

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

	public function update_sekolah()
	{
		if ($this->session->userdata("admin")['logged']) {

			$this->load->model('Pengajuan_Model');
			if ($this->session->userdata("admin")['level']==1) {
				$data["list"] = $this->Pengajuan_Model->getWitel();
			}
			
			

			$this->load->view('admin/sekolah',$data);
		}
		else{
			redirect(site_url('login/index'));
		}   
	}

	public function admin_list(){
		if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==1) {
			$this->load->model('Pengajuan_Model');
			$this->load->model('Auth_Model');
			$result = $this->Auth_Model->get_admin();
			$data["list"] = $this->Pengajuan_Model->getWitel();

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
			$data["admin"] = $result;
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
			$data["list"] = $this->Pengajuan_Model->getWitel();
		}
		else{
			redirect(site_url('admin/Overview'));
		}
		$this->load->view('admin/gallery',$data);
	}

	public function report($id = null)
    {
	   $id = 2;
       if ($this->session->userdata("admin")['logged'] && $this->session->userdata("admin")['level']==2) {
		
		$this->load->model('Pengajuan_Model');
        $this->form_validation->set_rules('daftar_hadir', 'Upload Daftar Peserta');
        $this->form_validation->set_rules('materi','Materi','trim|required|xss_clean');
		$this->form_validation->set_rules('files[]','Upload Gambar');
		

        
        if ($this->form_validation->run()) {
			$this->id_user = 10;
			$this->id_pengajuan = $id;
			$this->daftar_hadir = $this->upload_kehadiran();
			$this->materi = $this->input->post("materi",TRUE);
			$files = $this->images(); 
			$this->Pengajuan_Model->insertReport($this);
			$this->Pengajuan_Model->insertFotoReport($files);				
        }
        else{
        	$this->session->set_flashdata('msg',validation_errors());
        	
        }
        $data["pengajuan"] = $this->Pengajuan_Model->get_PengajuanbyId($id);
        $data["witel"] = $this->Pengajuan_Model->getWitel_byId($this->session->userdata('admin')['id_witel']);
        $data['wilayah'] = $this->Pengajuan_Model->get_wilayah();
        $this->load->view("admin/report",$data);
       }
       else{
       	redirect(site_url('admin/overview/'));
       }
        
	}
	
	public function images()
	{
		$filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 

                    $config['upload_path'] = 'upload/report/gambar'; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['foto_report'] = $fileData['file_name']; 
                        $uploadData[$i]['tanggal_upload'] = date("Y-m-d H:i:s"); 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    return $uploadData; 
                     
                    // Upload status message 
                    $statusMsg = $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            
         
	}

	function upload_kehadiran(){

		$config['upload_path']          = './upload/report/daftar_hadir';
		$config['allowed_types']        = 'xlsx';
		$config['max_size']             = 2048; // 2MB
  
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('daftar_hadir')) {
		  return $this->upload->data("file_name");
		}
	}

}
