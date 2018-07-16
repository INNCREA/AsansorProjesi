<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends CI_Controller {
	
	public function index()
	{
		$this->load->view('anasayfa');
	}

	public function test()
	{
		$this->load->library('encryption');
		$key = bin2hex($this->encryption->create_key(16));
		echo $key;
	}
}
