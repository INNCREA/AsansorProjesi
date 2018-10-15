<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

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
		if($result)
		{
			$viewData["cariler"] = $result;
		}
		else
		{
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
		$this->form_validation->set_rules('cari_isim', 'Firma İsmi', 'required');
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
			$cari["cari_musteri"] = 0;
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
		redirect("cari");
	}

	public function tahsilat()
	{
		if($this->input->post("tahsilat_radio") == "on")
		{
		if($this->input->post("tahsilat_tutar") != null /*&& $this->input->post("tahsilat_tutar") != 0 */)
		{
			$kullanici = $this->session->userdata('isim');
			$cari_id = $this->input->post("tahsilat_id");
			$tahsilat_tutar = $this->input->post("tahsilat_tutar");

			/* Gelen string ifadenin decimal değere dönüştürülme işlemi */

			$tahsilat_tutar = trim($tahsilat_tutar,'₺');
			$tahsilat_tutar = trim($tahsilat_tutar,' ');
			$tahsilat_tutar = str_replace(".","",$tahsilat_tutar);
			$tahsilat_tutar = str_replace(",",".",$tahsilat_tutar);
			$tahsilat_tutar = floatval($tahsilat_tutar);

			/* Dönüştürme işlemi bitişi */

			$this->load->model("cari_model");
			$cari = $this->cari_model->cariCek($cari_id);

			/* Tahsilat tutarının ana bakiyeden düşülmesi */

			$kalan_bakiye = ($cari['0']->cari_bakiye) - $tahsilat_tutar;
			$veri["cari_bakiye"] = $kalan_bakiye;
			$tahsilat = $this->cari_model->tahsilat($veri,$cari_id);

			/* Tahsilat tutarının ana bakiyeden düşülmesi sonu */

			if($tahsilat)
			{
				/** Yapılan tahsilat işleminin veritabanına kaydedilmesi */
				$tarih =  date("d.m.Y");
				$tahsilat_kayit["tahsilat_tarih"] = $tarih;
				$tahsilat_kayit["tahsilat_turu"] = "Nakit";
				$tahsilat_kayit["tahsilat_tutar"] = $tahsilat_tutar;
				$tahsilat_kayit["tahsilat_cari"] = $cari_id;
				$tahsilat_kayit["tahsilat_tahsilEden"] = $kullanici;

				$this->load->model('cari_model');
				$tahsialtEkle = $this->cari_model->tahsilatEkle($tahsilat_kayit);




				$this->session->set_flashdata('islem', 'tahsilat');

				/* Tahsilat makbuzu işlemleri burada gerçekletirilecek. */

				$this->load->model('cari_model');
				$makbuzNo = $this->cari_model->tahsilatId();
				$makbuz_no = $makbuzNo["0"]->tahsilat_id + 1;
				$viewData = array(
					"cari" => $cari['0']->cari_isim,
					"tutar" => $tahsilat_tutar,
					"tahsilat_turu" => "Nakit",
					"makbuz_no" => $makbuz_no,
					"kullanici" => $kullanici
				);

				$this->load->view('tahsilat',$viewData);
				$html = $this->output->get_output();
				$this->load->library('pdf');
				$filename = date("d.m.Y H:i:s")."_".$makbuz_no;
				$this->pdf->create($html, $filename);
			}

		}
		else
		{
			$this->session->set_flashdata('islem', 'bos');
		}
	}
	else
	{
		$this->session->set_flashdata('islem', 'bos');
	}
	redirect("cari");

}


public function detay($cid = false)
{
	if(!$cid || !is_numeric($cid)){
		redirect("cari");
	}
	$this->load->model('cari_model');
	$cari = $this->cari_model->cariCek($cid);

	$id = $this->session->userdata("id");
	$rol = $this->session->userdata("rol");
	$viewData = array(
		"sayfaAdi" => "Cari İşlemleri",
		"id" => $id,
		"cari" => $cari['0']
	);

	$this->load->view("cari", $viewData);
}

}