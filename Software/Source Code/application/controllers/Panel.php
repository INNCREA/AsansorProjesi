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
        
		$viewData = array(
			"sayfaAdi" => "Ana Sayfa",
			"id" => $id,
			"arizalar" => $gunlukAriza

		);

		$this->load->view('panel',$viewData);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("giris"));
	}


}