<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bakim extends CI_Controller {

	public function index()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$this->load->model("bakim_model");
		$bakim = $this->bakim_model->bakimCek(); 	
		$viewData = array(
			"sayfaAdi" => "Bakım İşlemleri",
			"id" => $id,
			"rol" => $rol,
			"bakimlar" => $bakim
		);
		$this->load->view('bakim', $viewData);
	}
	public function bakimYap($id)
	{
		$user_id = $this->session->userdata("id");
		$this->load->model("bakim_model");
		$asansor = $this->bakim_model->asansorCek($id);
		if((strtotime($asansor->asansor_bakimTarihi)-strtotime(date("d.m.Y")) < 0)){
			$periyod = $asansor->asansor_bakimPeriyod;
			$yeni_bakim_tarihi = strtotime('+'.$periyod.' day' , strtotime(date("d.m.Y")));
			$yeni_bakim_tarihi = date("d.m.Y" , $yeni_bakim_tarihi);
			$data["asansor_bakimTarihi"] = $yeni_bakim_tarihi;

			$bakim["bakim_icerik"] = "Bakım yapılmıştır.";
			$bakim["bakim_durum"] = "Yapıldı";
			$bakim["bakim_tarih"] = date("d.m.Y");
			$bakim["bakim_asansor"] = $asansor->asansor_id;
			$bakim["bakim_yapan"] = $user_id;

			$bakimEkle = $this->bakim_model->bakimEkle($bakim);
			$guncelle = $this->bakim_model->bakimGuncelle($data,$id);

			if($guncelle && $bakimEkle)
			{
				$this->session->set_flashdata('islem', 'bakim');
				redirect("asansor");
			}
			else
			{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
			redirect("asansor");
		}
		else
		{
			$this->session->set_flashdata('islem', 'zaman');
			redirect("asansor");
		}
	}
}
