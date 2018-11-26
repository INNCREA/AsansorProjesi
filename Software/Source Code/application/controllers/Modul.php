<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {


	public function index()
	{
		redirect('giris');
	}

	public function ariza()
	{
		$key = "inncrea_inncrealift";
		$key = sha1($key);
		if($key == $this->input->post("key"))
		{
			$asansor_id = $this->input->post("asansor_id");
			$hata_kodu = $this->input->post("hata_kodu");
			$hata_kodu = $hata_kodu < 10 ? "Er0".$hata_kodu : "Er".$hata_kodu;
			$this->load->model("modul_controller");
			$getdata = $this->modul_controller->getLiftData($asansor_id);
			if(!$getdata){
				$this->session->sess_destroy();
				redirect('giris');
			}
			$data = [
				"ariza_asansor" => $asansor_id,
				"ariza_kodu" => $hata_kodu,
				"ariza_durum" => "Yeni",
				"ariza_tarih" => date("d.m.Y"),
				"ariza_onaran" => 0,
				"ariza_tutar" => 0,
				"ariza_icerik" => "-"
			];
			$addFault = $this->modul_controller->addFault($data);
			if($addFault){
				echo "Basarili";
				$this->arizaBildirim($getdata->asansor_adi, $addFault);
			}
		}
		unset($key);
		$this->session->sess_destroy();
		redirect('giris');
	}

	public function bakim()
	{
		$key = "inncrea_inncrealift";
		$key = sha1($key);
		if($key == $this->input->post("key"))
		{
			$asansor_id = $this->input->post("asansor_id");
			$bakim = $this->input->post("bakim");
			echo "Asansör kodu = ".$asansor_id." Bakım = ".$bakim;

			/*  Bakım işlemleri veritabanına kaydedildikten sonra kullanıcıya mail atılacak.  */
		}
		unset($key);
		$this->session->sess_destroy();
		redirect('giris');
	}




	public function arizaBildirim($asansor, $id)
	{
	    $content      = array(
	        "en" => $asansor.' asansöründe bir arıza oluştu.'
	    );
	    $hashes_array = array();
	    array_push($hashes_array, array(
	        "id" => "like-button",
	        "text" => "Arızaya Git",
	        "url" => "https://inncrealift.com/ariza/".$id,
	    ));
	    $fields = array(
	        'app_id' => "f8ae7f93-f4aa-472e-af92-618e8ca27791",
	        'included_segments' => array(
	            'All'
	        ),
	        'data' => array(
	            "foo" => "bar"
	        ),
	        'contents' => $content,
	        'web_buttons' => $hashes_array
	    );
	    $fields = json_encode($fields);
	    print("\nJSON sent:\n");
	    print($fields);
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Content-Type: application/json; charset=utf-8',
	        'Authorization: Basic ZmE3NTNkNzktYzliMC00ZDllLTg1ZjYtZWFhN2FkYWU3OTQx'
	    ));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    $response = curl_exec($ch);
	    curl_close($ch);
	}
}