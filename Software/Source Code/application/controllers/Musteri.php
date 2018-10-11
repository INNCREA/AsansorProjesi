<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteri extends CI_Controller {

	public function index(){
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Müşteriler",
			"id" => $id
		);
		$data = "*";
		$this->load->model("musteri_model");
		$result = $this->musteri_model->musteriListesi($data);
		if($result){
			$viewData["musteriler"] = $result;
		}
		else{
			$viewData["musteriler"] ="";
		}
		$this->load->view("musteriler", $viewData);
	}

	public function ekle(){
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Müşteri Ekle",
			"id" => $id
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('musteri_adSoyad', 'Müşteri Adı Soyadı', 'trim|required');
		$this->form_validation->set_rules('musteri_mail', 'Müşteri Mail', 'trim|required|valid_email|is_unique[musteri.musteri_mail]');
		$this->form_validation->set_rules('musteri_tel', 'Müşteri Telefon', 'trim|required');
		$this->form_validation->set_rules('musteri_adres', 'Müşteri Adres', 'trim|required');
		$this->form_validation->set_rules('musteri_kAdi', 'Müşteri Kullanıcı Adı', 'trim|required');
		$this->form_validation->set_rules('musteri_sifre', 'Müşteri Şifre', 'trim|required');
		$this->form_validation->set_rules('sifre_tekrar', 'Şifre Tekrar', 'trim|required|matches[musteri_sifre]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->form_validation->set_message('valid_email', 'Lütfen geçerli bir e-posta giriniz.');
		$this->form_validation->set_message('is_unique', 'Bu e-posta ile kayıtlı bir müşteri bulunmaktadır.');
		$this->form_validation->set_message('matches', 'Şifreler uyuşmuyor.');
		$this->load->model("musteri_model");
		if($this->form_validation->run() != FALSE){
			$musteri["musteri_adSoyad"] = $this->input->post("musteri_adSoyad");
			$musteri["musteri_mail"] = $this->input->post("musteri_mail");
			$musteri["musteri_tel"] = $this->input->post("musteri_tel");
			$musteri["musteri_adres"] = $this->input->post("musteri_adres");
			$musteri["musteri_kAdi"] = $this->input->post("musteri_kAdi");
			$musteri["musteri_sifre"] = password_hash($this->input->post("musteri_sifre"), PASSWORD_DEFAULT);
			$musteriEkle = $this->musteri_model->musteriEkle($musteri);
			$cariEkle = $this->cariOlustur($musteri);
			if($musteriEkle && $cariEkle){
				$this->session->set_flashdata('islem', 'ekle');
				redirect("musteri");
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		$this->load->view("musteri_ekle", $viewData);
	}

	function cariOlustur($musteri)
	{
		$this->load->model('musteri_model');
		$result = $this->musteri_model->musteriIdCek();
		$musteri_id =  $result['0']->musteri_id;

		$this->load->model('cari_model');
		$cari["cari_isim"] = $musteri["musteri_adSoyad"];
		$cari["cari_adres"] = $musteri["musteri_adres"];
		$cari["cari_telefon"] = $musteri["musteri_tel"];
		$cari["cari_mail"] = $musteri["musteri_mail"];
		$cari["cari_yetkili"] = $musteri["musteri_adSoyad"];
		$cari["cari_musteri"] = $musteri_id;

		$cariEkle = $this->cari_model->cariEkle($cari);

		if($cariEkle)
		{
			return TRUE;
		}
		return FALSE;
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
		$this->form_validation->set_rules('musteri_tel', 'Müşteri Telefon', 'trim|required');
		$this->form_validation->set_rules('musteri_adres', 'Müşteri Adres', 'trim|required');
		$this->form_validation->set_rules('musteri_kAdi', 'Müşteri Kullanıcı Adı', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->form_validation->set_message('valid_email', 'Lütfen geçerli bir e-posta giriniz.');
		$this->load->model("musteri_model");
		if($this->form_validation->run() != FALSE)
		{
			$musteri_id = $this->input->post("musteri_id");
			$guncelle["musteri_adSoyad"] = $this->input->post("musteri_adSoyad");
			$guncelle["musteri_mail"] = $this->input->post("musteri_mail");
			$guncelle["musteri_tel"] = $this->input->post("musteri_tel");
			$guncelle["musteri_adres"] = $this->input->post("musteri_adres");
			$guncelle["musteri_kAdi"] = $this->input->post("musteri_kAdi");
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
