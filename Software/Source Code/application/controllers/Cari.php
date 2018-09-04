<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

	public function index(){
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Cari İşlemleri",
			"id" => $id
		);
		$data = "*";
		$this->load->model("cari_model");
		$result = $this->cari_model->cariListesi($data);
		if($result){
			$viewData["cariler"] = $result;
		}
		else{
			$viewData["cariler"] ="";
		}
		$this->load->view("cariler", $viewData);
	}

	public function ekle(){
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Cari Ekle",
			"id" => $id
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cari_isim', 'Firma İsmi', 'trim|required');
		$this->form_validation->set_rules('cari_mail', 'Firma Mail', 'trim|required|valid_email|is_unique[cari.cari_mail]');
		$this->form_validation->set_rules('cari_telefon', 'Firma Telefon', 'trim|required');
		$this->form_validation->set_rules('cari_adres', 'Firma Adres', 'trim|required');
		$this->form_validation->set_rules('cari_yetkili', 'Firma Yetkilisi', 'trim|required');
		$this->form_validation->set_rules('cari_vergiDairesi', 'Firma Vergi Dairesi', 'trim|required');
		$this->form_validation->set_rules('cari_vergiNo', 'Firma Vergi Numarası', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->form_validation->set_message('valid_email', 'Lütfen geçerli bir e-posta giriniz.');
		$this->form_validation->set_message('is_unique', 'Bu e-posta ile kayıtlı bir firma bulunmaktadır.');
		$this->load->model("cari_model");
		if($this->form_validation->run() != FALSE){
			$cari["cari_isim"] = $this->input->post("cari_isim");
			$cari["cari_mail"] = $this->input->post("cari_mail");
			$cari["cari_telefon"] = $this->input->post("cari_telefon");
			$cari["cari_adres"] = $this->input->post("cari_adres");
			$cari["cari_yetkili"] = $this->input->post("cari_yetkili");
			$cari["cari_vergiDairesi"] = $this->input->post("cari_vergiDairesi");
			$cari["cari_vergiNo"] = $this->input->post("cari_vergiNo");
			$cariEkle = $this->cari_model->cariEkle($cari);
			if($cariEkle){
				$this->session->set_flashdata('islem', 'ekle');
				redirect("cari");
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		$this->load->view("cari_ekle", $viewData);
	}


	public function sil($id)
	{
		if(!$id || !is_numeric($id)){
			redirect("musteri");
		}
		$this->load->model("musteri_model");
		$musteriSil = $this->musteri_model->musteriSil($id);
		
		if($musteriSil == TRUE)
		{
			$this->session->set_flashdata('islem', 'sil');
			redirect('musteri');
		}
		else
		{
			$this->session->set_flashdata('islem', 'basarisiz');
		}
		redirect("musteri");
	}

	public function musteriCek()
	{
		$id = $this->input->post('id');
		$this->load->model("musteri_model");
		$result = $this->musteri_model->musteriCek($id);
		echo json_encode($result);
	}

	public function guncelle()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('musteri_adSoyad', 'Müşteri Adı Soyadı', 'trim|required');
		$this->form_validation->set_rules('musteri_mail', 'Müşteri Mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('cari_telefon', 'Müşteri Telefon', 'trim|required');
		$this->form_validation->set_rules('cari_adres', 'Müşteri Adres', 'trim|required');
		$this->form_validation->set_rules('cari_yetkili', 'Müşteri Kullanıcı Adı', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->form_validation->set_message('valid_email', 'Lütfen geçerli bir e-posta giriniz.');
		$this->load->model("musteri_model");
		if($this->form_validation->run() != FALSE)
		{
			$musteri_id = $this->input->post("musteri_id");
			$guncelle["musteri_adSoyad"] = $this->input->post("musteri_adSoyad");
			$guncelle["musteri_mail"] = $this->input->post("musteri_mail");
			$guncelle["cari_telefon"] = $this->input->post("cari_telefon");
			$guncelle["cari_adres"] = $this->input->post("cari_adres");
			$guncelle["cari_yetkili"] = $this->input->post("cari_yetkili");
			$musteriGuncelle = $this->musteri_model->musteriGuncelle($guncelle,$musteri_id);
			if($musteriGuncelle){
				$this->session->set_flashdata('islem', 'guncelle');
				redirect("musteri");
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		redirect('musteri');
	}

}
