<?php

class M_data extends CI_Model
{
	function tampil_lowongan()
	{
		$data_lowongan = $this->db->query("select * from lowongan;");
		
		$data["tampil"] = $data_lowongan;
		return $data;
	}
	
	function tampil_lowongan_contoh()
	{
		$data_lowongan = $this->db->query("select * from lowongan where id_kota like '4970' and id_kategori like '10';");
		
		$data["tampil"] = $data_lowongan;
		return $data;
	}

	function tampil_job($offset,$limit,$angka)
	{
		$data_lowongan = $this->db->query("select id, id_lowongan, job_title, nama_perusahaan, rating_perusahaan, cultureandvalues, seniorleadership, compensationandbenefit, carrieropportunities, worklifebalancerating, rekomen, description, qualification, l.id_kota, l.id_kategori, logo, link, nama_kota, nama_kategori from lowongan l, kategori c, kota k where l.id_kota = k.id_kota and l.id_kategori = c.id_kategori and id in ($angka) order by (FIELD(id,$angka)) limit $offset,$limit;");
		
		$data["tampil"] = $data_lowongan;
		return $data;
	}
	
	function tampil_job_dari_search($offset,$limit,$angka,$kota,$kategori)
	{
		$data_lowongan = $this->db->query("select id, id_lowongan, job_title, nama_perusahaan, rating_perusahaan, cultureandvalues, seniorleadership, compensationandbenefit, carrieropportunities, worklifebalancerating, rekomen, description, qualification, l.id_kota, l.id_kategori, logo, link, nama_kota, nama_kategori from lowongan l, kategori c, kota k where l.id_kota = k.id_kota and l.id_kategori = c.id_kategori and id in ($angka) and l.id_kota = '$kota' and l.id_kategori = '$kategori'  order by (FIELD(id,$angka)) limit $offset,$limit;");
		
		$data["tampil"] = $data_lowongan;
		return $data;
	}
	
	function banyak_tampil_job_dari_search($kota,$kategori)
	{
		$data_lowongan = $this->db->query("select * from lowongan where id_kota = '$kota' and id_kategori = '$kategori';");
		
		return $data_lowongan;
	}
	
	function tampil_job_dari_cari($offset,$limit,$angka,$job)
	{
		$data_lowongan = $this->db->query("select id, id_lowongan, job_title, nama_perusahaan, rating_perusahaan, cultureandvalues, seniorleadership, compensationandbenefit, carrieropportunities, worklifebalancerating, rekomen, description, qualification, l.id_kota, l.id_kategori, logo, link, nama_kota, nama_kategori from lowongan l, kategori c, kota k where l.id_kota = k.id_kota and l.id_kategori = c.id_kategori and id in ($angka) and (job_title like '%$job%' or nama_perusahaan like '%$job%')  order by (FIELD(id,$angka)) limit $offset,$limit;");
		
		$data["tampil"] = $data_lowongan;
		return $data;
	}
	
	function banyak_tampil_job_dari_cari($job)
	{
		$data_lowongan = $this->db->query("select * from lowongan where job_title like '%$job%' or nama_perusahaan like '%$job%';");
		
		return $data_lowongan;
	}
	
	function tampil_lowongan_id($id)
	{
		
		$data_lowongan = $this->db->query("select id, id_lowongan, job_title, nama_perusahaan, rating_perusahaan, cultureandvalues, seniorleadership, compensationandbenefit, carrieropportunities, worklifebalancerating, rekomen, description, qualification, l.id_kota, l.id_kategori, logo, link, nama_kota, nama_kategori from lowongan l, kategori c, kota k where id='$id' and (l.id_kota = k.id_kota and l.id_kategori = c.id_kategori)  ;");
		

		$data["tampil"] = $data_lowongan;
		return $data;
	}
	
