<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->load->library('Pdf');
		$this->pdf->load_view('test');
		$this->pdf->render();
		$this->pdf->stream("test.pdf");
	}
}
