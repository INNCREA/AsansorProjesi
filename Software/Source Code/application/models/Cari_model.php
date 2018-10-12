<?php 

/* Author : Atahan DUMAN */

class Cari_model extends CI_Model
{
	public function cariListesi($data)
	{
		$result = $this
		->db
		->select($data)
		->get("cari")
		->result();
		if($result){
			return $result;
		}
		return FALSE;
	}

	public function cariEkle($data){

		$result = $this
		->db
		->insert("cari" , $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}

	public function tahsilatEkle($data){

		$result = $this
		->db
		->insert("tahsilat" , $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}

	public function tahsilatId(){

		$result = $this
		->db
		->select("tahsilat_id")
		->order_by("tahsilat_id", "desc")
		->limit(1)
		->get("tahsilat")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}


	public function cariSil($id)
	{
		$result = $this
		->db
		->where('cari_id', $id)
		->get('cari')
		->row();

		if($result)
		{
			$delete = $this
			->db
			->where('cari_id', $id)
			->delete('cari');

			return TRUE;
		}
		return FALSE;
	}

	public function cariCek($id)
	{
		$result = $this
		->db
		->where("cari_id",$id)
		->get("cari")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function cariGuncelle($data,$id)
	{
		$result = $this
		->db
		->where("cari_id",$id)
		->update("cari", $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}

	public function tahsilat($data,$id)
	{
		$result = $this
		->db
		->where("cari_id",$id)
		->update("cari",$data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}
}
?>