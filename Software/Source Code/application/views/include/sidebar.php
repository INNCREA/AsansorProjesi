<div class="menu">
	<ul class="list">
		<li class="header">ANA MENÜ</li>
		<li <?=($sayfaAdi == "Ana Sayfa") ? 'class="active";' : ""  ?> >
			<a href="<?=base_url('panel');?>">
				<i class="material-icons">home</i>
				<span>Ana Sayfa</span>
			</a>
		</li>
		<li <?php if($sayfaAdi == "Arıza"){ echo 'class="active";'; } ?> >
			<a href="<?php echo base_url('ariza'); ?>">
				<i class="material-icons">report_problem</i>
				<span>Arıza</span>
			</a>
		</li>
		<li <?php if($sayfaAdi == "Asansör İşlemleri"){ echo 'class="active";'; } ?>>
			<a href="javascript:void(0);" class="menu-toggle">
				<i class="material-icons">location_city</i>
				<span>Asansör İşlemleri</span>
			</a>
			<ul class="ml-menu">
				<li <?php if($altSayfaAdi == "Asansör Listesi" ){ echo 'class="active";'; } ?>  >
					<a href="<?=base_url("asansorler")?>">Asansör Listesi</a>
				</li>
				<li <?php if($altSayfaAdi == "Asansör Ekle" ){ echo 'class="active";'; } ?>  >
					<a href="<?=base_url("asansor/ekle")?>">Asansör Ekle</a>
				</li>
				<li <?php if($altSayfaAdi == "Bakım Listesi" ){ echo 'class="active";'; } ?>  >
					<a href="<?=base_url("bakim")?>">Bakım</a>
				</li>
				<li <?php if($altSayfaAdi == "Hata Kodları" ){ echo 'class="active";'; } ?>  >
					<a href="<?=base_url("hatakodlari")?>">Hata Kodları</a>
				</li>
			</ul>
		</li>
		<li <?php if($sayfaAdi == "Stok İşlemleri" || $sayfaAdi == "Müşteri İşlemleri" || $sayfaAdi == "Cari İşlemleri"){ echo 'class="active";'; } ?> >
			<a href="javascript:void(0);" class="menu-toggle">
				<i class="material-icons">assignment</i>
				<span>Muhasebe İşlemleri</span>
			</a>
			<ul class="ml-menu">
				<li <?php if($sayfaAdi == "Cari İşlemleri" ){ echo 'class="active";'; } ?>  >
					<a href="javascript:void(0);" class="menu-toggle">
						<i class="material-icons">assessment</i>
						<span>Cari Hesap İşlemleri</span>
					</a>
					<ul class="ml-menu">
						<li <?php if($altSayfaAdi == "Cari Özet" ){ echo 'class="active";'; } ?>  >
							<a href="<?=base_url("cari")?>">Cari Hesap Özetleri</a>
						</li>
						<li <?php if($altSayfaAdi == "Cari Ekle" ){ echo 'class="active";'; } ?>  >
							<a href="<?=base_url("cari/ekle")?>">Cari Hesap Ekle</a>
						</li>
						<li <?php if($altSayfaAdi == "Tahsilatlar"){echo 'class="active"';}?>>
							<a href="<?=base_url("cari/tahsilatlar")?>">Tahsilatlar</a>
						</li>
					</ul>
				</li>
				<li <?php if($sayfaAdi == "Stok İşlemleri" ){ echo 'class="active";'; } ?> >
					<a href="javascript:void(0);" class="menu-toggle">
						<i class="material-icons">assignment_turned_in</i>
						<span>Stok İşlemleri</span>
					</a>
					<ul class="ml-menu">
						<li <?php if($altSayfaAdi == "Stok Listesi" ){ echo 'class="active";'; } ?>  >
							<a href="<?=base_url("stok")?>">Stok Listesi</a>
						</li>
						<li <?php if($altSayfaAdi == "Stok Ekle" ){ echo 'class="active";'; } ?>  >
							<a href="<?=base_url("stok/ekle")?>">Stok Ekle</a>
						</li>
					</ul>
				</li>
				<li <?php if($sayfaAdi == "Müşteri İşlemleri" ){ echo 'class="active";'; } ?>  >
					<a href="javascript:void(0);" class="menu-toggle">
						<i class="material-icons">people</i>
						<span>Müşteri İşlemleri</span>
					</a>
					<ul class="ml-menu">
						<li <?php if($altSayfaAdi == "Müşteri Listesi" ){ echo 'class="active";'; } ?>  >
							<a href="<?=base_url("musteriler")?>">Müşteri Listesi</a>
						</li>
						<li <?php if($altSayfaAdi == "Müşteri Ekle" ){ echo 'class="active";'; } ?>  >
							<a href="<?=base_url("musteri/ekle")?>">Müşteri Ekle</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<li <?php if($sayfaAdi == "Kullanıcı İşlemleri"){ echo 'class="active";'; } ?> >
			<a href="javascript:void(0);" class="menu-toggle">
				<i class="material-icons">account_box</i>
				<span>Kullanıcı İşlemleri</span>
			</a>
			<ul class="ml-menu">
				<li <?php if($altSayfaAdi == "Kullanıcı Listesi" ){ echo 'class="active";'; } ?> >
					<a href="<?=base_url("kullanici")?>">Kullanıcı Listesi</a>
				</li>
				<li <?php if($altSayfaAdi == "Kullanıcı Ekle" ){ echo 'class="active";'; } ?> >
					<a href="<?=base_url("kullanici/ekle")?>">Kullanıcı Ekle</a>
				</li>
			</ul>
		</li>
		<li <?php if($sayfaAdi == "Rapor İşlemleri"){ echo 'class="active";'; } ?> >
			<a href="javascript:void(0);" class="menu-toggle">
				<i class="material-icons">note_add</i>
				<span>Rapor İşlemleri</span>
			</a>
			<ul class="ml-menu">
				<li <?php if($altSayfaAdi == "ariza" ){ echo 'class="active";'; } ?>  >
					<a href="<?=base_url("rapor/ariza")?>">Arıza Listesi</a>
				</li>
				<li <?php if($altSayfaAdi == "bakim" ){ echo 'class="active";'; } ?>  >
					<a href="<?=base_url("rapor/bakim")?>">Bakım Listesi</a>
				</li>
				<li <?php if($altSayfaAdi == "asansor" ){ echo 'class="active";'; } ?>  >
					<a href="<?=base_url("rapor/asansor")?>">Asansör Listesi</a>
				</li>
				<li <?php if($altSayfaAdi == "musteri" ){ echo 'class="active";'; } ?>  >
					<a href="<?=base_url("rapor/musteri")?>">Müşteri Listesi</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
<!-- #Menu -->
<!-- Footer -->
<div class="legal">
	<div class="copyright">
		&copy; 2018 <a href="javascript:void(0);">INNCREA - Asansör Yönetim Sistemi</a>
	</div>
	<div class="version">
		<b>Version: </b> 1.0.0 / Alpha
	</div>
</div>
<!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
</section>