	function tampil_bookmark($offset,$limit, $id)
	{
		
		$data_lowongan = $this->db->query("select no_lowongan,id, id_lowongan, job_title, nama_perusahaan, rating_perusahaan, cultureandvalues, seniorleadership, compensationandbenefit, carrieropportunities, worklifebalancerating, rekomen, description, qualification, l.id_kota, l.id_kategori, logo, link,waktu,nama_kota, nama_kategori from lowongan l, bookmark b,kategori c, kota k where username = '$id' and l.id= b.no_lowongan and l.id_kota = k.id_kota and l.id_kategori = c.id_kategori  order by waktu DESC limit $offset,$limit  ;");
		

		$data["tampil"] = $data_lowongan;
		return $data;
	}
	
	function banyak_tampil_bookmark($id)
	{
		
		$data_lowongan = $this->db->query("select no_lowongan,id, id_lowongan, job_title, nama_perusahaan, rating_perusahaan, cultureandvalues, seniorleadership, compensationandbenefit, carrieropportunities, worklifebalancerating, rekomen, description, qualification, l.id_kota, l.id_kategori, logo, link,waktu,nama_kota, nama_kategori from lowongan l, bookmark b,kategori c, kota k where username = '$id' and l.id= b.no_lowongan and l.id_kota = k.id_kota and l.id_kategori = c.id_kategori  order by waktu DESC  ;");
		
		return $data_lowongan;
	}
	
	function delete_bookmark($username,$id)
	{
		$data_lowongan = $this->db->query("delete from bookmark where username = '$username' and no_lowongan='$id';");
	
		return $data_lowongan;
	}
	
	function cek_lowongan($id,$job_title)
	{
		$data_lowongan = $this->db->query("select id from lowongan where id_lowongan= '$id' and job_title = '$job_title';");
	
		return $data_lowongan;
	}
	
	function delete_lowongan($id)
	{
		$data_lowongan = $this->db->query("delete from lowongan where id='$id';");
	
		return $data_lowongan;
	}
	
	function delete_lowongan_bookmark($id)
	{
		$data_lowongan = $this->db->query("delete from bookmark where no_lowongan='$id';");
	
		return $data_lowongan;
	}
	
	function delete_lowongan_komentar($id)
	{
		$data_lowongan = $this->db->query("delete from komentar where id_lowongan='$id';");
	
		return $data_lowongan;
	}
	
	function delete_user($id,$tabel)
	{
		$data_lowongan = $this->db->query("delete from $tabel where username='$id';");
	
		return $data_lowongan;
	}

	function tampil_kota()
	{
		$data_kota = $this->db->query("select id_kota as id, nama_kota as kota from kota;");
		
		$data["tampil"] = $data_kota;
		return $data;
	}
	
	function cek_kota($id)
	{
		$data_kota = $this->db->query("select * from kota where id_kota='$id';");
	
		return $data_kota;
	}
	
	function cek_tambah_kota($id,$nama)
	{
		$data_kota = $this->db->query("select * from kota where nama_kota='$nama' or id_kota ='$id';");
	
		return $data_kota;
	}
	
	function delete_kota($id)
	{
		$data_lowongan = $this->db->query("delete from kota where id_kota='$id';");
	
		return $data_kota;
	}
	
	function ambil_id_kota($kota)
	{
		$id_kota = $this->db->query("select id_kota from kota where nama_kota='$kota';");
		
		return $id_kota->row()->id_kota;
	}
	
	function tampil_jenis()
	{
		$data_jenis= $this->db->query("select distinct(job_title) as nama ,nama_kategori as kategori from lowongan,kategori where lowongan.id_kategori = kategori.id_kategori;");
		
		$data["tampil"] = $data_jenis;
		return $data;
	}
	
	function tampil_jenis_dari_nama($nama,$jenis)
	{
		$data_jenis= $this->db->query("select distinct(job_title) as nama ,nama_kategori as kategori from lowongan,kategori where lowongan.id_kategori = kategori.id_kategori and job_title='$nama' and nama_kategori='$jenis';");
		
		$data["tampil"] = $data_jenis;
		return $data;
	}
	
