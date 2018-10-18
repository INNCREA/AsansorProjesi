<?php 

/* Author : Atahan DUMAN */

class Bakim_model extends CI_Model
{
	/* Yapılan tüm bakımları listeler. */

	public function bakimCek()
	{
		$this->db->join("asansor", "asansor.asansor_id = bakim.bakim_asansor");
		$this->db->join("kullanici", "kullanici.kullanici_id = bakim.bakim_yapan" , "left");
		$result = $this->db->get("bakim")->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function bakimCekId($id)
	{
		$result = $this
		->db
		->where("bakim_asansor",$id)
		->join("asansor", "asansor.asansor_id = bakim.bakim_asansor")
		->join("kullanici", "kullanici.kullanici_id = bakim.bakim_yapan" , "left")
		->get("bakim")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function bakimCekIdd($id)
	{
		$result = $this
		->db
		->where("bakim_id",$id)
		->join("asansor", "asansor.asansor_id = bakim.bakim_asansor")
		->join("kullanici", "kullanici.kullanici_id = bakim.bakim_yapan" , "left")
		->get("bakim")
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	/* Asansörleri listeler */

	public function asansorCek($id)
	{
		$result = $this
		->db
		->where("asansor_id" , $id)
		->get('asansor')
		->row();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function asansorCekId($id)
	{
		$result = $this
		->db
		->where("asansor_yetkili" , $id)
		->get('asansor')
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}


	/* Asansörleri listeler */

	public function asansorleriCek()
	{
		$result = $this
		->db
		->get('asansor')
		->result();

		if($result)
		{
			return $result;
		}
		return FALSE;
	}


	/* Bakım işlemini tamamlayıp tarihi günceller */

	public 	function bakimGuncelle($data,$id)
	{
		$result = $this
		->db
		->where("asansor_id",$id)
		->update('asansor', $data);
		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}

	/* Bakım işlemini bakım listesine ekler */

	public function bakimEkle($data)
	{
		$result = $this
		->db
		->insert('bakim', $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}


	public function periyodikBakim($id,$tutar)
	{
		$result = $this
		->db
		->where("asansor_id",$id)
		->update('asansor', $data);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}
}
?>