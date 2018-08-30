<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile extends CI_Controller
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
		$this->load->view('edit_profile', $data);
	}
	
	public function edit_user_profile() 
	{
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[30]|callback_id_check');
		$this->form_validation->set_rules('email','Email Address','required|valid_email|callback_email_check');
		$this->form_validation->set_rules('company_rating','Company Rating','required|callback_angka_check');
		$this->form_validation->set_rules('culture_and_values','Culture and Values','required|callback_angka_check');
		$this->form_validation->set_rules('senior_leadership','Senior Leadership','required|callback_angka_check');
		$this->form_validation->set_rules('compensation_and_benefit','Compensation and Benefit','required|callback_angka_check');
		$this->form_validation->set_rules('carrier_opportunities','Carrier Opportunities','required|callback_angka_check');
		$this->form_validation->set_rules('work_life_balance','Work Life Balance','required|callback_angka_check');
		$this->form_validation->set_rules('recommend','Recommend','required|callback_angka_check');

		if ($this->form_validation->run() == FALSE) 
		{
			$data["page"] = "register";
			$data["script"] = $this->load->view('script', NULL, TRUE);
			$data["style"] = $this->load->view('style', NULL, TRUE); 
			$data["header"] = $this->load->view('header', $data, TRUE);
			$data["footer"] = $this->load->view('footer', NULL, TRUE);
			$id = $this->session->userdata('username');
			$data['user_sekarang'] = $this->m_data->tampil_data_user($id);
			$this->load->view('edit_profile', $data);
		} 
		
		else 
		{
			$data = array(
					'first_name' => htmlspecialchars($_POST['first_name']),
					'last_name' => htmlspecialchars($_POST['last_name']),
					'email' => $this->input->post('email'),
					'username' => htmlspecialchars($_POST['username']),
					'rating_perusahaan' => $this->input->post('company_rating'),
					'cultureandvalues' => $this->input->post('culture_and_values'),
					'seniorleadership' => $this->input->post('senior_leadership'),
					'compensationandbenefit'=> $this->input->post('compensation_and_benefit'),
					'carrieropportunities' => $this->input->post('carrier_opportunities'),
					'worklifebalancerating '=> $this->input->post('work_life_balance'),
					'rekomen' => $this->input->post('recommend')
			);
			$username_user = $this->session->userdata('username');
			$new_user = $this->input->post('username');
			
			$this->m_data->update_user($data,$username_user,'user');
			
			$this->m_data->update_table_lain($username_user,$new_user,'bookmark');
			$this->m_data->update_table_lain($username_user,$new_user,'kritik');
			$this->m_data->update_table_lain($username_user,$new_user,'komentar');
			
			$this->session->set_userdata($data);
			$this->session->set_flashdata('profile_udah_diupdate', 'Heheheheheheh');
			redirect('User_profile');
		}
	}
	
	function id_check($input_id)
	{
		$username_user = $this->session->userdata('username');
		if($this->m_data->user_check_id($input_id,$username_user) == FALSE)
		{
			$this->form_validation->set_message('id_check','Username already exists');
			return FALSE;
		}
		
		else
		{
			return TRUE;
		}
	}
	
	function email_check($input_email)
	{
		$email_user = $this->session->userdata('email');
		if($this->m_data->user_check_email($input_email,$email_user) == FALSE)
		{
			$this->form_validation->set_message('email_check','Email already exists');
			return FALSE;
		}
		else
			return TRUE;
	}
	
	function angka_check($input_angka)
	{
		if($input_angka < 0 || $input_angka > 100){
			$this->form_validation->set_message('angka_check','Please Enter Number between 0 - 100');
			return FALSE;
		}
		else
			return TRUE;
	}
}
?>