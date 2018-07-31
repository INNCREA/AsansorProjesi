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
				<div class="info-box bg-pink hover-expand-effect">
					<div class="icon">
						<i class="material-icons">meeting_room</i>
					</div>
					<div class="content">
						<div class="text">ASANSÖR</div>
						<div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="info-box bg-cyan hover-expand-effect">
					<div class="icon">
						<i class="material-icons">help</i>
					</div>
					<div class="content">
						<div class="text">ARIZA</div>
						<div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="info-box bg-light-green hover-expand-effect">
					<div class="icon">
						<i class="material-icons">forum</i>
					</div>
					<div class="content">
						<div class="text">BAKIM</div>
						<div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="info-box bg-orange hover-expand-effect">
					<div class="icon">
						<i class="material-icons">person_add</i>
					</div>
					<div class="content">
						<div class="text">MÜŞTERİ</div>
						<div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('include/footer.php'); ?>