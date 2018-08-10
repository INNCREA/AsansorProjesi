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

}
?>