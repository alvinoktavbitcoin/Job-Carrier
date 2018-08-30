<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_datacompany extends CI_Controller 
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
		$data['lowongan'] = $this->m_data->tampil_lowongan();
		$data["page"] = "admin_datacompany";
		$data['sidebar_admin'] = $this->load->view('sidebar_admin',$data,true);
		$data['header_admin'] = $this->load->view('header_admin',$data,true);
		$data['footer_admin'] = $this->load->view('footer_admin',$data,true);
		
		$this->load->view('admin_datacompany',$data);       
	}

	public function sinkron_lowongan()
	{
		$kota = $this->input->post('kota');
		$kotaa = str_replace(' ','',$kota);
		
		
		$halaman = $this->input->post('page');
		$button = $this->input->post('btn-upload');
		
		$id_kota = $this->m_data->ambil_id_kota($kota);
		
		if($button == 'submit') 
		{
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_USERAGENT, 'Glassdoor API PHP wrapper');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($ch, CURLOPT_URL, 'http://api.glassdoor.com/api/api.htm?t.p=129717&t.k=bC1SAAE32ga&userip=0.0.0.0&useragent=&format=json&v=1&action=employers&l='.$kotaa.'&ps=20&pn='.$halaman.'');
		
			$result = curl_exec($ch);
			curl_close($ch);
			$result = json_decode($result,true);


			
			foreach($result['response']['employers'] as $value)
			{
				$data = array
				(
					'id_lowongan' => $value['id'],
					'nama_perusahaan' => $value['name'],
					'rating_perusahaan' => $value['overallRating'],
					'cultureandvalues' => $value['cultureAndValuesRating'],
					'seniorleadership' => $value['seniorLeadershipRating'],
					'compensationandbenefit' => $value['compensationAndBenefitsRating'],
					'carrieropportunities' => $value['careerOpportunitiesRating'],
					'worklifebalancerating' => $value['workLifeBalanceRating'],
					'rekomen' => $value['recommendToFriendRating'],
					'job_title' => $value['featuredReview']['jobTitle'],
					'logo' => $value['squareLogo'],
					'link' => $value['featuredReview']['attributionURL'],
					'id_kota' => $id_kota
				);

				
							
				$cek = $this->m_data->cek_lowongan($value['id'],$value['featuredReview']['jobTitle']);		
				
				if(!$cek->num_rows())
				{
					$this->m_data->input_data($data,'lowongan');
				}
			}

			$this->session->set_flashdata('company_tambah', 'Heheheheheheh');
			redirect('Admin_datacompany');
		}
	}
	
	public function delete_lowongan()
	{
		$id = $this->input->get('id');
		$this->m_data->delete_lowongan_bookmark($id);
		$this->m_data->delete_lowongan_komentar($id);
		$this->m_data->delete_lowongan($id);
		$this->session->set_flashdata('company_hapus', 'Heheheheheheh');
		redirect('Admin_datacompany');
	}
	
	
}

?>