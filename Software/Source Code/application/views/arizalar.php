<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-23 14:08:20
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   tepeu
 * @Last Modified time: 2018-08-28 20:57:00
 */
$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2><b>Arıza Listesi</b></h2>
		</div>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="body">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#home_with_icon_title" data-toggle="tab" aria-expanded="false">
									<i class="material-icons">notifications_active</i> YENİ ARIZALAR
								</a>
							</li>
							<li role="presentation" class="">
								<a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
									<i class="material-icons">highlight_off</i> ONARILMAYAN ARIZALAR
								</a>
							</li>
							<li role="presentation" class="">
								<a href="#messages_with_icon_title" data-toggle="tab" aria-expanded="false">
									<i class="material-icons">offline_pin</i> ONARILAN ARIZALAR
								</a>
							</li>
							<li role="presentation" class="">
								<a href="<?=base_url("ariza-olustur")?>">
									<i class="material-icons">add_box</i> ARIZA EKLE
								</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade  active in" id="home_with_icon_title">
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover temel-tablo dataTable">
										<thead>
											<tr>
												<th>Ariza Kod</th>
												<th>Ariza Tarihi</th>
												<th>Asansor Adı</th>
												<th>Asansor Yetkili</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											if($yeni_arizalar){
												foreach ($yeni_arizalar as $ariza) {
													?>
													<tr>
														<td><?=$ariza->ariza_kodu?></td>
														<td><?=$ariza->ariza_timestamp?></td>
														<td><?=$ariza->asansor_adi?></td>
														<td><?=$ariza->musteri_adSoyad?></td>
														<td><a href="<?=base_url("ariza/".$ariza->ariza_id)?>" class="btn bg-cyan waves-effect">
															<i class="material-icons">search</i>
															<span>Detay</span>
														</a> <a href="<?=base_url("ariza-al/".$ariza->ariza_id)?>" class="btn bg-green waves-effect">
															<i class="material-icons">done</i>
															<span>Arizayi Al</span>
														</a></td>
													</tr>
													<?php
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover temel-tablo dataTable">
										<thead>
											<tr>
												<th>Ariza Kod</th>
												<th>Ariza Tarihi</th>
												<th>Asansor Adı</th>
												<th>Asansor Yetkili</th>
												<th>Ariza Onaran</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											if($onarilmayan_arizalar){
												foreach ($onarilmayan_arizalar as $ariza) {
													?>
													<tr>
														<td><?=$ariza->ariza_kodu?></td>
														<td><?=$ariza->ariza_timestamp?></td>
														<td><?=$ariza->asansor_adi?></td>
														<td><?=$ariza->musteri_adSoyad?></td>
														<td><?=$ariza->kullanici_adSoyad?></td>
														<td><a href="<?=base_url("ariza/".$ariza->ariza_id)?>" class="btn bg-blue waves-effect">
															<i class="material-icons">search</i>
															<span>Detay</span>
														</a>
														<?php if($id == $ariza->ariza_onaran || $rol == 1){?><a href="<?=base_url("ariza-iptal/".$ariza->ariza_id)?>" class="btn bg-red waves-effect">
															<i class="material-icons">done</i>
															<span>İptal Et</span>
														</a>
														<?php } ?>
														</td>
													</tr>
													<?php
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover temel-tablo dataTable">
										<thead>
											<tr>
												<th>Ariza Kod</th>
												<th>Ariza Tarihi</th>
												<th>Asansor Adı</th>
												<th>Asansor Yetkili</th>
												<th>Ariza Onaran</th>
												<th>Ariza Tutar</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											if($onarilan_arizalar){
												foreach ($onarilan_arizalar as $ariza) {
													?>
													<tr>
														<td><?=$ariza->ariza_kodu?></td>
														<td><?=$ariza->ariza_timestamp?></td>
														<td><?=$ariza->asansor_adi?></td>
														<td><?=$ariza->musteri_adSoyad?></td>
														<td><?=$ariza->kullanici_adSoyad?></td>
														<td class="fiyat"><?=$ariza->ariza_tutar?></td>
														<td><a href="<?=base_url("ariza/".$ariza->ariza_id)?>" class="btn bg-blue waves-effect">
															<i class="material-icons">search</i>
															<span>Detay</span>
														</a></td>
													</tr>
													<?php
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('include/footer'); ?>
