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
			redirect("cari");
		}
		$this->load->model("cari_model");
		$cariSil = $this->cari_model->cariSil($id);
		
		if($cariSil == TRUE)
		{
			$this->session->set_flashdata('islem', 'sil');
			redirect('cari');
		}
		else
		{
			$this->session->set_flashdata('islem', 'basarisiz');
		}
		redirect("cari");
	}

	public function cariCek()
	{
		$id = $this->input->post('id');
		$this->load->model("cari_model");
		$result = $this->cari_model->cariCek($id);
		echo json_encode($result);
	}

	public function guncelle()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cari_isim', 'Firma İsmi', 'trim|required');
		$this->form_validation->set_rules('cari_mail', 'Firma Mail', 'trim|required|valid_email');
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
		if($this->form_validation->run() != FALSE)
		{
			$cari_id = $this->input->post("cari_id");
			$cari["cari_isim"] = $this->input->post("cari_isim");
			$cari["cari_mail"] = $this->input->post("cari_mail");
			$cari["cari_telefon"] = $this->input->post("cari_telefon");
			$cari["cari_adres"] = $this->input->post("cari_adres");
			$cari["cari_yetkili"] = $this->input->post("cari_yetkili");
			$cari["cari_vergiDairesi"] = $this->input->post("cari_vergiDairesi");
			$cari["cari_vergiNo"] = $this->input->post("cari_vergiNo");
			$cariGuncelle = $this->cari_model->cariGuncelle($cari,$cari_id);
			if($cariGuncelle){
				$this->session->set_flashdata('islem', 'guncelle');
				redirect("cari");
			}else{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		redirect('cari');
	}

}
