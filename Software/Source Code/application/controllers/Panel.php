<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Security();
	}

	function Security()
	{
		$control=$this->session->userdata('control');
		if(!isset($control) || $control != true)
		{
			redirect('giris');
		}
	}

	public function index()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$this->load->model("panel_model");

		$gunlukAriza=$this->panel_model->gunlukAriza();

		$toplamAriza = $this->panel_model->toplamAriza();
		$toplamBakim = $this->panel_model->toplamBakim();
		$toplamAsansor = $this->panel_model->toplamAsansor();
		$toplamCari = $this->panel_model->toplamCari();

		$viewData = array(
			"sayfaAdi" => "Ana Sayfa",
			"altSayfaAdi" => "",
			"id" => $id,
			"arizalar" => $gunlukAriza,
			"toplamAriza" => $toplamAriza,
			"toplamBakim" => $toplamBakim,
			"toplamAsansor" => $toplamAsansor,
			"toplamCari" => $toplamCari

		);

		$this->load->view('panel',$viewData);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("anasayfa"));
	}


}