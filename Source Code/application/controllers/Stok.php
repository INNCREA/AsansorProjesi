<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function index(){
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Stok İşlemleri",
			"id" => $id
		);
		$data = "*";
		$this->load->model("stok_model");
		$result = $this->stok_model->stokListesi($data);
		if($result){
			$viewData["stoklar"] = $result;
		}
		else{
			$viewData["stoklar"] ="";
		}
		$this->load->view("stok", $viewData);
	}

	public function ekle(){
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Stok Ekle",
			"id" => $id
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('stok_kodu', 'Stok Kodu', 'trim|required');
		$this->form_validation->set_rules('stok_adi', 'Stok Adı', 'trim|required');
		$this->form_validation->set_rules('stok_fiyat', 'Fiyat', 'trim|required');
		$this->form_validation->set_rules('stok_paraBirimi', 'Para Birimi', 'trim|required');
		$this->form_validation->set_rules('stok_birim', 'Birim', 'trim|required');
		$this->form_validation->set_rules('stok_miktar', 'Miktar', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->load->model('stok_model');

		if($this->form_validation->run() != FALSE)
		{
			$stok["stok_kodu"] = $this->input->post("stok_kodu");
			$stok["stok_adi"] = $this->input->post("stok_adi");
			$stok["stok_fiyat"] = $this->input->post("stok_fiyat");
			$stok["stok_paraBirimi"] = $this->input->post("stok_paraBirimi");
			$stok["stok_birim"] = $this->input->post("stok_birim");
			$stok["stok_miktar"] = $this->input->post("stok_miktar");
			$stokEkle = $this->stok_model->stokEkle($stok);
			if($stokEkle)
			{
				redirect('stok');
			}
			else
			{
				$this->load->helper("alert");
				$viewData["hata"] = setAlertDanger("Müşteri eklenemedi. Lütfen tekrar deneyin.");
			}
		}
		$this->load->view("stok_ekle", $viewData);
	}

	public function sil($id)
	{
		if(!$id || !is_numeric($id)){
			redirect("stok");
		}
		$this->load->model("stok_model");
		$stokSil = $this->stok_model->stokSil($id);
		
		if($stokSil == TRUE)
		{
			$this->session->set_flashdata('islem', 'sil');
			redirect('stok');
		}
		else
		{
			$this->session->set_flashdata('islem', 'basarisiz');
		}
		redirect("stok");
	}

	public function stokCek()
	{
		$id = $this->input->post('id');
		$this->load->model("stok_model");
		$result = $this->stok_model->stokCek($id);
		echo json_encode($result);
	}

	public function guncelle()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Stok Listesi",
			"id" => $id
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('stok_kodu', 'Stok Kodu', 'trim|required');
		$this->form_validation->set_rules('stok_adi', 'Stok Adı', 'trim|required');
		$this->form_validation->set_rules('stok_fiyat', 'Fiyat', 'trim|required');
		$this->form_validation->set_rules('stok_paraBirimi', 'Para Birimi', 'trim|required');
		$this->form_validation->set_rules('stok_birim', 'Birim', 'trim|required');
		$this->form_validation->set_rules('stok_miktar', 'Miktar', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->load->model('stok_model');
		if($this->form_validation->run() != FALSE)
		{
			$stok_id = $this->input->post("stok_id");
			$stok["stok_kodu"] = $this->input->post("stok_kodu");
			$stok["stok_adi"] = $this->input->post("stok_adi");
			$stok["stok_fiyat"] = $this->input->post("stok_fiyat");
			$stok["stok_paraBirimi"] = $this->input->post("stok_paraBirimi");
			$stok["stok_birim"] = $this->input->post("stok_birim");
			$stok["stok_miktar"] = $this->input->post("stok_miktar");
			$stokGuncelle = $this->stok_model->stokGuncelle($stok,$stok_id);
			if($stokGuncelle)
			{
				$this->session->set_flashdata('islem', "guncelle");
				redirect('stok');
			}
			else
			{
				$this->session->set_flashdata('islem', 'basarisiz');
			}
		}
		redirect('stok');
	}
}