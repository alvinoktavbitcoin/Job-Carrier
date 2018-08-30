<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_job extends CI_Controller
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
		$id = $this->input->get('id');
	
		$data['lowongan'] = $this->m_data->tampil_lowongan_id($id);
		$data['komen'] = $this->m_data->tampil_komen_id($id);
		$data["page"] = "jobs";
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('show_job', $data);
	}
	
	public function kirim_review()
	{
	
		if($this->session->userdata('status_web') != "user_login" )
		{
			$this->session->set_flashdata('review gagal', 'Heheheheheheh');
		}	
		
		else
		{
			$id = $this->input->post('id_lowongan');
			$user = $this->session->userdata('username');
			$komen=  htmlspecialchars($_POST['review']);
			
			$data = array(
					'username' => $user,
					'id_lowongan' => $id,
					'comment' => $komen
			);
			$this->m_data->input_data($data,'komentar');
			$this->session->set_flashdata('review berhasil', 'Heheheheheheh');
		}
		redirect($_SERVER['HTTP_REFERER']);
		
		
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