<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_category extends CI_Controller 
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
	
		$data['kategori'] = $this->m_data->ambil_id_kategori($id);
		$data["page"] = "edit_category";
		$data['sidebar_admin'] = $this->load->view('sidebar_admin',$data,true);
		$data['header_admin'] = $this->load->view('header_admin',null,true);
		$data['footer_admin'] = $this->load->view('footer_admin',$data,true);
		
		$this->load->view('edit_category',$data);
	}
	
	public function ganti_nama_kategori()
	{
		$id_kategori = $this->input->post('id_baru');
		$nama_kategori = $this->input->post('judul_baru');
		
		$cek = $this->m_data->cek_tambah_kategori($nama_kategori);		
		if(!$cek->num_rows())
		{
				$this->m_data->ubah_kategori($id_kategori,$nama_kategori);
				$this->session->set_flashdata('ganti_kategori', 'Heheheheheheh');
		}
		
		else
		{
			$this->session->set_flashdata('kategori_double', 'Heheheheheheh');
		}
		redirect('Admin_category');
	}
}

?>