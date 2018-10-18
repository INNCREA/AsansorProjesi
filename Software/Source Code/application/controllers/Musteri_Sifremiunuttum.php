<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteri_Sifremiunuttum extends CI_Controller {

	public function index()
	{
		$this->load->view('musteri_sifremiunuttum');
	}
	public function reset($code = false)
	{
		$data["x"] = false;
		if(!$code){
			redirect();
		}
		$this->load->model("musteri_sifremiunuttum_model");
		$this->load->helper("alert");
		$getCode = $this->musteri_sifremiunuttum_model->checkResetCode($code);
		if($getCode){
			if(time() <= $getCode->sifrem_time){
				$this->load->library('form_validation');
				$this->form_validation->set_rules('password', 'Şifre', 'trim|required');
				$this->form_validation->set_rules('repassword', 'Şifre Tekrar', 'trim|required|matches[password]');
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
				$this->form_validation->set_message('matches', 'Şifreler aynı olmalıdır.');
				$this->form_validation->set_message('required', '%s alanı boş bırakılamaz');
				if($this->form_validation->run() != FALSE){
					$password = $this->input->post("password");
					$password = password_hash($password, PASSWORD_DEFAULT);
					$changePassword = $this->musteri_sifremiunuttum_model->changePassword($getCode->sifrem_kullanici_id, $password);
					if($changePassword){
						$data["durum"] = setAlertSuccess("Şifreniz sıfırlandı. Yeni şifreniz ile giriş yapabilirsiniz.");
					}else{
						$data["durum"] = setAlertDanger("Şifreniz sıfırlanamadı!");
					}
					$this->musteri_sifremiunuttum_model->changeResetStatus($getCode->sifrem_id);
				}
			}else{
				$data["durum"] = setAlertDanger("Kodun süresi dolmuş");
			}
		}else{
			$data["durum"] = setAlertDanger("Kod geçerli değil");
		}
		$this->load->view("sifresifirla", $data);
	}
	public function mailkontrol()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'E-posta', 'trim|required|valid_email');
		$this->form_validation->set_message('required','<div class="alert alert-danger">
			<strong>Hata !</strong><br>%s alanı boş bırakılamaz.
			</div>');
		$this->form_validation->set_message('valid_email','<div class="alert alert-danger">
			<strong>Hata !</strong><br>Geçerli bir %s giriniz.
			</div>');


		if($this->form_validation->run()){
			$email = $this->input->post("email");
			$this->load->model("musteri_sifremiunuttum_model");
			$this->load->helper("alert");
			$getEmail = $this->musteri_sifremiunuttum_model->checkEmail($email);
			if($getEmail){
				$this->load->helper('string');
				$hash = random_string('alnum', 16);
				$passData = [
					"sifrem_kullanici_id" => $getEmail->musteri_id,
					"sifrem_kullanici_email" => $getEmail->musteri_mail,
					"sifrem_hash" => $hash,
					"sifrem_time" => time()+20*60,
					"sifrem_durum" => 1,
					"sifrem_ip" => $this->input->ip_address(),
				];
				$this->load->library("eposta");
				$sendMail = $this->eposta->passwordReset($getEmail->musteri_adSoyad, $hash, $getEmail->musteri_mail, "customer");
				if($sendMail){
					$addReset = $this->musteri_sifremiunuttum_model->addResetPass($passData);
					if($addReset){
						$this->session->set_flashdata('hata', setAlertSuccess("Sistemde kayıtlı e-postanız varsa bilgiler gönderilmiştir. Lütfen posta kutunuzu kontrol ediniz. (3)"));
					}else{
						$this->session->set_flashdata('hata', setAlertDanger("Sistemde kayıtlı e-postanız varsa bilgiler gönderilmiştir. Lütfen posta kutunuzu kontrol ediniz. (4)"));
					}
				}else{
					$this->session->set_flashdata('hata', setAlertDanger("E-posta gönderilemedi. Lütfen tekrar deneyin..."));
				}
			}else{
				$this->session->set_flashdata('hata', setAlertSuccess("Sistemde kayıtlı e-postanız varsa bilgiler gönderilmiştir. Lütfen posta kutunuzu kontrol ediniz. (2)"));
			}
			redirect('musteri-sifremi-unuttum');
		}
		else
		{
			redirect('musteri-sifremi-unuttum');
		}

	}
}
