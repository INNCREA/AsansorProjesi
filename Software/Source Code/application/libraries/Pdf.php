<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf
{
	public function create($html,$filename)
	{
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->render();
		$dompdf->stream($filename.'.pdf');
	}
}