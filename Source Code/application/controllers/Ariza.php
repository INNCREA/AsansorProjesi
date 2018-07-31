<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ariza extends CI_Controller {

	public function index()
	{
		$id = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");

		$viewData = array(
			"sayfaAdi" => "Ariza",
			"id" => $id,
			"rol" => $rol
		);
		$this->load->model("ariza_model");
		$viewData["yeni_arizalar"] = $this->ariza_model->listNewFaults();
		$viewData["onarilan_arizalar"] = $this->ariza_model->listFixedFaults();
		$viewData["onarilmayan_arizalar"] = $this->ariza_model->listNFixedFaults();
		$this->load->view('arizalar',$viewData);
	}
	public function view($id = false)
	{
		if(!$id || !is_numeric($id)){
			redirect('ariza');
		}
		$uid = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");

		$viewData = array(
			"sayfaAdi" => "Ariza",
			"id" => $uid,
		);
		$this->load->model("ariza_model");
		$viewData["ariza"] = $this->ariza_model->getFault($id);
		if(!$viewData["ariza"]){
			redirect("ariza");
		}
		$items = [];
		$getStock = $this->ariza_model->getStock();
		if($getStock){
			foreach ($getStock as $item) {
				$items[] = ['id' => $item->stok_id, 'code' => $item->stok_kodu, 'name' => $item->stok_adi, 'price' => $item->stok_fiyat, 'munit' => $item->stok_paraBirimi, 'unit' => $item->stok_birim, 'amount' => $item->stok_miktar];
			}
		}
		$viewData['stok'] = $items;
		$this->load->view('ariza',$viewData);
	}
	public function create($lift_id = false)
	{
		$uid = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		if($rol == 3){
			redirect('asansorler?err=access');
		}
		$this->load->model('ariza_model');
		$viewData = array(
			"sayfaAdi" => "Ariza Ekle",
			"id" => $uid,
		);
		$this->load->model("ariza_model");
		$viewData["asansor"] = $this->ariza_model->listLifts();
		$this->load->view('ariza_ekle',$viewData);
	}
	public function take($id)
	{
		if(!$id || !is_numeric($id)){
			redirect('ariza?err=id');
		}
		$uid = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		if($rol <= 2){
			$this->load->model('ariza_model');
			$getFault = $this->ariza_model->getFault($id);
			if(!$getFault){
				// bulunamadı
				redirect("ariza?err=not_found");
				exit;
			}
			if($getFault->ariza_onaran != 0){
				// Ariza alınmıs
				redirect("ariza?err=fixed");
				exit;
			}
			$takeFault = $this->ariza_model->takeFault($id, $uid);
			if($takeFault){
				redirect("ariza/".$id);
			}else{
				redirect("ariza?err=not_access");
			}
		}
	}
	public function drop($id = false)
	{
		if(!$id || !is_numeric($id)){
			redirect('ariza?err=id');
		}
		$uid = $this->session->userdata("id");
		$rol = $this->session->userdata("rol");
		if($rol <= 2){
			$this->load->model('ariza_model');
			$getFault = $this->ariza_model->getFault($id);
			if(!$getFault){
				// bulunamadı
				redirect("ariza?err=not_found");
				exit;
			}
			if($getFault->ariza_durum == "Onarıldı"){
				// Ariza onarilmis
				redirect("ariza?err=fixed");
				exit;
			}
			if($rol == 1){
				$dropFault = $this->ariza_model->dropFault($id);
				if($dropFault){
					redirect("ariza");
				}else{
					redirect("ariza?err=not_access_2");
				}
			}else{
				if($getFault->ariza_onaran != $uid){
					redirect("ariza?err=not_access_user");
				}
				$dropFault = $this->ariza_model->dropFault($id);
				if($dropFault){
					redirect("ariza");
				}else{
					redirect("ariza?err=not_access_2");
				}
			}
		}
	}
	public function get_stock()
	{
		$this->load->model('ariza_model');
		$getStock = $this->ariza_model->getStock();
		$items = [];
		if($getStock){
			foreach ($getStock as $item) {
				$items[] = ['id' => $item->stok_id, 'code' => $item->stok_kodu, 'name' => $item->stok_adi, 'price' => $item->stok_fiyat, 'munit' => $item->stok_paraBirimi, 'unit' => $item->stok_birim, 'amount' => $item->stok_miktar];
			}
		}
		echo json_encode($items);
	}
	public function get_items($id = false)
	{
		if(!$fid || !is_numeric($fid)){
			$this->setResponse(400, false, "Fault ID not be null");
		}else{
			$getItem = $this->ariza_model->getItem($fid);
			if($getItem){
				$items = [];
				foreach ($getItem as $item) {
					$items[] = ['id' => $item->stok_id];
				}
				$this->setResponse(200, true, json_encode($getItem));
			}else{
				$this->setResponse(400, false, "not found");
			}
		}
	}
	public function add_stock($fid = false)
	{
		if(!$fid){
			$this->setResponse(400, false, "Fault ID not be null");
		}
		$this->load->model('ariza_model');
		$id = $this->input->post("id");
		$amount = $this->input->post("amount");
		if(!is_numeric($id)){
			$this->setResponse(400, false, "Stock ID Error");
		}else{
			$getItem = $this->ariza_model->getItem($id);
			if(!$getItem){
				$this->setResponse(400, false, "Stock ID Not Found");
			}else{
				$array = [
					"degisim_turu" => "Ariza",
					"degisim_kodu" => $fid,
					"degisim_stok" => $id,
					"degisim_tutar" => $getItem->stok_fiyat * $amount
				];
				$addItem = $this->ariza_model->addStock($array);
				if($addItem){
					$this->setResponse(200, true, "Stock Item Added");
				}else{
					$this->setResponse(400, false, "Stock Item Error");
				}
			}
		}
	}
	public function delete_stock()
	{
		$this->load->model('ariza_model');
		$id = $this->input->get("id");
		if(!is_numeric($id)){
			$this->setResponse(400, false, "Stock ID Error");
		}else{
			$deleteItem = $this->ariza_model->deleteStock($id);
			if(!$deleteItem){
				$this->setResponse(400, false, "Stock ID Could Delete");
			}else{
				$this->setResponse(200, true, "Stock Item Deleted");
			}
		}
	}
	public function setResponse($code, $status, $data)
	{
		echo $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(["status" => $status, "code" => $code, "data" => $data]))->_display();
        exit;
	}
}