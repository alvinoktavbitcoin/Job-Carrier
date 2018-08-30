<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_job extends CI_Controller 
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
		$id = $this->input->get('id');
		$nama = $this->input->get('nama');
		
		$data['jenis'] = $this->m_data->tampil_jenis_dari_nama($id,$nama);
		$data['kategori'] = $this->m_data->tampil_kategori();
		$data["page"] = "category_job";
		$data['sidebar_admin'] = $this->load->view('sidebar_admin',$data,true);
		$data['header_admin'] = $this->load->view('header_admin',null,true);
		$data['footer_admin'] = $this->load->view('footer_admin',$data,true);
		
		$this->load->view('category_job',$data);
	}
	
	public function ganti_job_kategori()
	{
		$job_name = $this->input->post('job_baru');
		$category_name = $this->input->post('kategori_baru');
	
		$this->m_data->ubah_kategori_job($job_name,$category_name);
		$this->session->set_flashdata('ganti_job_kategori', 'Heheheheheheh');
		redirect('Admin_job');
	}
}

?>