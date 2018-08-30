<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
 
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
		
		$this->load->model('m_data');
	}
	
	public function index()
	{
		if($this->session->userdata('status_web') == "user_login" )
		{
			redirect(base_url("index.php/Home"));
		}	
		$data["page"] = "login";
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('login', $data);
	}
	
	public function login() 
	{
		
		//GET USER'S ID AND PASSWORD
		$input_username = $this->input->post('username');
		$input_password = $this->input->post('password');
		
		if($this->m_data->check_user($input_username,$input_password ))
		{
			$result = $this->m_data->read_user_information($input_username);
			$session_data = array(
						'username' => $result[0]->username,
						'email' => $result[0]->email,
						'role' => $result[0]->status,
						'status_web' => "user_login"
					);

			// Add user data in session
			$this->session->set_userdata($session_data);
			
			$this->session->set_flashdata('login_berhasil', 'Heheheheheheh');
			Redirect('Home');
		}
		
		else
		{
			$this->session->set_flashdata('login_gagal', 'Heheheheheheh');
			Redirect('Login');
		}
		
	}
	
	public function logout()
	{	
		$this->session->sess_destroy();
		redirect('Home','refresh');
	}

}
?>