<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Pengajuan extends CI_Controller {

    private $_table = "pengajuan";

    public $id_pengajuan;
    public $jumlah_siswa;
    public $pembimbing1;
    public $pembimbing2;
    public $tanggal_pelaksanaan;
    public $surat_permohonan;
    public $daftar_peserta;
    public $kantor;
    
     
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('Pengajuan_model'); 
    }
 
    public function index() {
 
        $this->form_validation->set_rules('jumlah_siswa', 'Jumlah Siswa','required');
        $this->form_validation->set_rules('pembimbing1', 'Nama Pembimbing 1','required');
        $this->form_validation->set_rules('pembimbing2', 'Nama Pembimbing 2','required');
        $this->form_validation->set_rules('tanggal_pelaksanaan', 'Tanggal Pelaksanaan','required');
        $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan');
        $this->form_validation->set_rules('daftar_peserta','Daftar Peserta');
        $this->form_validation->set_rules('kantor','Kantor','required');
        if($this->form_validation->run() == FALSE) {
            site_url('pengajuan');
        }else{
            $post = $this->input->post();
            $this->id_pengajuan = rand(0,99);
            $this->jumlah_siswa = $post["jumlah_siswa"];
            $this->pembimbing1 = $post["pembimbing1"];
            $this->pembimbing2 = $post["pembimbing2"];
            $this->tanggal_pelaksanaan = $post["tanggal_pelaksanaan"];
            $this->surat_permohonan = $this->upload_surat();
            $this->daftar_peserta = $this->upload_peserta();
            $this->kantor = $post["kantor"];

            $this->db->insert($this->_table, $this);

            redirect(site_url('MainController/index')); 
        }
        $title['title'] = 'Pengajuan';
        $this->load->view('templates/header', $title);
        $this->load->view('home/pengajuan');
        $this->load->view('templates/footer');	
    }

      public function import(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();
        
        $numrow = 1;
        foreach($sheet as $row){
          // Cek $numrow apakah lebih dari 1
          // Artinya karena baris pertama adalah nama-nama kolom
          // Jadi dilewat saja, tidak usah diimport
          if($numrow > 1){
            // Kita push (add) array data ke variabel data
            array_push($data, array(
              'nama_pembimbing'=>$row['B'], 
              'no_ktp'=>$row['C'], 
              'no_telp'=>$row['D'], 
              'nama_siswa'=>$row['F'],
              'nisn'=>$row['G'],
              'no_telp_siswa'=>$row['H'],
              'no_telp_ortu'=>$row['I'],
            ));
          }
          
          $numrow++; 
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->Pengajuan_model->insert_multiple($data);
        
        redirect("Siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    
    }

    private function upload_surat(){
		$config['upload_path']          = './upload/surat_permohonan/';
          $config['allowed_types']        = 'xlsx|csv';
          $config['max_size']  = '4096';
          $config['overwrite'] = true;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());
    }
	}

     private function upload_peserta(){
          $this->load->library('upload'); 
          
          $config['upload_path'] = './upload/daftar_peserta/';
          $config['allowed_types'] = 'xlsx|csv';
          $config['max_size']  = '4096';
          $config['overwrite'] = true;
        
          $this->load->library('upload', $config);
 
          if ( ! $this->upload->do_upload('berkas')){
            $error = array('error' => $this->upload->display_errors());
          }else{
            $data = array('upload_data' => $this->upload->data());
          }
    }

}
    
