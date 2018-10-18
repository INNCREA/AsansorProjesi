<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteri_Panel extends CI_Controller {

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
		$this->load->model('ariza_model');
		$viewData["asansor"] = $this->ariza_model->listLiftsId($id);
		$viewData["kodlar"] = $this->ariza_model->listErrorCodes();
		$viewData["id"] = $id;
		$viewData["sayfaAdi"] = "Ana Sayfa";

		$this->load->view('musteri_panel',$viewData);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("anasayfa"));
	}

	public function bilgiAl()
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
				redirect("musteri-panel");
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		redirect('musteri-panel');
	}

	public function bakim()
	{
		$id = $this->session->userdata("id");
		$this->load->model("bakim_model");
		$asansorler = $this->bakim_model->asansorCekId($id);
		$bakimlar = [];

		foreach ($asansorler as $asansor)
		{
			$a = $this->bakim_model->bakimCekId($asansor->asansor_id);
			if($a != null)
			{
				array_push($bakimlar,$a);
			}
		}
		$viewData["bakimlar"] = $bakimlar;
		$viewData["id"] = $id;
		$viewData["sayfaAdi"] = "Ana Sayfa";
		$this->load->view('musteri_bakim',$viewData);
		
	}

	public function detay()
	{

	}

	public function arizaBildir()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ariza_kodu', 'Ariza Kodu', 'trim|required');
		$this->form_validation->set_rules('asansor_id', 'Asansor', 'trim|required');
		$this->form_validation->set_rules('asansor_aciklama', 'Asansor Aciklama', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '{field} alanı boş bırakılamaz');
		if($this->form_validation->run() != FALSE){
			$data["ariza_kodu"] = $this->input->post("ariza_kodu");
			$data["ariza_asansor"] = $this->input->post("asansor_id");
			$data["ariza_icerik"] = $this->input->post("asansor_aciklama");
			$data["ariza_durum"] = "Yeni";
			$data["ariza_tarih"] = date("d.m.Y");
			$data["ariza_onaran"] = 0;
			$data["ariza_tutar"] = 0;
			$addFault = $this->ariza_model->addFault($data);
			if($addFault){
				$this->session->set_flashdata('islem', 'ekle');
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		$viewData["asansor"] = $this->ariza_model->listLifts();
		$viewData["kodlar"] = $this->ariza_model->listErrorCodes();
		$viewData["sid"] = $lift_id;
		$this->load->view('ariza_ekle',$viewData);
	}

}