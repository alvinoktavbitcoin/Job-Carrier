<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_category extends CI_Controller 
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
		$data['jenis'] = $this->m_data->tampil_kategori();
		$data["page"] = "admin_category";
		$data['sidebar_admin'] = $this->load->view('sidebar_admin',$data,true);
		$data['header_admin'] = $this->load->view('header_admin',$data,true);
		$data['footer_admin'] = $this->load->view('footer_admin',$data,true);
		
		$this->load->view('admin_category',$data);
	}
	
	public function tambah_kategori()
	{
		$nama_kategori = $this->input->post('kategori');
		$button = $this->input->post('btn-upload');
		
		$data = array
		(
				'nama_kategori' => $nama_kategori
		);
		
		if($button == 'submit') 
		{
			$cek = $this->m_data->cek_tambah_kategori($nama_kategori);		
			if(!$cek->num_rows())
			{
				$this->m_data->input_data($data,'kategori');
				$this->session->set_flashdata('tambah_kategori', 'Heheheheheheh');
			}
			
			else
			{
				$this->session->set_flashdata('kategori_double', 'Heheheheheheh');
			}
		}
		
		redirect('Admin_category');
		
	}
	
	function delete_kategori()
	{
		$id_kategori = $this->input->get('id');
		$this->m_data->delete_kategori($id_kategori);
		$this->session->set_flashdata('hapus_kategori', 'Heheheheheheh');
		redirect('Admin_category');
	}
	
	
}

?>