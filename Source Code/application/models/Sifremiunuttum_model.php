<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-16 22:16:53
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-07-19 12:44:39
 */
class Sifremiunuttum_model extends CI_Model {
	/*
	E-posta adresini kontrol eder
	*/
	public function checkEmail($email)
	{
		$this->db->select("kullanici_id, kullanici_adi, kullanici_mail, kullanici_durum");
		$this->db->from("kullanici");
		$this->db->where("kullanici_mail", $email);
		$this->db->where("kullanici_durum", 1);
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
			"kullanici_sifre" => $password
		];
		$this->db->where("kullanici_id", $id);
		$this->db->where("kullanici_durum", 1);
		$r = $this->db->update("kullanici", $array);
		if($r){
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file Sifremiunuttum_model.php */
/* Location: ./application/models/Sifremiunuttum_model.php */