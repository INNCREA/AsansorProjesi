<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2><b>Cari Hesap İşlemleri</b></h2>
		</div>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Cari Hesap Ekle
						</h2>
					</div>
					<div class="body">
						<form action="<?=current_url()?>" method="POST">
							<?=validation_errors()?>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("cari_isim")?>" name="cari_isim" class="form-control">
									<label class="form-label">Hesap İsmi</label>
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("cari_mail")?>" name="cari_mail" class="form-control">
									<label class="form-label">Mail</label>
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("cari_telefon")?>" name="cari_telefon" class="form-control">
									<label class="form-label">Telefon</label>
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("cari_adres")?>" name="cari_adres" class="form-control">
									<label class="form-label">Adres</label>
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("cari_yetkili")?>" name="cari_yetkili" class="form-control">
									<label class="form-label">Hesap Yetkilisi</label>
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("cari_vergiDairesi")?>" name="cari_vergiDairesi" class="form-control">
									<label class="form-label">Vergi Dairesi</label>
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("cari_vergiNo")?>" name="cari_vergiNo" class="form-control">
									<label class="form-label">Vergi Numarası</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">Hesap Ekle</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('include/footer'); ?>