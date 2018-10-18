<?php
$this->load->view('include/m_header');
$this->load->view('include/m_sidebar');
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
							Bakım Geçmişi
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
												<td><?=$bakim['0']->bakim_id?></td>
												<td><?=$bakim['0']->asansor_adi?></td>
												<td><?=$bakim['0']->bakim_icerik?></td>
												<td><?=$bakim['0']->bakim_durum?></td>
												<td><?=$bakim['0']->bakim_tarih?></td>
												<td><?=$bakim['0']->kullanici_adi?></td>
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