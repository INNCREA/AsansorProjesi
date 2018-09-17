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
		$bakimTarih = explode(".", $asansor->asansor_bakimTarihi);

		if($bakimTarih[1]-date("m") < 0 && $bakimTarih[2]-date("Y") <= 0){

			$data["asansor_bakimTarihi"] = date("d.m.Y");
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

	public function detay($id)
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
		$this->load->view('bakim_detay', $viewData);
	}
}
