<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller
 {
 
	public function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->model('m_belajar');
		
		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
	}
	
	public function index()
	{
		$data["page"] = "contact";
		$data["hasil"] = $this->m_belajar->tampil_lowongan();
		
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('view_coba', $data);
	}
}