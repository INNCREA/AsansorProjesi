<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Asansör İşlemleri</h2>
		</div>
		<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Asansör Ekle
                        </h2>
                    </div>
                    <div class="body">
                        <form action="<?=current_url()?>" method="POST">
                            <?=isset($hata) ? $hata: NULL?>
                            <?=validation_errors()?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("asansor_kod")?>" id="email_address" name="asansor_kod" class="form-control">
                                    <label class="form-label">Asansör Kodu</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="email_address" value="<?=set_value("asansor_tarih")?>" name="asansor_tarih" class="form-control tarih" maxlength="10">
                                    <label class="form-label">Asansör Yapım Tarihi</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" tabindex="-98" name="asansor_yetkili">
                                        <option disabled=""> Yetkili Seçiniz </option>
                                        <?php
                                        if($yetkililer){
                                            foreach ($yetkililer as $yetkili) {
                                                echo '<option value="'.$yetkili->musteri_id.'">'.$yetkili->musteri_adSoyad.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="asansor_adres" rows="4" class="form-control no-resize"><?=set_value("asansor_adres")?></textarea>
                                    <label class="form-label">Asansör Adres</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="asansor_adresTarif" rows="4" class="form-control no-resize"><?=set_value("asansor_adresTarif")?></textarea>
                                    <label class="form-label">Asansör Adres Tarifi</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("musteri_adSoyad")?>" name="musteri_adSoyad" class="form-control">
                                    <label class="form-label">Müşteri Ad Soyad</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("musteri_mail")?>" name="musteri_mail" class="form-control">
                                    <label class="form-label">Müşteri Mail</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("musteri_tel")?>" name="musteri_tel" class="form-control">
                                    <label class="form-label">Müşteri Telefon</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("musteri_kAdi")?>" name="musteri_kAdi" class="form-control">
                                    <label class="form-label">Müşteri Adı</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" value="<?=set_value("musteri_sifre")?>" name="musteri_sifre" class="form-control">
                                    <label class="form-label">Müşteri Şifre</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label>Bakım Periyodu Seçiniz</label>
                                    <select class="form-control show-tick" tabindex="-98" name="bakim_periyodu">
                                        <option value="30"> 30 Gün </option>
                                        <option value="60"> 60 Gün </option>
                                        <option value="90"> 90 Gün </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="asansor_enlem" id="lat" value="">
                                <input type="hidden" name="asansor_boylam" id="long" value="">
                                <div id="map" class="col-md-12" style="height: 500px"></div>
                                <script>
                                    var map;
                                    var marker;
                                    function initMap() {
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            center: {lat: 39.751837, lng: 37.015284},
                                            zoom: 17
                                        });
                                        var marker = new google.maps.Marker({position: {lat: 39.751837, lng: 37.015284}, map: map, draggable:true});
                                        google.maps.event.addListener(marker, 'dragend', function (event) {
                                            document.getElementById("lat").value = event.latLng.lat();
                                            document.getElementById("long").value = event.latLng.lng();
                                            map.setCenter(marker.position);
                                            marker.setMap(map);
                                        });
                                    }
                                </script>
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPDu26gru2gaLxlJFaFfBaOsa3EHggnGY&callback=initMap" async defer></script>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Asansörü Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('include/footer'); ?>