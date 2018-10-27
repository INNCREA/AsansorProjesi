<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-23 14:13:40
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   tepeu
 * @Last Modified time: 2018-10-18 02:26:11
 */
class Ariza_model extends CI_Model {

	public function getFault($id)
	{
		$this->db->select("ariza.ariza_id, ariza_kodu, ariza_durum, ariza_tarih, ariza_timestamp, ariza_onaran, ariza_asansor, ariza_icerik, ariza_tutar, asansor_kodu, asansor_adi, asansor_arizaTarihi, asansor_latitude, asansor_longitude, asansor_adres, asansor_yetkili, musteri_id, musteri_adSoyad, musteri_adres, musteri_tel, musteri_mail, hata_aciklama, kullanici_adSoyad");
		$this->db->limit(1);
		$this->db->where("ariza_id", $id);
		$this->db->from('ariza');
		$this->db->join("asansor", "asansor.asansor_id = ariza.ariza_asansor", "left");
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili", "left");
		$this->db->join("hata", "hata.hata_kodu = ariza.ariza_kodu", "left");
		$this->db->join("kullanici", "kullanici.kullanici_id = ariza.ariza_onaran", "left");
		$r = $this->db->get()->row();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function takeFault($id, $uid)
	{
		$array = [
			"ariza_onaran" => $uid,
			"ariza_durum" => "Onarılmadı",
		];
		$this->db->where("ariza_id", $id);
		$r = $this->db->update("ariza", $array);
		if($r){
			return TRUE;
		}
		return FALSE;
	}
	public function updateFault($id, $asansor_id, $array)
	{
		$this->db->trans_start();
		$degisim = $this->getItems($id);
		$ariza = $this->getFault($id);
		$total = 0;
		if($degisim){
			foreach ($degisim as $a) {
				$total += $a->degisim_tutar;
			}
		}
		$total += (float) $array["ariza_tutar"];
		$this->db->where("ariza_id", $id);
		$this->db->update("ariza", $array);
		$datas = [
			"islem_turu" => "Arıza",
			"islem_kodu" => $id,
			"islem_tarih" => date("d-m-Y"),
			"islem_asansor" => $asansor_id,
			"islem_tutar" => $total,
		];
		$this->db->insert("islem", $datas);
		$this->db->where("cari_musteri", $ariza->asansor_yetkili);
		$this->db->set("cari_bakiye", "cari_bakiye + $total", FALSE);
		$this->db->update("cari");
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	public function addFault($array)
	{
		$r = $this->db->insert("ariza", $array);
		if($r){
			return TRUE;
		}
		return FALSE;
	}
	public function dropFault($id)
	{
		$array = [
			"ariza_onaran" => 0,
			"ariza_durum" => "Yeni",
		];
		$this->db->where("ariza_id", $id);
		$r = $this->db->update("ariza", $array);
		if($r){
			return TRUE;
		}
		return FALSE;
	}
	public function getStock()
	{
		$r = $this->db->get('stok')->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function getItem($id)
	{
		$this->db->where("stok_id", $id);
		$this->db->limit(1);
		$r = $this->db->get('stok')->row();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function getItems($id)
	{

		$this->db->join("stok", "stok.stok_id = degisim.degisim_stok", "left");
		$this->db->where("degisim_kodu", $id);
		$r = $this->db->get('degisim')->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function addStock($array)
	{
		$this->db->trans_start();
		$this->db->insert('degisim', $array);
		$lastID = $this->db->insert_id();
		$this->db->set('stok_miktar', 'stok_miktar-'.$array["degisim_miktar"], FALSE);
		$this->db->where('stok_id', $array["degisim_stok"]);
		$this->db->update('stok');
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}
		$this->db->trans_commit();
		return $lastID;
	}
	public function deleteStock($id)
	{
		$this->db->where("degisim_id", $id);
		$this->db->limit(1);
		$getStock = $this->db->get("degisim")->row();
		if(!$getStock){
			return FALSE;
		}
		$this->db->trans_start();
		$this->db->set("stok_miktar", "stok_miktar + $getStock->degisim_miktar", FALSE);
		$this->db->where("stok_id", $getStock->degisim_stok);
		$this->db->update("stok");
		$this->db->where("degisim_id", $id);
		$this->db->delete('degisim');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
        	return FALSE;
		}else{
			 $this->db->trans_commit();
			 return TRUE;
		}
	}
	public function listErrorCodes()
	{
		$r = $this->db->get("hata")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	/*
	Butun asansorleri listeler
	*/
	public function listLifts()
	{
		$r = $this->db->get("asansor")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}

	public function listLiftsId($id)
	{
		$r = $this->db->where("asansor_yetkili",$id)->get("asansor")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}

	public function listNewFaults()
	{
		$this->db->limit(15);
		$this->db->select("ariza_id, ariza_kodu, ariza_durum, ariza_tarih, ariza_timestamp, ariza_onaran, ariza_asansor, asansor_kodu, asansor_adi,  asansor_yetkili, musteri_id, musteri_adSoyad");
		//$this->db->where("ariza.ariza_tarih", date("d.m.Y"));
		$this->db->where("ariza.ariza_durum", "Yeni");
		$this->db->join("asansor", "asansor.asansor_id = ariza.ariza_asansor", "left");
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili", "left");
		$this->db->order_by("ariza_id", "desc");
		$r = $this->db->get("ariza")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function listFixedFaults()
	{
		$this->db->limit(15);
		$this->db->select("ariza_id, ariza_kodu, ariza_durum, ariza_tarih, ariza_timestamp, ariza_onaran, ariza_asansor, ariza_tutar, asansor_kodu, asansor_adi, asansor_yetkili, musteri_id, musteri_adSoyad, kullanici_id, kullanici_adSoyad");
		//$this->db->where("ariza.ariza_tarih", date("d.m.Y"));
		$this->db->where("ariza.ariza_durum", "Onarıldı");
		$this->db->join("asansor", "asansor.asansor_id = ariza.ariza_asansor", "left");
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili", "left");
		$this->db->join("kullanici", "kullanici.kullanici_id = ariza.ariza_onaran", "left");
		$this->db->order_by("ariza_id", "desc");
		$r = $this->db->get("ariza")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function listNFixedFaults()
	{
		$this->db->limit(15);
		$this->db->select("ariza_id, ariza_kodu, ariza_durum, ariza_tarih, ariza_timestamp, ariza_onaran, ariza_asansor, ariza_tutar, asansor_kodu, asansor_adi, asansor_yetkili, musteri_id, musteri_adSoyad, kullanici_id, kullanici_adSoyad");
		//$this->db->where("ariza.ariza_tarih", date("d.m.Y"));
		$this->db->where("ariza.ariza_durum", "Onarılmadı");
		$this->db->join("asansor", "asansor.asansor_id = ariza.ariza_asansor", "left");
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili", "left");
		$this->db->join("kullanici", "kullanici.kullanici_id = ariza.ariza_onaran", "left");
		$this->db->order_by("ariza_id", "desc");
		$r = $this->db->get("ariza")->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function getStockPrice($id)
	{
		$this->db->select_sum("degisim_tutar");
		$this->db->where("degisim_kodu", $id);
		$r = $this->db->get("degisim")->row();
		if($r){
			return $r->degisim_tutar;
		}
		return 0;
	}
	public function getChangeItem($id)
	{
		$this->db->limit(1);
		$this->db->where("degisim_id", $id);
		$r = $this->db->get("degisim")->row();
		if($r){
			return $r;
		}
		return FALSE;
	}
	public function addStockItem($id, $amount=0)
	{
		$this->db->where("stok_id", $id);
		$this->db->set("stok_miktar", "stok_miktar +".$amount, FALSE);
		$r = $this->db->update("stok");
		if($r){
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file Ariza_model.php */
/* Location: ./application/models/Ariza_model.php */