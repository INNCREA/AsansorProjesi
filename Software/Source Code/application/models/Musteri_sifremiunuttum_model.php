<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteri_sifremiunuttum_model extends CI_Model {
	/*
	E-posta adresini kontrol eder
	*/
	public function checkEmail($email)
	{
		$this->db->select("musteri_id, musteri_adSoyad, musteri_kAdi, musteri_mail, musteri_durum");
		$this->db->from("musteri");
		$this->db->where("musteri_mail", $email);
		$this->db->where("musteri_durum", 1);
		$this->db->limit(1);
		$r = $this->db->get()->row();
		if($r){
			return $r;
		}
		return FALSE;
	}
	/*
	Sifremi unuttum kismi icin hash e-posta gibi bilgileri veritabanina ekler 
	*/
	public function addResetPass($array)
	{
		$r = $this->db->insert("sifrem", $array);
		if($r){
			return TRUE;
		}
		return FALSE;
	}
	/*
	Kodu kontrol eder
	*/
	public function checkResetCode($code)
	{
		$this->db->where("sifrem_hash", $code);
		$this->db->where("sifrem_durum", 1);
		$this->db->where("sifrem_ip", $this->input->ip_address());
		$this->db->limit(1);
		$r = $this->db->get("sifrem")->row();
		if($r){
			return $r;
		}
		return FALSE;
	}
	/*
	ID'si girilen kodun durumunu pasif yapar
	*/
	public function changeResetStatus($id)
	{
		$this->db->where("sifrem_id", $id);
		$this->db->set("sifrem_durum", 0, FALSE);
		$r = $this->db->update("sifrem");
		if($r){
			return TRUE;
		}
		return FALSE;
	}
	/*
	Sifreyi degistir
	*/
	public function changePassword($id, $password)
	{
		$array = [
			"musteri_sifre" => $password
		];
		$this->db->where("musteri_id", $id);
		$this->db->where("musteri_durum", 1);
		$r = $this->db->update("musteri", $array);
		if($r){
			return TRUE;
		}
		return FALSE;
	}
}
