<?php

class m_belajar extends CI_Model
{
	function tampil_lowongan()
	{
		$data["data_lowongan"] = $this->db->query("select * from lowongan where id = '5';");
		return $data;
	}
}