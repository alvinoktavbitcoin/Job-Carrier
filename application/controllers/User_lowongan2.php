<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_lowongan2 extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->load->helper('url');
		$this->load->model('m_data');
	}
	
	public function index(){
		$hitung_rekomendasi = $this->hitungRekomendasi();
		var_dump($hitung_rekomendasi);die;
	}
	
	public function hitungRekomendasi()
	{
		
            /*
             * GET ALL THE ALTERNATIVE
             * -- STEP 1 --
             */
			 $alternatif = $this->m_data->tampil_lowongan_contoh();
			 
            if($alternatif['tampil']->num_rows()) 
			{
	
                /*
                 * -- STEP 1 --
                 * DAPETIN DAN BOBOTIN KRITERIA
                 */
                $allCriteria = $this->m_data->ambil_kriteria();
				
                if ($allCriteria->num_rows()) 
				{
				
                    // GET TOTAL RESPONDEN
                    $totalRespondent = $this->m_data->total_responden()->result();
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
								$temp_max[$value3->kriteria] = 0;																			
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
	
}
?>