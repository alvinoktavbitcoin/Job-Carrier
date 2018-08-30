<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users extends CI_Controller 
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
		$data['users'] = $this->m_data->tampil_users();
		$data["page"] = "admin_users";
		$data['sidebar_admin'] = $this->load->view('sidebar_admin',$data,true);
		$data['header_admin'] = $this->load->view('header_admin',null,true);
		$data['footer_admin'] = $this->load->view('footer_admin',$data,true);
		
		$this->load->view('admin_users',$data);
		
	}
	
	public function delete_user()
	{
		$id = $this->input->get('id');
		$this->m_data->delete_user($id,bookmark);
		$this->m_data->delete_user($id,kritik);
		$this->m_data->delete_user($id,komentar);
		$this->m_data->delete_user($id,user);
		$this->session->set_flashdata('user_hapus', 'Heheheheheheh');
		redirect('Admin_users');
	}
	
}

?>