<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/sidebar.php'); ?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Ana Sayfa</h2>
			<ol class="breadcrumb align-right">
				<li>
					<a href="javascript:void(0);">
						<i class="material-icons">meeting_room</i> InncreaLift
					</a>
				</li>
			</ol>
		</div>
		<div class="row clearfix">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a class="kutu" href="<?php echo base_url('asansor') ?>">
					<div style="cursor: pointer;" class="info-box bg-red hover-expand-effect">
						<div class="icon">
							<i class="material-icons">meeting_room</i>
						</div>
						<div class="content">
							<div class="text">ASANSÖR</div>
							<div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a class="kutu" href="<?php echo base_url('ariza') ?>">
					<div style="cursor: pointer;" class="info-box bg-cyan hover-expand-effect">
						<div class="icon">
							<i class="material-icons">help</i>
						</div>
						<div class="content">
							<div class="text"><h5>ARIZA</h5></div>
							<div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a class="kutu" href="<?php echo base_url('bakim') ?>">
					<div style="cursor: pointer;" class="info-box bg-amber hover-expand-effect">
						<div class="icon">
							<i class="material-icons">forum</i>
						</div>
						<div class="content">
							<div class="text">BAKIM</div>
							<div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a class="kutu" href="<?php echo base_url('musteri') ?>">
					<div style="cursor: pointer;" class="info-box bg-light-green hover-expand-effect">
						<div class="icon">
							<i class="material-icons">person_add</i>
						</div>
						<div class="content">
							<div class="text">MÜŞTERİ</div>
							<div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
   <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Günlük Arıza Listesi
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover temel-tablo dataTable">
                                <thead>
                                    <tr>
                                        <th>Arıza Kod</th>
                                        <th>Arıza Tarihi</th>
                                        <th>Asansör Kodu</th>
                                        <th>Asansör Yetkilisi</th>
                                        <th style="width: 18%">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	if($arizalar){
                                		foreach ($arizalar as $ariza) {
                                         ?>
                                         <tr>
                                            <td><?=$ariza->ariza_kodu?></td>
                                            <td><?=$ariza->ariza_timestamp?></td>
                                            <td><?=$ariza->asansor_kodu?></td>
                                            <td><?=$ariza->musteri_adSoyad?></td>
                                            <td> <a href="<?=base_url("ariza/".$ariza->ariza_id)?>" class="btn bg-blue waves-effect">
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
</section>

<?php $this->load->view('include/footer.php'); ?>