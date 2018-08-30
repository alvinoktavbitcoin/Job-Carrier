<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller
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
		if($this->session->userdata('status_web') != "user_login")
		{
			redirect(base_url("index.php/Home"));
		}

		$id = $this->session->userdata('username');
		$data['user_sekarang'] = $this->m_data->tampil_data_user($id);
		$data["page"] = "edit_profile";
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('change_password', $data);
	}
	
	public function edit_user_profile() 
	{
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('current_password','Current Password','required|callback_sandi_check');
		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[25]');
		$this->form_validation->set_rules('confirm_password','Verify Password','matches[password]');
		//$this->form_validation->set_rules('recommen','Recommen','required|callback_sandi_check');
		
		
		//$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$data["script"] = $this->load->view('script', NULL, TRUE);
			$data["style"] = $this->load->view('style', NULL, TRUE); 
			$data["header"] = $this->load->view('header', $data, TRUE);
			$data["footer"] = $this->load->view('footer', NULL, TRUE);
			$id = $this->session->userdata('username');
			$data['user_sekarang'] = $this->m_data->tampil_data_user($id);
			$this->load->view('change_password', $data);
		} 
		
		else 
		{
			$data = array(
					'password' => md5($this->input->post('password'))
			);
			$username_user = $this->session->userdata('username');
			
			$this->m_data->update_user($data,$username_user,'user');
			
			$this->session->set_userdata($data);
			$this->session->set_flashdata('password_udah_diupdate', 'Heheheheheheh');
			redirect('User_profile');
		}
	}
	
	function sandi_check($input_sandi)
	{
		$username_user = $this->session->userdata('username');
		if($this->m_data->check_user($username_user,$input_sandi) == FALSE)
		{
			$this->form_validation->set_message('sandi_check','You entered incorrect password');
			return FALSE;
		}
		else
			return TRUE;
	}
}
?>