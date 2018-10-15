<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-21 23:46:33
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-10-14 21:30:30
 */
class Rapor_model extends CI_Model {

	public function getReport($report)
	{
		if($report == "asansor"){
			return $this->listLifts();
		}else if($report == "musteri"){
			return $this->listCustomers("*");
		}else if($report == "ariza"){
			return $this->listFaults();
		}else{
			return $this->listMaints();
		}
	}
	/*
	Butun asansorleri listeler
	*/
	public function listLifts()
	{
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili");
		$r = $this->db->get("asansor")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function listCustomers($data)
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
	public function listFaults()
	{
		$this->db->select("ariza_id, ariza_kodu, ariza_durum, ariza_tarih, ariza_timestamp, ariza_onaran, ariza_asansor, ariza_tutar, asansor_kodu, asansor_yetkili, musteri_id, musteri_adSoyad, kullanici_id, kullanici_adSoyad");
		$this->db->join("asansor", "asansor.asansor_id = ariza.ariza_asansor");
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili");
		$this->db->join("kullanici", "kullanici.kullanici_id = ariza.ariza_onaran");
		$this->db->order_by("ariza_id", "desc");
		$r = $this->db->get("ariza")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function listMaints()
	{
		$this->db->join("asansor", "asansor.asansor_id = bakim.bakim_asansor", "left");
		$this->db->join("kullanici", "kullanici.kullanici_id = bakim.bakim_yapan", "left");
		$r = $this->db->get("bakim")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
}

/* End of file Rapor_model.php */
/* Location: ./application/models/Rapor_model.php */