	function tampil_kategori()
	{
		$data_jenis= $this->db->query("select * from kategori;");
		
		$data["tampil"] = $data_jenis;
		return $data;
	}
	
	function ambil_id_kategori($id)
	{
		$data_kategori = $this->db->query("select * from kategori where id_kategori='$id';");
	
		$data["tampil"] = $data_kategori;
		return $data;
	}
	
	function ambil_kategori_dari_kota($id_kota)
	{
	 
		$data_kategori = $this->db->query("SELECT * from kategori where id_kategori in(select id_kategori from lowongan where id_kota = '$id_kota');");
	
		$data["tampil"] = $data_kategori;
		return $data;
	}
	
	function cek_tambah_kategori($nama)
	{
		$data_kota = $this->db->query("select * from kategori where nama_kategori='$nama';");
	
		return $data_kota;
	}
	
	function ubah_kategori($id_kategori,$nama_kategori)
	{
		$data_kota = $this->db->query("update kategori set nama_kategori='$nama_kategori' where id_kategori='$id_kategori';");
	
		return $data_perubahan;
	}
	
	function ubah_kategori_job($job_name,$category_name)
	{
		$data_kota = $this->db->query("update lowongan set id_kategori= (select id_kategori from kategori where nama_kategori='$category_name') where job_title='$job_name';");
	
		return $data_perubahan;
	}
	
	function delete_kategori($id)
	{
		$data_lowongan = $this->db->query("delete from kategori where id_kategori='$id';");
	
		return $data_kategori;
	}
	
