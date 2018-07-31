<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-17 05:38:16
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-07-19 12:37:45
 */
class Asansor_model extends CI_Model {
	/*
	Butun asansorleri listeler
	*/
	public function listLifts($rank)
	{
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili");
		$r = $this->db->get("asansor")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	/*
	ID'ye gore asansorleri listeler
	*/
	public function getLift($id)
	{
		$this->db->where("asansor.asansor_id", $id);
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili");
		$this->db->limit(1);
		$r = $this->db->get("asansor")->row();
		if($r){
			return $r;
		}
		return FALSE;
	}
	/*
	Asansor ekler
	*/
	public function addLift($array)
	{
		$r = $this->db->insert("asansor", $array);
		if($r){
			return TRUE;
		}
		return FALSE;
	}
	/*
	Asansoru duzenler
	*/
	public function editLift($id, $array)
	{
		$this->db->where("asansor_id", $id);
		$r = $this->db->update("asansor", $array);
		if($r){
			return TRUE;
		}
		return FALSE;
	}
	/*
	Asansoru siler
	*/
	public function deleteLift($id)
	{
		$this->db->where("asansor_id", $id);
		$r = $this->db->delete("asansor");
		if($r){
			return TRUE;
		}
		return FALSE;
	}
	/*
	Yetkilileri listeler
	 */
	public function listCustomers()
	{
		$this->db->select("musteri_id, musteri_adSoyad");
		$r = $this->db->get("musteri")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	/*
	Asansorun ID'sine gore arizalari listeler
	 */
	public function listFault($id)
	{
		$this->db->join("kullanici", "kullanici.kullanici_id = ariza.ariza_onaran");
		$this->db->where("ariza_asansor", $id);
		$r = $this->db->get("ariza")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	/*
	Asansorun ID'sine gore bakimlari listeler
	 */
	public function listMaint($id)
	{
		$this->db->join("kullanici", "kullanici.kullanici_id = bakim.bakim_yapan");
		$this->db->where("bakim_asansor", $id);
		$r = $this->db->get("bakim")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
}

/* End of file Asansor_model.php */
/* Location: ./application/models/Asansor_model.php */