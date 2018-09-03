<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->load->view('test');
		$html = $this->output->get_output();

		$this->load->library('pdf');
		$filename = "Document_name";
		$this->pdf->create($html, $filename);
	}
}
