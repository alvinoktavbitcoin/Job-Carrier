<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
 {
 
	public function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->model('m_data');
		
		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
	}
	
	public function index()
	{
		$data["page"] = "contact";
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('contact', $data);
	}
	
	public function kirim_pesan()
	{
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('message','Message','required|callback_login_check');
		
		//$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$data["page"] = "register";
			$data["script"] = $this->load->view('script', NULL, TRUE);
			$data["style"] = $this->load->view('style', NULL, TRUE); 
			$data["header"] = $this->load->view('header', $data, TRUE);
			$data["footer"] = $this->load->view('footer', NULL, TRUE);
			$this->load->view('contact', $data);
		} 
		
		else 
		{
			$data = array(
					'username' => $this->session->userdata('username'),
					'subject' =>  htmlspecialchars($_POST['review']),
					'message' =>  htmlspecialchars($_POST['message'])
			);
			
			$this->m_data->input_data($data,'kritik');
			$this->session->set_flashdata('kontak_terkirim', 'Heheheheheheh');
			redirect('Contact');
		}
	}
	
	function login_check()
	{
		if($this->session->userdata('status_web') != "user_login" )
		{
			$this->form_validation->set_message('login_check','You Have to Login First');
			return FALSE;
		}
		
		else
		{
			return TRUE;
		}
	}

}
?>