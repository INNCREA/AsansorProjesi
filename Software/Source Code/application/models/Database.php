<?php 

/* Author : Atahan DUMAN */

class Database extends CI_Model
{
	
	function Access($username,$password,$data)
	{
		$result=$this
		->db
		->select($data)
		->where('kullanici_adi',$username)
		->get("kullanici")
		->row();

		if(count($result) != 1)
		{
			return false;
		}
		else
		{
			if(password_verify($password, $result->kullanici_sifre)){
				return $result;
			}
			return false;
		}
	}

	function M_access($username,$password,$data)
	{
		$result=$this
		->db
		->select($data)
		->where('musteri_kAdi',$username)
		->get("musteri")
		->row();

		if(count($result) != 1)
		{
			return false;
		}
		else
		{
			if(password_verify($password, $result->musteri_sifre)){
				return $result;
			}
			return false;
		}
	}
}
?>