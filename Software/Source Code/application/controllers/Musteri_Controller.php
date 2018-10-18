<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteri_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Security();
	}

	function Security()
	{
		$m_control=$this->session->userdata('m_control');
		if(!isset($m_control) || $m_control != true)
		{
			redirect('musteri-giris');
		}
	}

	public function index()
	{
		$id = $this->session->userdata("id");

		$viewData = array(
			"sayfaAdi" => "Ana Sayfa",
			"id" => $id,
		);

		$this->load->view('musteri_panel',$viewData);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("musteri-giris"));
	}


}