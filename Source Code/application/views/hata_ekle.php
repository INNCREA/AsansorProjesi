<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Asansör İşlemleri</h2>
		</div>
		<!-- Exportable Table -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Hata Kodu Ekle
						</h2>
					</div>
					<div class="body">
						<form action="<?=current_url()?>" method="POST">
							<?=isset($hata) ? $hata: NULL?>
							<?=validation_errors()?>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("hata_kodu")?>" name="hata_kodu" class="form-control">
									<label class="form-label">Hata Kodu</label>
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" value="<?=set_value("hata_aciklama")?>" name="hata_aciklama" class="form-control">
									<label class="form-label">Hata Açıklaması</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">Hata Kodu Ekle</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Exportable Table -->
	</div>
</section>
<?php $this->load->view('include/footer'); ?>