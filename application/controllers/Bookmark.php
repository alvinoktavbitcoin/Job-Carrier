<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmark extends CI_Controller
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
		$limit = 5;
		$array_id = '';
		
		if($this->session->userdata('status_web') != "user_login" )
		{
			$hitung_rekomendasi = $this->hitungRekomendasi();
			
		
			$counter = 0;
			foreach($hitung_rekomendasi as $key=>$value)
			{
				if($counter != 0)
				$array_id .= ','.$key;
				else
				$array_id .= $key;
				
				$counter =1;
			}
		}
		
		if(!$halaman) : $offset=0;
		else: $offset = $halaman;
		endif;
		
		//Untuk paginator
		if($this->session->userdata('status_web') != "user_login" )
		{
			$banyak = $this->db->get('lowongan');
		}
		
		else
		{
			$username = $this->session->userdata('username'); 
			$banyak = $this->m_data->banyak_tampil_bookmark($username);
		}

		
		$config['total_rows'] = $banyak->num_rows();
		$config['base_url'] = base_url().'index.php/Bookmark/index/';
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
		if($this->session->userdata('status_web') != "user_login" )
		{
			$data['lowongan'] = $this->m_data->tampil_job($offset,$limit,$array_id);
		}
		
		else
		{
			$username = $this->session->userdata('username'); 
			$data['lowongan'] = $this->m_data->tampil_bookmark($offset,$limit,$username);
		}

		$data["page"] = "bookmark";
		$data["script"] = $this->load->view('script', NULL, TRUE);
		$data["style"] = $this->load->view('style', NULL, TRUE); 
		$data["header"] = $this->load->view('header', $data, TRUE);
		$data["footer"] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('bookmark', $data);
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
                    echo "tidak ada vector";
                    die;
                }
                /*
                 * END
                 */

                        
                arsort($hasil_akhir);
				return $hasil_akhir;
                
            }		
    }
	

	public function hapus_bookmark()
	{
		if($this->session->userdata('status_web') != "user_login" )
		{
			echo "tes";
			die;	
		}
		
		else
		{
		
			$username = $this->input->post('username');
			$id_lowongan = $this->input->post('id');
			$this->m_data->delete_bookmark($username,$id_lowongan);
			$this->session->set_flashdata('bookmark_hapus', 'Heheheheheheh');
			redirect($_SERVER['HTTP_REFERER']);
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

}
?>