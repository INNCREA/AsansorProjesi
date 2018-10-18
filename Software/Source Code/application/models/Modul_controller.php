<?php

/**
 * @Author: tepeumut
 * @Date:   2018-10-18 02:56:08
 * @Last Modified by:   tepeumut
 * @Last Modified time: 2018-10-18 03:07:29
 * @Email: tepeumut1@gmail.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_controller extends CI_Model {

	public function addFault($array)
	{
		return $this->db->insert("ariza", $array) ? $this->db->insert_id() : FALSE;
	}
	public function getLiftData($id)
	{
		$this->db->where("asansor_id", $id);
		$this->db->limit(1);
		$r = $this->db->get("asansor")->row();
		if($r){
			return $r;
		}
		return FALSE;
	}

}

/* End of file Modul_controller.php */
/* Location: ./application/models/Modul_controller.php */