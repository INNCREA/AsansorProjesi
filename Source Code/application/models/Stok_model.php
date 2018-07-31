<?php 

/* Author : Atahan DUMAN */

class Stok_model extends CI_Model
{
	public function stokListesi($data)
	{
		$result = $this
		->db
		->select($data)
		->get("stok")
		->result();

		if($result){
			return $result;
		}
		return FALSE;
	}

	public function stokEkle($data){

		$result = $this
		->db
		->insert("stok" , $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}

	public function stokSil($id)
	{
		$result = $this
		->db
		->where('stok_id', $id)
		->get('stok')
		->row();

		if($result)
		{
			$delete = $this
			->db
			->where('stok_id', $id)
			->delete('stok');

			return TRUE;
		}
		return FALSE;
	}

	public function stokCek($id)
	{
		$result = $this
		->db
		->where("stok_id",$id)
		->get("stok")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function stokGuncelle($data,$id)
	{
		$result = $this
		->db
		->where("stok_id",$id)
		->update("stok", $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}
}
?>