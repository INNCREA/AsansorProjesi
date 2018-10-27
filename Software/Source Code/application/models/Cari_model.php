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
		->join("asansor","asansor.asansor_id = islem.islem_asansor")
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
		$this->db->select("ariza.ariza_id, ariza_kodu, ariza_durum, ariza_tarih, ariza_timestamp, ariza_onaran, ariza_asansor, ariza_icerik, ariza_tutar, asansor_kodu, asansor_arizaTarihi, asansor_latitude, asansor_longitude, asansor_adi, asansor_adres, asansor_yetkili, musteri_id, musteri_adSoyad, musteri_adres, musteri_tel, musteri_mail, hata_aciklama, kullanici_adSoyad, degisim_kodu, degisim_miktar, degisim_tutar, stok_adi, satis_fiyat, stok_birim");
		$this->db->where("ariza_id", $id);
		$this->db->from('ariza');
		$this->db->join("asansor", "asansor.asansor_id = ariza.ariza_asansor", "left");
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili", "left");
		$this->db->join("hata", "hata.hata_kodu = ariza.ariza_kodu", "left");
		$this->db->join("kullanici", "kullanici.kullanici_id = ariza.ariza_onaran", "left");
		$this->db->join("degisim", "degisim.degisim_kodu = ariza.ariza_id", "left");
		$this->db->join("stok","stok.stok_id = degisim.degisim_stok", "left");
		$r = $this->db->get()->result();
		if($r){
			return $r;
		}
		return FALSE;
	}

	public function arizaCek($id)
	{
		$this->db->select("ariza.ariza_id, ariza_kodu, ariza_durum, ariza_tarih, ariza_timestamp, ariza_onaran, ariza_asansor, ariza_icerik, ariza_tutar, asansor_kodu, asansor_arizaTarihi, asansor_latitude, asansor_longitude, asansor_adi, asansor_adres, asansor_yetkili, musteri_id, musteri_adSoyad, musteri_adres, musteri_tel, musteri_mail, hata_aciklama, kullanici_adSoyad");
		$this->db->where("ariza_id", $id);
		$this->db->from('ariza');
		$this->db->join("asansor", "asansor.asansor_id = ariza.ariza_asansor", "left");
		$this->db->join("musteri", "musteri.musteri_id = asansor.asansor_yetkili", "left");
		$this->db->join("hata", "hata.hata_kodu = ariza.ariza_kodu", "left");
		$this->db->join("kullanici", "kullanici.kullanici_id = ariza.ariza_onaran", "left");
		$r = $this->db->get()->result();
		if($r){
			return $r;
		}
		return FALSE;
	}
}
?>