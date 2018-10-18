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

	public function musteriBakiyeCek($id)
	{
		$result = $this
		->db
		->select("cari_bakiye")
		->where("cari_musteri",$id)
		->get("cari")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function tahsilatCek()
	{
		$this->db->join("cari","cari.cari_id = tahsilat.tahsilat_cari", "left");
		$result = $this->db->get("tahsilat")->result();
		if($result)
		{
			return $result;
		}
		return false;
	}

	public function tahsilatCekId($id)
	{
		$result = $this
		->db
		->where("tahsilat_id",$id)
		->join("cari","cari.cari_id = tahsilat.tahsilat_cari", "left")
		->get("tahsilat")
		->result();

		if($result)
		{
			return $result;
		}
		return false;
	}

	public function tahsilatSil($id)
	{
		$result = $this
		->db
		->where('tahsilat_id', $id)
		->get('tahsilat')
		->row();

		if($result)
		{
			$delete = $this
			->db
			->where('tahsilat_id', $id)
			->delete('tahsilat');

			return TRUE;
		}
		return FALSE;
	}

	public function islemCek($id)
	{
		$result = $this
		->db
		->where("islem_asansor",$id)
		->join("asansor","asansor.asansor_id = islem.islem_asansor", "left")
		->get('islem')
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function degisimCek($id)
	{
		$result = $this
		->db
		->where("degisim_kodu",$id)
		->join("stok","stok.stok_id = degisim.degisim_stok", "left")
		->get('degisim')
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}
}
?>