<?php 

/* Author : Atahan DUMAN */

class Hatakodu_model extends CI_Model
{
	function ekle($array)
	{
		$result = $this->db->insert("test", $array);

		if($result)
		{
			return TRUE;
		}
		return FALSE;
	}
}
?>