<?php 

/* Author : Harika Öncel */

class Panel_model extends CI_Model
{
	
	function gunlukAriza()
	{
		$this->db->select("ariza_id,ariza_kodu,asansor_adi,ariza_timestamp,ariza_asansor,asansor_kodu,asansor_yetkili,musteri_adSoyad");
		$this->db->where("ariza.ariza_tarih", date("d.m.Y"));
		$this->db->join("asansor","asansor.asansor_id = ariza.ariza_asansor", "left");
		$this->db->join("musteri","musteri.musteri_id = asansor.asansor_yetkili","left");
		$this->db->order_by("ariza_timestamp","desc");
		$result = $this->db->get("ariza")->result();
		if($result)
		{
			return $result;
		}
		return false;
	}

	function gunlukBakim()
	{

	}

	function toplamAriza()
	{
		return $this->db->count_all('ariza');
	}

	function toplamBakim()
	{
		return $this->db->count_all('bakim');
	}

	function toplamAsansor()
	{
		return $this->db->count_all('asansor');
	}

	function toplamCari()
	{
		return $this->db->count_all('cari');
	}
}
?>