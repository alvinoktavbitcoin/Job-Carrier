<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_datacity extends CI_Controller 
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
		$data['kota'] = $this->m_data->tampil_kota();
		$data["page"] = "admin_datacity";
		$data['sidebar_admin'] = $this->load->view('sidebar_admin',$data,true);
		$data['header_admin'] = $this->load->view('header_admin',$data,true);
		$data['footer_admin'] = $this->load->view('footer_admin',$data,true);
		
		$this->load->view('admin_datacity',$data);
	}
		
	function sinkron_kota()
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_USERAGENT, 'Glassdoor API PHP wrapper');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_URL, 'http://api.glassdoor.com/api/api.htm?t.p=129717&t.k=bC1SAAE32ga&userip=0.0.0.0&useragent=&format=json&v=1&action=jobs-stats&returnStates=true&admLevelRequested=1&country=Indonesia');
		
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result,true);
		foreach($result['response']['states'] as $value)
		{
			$data = array(
				'id_kota' => $value['id'],
				'nama_kota' => $value['name']	
			);
			
			$cek = $this->m_data->cek_kota($value['id']);		
			if(!$cek->num_rows())
			{
				$this->m_data->input_data($data,'kota');
			}
		}
		$this->session->set_flashdata('city_sinkron', 'Heheheheheheh');
		redirect('Admin_datacity');
		
	}
	
	function delete_kota()
	{
		$id_kota = $this->input->get('id');
		$this->m_data->delete_kota($id_kota);
		$this->session->set_flashdata('city_hapus', 'Heheheheheheh');
		redirect('Admin_datacity');
	}
	
	
}

?>