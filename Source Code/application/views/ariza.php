<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-23 14:08:20
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-07-30 14:13:20
 */
$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Ariza Detay</h2>
		</div>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							ARIZA DETAY
						</h2>
					</div>
					<div class="body">
						<div class="row">
							<table class="pull-left col-md-6 col-xs-12 col-sm-12 m-l-15">
								<tbody>
									<tr>
										<td><strong>Asansor Kodu</strong></td>
										<td><?=$ariza->asansor_kodu?></td>
									</tr>
									<tr>
										<td><strong>Ariza Kodu</strong></td>
										<td><?=$ariza->ariza_kodu?></td>
									</tr>
									<tr>
										<td><strong>Ariza Hata Aciklama</strong></td>
										<td><?=$ariza->hata_aciklama ? $ariza->hata_aciklama : "Hatanin aciklamasi bulunamadi"?></td>
									</tr>
									<tr>
										<td><strong>Asansor Adres</strong></td>
										<td><?=$ariza->asansor_adres?></td>
									</tr>
									<tr>
										<td><strong>Asansor Yetkili</strong></td>
										<td><?=$ariza->musteri_adSoyad?></td>
									</tr>
									<tr>
										<td><strong>Asansor Yetkili Telefon</strong></td>
										<td><?=$ariza->musteri_tel?></td>
									</tr>
									<tr>
										<td><strong>Asansor Son Ariza Tarihi</strong></td>
										<td><?=$ariza->asansor_arizaTarihi?></td>
									</tr>
									<tr>
										<td><strong>Ariza Durum</strong></td>
										<td><?php
										$ad = $ariza->ariza_durum;
										if($ad == "Yeni"){
											echo '<span class="badge bg-yellow">'.$ad.'</span>';
										}else if($ad == "Onarıldı"){
											echo '<span class="badge bg-green">'.$ad.'</span>';
										}else{
											echo '<span class="badge bg-red">'.$ad.'</span>';
										}
										?></td>
									</tr>
									<?php if($ad == "Onarıldı"){ ?>
										<tr>
											<td><strong>Arizayi Onaran</strong></td>
											<td><?=$ariza->kullanici_adSoyad?></td>
										</tr>
										<tr>
											<td><strong>Ariza Tutar</strong></td>
											<td><?=$ariza->ariza_tutar?> TL</td>
										</tr>
									<?php } ?>
									<tr>
										<td><strong>Ariza Not</strong></td>
										<td><?=$ariza->ariza_icerik?></td>
									</tr>
								</tbody>
							</table>
							<div class="col-md-12">
								<a href="https://www.google.com/maps/search/?api=1&query=<?=$ariza->asansor_latitude?>,<?=$ariza->asansor_longitude?>" class="btn bg-yellow waves-effect">Yol Tarifi Al</a>
								<button type="button" class="btn bg-green waves-effect arizaGuncelle" data-url="<?=base_url("ariza/get_stock")?>" data-toggle="modal" data-target="#guncelle">
									<i class="material-icons">create</i>
									<span>Guncelle</span>
								</button>
								<div class="modal fade" id="guncelle" tabindex="-1" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="defaultModalLabel">Ariza Guncelle</h4>
											</div>
											<div class="modal-body">
												<form action="" method="POST" onsubmit="return false;">
													<div class="form-group form-float">
														<div id="hata"></div>
														<input type="hidden" value="<?=$ariza->ariza_id?>"name="ariza_id" class="form-control">
														<input type="hidden" name="stock_list" value="">
													</div>
													<div class="form-group form-float">
														<div class="form-line focused">
															<input type="text" name="ariza_aciklama" class="form-control" value="<?=$ariza->ariza_icerik?>">
															<label class="form-label">Ariza Aciklama</label>
														</div>
													</div>
													<div class="form-group form-float">
														<div class="form-line">
															<input type="text" name="ariza_tutar" class="form-control">
															<label class="form-label">Ariza Tutar</label>
														</div>
													</div>
													<div class="form-group form-float">
														<div class="form-line">
															<select class="form-control show-tick" tabindex="-98" name="ariza_durum">
																<option value="Onarıldı" <?=$ariza->ariza_durum == 'Onarıldı' ? 'selected' : NULL?>>Onarıldı</option>
																<option value="Onarılmadı" <?=$ariza->ariza_durum == 'Onarılmadı' ? 'selected' : NULL?>>Onarılmadı</option>
															</select>
														</div>
													</div>
													<div id="app">
														<div class="form-group form-float">
															<div class="col-xs-5">
																<select class="form-control show-tick" tabindex="-98" name="select" id="products" v-model="selected_item">
																	<option disabled="">URUN SECINIZ</option>
																	<?php
																	if($stok){
																		$i = 0;
																		foreach ($stok as $a) {
																			echo '<option value="'.$i.'">'.$a['name'].'</option>';
																			$i++;
																		}
																	}
																	?>
																</select>
															</div>
															<div class="col-xs-5">
																<input type="number" name="miktar" v-model="selected_amount" class="form-control" placeholder="Miktar">
															</div>
															<div class="col-xs-2">
																<button type="button" class="btn btn-success waves-effect" v-on:click="addStock()">Ekle</button>
															</div>
														</div>
														<table class="table table-bordered table-striped table-hover">
															<thead>
																<tr>
																	<th>Adi</th>
																	<th>Miktar</th>
																	<th>Adet Fiyat</th>
																	<th>Toplam Fiyat</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<tr v-for="(y, index) in stock">
																	<td>{{ app.items[y.id].name }}</td>
																	<td>{{ y.amount }}</td>
																	<td>{{ app.items[y.id].price + " " + app.items[y.id].munit }} / {{ app.items[y.id].unit }}</td>
																	<td>{{ y.amount * app.items[y.id].price + " " + app.items[y.id].munit }}</td>
																	<td><button class="btn bg-red" type="button" v-on:click="deleteStock(index)">Kaldir</button></td>
																</tr>
															</tbody>
														</table>
													</div>
													<script type="text/javascript">
														var app = new Vue({
															el: '#app',
															data: {
																items: [],
																selected_item: 0,
																selected_amount: 0,
																stock: [],
															},
															methods: {
																addStock: function() {
																	this.stock.push({id: this.selected_item, amount: this.selected_amount});
																	this.selected_item = 0;
																	this.selected_amount = 0;
																	//$("#products").change();
																},
																deleteStock: function(index) {
																	this.stock.splice(index, 1);
																}
															},
														});
														$.ajax({
															dataType: "json",
															type: "POST",
															url: "<?=base_url("ajax/get-stock")?>",
															data: {e: 123},
															success: function(data){
																app.items = data;
															}
														});
													</script>
													<div class="modal-footer">
														<button type="submit" class="btn btn-success waves-effect">GÜNCELLE</button>
														<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" >VAZGEÇ</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 m-t-10">
								<div id="map" class="col-md-12" style="height: 500px"></div>
								<script>
									var map;
									function initMap() {
										map = new google.maps.Map(document.getElementById('map'), {
											center: {lat: <?=$ariza->asansor_latitude?>, lng: <?=$ariza->asansor_longitude?>},
											zoom: 17
										});
										var marker = new google.maps.Marker({position: {lat: <?=$ariza->asansor_latitude?>, lng: <?=$ariza->asansor_longitude?>}, map: map});
									}
								</script>
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPDu26gru2gaLxlJFaFfBaOsa3EHggnGY&callback=initMap" async defer></script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('include/footer'); ?>