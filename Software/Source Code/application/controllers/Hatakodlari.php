<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hatakodlari extends CI_Controller {

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
			"sayfaAdi" => "Asansör İşlemleri",
			"altSayfaAdi" => "Hata Kodları",
			"id" => $id
		);
		$data = "*";
		$this->load->model("hata_model");
		$result = $this->hata_model->hataListesi($data);
		if($result){
			$viewData["hatakodlari"] = $result;
		}
		else{
			$viewData["hatakodlari"] ="";
		}
		$this->load->view("hatakodlari", $viewData);
	}

	public function ekle(){

		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Asansör İşlemleri",
			"altSayfaAdi" => "Hata Kodları",
			"id" => $id
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('hata_kodu', 'Hata Kodu', 'trim|required');
		$this->form_validation->set_rules('hata_aciklama', 'Hata Açıklama', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->load->model("hata_model");
		if($this->form_validation->run() != FALSE){
			$hataKodu["hata_kodu"] = $this->input->post("hata_kodu");
			$hataKodu["hata_aciklama"] = $this->input->post("hata_aciklama");
			$hataKoduEkle = $this->hata_model->hataEkle($hataKodu);
			if($hataKoduEkle){
				$this->session->set_flashdata('islem', 'ekle');
				redirect('hatakodlari');
			}else{
				$this->load->helper("alert");	
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		$data = "*";
		$result = $this->hata_model->hataListesi($data);
		if($result){
			$viewData["hatakodlari"] = $result;
			$this->load->view("hatakodlari", $viewData);
		}
	}
	public function sil($id)
	{
		if(!$id || !is_numeric($id)){
			redirect("hatakodlari");
		}
		$this->load->model("hata_model");
		$hatakoduSil = $this->hata_model->hatakoduSil($id);
		
		if($hatakoduSil == TRUE)
		{
			$this->session->set_flashdata('islem', 'sil');
			redirect('hatakodlari');
		}
		else
		{
			$this->session->set_flashdata('islem', 'basarisiz');
		}
		redirect("hatakodlari");
	}

	public function hatakoduCek()
	{
		$id = $this->input->post('id');
		$this->load->model("hata_model");
		$result = $this->hata_model->hatakoduCek($id);
		echo json_encode($result);
	}

	public function guncelle()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Asansör İşlemleri",
			"altSayfaAdi" => "Hata Kodları",
			"id" => $id
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hata_kodu', 'Hata Kodu', 'trim|required');
		$this->form_validation->set_rules('hata_aciklama', 'Hata Açıklaması', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz.');
		$this->load->model("hata_model");
		if($this->form_validation->run() != FALSE){
			$id = $this->input->post("hata_id");
			$data["hata_kodu"] = $this->input->post("hata_kodu");
			$data["hata_aciklama"] = $this->input->post("hata_aciklama");
			$guncelle = $this->hata_model->hatakoduGuncelle($data,$id);
			if($guncelle){
				$this->session->set_flashdata('islem', "guncelle");
				redirect("hatakodlari");
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		$data = "*";
		$result = $this->hata_model->hataListesi($data);
		if($result){
			$viewData["hatakodlari"] = $result;
			$this->load->view("hatakodlari", $viewData);
		}
	}
}