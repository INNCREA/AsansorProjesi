<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2><b>Cari İşlemleri</b></h2>
		</div>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Cari Listesi
						</h2>
					</div>
					<div class="body">
						<?php 
						$islem = $this->session->flashdata('islem');
						if ($islem == 'ekle'){ ?>
							<script>
								swal("Kayıt işlemi başarılı !", "Cari başarıyla eklenmiştir !", "success");
							</script>
						<?php } 
						else if ($islem == 'guncelle')
							{ ?>
								<script>
									swal("Güncelleme işlemi başarılı !", "Kayıt başarıyla güncellenmiştir !", "success");
								</script>
							<?php }
							else if ($islem == 'sil')
								{ ?>
									<script>
										swal("Silme işlemi başarılı !", "Kayıt başarıyla silinmiştir !", "success");
									</script>
								<?php }
								else if ($islem == 'basarisiz')
									{ ?>
										<script>
											swal("İşlemi başarılı !", "İşlem gerçekleştirilirken bir hata oluştu. Lütfen tekrar deneyiniz !", "danger");
										</script>
									<?php } ?>
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover dataTable temel-tablo">
											<thead>
												<tr>
													<th>Firma İsmi</th>
													<th>Adres</th>
													<th>Telefon</th>
													<th>Mail</th>
													<th>Firma Yetkilisi</th>
													<th>Vergi Dairesi</th>
													<th>Vergi Numarası</th>
													<th>Bakiye</th>
													<th>İşlemler</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if($cariler){
													foreach ($cariler as $cari) {
														?>
														<tr>
															<td><?=$cari->cari_isim?></td>
															<td><?=$cari->cari_adres?></td>
															<td><?=$cari->cari_telefon?></td>
															<td><?=$cari->cari_mail?></td>
															<td><?=$cari->cari_yetkili?></td>
															<td><?=$cari->cari_vergiDairesi?></td>
															<td><?=$cari->cari_vergiNo?></td>
															<td><b><?=$cari->cari_bakiye?> 2.110,00 ₺</b></td>
															<td><button type="button" data-id="<?=$cari->cari_id?>" data-url="<?=base_url('cari/cariCek/')?>" class="btn bg-cyan waves-effect tahsilat">
																<i class="material-icons">credit_card</i>
																<span>Tahsilat</span>
															</button> <button type="button" data-id="<?=$cari->cari_id?>" data-url="<?=base_url('cari/cariCek/')?>" class="btn bg-green waves-effect duzenleCari">
																<i class="material-icons">create</i>
																<span>Düzenle</span>
															</button> <a href="<?=base_url("cari/sil/".$cari->cari_id)?>" class="btn bg-red waves-effect sil">
																<i class="material-icons">delete</i>
																<span>Sil</span>
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
				<div class="modal fade" id="duzenleCari" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="defaultModalLabel">Cari Düzenle</h4>
							</div>
							<div class="modal-body">
								<form action="<?=base_url("cari/guncelle")?>" method="POST">
									<?=validation_errors()?>
									<div class="form-group form-float">
										<input type="hidden" value="<?=set_value("cari_id")?>" id="cari_id" name="cari_id" class="form-control">
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("cari_isim")?>" name="cari_isim" id="cari_isim" class="form-control">
											<label class="form-label">Firma İsmi</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("cari_mail")?>" name="cari_mail" id="cari_mail" class="form-control">
											<label class="form-label">Firma Mail</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("cari_telefon")?>" name="cari_telefon" id="cari_telefon" class="form-control">
											<label class="form-label">Firma Telefon</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("cari_adres")?>" name="cari_adres" id="cari_adres" class="form-control">
											<label class="form-label">Firma Adres</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("cari_yetkili")?>" name="cari_yetkili" id="cari_yetkili" class="form-control">
											<label class="form-label">Firma Yetkili Adı</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("cari_vergiDairesi")?>" name="cari_vergiDairesi" id="cari_vergiDairesi" class="form-control">
											<label class="form-label">Firma Vergi Dairesi</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("cari_vergiNo")?>" name="cari_vergiNo" id="cari_vergiNo" class="form-control">
											<label class="form-label">Firma Vergi Numarası</label>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-success waves-effect">GÜNCELLE</button>
										<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" >VAZGEÇ</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


				<div class="modal fade" id="tahsilat" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="defaultModalLabel">Tahsilat</h4>
								<hr>
							</div>
							<div class="modal-body">
								<form action="<?=base_url("cari/tahsilat")?>" method="POST">
									<?=validation_errors()?>
									<div class="form-group form-float">
										<input type="hidden" value="<?=set_value("cari_id")?>" id="cari_id" name="cari_id" class="form-control">
									</div>

									<div class="row clearfix">
										<div class="col-lg-3 col-md-2 col-sm-3 col-xs-4 form-control-label">
											<input type="radio" name="tahsilat_tutari" id="toplam_tutar" class="with-gap">
											<label for="toplam_tutar">Toplam Tutar :</label>
										</div>
										<div class="col-lg-9 col-md-10 col-sm-9 col-xs-8">
											<div class="form-group">
												<div id="toplam_tutar_div" class="form-line focused warning">
													<input type="text" value="2.110,00 ₺" name="toplam_tutar" id="toplam_tutar" class="form-control" disabled>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-2 col-sm-3 col-xs-4 form-control-label">
											<input type="radio" name="tahsilat_tutari" id="diger" class="with-gap">
											<label for="diger">Diğer Tutar :</label>
										</div>
										<div class="col-lg-9 col-md-10 col-sm-9 col-xs-8">
											<div class="form-group">
												<div class="form-line success">
													<input type="text" value="<?=set_value("diger_tutar")?>" name="diger_tutar" id="diger_tutar" class="form-control fiyat" disabled>
												</div>
											</div>
										</div>
									</div>


									<div class="modal-footer">
										<button type="submit" class="btn btn-success waves-effect">TAHSİL ET</button>
										<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" >VAZGEÇ</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


			</section>
			<?php $this->load->view('include/footer'); ?>