	function input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}
	
	function update_user($data,$username,$table)
	{
		$condition = "username =" . "'" . $username. "'";
		
		$this->db->where($condition);
		$this->db->update($table,$data);
		
	}
	
	function update_table_lain($username_lama,$username_baru,$table)
	{
		/*$condition = "username =" . "'" . $username_lama. "'";
		
		$this->db->where($condition);
		$this->db->update($table,$data);*/
		$this->db->query("update $table set username='$username_baru' where username='$username_lama';");
		
	}
	
	function ambil_kriteria()
	{
		$data_kriteria = $this->db->query("select * from perbandingan;");
	
		return $data_kriteria;
	}

	function ambil_kriteria_id($id)
	{
		$data_kriteria_id = $this->db->query("select rating_perusahaan, cultureandvalues, seniorleadership, compensationandbenefit, carrieropportunities, worklifebalancerating, rekomen from user where username = '$id';");
	
		return $data_kriteria_id;
	}

	function total_responden_id($id)
	{
		$poin_responden = $this->db->query("select rating_perusahaan + cultureandvalues + seniorleadership + compensationandbenefit + carrieropportunities + worklifebalancerating +  rekomen as total_semua from user where username = '$id';");
	
		return $poin_responden;
	}	
	
	function total_responden()
	{
		$poin_responden = $this->db->query("select sum(nilai) as total_semua from perbandingan;");
	
		return $poin_responden;
	}
	
	public function registration_insert($data) 
	{
		// Query to check whether username already exist or not
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 0)
		{
			// Query to insert data in database
			$this->db->insert('user',$data);
			if ($this->db->affected_rows() > 0) 
			{
				return true;
			}
		} 
		
		else 
		{
			return false;
		}
	}
	
	public function admin_login($data) 
	{
		//$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "' AND ". "status =" . "'admin'" ;
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) 
		{
			return true;
		} 
		
		else 
		{
			return false;
		}
	}
	
	public function read_user_information($username) 
	{

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) 
		{
			return $query->result();
		}

		else 
		{
			return false;
		}
	}
	
	public function check_id($new_id)
	{
		
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where('username',$new_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return false;
		}
		else
			return true;
	}
	
	public function user_check_id($new_id,$old_id)
	{
		$condition = "username =" . "'" . $new_id . "' AND " . "username !=" . "'" . $old_id . "' " ;
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return false;
		}
		else
			return true;
	}
	
	
	public function check_user($id,$password)
	{
		//SEARCHING ID AND USER PASSWORD
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where('username',$id);
		$this->db->where('password',md5($password));
		$this->db->where('status','user');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			/*foreach($query->result() as $row){
				$username = $row->user_name;
			}
			$data = array("username"=>$username,"pwd"=>$password);
			$this->session->set_userdata($data);*/

			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function check_email($email){
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('email',$email);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return false;
		}
		else
			return true;
	}
	
	public function user_check_email($new_email,$old_email){
		$condition = "email =" . "'" . $new_email . "' AND " . "email !=" . "'" . $old_email. "' " ;
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return false;
		}
		else
			return true;
	}
	
	function tampil_kritik()
	{
		$data_kritik= $this->db->query("select * from kritik order by waktu DESC;");
		
		$data["tampil"] = $data_kritik;
		return $data;
	}
	
	function tampil_users()
	{
		$data_users= $this->db->query('select * from user where status="user";');
		
		$data["tampil"] = $data_users;
		return $data;
	}
	
	function tampil_data_user($username)
	{
		$data_users= $this->db->query("select * from user where username='$username' and status ='user';");
		
		$data["tampil"] = $data_users;
		return $data;
	}
	
	function cek_bookmark($username,$id_lowongan)
	{
		$data_bookmark = $this->db->query("select * from bookmark where username = '$username' and no_lowongan = '$id_lowongan';");
	
		return $data_bookmark;
	}
	
	
	function check_data_user($username,$email )
	{
		$data_lupa_password = $this->db->query("select * from user where username = '$username' and email = '$email' and status ='user';");
	
		return $data_lupa_password;
	}
	
	function tampil_komen_id($id)
	{
		$data_komen= $this->db->query("select * from komentar where id_lowongan='$id';");
		
		$data["tampil"] = $data_komen;
		return $data;
	}
	
	public function sendForgetEmail($email)
	{ 
          $from_email = 'alvinoktav217@gmail.com'; //change this to yours 
          $subject = 'Forget Password'; 
          $message = 'Dear User,<br /><br />Please click on the below link to reset your password.<br /><br />'.  base_url('index.php/Forgot_password/resetPassword').'/'.  base64_encode($email).'<br /><br /><br />Thanks<br />Wisma Kompas Gramedia'; 

          //configure email settings 
                         

                       /* $config = Array( 
                            'protocol' => 'smtp', 
                            'smtp_host' => 'ssl://smtp.googlemail.com', 
                            'smtp_port' => 465, 
                            'smtp_user' => $from_email, 
                            'smtp_pass' => 'charmender95',    
                            'mailtype'  => 'html',  
                            'charset'   => 'iso-8859-1', 
                            'wordwrap' => TRUE, 
                            'newline' => "\r\n" 
                        ); */
						
						 $config = Array( 
			'protocol' => 'smtp', 
			'smtp_host' => 'ssl://smtp.googlemail.com', 
			'smtp_port' => 465, 
			'smtp_user' => 'plumempat@gmail.com', 
			'smtp_pass' => 'dovisiozo4', 
				//'SMTPSecure' => 'SSL',  
			'mailtype'  => 'html',
			'charset'  => 'iso-8859-1'
			);
                                            
                      
                        $this->load->library('email', $config); 
                
                        $this->email->from($from_email, 'Job Carrier Admin'); 
                        $this->email->to('alvin.oktavianus@student.umn.ac.id'); 
                        $this->email->subject($subject); 
                        $this->email->message($message); 
                        $this->email->send(); 
						
						 
    }
	
	public function ganti_password($password,$email)
	{
		$data_perubahan = $this->db->query("update user set password='$password' where email = '$email';");
	
		return $data_perubahan;
	}

}