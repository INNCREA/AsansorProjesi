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
}
?>