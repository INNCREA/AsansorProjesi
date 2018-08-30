<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hata extends CI_Controller {

	public function index()
	{
		$asansor_id = $this->input->get_post("asansor_id");
		$hatakodu = $this->input->get_post("hatakodu");

		$this->load->model("hatakodu_model");

		$array = array(
			"asansor_id" => $asansor_id,
			"hata_kodu" => $hatakodu
		);

		$result = $this->hatakodu_model->ekle($array);

		$viewData = array(
			"hatakodu" => $hatakodu,
			"asansor_id" => $asansor_id
		);

		$this->load->view('hata',$viewData);
	}
}