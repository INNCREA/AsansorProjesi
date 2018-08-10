<?php 

/* Author : Atahan DUMAN */

class Musteri_model extends CI_Model
{
	public function musteriListesi($data)
	{
		$result = $this
		->db
		->select($data)
		->get("musteri")
		->result();
		if($result){
			return $result;
		}
		return FALSE;
	}

	public function musteriEkle($data){

		$result = $this
		->db
		->insert("musteri" , $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}


	public function musteriSil($id)
	{
		$result = $this
		->db
		->where('musteri_id', $id)
		->get('musteri')
		->row();

		if($result)
		{
			$delete = $this
			->db
			->where('musteri_id', $id)
			->delete('musteri');

			return TRUE;
		}
		return FALSE;
	}

	public function musteriCek($id)
	{
		$result = $this
		->db
		->where("musteri_id",$id)
		->get("musteri")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function musteriGuncelle($data,$id)
	{
		$result = $this
		->db
		->where("musteri_id",$id)
		->update("musteri", $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}
}
?>