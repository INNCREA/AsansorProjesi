<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor extends CI_Controller {

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

	public function index($report = false)
	{
		$reports = [
			"asansor" => "Asansör",
			"musteri" => "Müşteri",
			"ariza" => "Arıza",
			"bakim" => "Bakım"
		];
		if(!array_key_exists($report, $reports)){
			redirect("panel");
		}
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Rapor İşlemleri",
			"raporAdi" => $reports[$report],
			"id" => $id
		); 
		$this->load->model("rapor_model");
		$reportData = $this->rapor_model->getReport($report);
		$reportTableData = null;
		if($report == "asansor"){
			$reportTableData = ["asansor_adi" => "Asansör Adı", "asansor_adres" => "Adres", "musteri_adSoyad" => "Yetkili", "asansor_bakimTarihi" => "Son Bakım Tarihi"];
		}else if($report == "musteri"){
			$reportTableData = ["musteri_adSoyad" => "Müşteri", "musteri_adres" => "Adres", "musteri_tel" => "Telefon", "musteri_mail" => "Mail"];
		}else if($report == "ariza"){
			$reportTableData = ["ariza_id" => "#", "ariza_kodu" => "Arıza Kod", "ariza_timestamp" => "Arıza Tarihi", "asansor_adi" => "Asansör Adı", "musteri_adSoyad" => "Asansör Yetkili", "ariza_durum" => "Arıza Durumu"];
		}else if($report == "bakim"){
			$reportTableData = ["bakim_id" => "#", "bakim_icerik" => "Bakım İçeriği", "bakim_durum" => "Bakım Durumu", "asansor_adi" => "Asansör Adı", "kullanici_adSoyad" => "Bakım Yapan Yetkili"];
		}
		$viewData["rapor"] = ["data" => $reportData, "table" => $reportTableData];
		$this->load->view('rapor',$viewData);
	}
}