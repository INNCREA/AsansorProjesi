<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sifremiunuttum extends CI_Controller {

	public function index()
	{
		$this->load->view('sifremiunuttum');
	}
	public function reset($code = false)
	{
		$data["x"] = false;
		if(!$code){
			redirect();
		}
		$this->load->model("sifremiunuttum_model");
		$this->load->helper("alert");
		$getCode = $this->sifremiunuttum_model->checkResetCode($code);
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
					$changePassword = $this->sifremiunuttum_model->changePassword($getCode->sifrem_kullanici_id, $password);
					if($changePassword){
						$data["durum"] = setAlertSuccess("Şifreniz sıfırlandı. Yeni şifreniz ile giriş yapabilirsiniz.");
					}else{
						$data["durum"] = setAlertDanger("Şifreniz sıfırlanamadı!");
					}
					$this->sifremiunuttum_model->changeResetStatus($getCode->sifrem_id);
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


		if($this->form_validation->run())
		{
			$email = $this->input->post("email");
			$this->load->model("sifremiunuttum_model");
			$this->load->helper("alert");
			$getEmail = $this->sifremiunuttum_model->checkEmail($email);
			if($getEmail){
				$this->load->helper('string');
				$hash = random_string('alnum', 16);
				$passData = [
					"sifrem_kullanici_id" => $getEmail->kullanici_id,
					"sifrem_kullanici_email" => $getEmail->kullanici_mail,
					"sifrem_hash" => $hash,
					"sifrem_time" => time()+20*60,
					"sifrem_durum" => 1,
					"sifrem_ip" => $this->input->ip_address(),
				];
				$this->load->library("eposta");
				$sendMail = $this->eposta->passwordReset($getEmail->kullanici_adi, $hash, $getEmail->kullanici_mail);
				if($sendMail){
					$addReset = $this->sifremiunuttum_model->addResetPass($passData);
					if($addReset){
						$this->session->set_flashdata('hata', setAlertSuccess("Sistemlerimizde e-posta adresi varsa şifre sıfırlama bilgilerini gönderdik..."));
					}else{
						$this->session->set_flashdata('hata', setAlertDanger("Sistemlerimizde e-posta adresi varsa şifre sıfırlama bilgilerini gönderdik... "));
					}
				}else{
					$this->session->set_flashdata('hata', setAlertDanger("E-posta gönderilemedi. Lütfen tekrar deneyin..."));
				}
			}else{
				$this->session->set_flashdata('hata', setAlertSuccess("Sistemlerimizde e-posta adresi varsa şifre sıfırlama bilgilerini gönderdik..."));
			}
			redirect('sifremi-unuttum');
		}
		else
		{
			redirect('sifremi-unuttum');
		}

	}
}
