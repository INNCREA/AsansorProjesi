<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
	public function create($html,$filename)
	{
		$options = new Options();
		$options->set('defaultFont', 'dejavu sans');
		$options->set('isHtml5ParserEnabled', 'true');
		$options->set('isPhpEnabled', 'true');
		$options->set('isRemoteEnabled', 'true');
		$options->set('debugPng', 'true');
		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('a5', 'Landscape');
		$dompdf->render();
		$dompdf->stream($filename.'.pdf', array("Attachment"=>0));
		ob_end_clean();
		unset($html);
		unset($dompdf);
	}
}