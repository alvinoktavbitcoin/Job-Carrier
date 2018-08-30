<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller
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
		$data["page"] = "forgot_password";
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('forgot_password', $data);
	}
	
	public function kirim_email() 
	{
		
		//GET USER'S ID AND PASSWORD
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		
		$data_lupa = $this->m_data->check_data_user($username,$email);
		
		if($data_lupa->num_rows() == 0)
		{
			$this->session->set_flashdata('forgot_gagal', 'Heheheheheheh');
			Redirect('Forgot_password');
		}
		
		else
		{
			$subject = 'Forget Password'; 
			$message = 'Dear User,<br /><br />Please click on the below link to reset your password.<br /><br />'.  base_url('index.php/Forgot_password/resetPassword').'/'.  base64_encode($email).'<br /><br /><br />Thanks<br />Job Carrier'; 

			 $config = Array
			 ( 
				'protocol' => 'smtp', 
				'smtp_host' => 'ssl://smtp.googlemail.com', 
				'smtp_port' => 465, 
				'smtp_user' => 'plumempat@gmail.com', 
				'smtp_pass' => 'dovisiozo4', 
				'SMTPSecure' => 'SSL',  
				'mailtype'  => 'html',
				'charset'  => 'iso-8859-1',
				'wordwrap' => TRUE, 
				'newline' => "\r\n" 
			);
                                            
                      
            $this->load->library('email', $config); 
            $this->email->set_newline("\r\n");    
            $this->email->from('plumempat@gmail.com', 'Job Carrier Admin'); 
            $this->email->to($email); 
            $this->email->subject($subject); 
            $this->email->message($message); 
            //$this->email->send(); 
			
			if (!$this->email->send()) 
			{
				 	show_error($this->email->print_debugger()); 
			}
			
			else
			{
            $this->session->set_flashdata('forgot_sukses', 'Heheheheheheh');
            redirect ('Forgot_password');
			}
		}
				
	}
	
	public function resetPassword($email)
	{ 
		if($this->session->userdata('status_web') == "user_login" )
		{
			redirect(base_url("index.php/Home"));
		}	
        $data['mail'] = base64_decode($email); 
        $data["style"] = $this->load->view('style', NULL, TRUE);  
		$data["script"] = $this->load->view('script', NULL, TRUE);
        $data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$data["page"] = "reset_password";
        $this->load->view('resetpassword',$data); 
   }
   
   public function ganti_password()
   {
			if($this->session->userdata('status_web') == "user_login" )
			{
				redirect(base_url("index.php/Home"));
			}	
			
			$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[25]');
			$this->form_validation->set_rules('confirm_password','Verify Password','matches[password]');
			
			$password = $this->input->post('password');
			
			if ($this->form_validation->run() == FALSE) 
			{
				$this->session->set_flashdata('ganti_gagal', 'Heheheheheheh');
				redirect($_SERVER['HTTP_REFERER']);
			} 
		
			else 
			{
				$password = md5($this->input->post('password'));
				$email = $this->input->post('email');
			
				$this->m_data->ganti_password($password,$email);
				$this->session->set_flashdata('ganti_sukses', 'Heheheheheheh');
				redirect('Home');
			}
   }
	


}
?>