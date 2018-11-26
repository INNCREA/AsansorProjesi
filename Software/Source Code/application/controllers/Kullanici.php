<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanici extends CI_Controller {

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

		$viewData = array(
			"sayfaAdi" => "Kullanıcı İşlemleri",
			"altSayfaAdi" => "Kullanıcı Listesi",
			"id" => $id
		);
		$data = "*";
		$this->load->model("kullanici_model");
		$result = $this->kullanici_model->kullaniciListesi($data);
		if($result){
			$viewData["kullanicilar"] = $result;
		}
		else{
			$viewData["kullanicilar"] ="";
		}
		$this->load->view("kullanici", $viewData);
	}

	public function ekle()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Kullanıcı İşlemleri",
			"altSayfaAdi" => "Kullanıcı Ekle",
			"id" => $id
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kullanici_tckn', 'T.C. Kimlik Numarası', 'trim|required');
		$this->form_validation->set_rules('kullanici_adSoyad', 'Ad Soyad', 'trim|required');
		$this->form_validation->set_rules('kullanici_tel', 'Telefon', 'trim|required');
		$this->form_validation->set_rules('kullanici_mail', 'E-posta', 'trim|required|valid_email');
		$this->form_validation->set_rules('kullanici_rol', 'Rol', 'trim|required');
		$this->form_validation->set_rules('kullanici_durum', 'Durum', 'trim|required');
		$this->form_validation->set_rules('kullanici_adres', 'Adres', 'trim|required');
		$this->form_validation->set_rules('kullanici_adi', 'Kullanıcı Adı', 'trim|required');
		$this->form_validation->set_rules('kullanici_sifre', 'Kullanıcı Şifre', 'trim|required');
		$this->form_validation->set_rules('sifre_tekrar', 'Şifre Tekrar', 'trim|required|matches[kullanici_sifre]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz.');
		$this->form_validation->set_message('valid_email', 'Lütfen geçerli bir e-posta adresi giriniz.');
		$this->form_validation->set_message('matches', 'Şifreler uyuşmuyor.');
		$this->load->model("kullanici_model");
		if($this->form_validation->run() != FALSE){
			$kullanici["kullanici_tckn"] = $this->input->post("kullanici_tckn");
			$kullanici["kullanici_adSoyad"] = $this->input->post("kullanici_adSoyad");
			$kullanici["kullanici_tel"] = $this->input->post("kullanici_tel");
			$kullanici["kullanici_mail"] = $this->input->post("kullanici_mail");
			$kullanici["kullanici_rol"] = $this->input->post("kullanici_rol");
			$kullanici["kullanici_durum"] = $this->input->post("kullanici_durum");
			$kullanici["kullanici_adres"] = $this->input->post("kullanici_adres");
			$kullanici["kullanici_adi"] = $this->input->post("kullanici_adi");
			$kullanici["kullanici_sifre"] = password_hash($this->input->post("kullanici_sifre"), PASSWORD_DEFAULT);
			$kullaniciEkle = $this->kullanici_model->kullaniciEkle($kullanici);
			if($kullaniciEkle){
				$this->load->library("eposta");
				$data["sifre"] = $this->input->post("kullanici_sifre");
				$data["musteri_adSoyad"] = $kullanici["kullanici_adSoyad"];
				$data["musteri_kAdi"] = $kullanici["kullanici_adi"];
				$data["musteri_mail"] = $kullanici["kullanici_mail"];
				$this->eposta->sendUserMail($data);
				$this->session->set_flashdata('islem', 'ekle');
				redirect("kullanici");
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		$this->load->view("kullanici_ekle", $viewData);
	}

	public function sil($id)
	{
		if(!$id || !is_numeric($id)){
			redirect("kullanici");
		}
		$this->load->model("kullanici_model");
		$kullaniciSil = $this->kullanici_model->kullaniciSil($id);
		
		if($kullaniciSil == TRUE)
		{
			$this->session->set_flashdata('islem', 'sil');
			redirect('kullanici');
		}
		else
		{
			$this->session->set_flashdata('islem', 'basarisiz');
		}
		redirect("kullanici");
	}

	public function kullaniciCek()
	{
		$id = $this->input->post('id');
		$this->load->model("kullanici_model");
		$result = $this->kullanici_model->kullaniciCek($id);
		echo json_encode($result);
	}

	public function guncelle()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Kullanıcı İşlemleri",
			"altSayfaAdi" => "Kullanıcı Listesi",
			"id" => $id
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kullanici_tckn', 'T.C. Kimlik Numarası', 'trim|required');
		$this->form_validation->set_rules('kullanici_adSoyad', 'Ad Soyad', 'trim|required');
		$this->form_validation->set_rules('kullanici_tel', 'Telefon', 'trim|required');
		$this->form_validation->set_rules('kullanici_mail', 'E-posta', 'trim|required|valid_email');
		$this->form_validation->set_rules('kullanici_rol', 'Rol', 'trim|required');
		$this->form_validation->set_rules('kullanici_durum', 'Durum', 'trim|required');
		$this->form_validation->set_rules('kullanici_adres', 'Adres', 'trim|required');
		$this->form_validation->set_rules('kullanici_adi', 'Kullanıcı Adı', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz.');
		$this->form_validation->set_message('valid_email', 'Lütfen geçerli bir e-posta adresi giriniz.');
		$this->load->model("kullanici_model");
		if($this->form_validation->run() != FALSE){
			$kullanici_id = $this->input->post("kullanici_id");
			$guncelle["kullanici_tckn"] = $this->input->post("kullanici_tckn");
			$guncelle["kullanici_adSoyad"] = $this->input->post("kullanici_adSoyad");
			$guncelle["kullanici_tel"] = $this->input->post("kullanici_tel");
			$guncelle["kullanici_mail"] = $this->input->post("kullanici_mail");
			$guncelle["kullanici_rol"] = $this->input->post("kullanici_rol");
			$guncelle["kullanici_durum"] = $this->input->post("kullanici_durum");
			$guncelle["kullanici_adres"] = $this->input->post("kullanici_adres");
			$guncelle["kullanici_adi"] = $this->input->post("kullanici_adi");
			$kullaniciGuncelle = $this->kullanici_model->kullaniciGuncelle($guncelle,$kullanici_id);
			if($kullaniciGuncelle){
				$this->session->set_flashdata('islem', "guncelle");
				redirect("kullanici");
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		redirect("kullanici");
	}
}