<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2><b><?=$sayfaAdi?></b></h2>
		</div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							<?=$altSayfaAdi?>
						</h2>
					</div>
					<div class="body">
						<?php 
						$islem = $this->session->flashdata('islem');
						if ($islem == 'ekle'){ ?>
							<script>
								swal("Kayıt işlemi başarılı !", "Tahsilat başarıyla eklenmiştir !", "success");
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
													<th>Cari Hesap</th>
													<th>Tarih</th>
													<th>Tahsilat Türü</th>
													<th>Tahsil Eden</th>
													<th>Tutar</th>
													<th>İşlemler</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if($tahsilatlar){
													foreach ($tahsilatlar as $tahsilat) {
														?>
														<tr>
															<td><?=$tahsilat->cari_isim?></td>
															<td><?=$tahsilat->tahsilat_tarih?></td>
															<td><?=$tahsilat->tahsilat_turu?></td>
															<td><?=$tahsilat->tahsilat_tahsilEden?></td>
															<td class="fiyat"><?=$tahsilat->tahsilat_tutar?></td>
															<td><a href="<?=base_url("cari/gecmis_tahsilat/".$tahsilat->tahsilat_id)?>" class="btn bg-green waves-effect" target="_blank">
																<i class="material-icons">pageview</i>
																<span>Görüntüle</span>
															</a> <a href="<?=base_url("cari/tahsilat_sil/".$tahsilat->tahsilat_id)?>" class="btn bg-red waves-effect sil">
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
			</section>
			<?php $this->load->view('include/footer'); ?>