<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hata extends CI_Controller {

	public function index()
	{
		$asansor_id = $this->input->get("asansor_id");
		$hatakodu = $this->input->get("hatakodu");
		$viewData = array(
			"hatakodu" => $hatakodu,
			"asansor_id" => $asansor_id
		);
		$this->load->view('hata',$viewData);
	}
}