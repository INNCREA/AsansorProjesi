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
                        <form action="<?=current_url()?>" method="POST" onkeypress="return event.keyCode != 13;">
                            <?=isset($hata) ? $hata: NULL?>
                            <?=validation_errors()?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("asansor_adi")?>" id="email_address" name="asansor_adi" class="form-control">
                                    <label class="form-label">Asansör Adı</label>
                                </div>
                            </div>
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
                            <div class="form-group">
                                <input name="musteri_turu" data-status="select" type="radio" id="var_musteri" value="1" class="with-gap">
                                <label class="form-label" for="var_musteri">Varsayılan Müşteri</label>
                                <select id="var_musteri_select" name="exis_customer" class="form-control show-tick" disabled>
                                    <option value="">-- Müşteri Seçin --</option>
                                    <?php
                                    if($yetkililer){
                                        foreach ($yetkililer as $a) {
                                            echo '<option value="'.$a->musteri_id.'">'.$a->musteri_adSoyad.'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input name="musteri_turu" value="2" data-status="input" type="radio" id="yeni_musteri" class="with-gap" />
                                <label class="form-label" for="yeni_musteri">Yeni Müşteri</label>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("musteri_adSoyad")?>" name="musteri_adSoyad" class="form-control" data-type="new" disabled="">
                                    <label class="form-label">Müşteri Ad Soyad</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("musteri_mail")?>" name="musteri_mail" class="form-control" data-type="new" disabled="">
                                    <label class="form-label">Müşteri Mail</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("musteri_tel")?>" name="musteri_tel" class="form-control" data-type="new" disabled="">
                                    <label class="form-label">Müşteri Telefon</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("musteri_kAdi")?>" name="musteri_kAdi" class="form-control" data-type="new" disabled="">
                                    <label class="form-label">Müşteri Kullanıcı Adı</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" value="<?=set_value("musteri_sifre")?>" name="musteri_sifre" class="form-control" data-type="new" disabled="">
                                    <label class="form-label">Müşteri Şifre</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" value="<?=set_value("sifre_tekrar")?>" name="sifre_tekrar" class="form-control" data-type="new" disabled="">
                                    <label class="form-label">Müşteri Şifre Tekrar</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("bakim_tutar")?>" name="bakim_tutar" class="form-control fiyat">
                                    <label class="form-label">Bakım Ücreti</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="asansor_enlem" id="lat" value="">
                                <input type="hidden" name="asansor_boylam" id="long" value="">
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                <div id="map" class="col-md-12" style="height: 500px"></div>
                                <style>
                                #description {
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 300;
                                }

                                #infowindow-content .title {
                                    font-weight: bold;
                                }

                                #infowindow-content {
                                    display: none;
                                }

                                #map #infowindow-content {
                                    display: inline;
                                }

                                .pac-card {
                                    margin: 10px 10px 0 0;
                                    border-radius: 2px 0 0 2px;
                                    box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    outline: none;
                                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                                    background-color: #fff;
                                    font-family: Roboto;
                                }

                                #pac-container {
                                    padding-bottom: 12px;
                                    margin-right: 12px;
                                }

                                .pac-controls {
                                    display: inline-block;
                                    padding: 5px 11px;
                                }

                                .pac-controls label {
                                    font-family: Roboto;
                                    font-size: 13px;
                                    font-weight: 300;
                                }

                                #pac-input {
                                    background-color: #fff;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 300;
                                    margin-left: 12px;
                                    padding: 0 11px 0 13px;
                                    text-overflow: ellipsis;
                                    width: 400px;
                                }

                                #pac-input:focus {
                                    border-color: #4d90fe;
                                }

                                #title {
                                    color: #fff;
                                    background-color: #4d90fe;
                                    font-size: 25px;
                                    font-weight: 500;
                                    padding: 6px 12px;
                                }
                                #target {
                                    width: 345px;
                                }
                            </style>
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
                                    var input = document.getElementById('pac-input');
                                    var searchBox = new google.maps.places.SearchBox(input);
                                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                                    map.addListener('bounds_changed', function() {
                                        searchBox.setBounds(map.getBounds());
                                    });
                                    searchBox.addListener('places_changed', function() {
                                        var places = searchBox.getPlaces();
                                        places.forEach(function(place) {
                                            map.setCenter(place.geometry.location);
                                            marker.setPosition(place.geometry.location);
                                            marker.setMap(map);
                                        });
                                    });

                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPDu26gru2gaLxlJFaFfBaOsa3EHggnGY&libraries=places&callback=initMap" async defer></script>
                            <script>
                                $(function() {
                                    $("input[name=musteri_turu]").change(function() {
                                        var dataType = $(this).attr("data-status");
                                        if(dataType == "select"){
                                            $("input[data-type=new]").prop('disabled',true);
                                            $('#var_musteri_select').prop('disabled',false);
                                            $('#var_musteri_select').selectpicker("refresh");
                                        }else if(dataType == "input"){
                                            $("input[data-type=new]").prop('disabled',false);
                                            $('#var_musteri_select').prop('disabled',true);
                                            $('#var_musteri_select').selectpicker("refresh");
                                        }
                                    });
                                })
                            </script>  
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