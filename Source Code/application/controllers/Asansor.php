<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-17 01:27:56
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-07-22 23:27:55
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
		$viewData["asansorler"] = $this->asansor_model->listLifts($rol);
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
			$addLift = $this->asansor_model->addLift($asansor);
			if($addLift){
				redirect("asansorler");
			}else{
				$this->load->helper("alert");
				$viewData["hata"] = setAlertDanger("Asansör eklenemedi. Lütfen tekrar deneyin.");
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