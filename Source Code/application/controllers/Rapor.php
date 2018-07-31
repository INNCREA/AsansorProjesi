<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor extends CI_Controller {

	public function index($report = false)
	{
		$reports = [
			"asansor" => "Asansör",
			"musteri" => "Müşteri",
			"ariza" => "Ariza"
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
			$reportTableData = ["asansor_kodu" => "Asansör Kod", "asansor_adres" => "Adres", "musteri_adSoyad" => "Yetkili", "asansor_bakimTarihi" => "Son Bakım Tarihi"];
		}else if($report == "musteri"){
			$reportTableData = ["musteri_adSoyad" => "Müşteri", "musteri_adres" => "Adres", "musteri_tel" => "Telefon", "musteri_mail" => "Mail"];
		}else if($report == "ariza"){
			$reportTableData = ["ariza_id" => "#", "ariza_kodu" => "Ariza Kod", "ariza_timestamp" => "Ariza Tarihi", "asansor_kodu" => "Asansor Kodu", "musteri_adSoyad" => "Asansor Yetkili", "ariza_durum" => "Ariza Durumu"];
		}
		$viewData["rapor"] = ["data" => $reportData, "table" => $reportTableData];
		$this->load->view('rapor',$viewData);
	}
}