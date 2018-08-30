<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-17 01:27:56
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   tepeu
 * @Last Modified time: 2018-08-29 19:33:11
 */
class Asansor extends CI_Controller {
	/*
	Güvenlikleri unutma!!!!
	 */
	public function index()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Asansörler",
			"id" => $id
		);
		$this->load->model("asansor_model");
		$viewData["asansorler"] = $this->asansor_model->listLifts($id, $rol);
		$this->load->view("asansorler", $viewData);
	}
	public function add()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Asansör Ekle",
			"id" => $id
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('asansor_kod', 'Asansör Kodu', 'trim|required');
		$this->form_validation->set_rules('asansor_enlem', 'Asansör Enlem', 'trim|required');
		$this->form_validation->set_rules('asansor_boylam', 'Asansör Boylam', 'trim|required');
		$this->form_validation->set_rules('asansor_yetkili', 'Asansör Yetkili', 'trim|required');
		$this->form_validation->set_rules('asansor_adres', 'Asansör Adres', 'trim|required');
		$this->form_validation->set_rules('asansor_adresTarif', 'Asansör Adres Tarif', 'trim|required');
		$this->form_validation->set_rules('asansor_tarih', 'Asansör Yapım Tarihi', 'trim|required');
		$this->form_validation->set_rules('musteri_mail', 'Müşteri Mail', 'trim|required|valid_email|is_unique[musteri.musteri_mail]');
		$this->form_validation->set_rules('musteri_tel', 'Müşteri Telefon', 'trim|required');
		$this->form_validation->set_rules('musteri_kAdi', 'Müşteri Kullanıcı Adı', 'trim|required');
		$this->form_validation->set_rules('musteri_sifre', 'Müşteri Şifre', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->form_validation->set_message('valid_email', 'Lütfen geçerli bir e-posta giriniz.');
		$this->form_validation->set_message('is_unique', 'Bu e-posta ile kayıtlı bir müşteri bulunmaktadır.');
		$this->load->model("asansor_model");
		if($this->form_validation->run() != FALSE){
			/* Gelecek bakım tarihinin hesaplanması. */
			$bakim_periyodu = $this->input->post("bakim_periyodu");
			$bakim_tarihi = strtotime('+'.$bakim_periyodu.' day' , strtotime($this->input->post("asansor_tarih")));
			$bakim_tarihi = date('d.m.Y' , $bakim_tarihi);
			/* Hesaplama bitişi */
			$asansor["asansor_bakimTarihi"] = $bakim_tarihi;
			$asansor["asansor_kodu"] = $this->input->post("asansor_kod");
			$asansor["asansor_latitude"] = $this->input->post("asansor_enlem");
			$asansor["asansor_longitude"] = $this->input->post("asansor_boylam");
			$asansor["asansor_yetkili"] = $this->input->post("asansor_yetkili");
			$asansor["asansor_bakimPeriyod"] = $this->input->post("bakim_periyodu");
			$asansor["asansor_adres"] = $this->input->post("asansor_adres");
			$asansor["asansor_adresTarif"] = $this->input->post("asansor_adresTarif");
			$asansor["asansor_yapimTarihi"] = $this->input->post("asansor_tarih");
			$customer["musteri_adSoyad"] = $this->input->post("musteri_adSoyad");
			$customer["musteri_mail"] = $this->input->post("musteri_mail");
			$customer["musteri_tel"] = $this->input->post("musteri_tel");
			$customer["musteri_kAdi"] = $this->input->post("musteri_kAdi");
			$customer["musteri_sifre"] = password_hash($this->input->post("musteri_sifre"), PASSWORD_DEFAULT);
			$addLift = $this->asansor_model->addLift($asansor);
			$addCustomer = $this->asansor_model->addCustomer($customer);
			if($addLift && $addCustomer){
				$this->load->library("eposta");
				$customer["sifre"] = $this->input->post("musteri_sifre");
				$this->eposta->sendUserMail($customer);
				redirect("asansorler");
			}else{
				$this->load->helper("alert");
				$viewData["hata"] = setAlertDanger("Asansör veya müşteri eklenemedi. Lütfen tekrar deneyin.");
			}
		}

		$viewData["yetkililer"] = $this->asansor_model->listCustomers();
		$this->load->view("asansor_ekle", $viewData);
	}
	public function view($id = false)
	{
		if(!$id || !is_numeric($id)){
			redirect("asansorler");
		}
		$uid = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		$viewData = array(
			"sayfaAdi" => "Asansör Detay",
			"id" => $uid
		);
		$this->load->model("asansor_model");
		$viewData["asansor"] = $this->asansor_model->getLift($id);
		if(!$viewData["asansor"]){
			redirect("asansorler");
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('asansor_kod', 'Asansör Kodu', 'trim|required');
		$this->form_validation->set_rules('asansor_enlem', 'Asansör Enlem', 'trim|required');
		$this->form_validation->set_rules('asansor_boylam', 'Asansör Boylam', 'trim|required');
		$this->form_validation->set_rules('asansor_yetkili', 'Asansör Yetkili', 'trim|required');
		$this->form_validation->set_rules('asansor_adres', 'Asansör Adres', 'trim|required');
		$this->form_validation->set_rules('asansor_adresTarif', 'Asansör Adres Tarif', 'trim|required');
		$this->form_validation->set_rules('asansor_tarih', 'Asansör Yapım Tarihi', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
		$this->load->model("asansor_model");
		if($this->form_validation->run() != FALSE){
			$asansor["asansor_kodu"] = $this->input->post("asansor_kod");
			$asansor["asansor_latitude"] = $this->input->post("asansor_enlem");
			$asansor["asansor_longitude"] = $this->input->post("asansor_boylam");
			$asansor["asansor_yetkili"] = $this->input->post("asansor_yetkili");
			$asansor["asansor_adres"] = $this->input->post("asansor_adres");
			$asansor["asansor_adresTarif"] = $this->input->post("asansor_adresTarif");
			$asansor["asansor_yapimTarihi"] = $this->input->post("asansor_tarih");
			$addLift = $this->asansor_model->editLift($id, $asansor);
			if($addLift){
				redirect("asansor/".$id);
			}else{
				$this->load->helper("alert");
				$viewData["hata"] = setAlertDanger("Asansör eklenemedi. Lütfen tekrar deneyin.");
			}
		}
		$viewData["asansor_ariza"] = $this->asansor_model->listFault($id);
		$viewData["asansor_bakim"] = $this->asansor_model->listMaint($id);
		$viewData["yetkililer"] = $this->asansor_model->listCustomers();
		$this->load->view("asansor", $viewData);
	}
	public function delete($id = false)
	{
		if(!$id || !is_numeric($id)){
			redirect("asansorler");
		}
		$this->load->model("asansor_model");
		$this->load->helper("alert");
		$deleteLift = $this->asansor_model->deleteLift($id);
		if($deleteLift){
			$this->session->set_flashdata('durum', setAlertSuccess("Asansör başarıyla silindi!"));
		}else{
			$this->session->set_flashdata('durum', setAlertDanger("Asansör silinemedi!"));
		}
		redirect("asansorler");
	}
}

/* End of file Asansor.php */
/* Location: ./application/controllers/Asansor.php */