<?php $this->load->view('include/m_header.php'); ?>
<?php $this->load->view('include/m_sidebar.php'); ?>
<?php 
$islem = $this->session->flashdata('islem');
if ($islem == 'ekle'){ ?>
	<script>
		swal("Kayıt işlemi başarılı !", "Kayıt başarıyla eklenmiştir !", "success");
	</script>
<?php } 
else if ($islem == 'guncelle')
	{ ?>
		<script>
			swal("Güncelleme işlemi başarılı !", "Bilgiler başarıyla güncellenmiştir. Değişiklikler tekrar giriş yaptığınızda etkin olacaktır.", "success");
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
					swal("İşlemi başarısız !", "İşlem gerçekleştirilirken bir hata oluştu. Lütfen tekrar deneyiniz !", "danger");
				</script>
			<?php } ?>
			<section class="content">
				<div class="container-fluid">
					<div class="block-header">
						<h2><b>Ana Sayfa</b></h2>
					</div>

					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<a class="kutu arizaBildir">
								<div style="cursor: pointer;" class="info-box bg-red hover-expand-effect">
									<div class="icon">
										<i class="fas fa-exclamation-triangle"></i>
									</div>
									<div class="content">
										<div class="text"><h5>ARIZA BİLDİR</h5></div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<a class="kutu" href="<?php echo base_url('musteri-panel/bakim') ?>">
								<div style="cursor: pointer;" class="info-box bg-amber hover-expand-effect">
									<div class="icon">
										<i class="fas fa-wrench"></i>
									</div>
									<div class="content">
										<div class="text"><h5>BAKIM GEÇMİŞİ</h5></div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<a class="kutu" href="<?php echo base_url('musteri-panel/detay') ?>">
								<div style="cursor: pointer;" class="info-box bg-light-green hover-expand-effect">
									<div class="icon">
										<i class="material-icons">assessment</i>
									</div>
									<div class="content">
										<div class="text"><h5>HESAP ÖZETİ</h5></div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<a class="kutu bilgiGuncelle" data-id="<?php echo $this->session->userdata('id'); ?>" data-url="<?php echo base_url('musteri-panel/bilgiAl'); ?>">
								<div style="cursor: pointer;" class="info-box bg-cyan hover-expand-effect">
									<div class="icon">
										<i class="material-icons">update</i>
									</div>
									<div class="content">
										<div class="text"><h5>BİLGİLERİ GÜNCELLE</h5></div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>



				<div class="modal fade" id="bilgiGuncelle" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="defaultModalLabel">Bilgileri Düzenle</h4>
							</div>
							<div class="modal-body">
								<form action="<?=base_url('musteri-panel/guncelle')?>" method="POST">
									<?=validation_errors()?>
									<div class="form-group form-float">
										<input type="hidden" value="<?=set_value("musteri_id")?>" id="musteri_id" name="musteri_id" class="form-control">
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("musteri_adSoyad")?>" name="musteri_adSoyad" id="musteri_adSoyad" class="form-control">
											<label class="form-label">Ad Soyad</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("musteri_mail")?>" name="musteri_mail" id="musteri_mail" class="form-control">
											<label class="form-label">Mail</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("musteri_tel")?>" name="musteri_tel" id="musteri_tel" class="form-control">
											<label class="form-label">Telefon</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("musteri_adres")?>" name="musteri_adres" id="musteri_adres" class="form-control">
											<label class="form-label">Adres</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line focused">
											<input type="text" value="<?=set_value("musteri_kAdi")?>" name="musteri_kAdi" id="musteri_kAdi" class="form-control">
											<label class="form-label">Kullanıcı Adı</label>
										</div>
									</div>
									<div class="form-group form-float">
										<label class="form-label">Şifrenizi girişteki 'Şifremi Unuttum' bölümünden yeni şifre talep ederek değiştirebilirsiniz.</label>
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







			<div class="modal fade" id="arizaBildir" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="defaultModalLabel">Arıza Bildir</h4>
						</div>
						<div class="modal-body">

							<form action="<?=base_url('musteri-panel/arizaBildir')?>" method="POST">
								<?=isset($hata) ? $hata: NULL?>
								<?=validation_errors()?>
								<div class="form-group form-float">
									<div class="form-line">
										<select class="form-control show-tick" tabindex="-98" name="ariza_kodu"  data-show-subtext="true">
											<option disabled=""> Arıza Kodu Seçiniz </option>
											<?php
											if($kodlar){
												foreach ($kodlar as $kod) {
													echo '<option data-subtext="'.$kod->hata_aciklama.'"'.(set_value("ariza_kodu") == $kod->hata_kodu ? "selected" : NULL).' value="'.$kod->hata_kodu.'">'.$kod->hata_kodu.'</option>';
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group form-float">
									<div class="form-line">
										<select class="form-control show-tick" tabindex="-98" name="asansor_id">
											<option disabled=""> Asansör Seçiniz</option>
											<?php
											if($asansor){
												foreach ($asansor as $a) {
													echo '<option '.($a->asansor_id == $sid || set_value("asansor_id") == $a->asansor_id ? "selected" : NULL).' value="'.$a->asansor_id.'">'.$a->asansor_adi.'</option>';
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group form-float">
									<div class="form-line">
										<textarea name="asansor_aciklama" rows="4" class="form-control no-resize"><?=set_value("asansor_aciklama")?></textarea>
										<label class="form-label">Arıza Açıklaması</label>
									</div>
								</div>
								<button type="submit" class="btn btn-primary m-t-15 waves-effect">Arızayı Bildir</button>
							</form>


						</div>
					</div>
				</div>
			</div>


		</section>

		<?php $this->load->view('include/footer.php'); ?>