<?php 

/* Author : Atahan DUMAN */

class Kullanici_model extends CI_Model
{
	public function kullaniciListesi($data)
	{
		$result = $this
		->db
		->select($data)
		->get("kullanici")
		->result();
		if($result){
			return $result;
		}
		return FALSE;
	}

	public function kullaniciEkle($data){

		$result = $this
		->db
		->insert("kullanici" , $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}

	public function kullaniciSil($id)
	{
		$result = $this
		->db
		->where('kullanici_id', $id)
		->get('kullanici')
		->row();

		if($result)
		{
			$delete = $this
			->db
			->where('kullanici_id', $id)
			->delete('kullanici');

			return TRUE;
		}
		return FALSE;
	}

	public function kullaniciCek($id)
	{
		$result = $this
		->db
		->where("kullanici_id",$id)
		->get("kullanici")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function kullaniciGuncelle($data,$id)
	{
		$result = $this
		->db
		->where("kullanici_id",$id)
		->update("kullanici", $data);

		if($result)
		{
			return $data;
		}
		return FALSE;
	}
}
?>