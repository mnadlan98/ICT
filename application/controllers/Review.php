<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Review_model');
		$this->load->helper('url');
		
    }
    
    public function index()
	{
        $data['title'] = 'Review';
        $data['status'] = $this->Review_model->getStatus();
		$this->load->view('templates/header', $data);
		$this->load->view('home/review');
		$this->load->view('templates/footer');
	}
}