<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2><b>Kullanıcı İşlemleri</b></h2>
		</div>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Kullanıcı Listesi
						</h2>
					</div>
					<div class="body">
						<?php 
						$islem = $this->session->flashdata('islem');
						if ($islem == 'ekle'){ ?>
							<script>
								swal("Kayıt işlemi başarılı !", "Kullanıcı başarıyla eklenmiştir !", "success");
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
											swal("İşlem başarısız !", "İşlem gerçekleştirilirken bir hata oluştu. Lütfen tekrar deneyiniz !", "danger");
										</script>
									<?php } ?>
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover dataTable temel-tablo">
											<thead>
												<tr>
													<th>T.C. Kimlik No</th>
													<th>Ad Soyad</th>
													<th>Adres</th>
													<th>Telefon</th>
													<th>Rol</th>
													<th>Mail</th>
													<th>Durum</th>
													<th>İşlemler</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if($kullanicilar){
													foreach ($kullanicilar as $kullanici) {
														?>
														<tr>
															<td><?=$kullanici->kullanici_tckn?></td>
															<td><?=$kullanici->kullanici_adSoyad?></td>
															<td><?=$kullanici->kullanici_adres?></td>
															<td><?=$kullanici->kullanici_tel?></td>
															<td><?=($kullanici->kullanici_rol == 1) ? "Yönetici" : "Teknik Servis" ?></td>
															<td><?=$kullanici->kullanici_mail?></td>
															<td><?=($kullanici->kullanici_durum == 1) ? "Aktif" : "Pasif" ?></td>
															<td><button type="button" data-id="<?=$kullanici->kullanici_id?>" data-url="<?=base_url('kullanici/kullaniciCek/')?>" class="btn bg-green waves-effect duzenleKullanici" data-toggle="modal" data-target="#duzenle">
																<i class="material-icons">create</i>
																<span>Düzenle</span>
															</button> <a href="<?=base_url("kullanici/sil/".$kullanici->kullanici_id)?>" class="btn bg-red waves-effect sil">
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
					<div class="modal fade" id="duzenle" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="defaultModalLabel">Kullanıcı Düzenle</h4>
								</div>
								<div class="modal-body">
									<form action="<?=base_url('kullanici/guncelle')?>" method="POST">
										<?=validation_errors()?>
										<div class="form-group form-float">
											<input type="hidden" value="<?=set_value("kullanici_id")?>" id="kullanici_id" name="kullanici_id" class="form-control">
										</div>
										<div class="form-group form-float">
											<div class="form-line focused">
												<input type="text" value="<?=set_value("kullanici_tckn")?>" id="kullanici_tckn" name="kullanici_tckn" class="form-control">
												<label class="form-label">T.C. Kimlik Numarası</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line focused">
												<input type="text" value="<?=set_value("kullanici_adSoyad")?>" id="kullanici_adSoyad" name="kullanici_adSoyad" class="form-control">
												<label class="form-label">Ad Soyad</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line focused">
												<input type="text" value="<?=set_value("kullanici_adres")?>" id="kullanici_adres" name="kullanici_adres" class="form-control">
												<label class="form-label">Adres</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line focused">
												<input type="text" value="<?=set_value("kullanici_tel")?>" id="kullanici_tel" name="kullanici_tel" class="form-control">
												<label class="form-label">Telefon</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line focused">
												<input type="text" value="<?=set_value("kullanici_mail")?>" id="kullanici_mail" name="kullanici_mail" class="form-control">
												<label class="form-label">E-posta</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line focused">
												<label>Rol Seçiniz</label>
												<select class="form-control show-tick" tabindex="-98" id="kullanici_rol" name="kullanici_rol">
													<option>Bir rol seçiniz</option>
													<option value="1">Yönetici</option>
													<option value="2">Teknik Servis</option>
												</select>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<label>Durum</label>
												<select class="form-control show-tick" tabindex="-98" id="kullanici_durum" name="kullanici_durum">
													<option>Bir durum seçiniz</option>
													<option value="1">Aktif</option>
													<option value="0">Pasif</option>
												</select>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line focused">
												<input type="text" value="<?=set_value("kullanici_adi")?>" id="kullanici_adi" name="kullanici_adi" class="form-control">
												<label class="form-label">Kullanıcı Adı</label>
											</div>
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
			</section>
			<?php $this->load->view('include/footer'); ?>