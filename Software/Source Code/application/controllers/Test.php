<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->load->library('pdf');
		$filename = "Document_name";
		$html = $this->load->view('test');
		$this->pdf->create($html, $filename);
	}
}
