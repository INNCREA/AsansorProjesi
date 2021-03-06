<?php
$this->load->view('include/header');
$this->load->view('include/sidebar');
?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2><b>Bakım İşlemleri</b></h2>
		</div>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Bakım Listesi
						</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable temel-tablo">
								<thead>
									<tr>
										<th>#</th>
										<th>Bakım Yapılan Asansör</th>
										<th>Bakım İçeriği</th>
										<th>Bakım Durum</th>
										<th>Bakım Tarihi</th>
										<th>Bakım Yapan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if($bakimlar){
										foreach ($bakimlar as $bakim) {
											?>
											<tr>
												<td><?=$bakim->bakim_id?></td>
												<td><?=$bakim->asansor_adi?></td>
												<td><?=$bakim->bakim_icerik?></td>
												<td><?=($bakim->bakim_durum == "") ? "<span class='badge bg-cyan font-12'>Bakım Bekleniyor</span>" : (($bakim->bakim_durum == "Yapıldı") ? "<span class='badge bg-green font-12'>".$bakim->bakim_durum."</span>" : "<span class='badge bg-red font-12'>".$bakim->bakim_durum."</span>") ?>
											</td>
											<td><?=$bakim->bakim_tarih?></td>
											<td><?=$bakim->kullanici_adi?></td>
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
</section>
<?php $this->load->view('include/footer'); ?>