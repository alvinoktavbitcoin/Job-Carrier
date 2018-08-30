<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_kritik extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();	
		if($this->session->userdata('status_alvin') != "admin_login" )
		{
			redirect(base_url("index.php/Admin_login"));
		}
		
		$this->load->helper('url');
		$this->load->model('m_data');
		
		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
	}
	
	public function index()
	{
		$data['kritik'] = $this->m_data->tampil_kritik();
		$data["page"] = "admin_kritik";
		$data['sidebar_admin'] = $this->load->view('sidebar_admin',$data,true);
		$data['header_admin'] = $this->load->view('header_admin',null,true);
		$data['footer_admin'] = $this->load->view('footer_admin',$data,true);
		
		$this->load->view('admin_kritik',$data);
	}
	
}

?>