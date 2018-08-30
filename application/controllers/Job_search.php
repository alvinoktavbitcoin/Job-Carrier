<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_search extends CI_Controller
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
		$halaman = $this->uri->segment(3);
		$limit = 10;
		$array_id = '';
		
		if($this->session->userdata('status_web') == "user_login" )
		{
			$user_name = $this->session->userdata('username');
			$hitung_rekomendasi = $this->hitungRekomendasi_pakeid($user_name);
		}	
		
		else
		{
			$hitung_rekomendasi = $this->hitungRekomendasi();
		}
		
		$counter = 0;
		foreach($hitung_rekomendasi as $key=>$value)
		{
			if($counter != 0)
			$array_id .= ','.$key;
			else
			$array_id .= $key;
			
			$counter =1;
		}
		
		if(!$halaman) : $offset=0;
		else: $offset = $halaman;
		endif;
		
		$job_input	= $this->input->get('jobinput');
		$banyak		= $this->m_data->banyak_tampil_job_dari_cari($job_input);
		
		$config['total_rows'] = $banyak->num_rows();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
	
		$config['base_url'] = base_url().'index.php/Job_search/index';
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First ';
		$config['last_link'] = 'Last ';
		$config['next_link'] = 'Next ';
		$config['prev_link'] = 'Previous ';
		
		/*Tambahan*/
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<i></i></a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<i></i></a></li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		 
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		
		/*End of Tambahan*/
		$this->pagination->initialize($config);
		$data['paginator'] = $this->pagination->create_links();
		
		$data['halaman'] = $halaman;
		
		$hasil = 'id';
		$data['lowongan'] = $this->m_data->tampil_job_dari_cari($offset,$limit,$array_id,$job_input);
	
		$data["page"] = "jobs";
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		if($config['total_rows'] == 0)
		{
			$data1["page"] = "jobs";
			$data1["script"] = $this->load->view('script', NULL, TRUE);
			$data1["style"] = $this->load->view('style', NULL, TRUE); 
			$data1["header"] = $this->load->view('header', $data, TRUE);
			$data1["footer"] = $this->load->view('footer', NULL, TRUE);
			$this->load->view('job_null', $data);
		}	
		
		else
		{
			$this->load->view('job_search', $data);
		}
	}
	
	//Algoritma SAW :
	public function hitungRekomendasi()
	{
		/* <select> <option selected> NULL</option> </select> */
            /*
             * GET ALL THE ALTERNATIVE
             * -- STEP 1 --
             */
			 $alternatif = $this->m_data->tampil_lowongan(); // ambil data dari table melalui model
			 
            if($alternatif['tampil']->num_rows()) 
			{
	
                /*
                 * -- STEP 1 --
                 * DAPETIN DAN BOBOTIN KRITERIA
                 */
                $allCriteria = $this->m_data->ambil_kriteria(); //ambil nilai kriteriany dari tabel
				
                if ($allCriteria->num_rows()) 
				{
				
                    // GET TOTAL RESPONDEN
                    $totalRespondent = $this->m_data->total_responden()->result(); //ambil nilai semua kriteria kalo dijumlahin
					$totalRespondent = $totalRespondent[0]->total_semua;
					                  
                    $bobot = [];
                    foreach ($allCriteria->result() as $key => $value)
					{
                        $bobot[$value->kriteria] = $value->nilai/ $totalRespondent;
                    }				
                }
				
				// KALO TIDAK ADA CRITERIA       
				else
				{
                    echo 'tidak ada criteria';die;
                }
                /*
                 * END
                 */

                /*
                 * -- STEP 2 --
                 * SUSUN VECTORNYA LALU HITUNG NILAI VECTOR NYA
                 */
                $vector = [];
                foreach($alternatif['tampil']->result() as $key => $value)
				{
                    foreach($allCriteria->result() as $keyC => $criteria)
					{
                        $vector[$value->id][$criteria->kriteria]   = $value->{$criteria->kriteria};
                    }
                }
                /*
                 * END
                 */

				 
                /*
                 * -- STEP 3 --
                 * HITUNG NILAI PREFERENSI (S1, S2, dst..)
                 */
                if(count($vector))
				{
				
				/* START NORMALIASI */
					$arr_normalisasi 	= [];
					$temp_max			= [];
					foreach($alternatif['tampil']->result() as $key => $value)
					{
						foreach($vector as $key2 =>  $value2)
						{
							foreach($allCriteria->result() as $key3=>$value3)
							{
							if(!array_key_exists($value3->kriteria,$temp_max))
							{
								$temp_max[$value3->kriteria]			= 0;																			
							}
								if($temp_max[$value3->kriteria]<$value2[$value3->kriteria])
								{								
									$temp_max[$value3->kriteria]			= $value2[$value3->kriteria];								
								}										
							}
						}
					}
													
					$hasil_normalisasi 	= [];
					foreach($alternatif['tampil']->result() as $keyJob => $valueJob)
					{
						foreach($vector as $key => $value)
						{					
								foreach($allCriteria->result() as $key3=>$value3)
								{																			
									$temp = $vector[$valueJob->id][$value3->kriteria] / $temp_max[$value3->kriteria];
									$hasil_normalisasi[$valueJob->id][$value3->kriteria]	= $temp;
																		
								}								
						}
					}
			
					
				/* END NORMALISASI */
					
                    $hasil_akhir          = [];
					$x = 0;
			
                    foreach( $alternatif['tampil']->result() as $key => $value)
					{
                        $tempS = 0;
						
                        foreach($bobot as $keyB => $valBobot)
						{										
                            $tempS = $tempS + ($hasil_normalisasi[$value->id][$keyB]*$bobot[$keyB]);			
						}									
						
                        $hasil_akhir[$value->id] = $tempS;										
                    }	
                }
				
                else
				{
                    echo "tidak ada vector";die;
                }
                /*
                 * END
                 */

                        
                arsort($hasil_akhir);
				return $hasil_akhir;
                
            }
			
			else
			{
                /*
                 * LAKUKAN SESUATU KETIKA TIDAK ADA LOWONGAN DALAM KATEGORI INI
                 */
            }	
    }
	
	public function hitungRekomendasi_pakeid($username)
	{
		
            /*
             * GET ALL THE ALTERNATIVE
             * -- STEP 1 --
             */
			 $alternatif = $this->m_data->tampil_lowongan();
			 $user_name = $username;
			 
            if($alternatif['tampil']->num_rows()) 
			{
	
                /*
                 * -- STEP 1 --
                 * DAPETIN DAN BOBOTIN KRITERIA
                 */
                $allCriteria = $this->m_data->ambil_kriteria();
				$data_kriteria = $this->m_data->ambil_kriteria_id($user_name);
				
                if ($allCriteria->num_rows()) 
				{
				
                    // GET TOTAL RESPONDEN
                    $totalRespondent = $this->m_data->total_responden_id($user_name)->result();
					$totalRespondent = $totalRespondent[0]->total_semua;
					                  
                    $bobot = [];
                    foreach ($allCriteria->result() as $key_a => $value)
					{
						foreach ($data_kriteria->result() as $key_b => $value_2)
						{
							$kriteria_nama = $value->kriteria;
							$bobot[$value->kriteria] = $value_2->$kriteria_nama / $totalRespondent;
						}
                    }				
                }
				
				// KALO TIDAK ADA CRITERIA       
				else
				{
                    echo 'tidak ada criteria';die;
                }
                /*
                 * END
                 */

                /*
                 * -- STEP 2 --
                 * SUSUN VECTORNYA LALU HITUNG NILAI VECTOR NYA
                 */
                $vector = [];
                foreach($alternatif['tampil']->result() as $key => $value)
				{
                    foreach($allCriteria->result() as $keyC => $criteria)
					{
                        $vector[$value->id][$criteria->kriteria]   = $value->{$criteria->kriteria};
                    }
                }
			

                /*
                 * END
                 */

                /*
                 * -- STEP 3 --
                 * HITUNG NILAI PREFERENSI (S1, S2, dst..)
                 */
                if(count($vector))
				{
				
				/* START NORMALIASI */
					$arr_normalisasi 	= [];
					$temp_max			= [];
					foreach($alternatif['tampil']->result() as $key => $value)
					{
						foreach($vector as $key2 =>  $value2)
						{
							foreach($allCriteria->result() as $key3=>$value3)
							{
							if(!array_key_exists($value3->kriteria,$temp_max))
							{
								$temp_max[$value3->kriteria] = 0;																			
							}
								if($temp_max[$value3->kriteria]<$value2[$value3->kriteria])
								{								
									$temp_max[$value3->kriteria] = $value2[$value3->kriteria];								
								}										
							}
						}
					}
													
					$hasil_normalisasi 	= [];
					foreach($alternatif['tampil']->result() as $keyJob => $valueJob)
					{
						foreach($vector as $key => $value)
						{					
								foreach($allCriteria->result() as $key3=>$value3)
								{																			
									$temp = $vector[$valueJob->id][$value3->kriteria] / $temp_max[$value3->kriteria];
									$hasil_normalisasi[$valueJob->id][$value3->kriteria]	= $temp;
																		
								}								
						}
					}
			
					
				/* END NORMALISASI */
					
                    $hasil_akhir          = [];
					$x = 0;
			
                    foreach( $alternatif['tampil']->result() as $key => $value)
					{
                        $tempS = 0;
						
                        foreach($bobot as $keyB => $valBobot)
						{										
                            $tempS = $tempS + ($hasil_normalisasi[$value->id][$keyB]*$bobot[$keyB]);			
						}									
						
                        $hasil_akhir[$value->id] = $tempS;										
                    }	
                }
				
                else
				{
                    echo "tidak ada vector";die;
                }
                /*
                 * END
                 */

                        
                arsort($hasil_akhir);
				return $hasil_akhir;
                
            }
			
			else
			{
                /*
                 * LAKUKAN SESUATU KETIKA TIDAK ADA LOWONGAN DALAM KATEGORI INI
                 */
            }
					
    }
	
	public function bookmark()
	{
		if($this->session->userdata('status_web') != "user_login" )
		{
			echo "tes";
			die;
			
		}
		
		else
		{
			$username = $this->input->post('username');
			$no_lowongan = $this->input->post('id');
			$cek = $this->m_data->cek_bookmark($username,$no_lowongan);	
			if(!$cek->num_rows())
			{
				$data =Array(
				'username'=>$username,
				'no_lowongan'=>$no_lowongan
				);
				$this->m_data->input_data($data,'bookmark');
				$this->session->set_flashdata('bookmark_tambah', 'Heheheheheheh');
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			else
			{
				$this->session->set_flashdata('bookmark_sudah_ada', 'Heheheheheheh');
				redirect($_SERVER['HTTP_REFERER']);
			}
		
		}
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
	
	function sinkron_city_category()
	{
		$temp_category		= '';
		$id_kota 	= $this->input->post('id_kota');
	
		$daftar_kategori = $this->m_data->ambil_kategori_dari_kota($id_kota);
		foreach($daftar_kategori["tampil"]->result() as $u)
		{
			$temp_category	 .=  "<option  value='$u->id_kategori'>$u->nama_kategori</option>";
		}
		echo $temp_category;
	}

}
?>