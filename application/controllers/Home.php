<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
 {
 
	public function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->model('m_data');
	}
	
	public function index()
	{
		$data["page"] = "home";
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('home', $data);
	}
	
	

}
?>