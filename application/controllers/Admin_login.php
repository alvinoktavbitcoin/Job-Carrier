<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();	
		
		$this->load->helper('url');
		$this->load->model('m_data');
		$this->load->library('session');
	}
	
	public function index()
	{
		if($this->session->userdata('status_alvin') == "admin_login" )
		{
			redirect(base_url("index.php/Admin_datacompany"));
		}	
		
		$this->load->view('admin_login',null);    
	}
	
	public function login() 
	{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);

			$result = $this->m_data->admin_login($data);
			if ($result == TRUE) 
			{
			
				$username = $this->input->post('username');
				$result = $this->m_data->read_user_information($username);

				if ($result != false) 
				{
					$session_data = array(
						'username' => $result[0]->username,
						'status_alvin' => 'admin_login',
						'email' => $result[0]->email,
						'role' => $result[0]->status
						
					);

					// Add user data in session
					$this->session->set_userdata($session_data);
					redirect('Admin_datacompany');
				}	
			} 
		

			else 
			{
				$this->session->set_flashdata('login_salah', 'Heheheheheheh');
				redirect('Admin_login');
			}
		}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Admin_login');
	}
}

?>