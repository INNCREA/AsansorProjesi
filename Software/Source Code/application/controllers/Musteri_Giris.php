<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteri_Giris extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->Security();
	}

	function Security()
	{
		$m_control=$this->session->userdata('m_control');
		if(isset($m_control) && $m_control == true)
		{
			redirect('musteri-panel');
		}
	}

	public function index()
	{
		$this->load->view('musteri_giris');
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Şifre', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('username', 'Kullanıcı Adı', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_message('required','<div class="alert alert-danger">
			<strong>Hata !</strong><br>%s alanı boş bırakılamaz.
			</div>');
		$this->form_validation->set_message('max_length','<div class="alert alert-danger">
			<strong>Hata !</strong><br>%s alanı 12 karakterden fazla olamaz.
			</div>');
		$this->form_validation->set_message('min_length','<div class="alert alert-danger">
			<strong>Hata !</strong><br>%s alanı 5 karakterden az olamaz.
			</div>');

		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$rememberme = $this->input->post('rememberme');

			$remember_me = array(
				"username" => $username,
				"password" => $password
			);

			$this->load->helper('cookie');
			$this->load->model('Database');
			
			$data = "*";
			$result = $this->Database->M_access($username,$password,$data);

			if($result)
			{
				$this->session->set_userdata('m_control',true);
				$this->session->set_userdata('isim',$result->musteri_adSoyad);
				$this->session->set_userdata('mail',$result->musteri_mail);
				$this->session->set_userdata('id',$result->musteri_id);
				if($rememberme == "on")
				{
					set_cookie('remember_me', json_encode($remember_me), time() + 60 * 60 * 24 * 30);
				}
				else
				{
					delete_cookie('remember_me');
				}
				redirect('musteri-panel');
			}
			else
			{
				$this->session->set_flashdata('hata','<div class="alert alert-danger">
					<strong>Hata !</strong><br> Kullanıcı Adı veya Şifre yanlış.
					</div>');

				redirect('musteri-giris');
			}
		}
		else
		{
			$this->load->view('musteri_giris');
		}
	}
}