<?php 

/* Author : Atahan DUMAN */

class Hata_model extends CI_Model
{
	public function hataListesi($data)
	{
		$result = $this
		->db
		->select($data)
		->get("hata")
		->result();
		if($result){
			return $result;
		}
		return FALSE;
	}

	public function hataEkle($data){

		$result = $this
		->db
		->insert("hata" , $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}


	public function hatakoduSil($id)
	{
		$result = $this
		->db
		->where('hata_id', $id)
		->get('hata')
		->row();

		if($result)
		{
			$delete = $this
			->db
			->where('hata_id', $id)
			->delete('hata');

			return TRUE;
		}
		return FALSE;
	}

	public function hatakoduCek($id)
	{
		$result = $this
		->db
		->where("hata_id",$id)
		->get("hata")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function hatakoduGuncelle($data,$id)
	{
		$result = $this
		->db
		->where("hata_id",$id)
		->update("hata", $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}
}
?>