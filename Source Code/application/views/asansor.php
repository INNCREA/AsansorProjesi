<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Asansör</h2>
		</div>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              ASANSÖR DETAYI
            </h2>
          </div>
          <div class="body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a href="#home_with_icon_title" data-toggle="tab" aria-expanded="false">
                  <i class="material-icons">home</i> DETAY
                </a>
              </li>
              <li role="presentation" class="">
                <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
                  <i class="material-icons">face</i> ARIZA
                </a>
              </li>
              <li role="presentation" class="">
                <a href="#messages_with_icon_title" data-toggle="tab" aria-expanded="false">
                  <i class="material-icons">email</i> BAKIM
                </a>
              </li>
              <li role="presentation" class="">
                <a href="#settings_with_icon_title" data-toggle="tab" aria-expanded="true">
                  <i class="material-icons">settings</i> DÜZENLE
                </a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade  active in" id="home_with_icon_title">
                <div class="row">
                  <table class="pull-left col-md-6 col-xs-12 col-sm-12 m-l-15">
                    <tbody>
                      <tr>
                        <td><strong>Asansor Kodu</strong></td>
                        <td><?=$asansor->asansor_kodu?></td>
                      </tr>
                      <tr>
                        <td><strong>Asansor Adres</strong></td>
                        <td><?=$asansor->asansor_adres?></td>
                      </tr>
                      <tr>
                        <td><strong>Asansor Adres Tarifi</strong></td>
                        <td><?=$asansor->asansor_adresTarif?></td>
                      </tr>
                      <tr>
                        <td><strong>Asansor Yetkili</strong></td>
                        <td><?=$asansor->musteri_adSoyad?></td>
                      </tr>
                      <tr>
                        <td><strong>Asansor Son Bakim Tarihi</strong></td>
                        <td><?=$asansor->asansor_bakimTarihi?></td>
                      </tr>
                      <tr>
                        <td><strong>Asansor Son Ariza Tarihi</strong></td>
                        <td><?=$asansor->asansor_arizaTarihi?></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <a href="https://www.google.com/maps/search/?api=1&query=<?=$asansor->asansor_latitude?>,<?=$asansor->asansor_longitude?>" class="btn bg-green">Yol Tarifi Al</a>
                    </div>
                  </div>
                  <div class="col-md-12 m-t-10">
                    <div id="map" class="col-md-12" style="height: 500px"></div>
                    <script>
                      var map;
                      function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                          center: {lat: <?=$asansor->asansor_latitude?>, lng: <?=$asansor->asansor_longitude?>},
                          zoom: 17
                        });
                        var marker = new google.maps.Marker({position: {lat: <?=$asansor->asansor_latitude?>, lng: <?=$asansor->asansor_longitude?>}, map: map});
                      }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPDu26gru2gaLxlJFaFfBaOsa3EHggnGY&callback=initMap" async defer></script>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                <b>Arıza Detayları</b>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Arıza Kodu</th>
                        <th>Arıza Durumu</th>
                        <th>Arıza Tarih</th>
                        <th>Arıza Onaran</th>
                        <th>Arıza Tutar</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($asansor_ariza){
                        $i=1;
                        foreach ($asansor_ariza as $ariza) {
                         ?>
                         <tr>
                          <td><?=$i?></td>
                          <td><?=$ariza->ariza_kodu?></td>
                          <td><?=$ariza->ariza_durum?></td>
                          <td><?=$ariza->ariza_tarih?></td>
                          <td><?=$ariza->kullanici_adSoyad?></td>
                          <td><?=$ariza->ariza_tutar?> TL</td>
                          <td><a href="<?=base_url("ariza/".$ariza->ariza_id)?>" class="btn bg-blue waves-effect">
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
            <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
              <b>Bakım Detayları</b>
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Bakim Durumu</th>
                      <th>Bakim Tarih</th>
                      <th>Bakim Yapan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($asansor_bakim){
                      $i=1;
                      foreach ($asansor_bakim as $bakim) {
                       ?>
                       <tr>
                        <td><?=$i?></td>
                        <td><?=$bakim->bakim_durum?></td>
                        <td><?=$bakim->bakim_tarih?></td>
                        <td><?=$bakim->kullanici_adSoyad?></td>
                        <td><a href="<?=base_url("bakim/".$bakim->bakim_id)?>" class="btn bg-blue waves-effect">
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
          <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
            <b>Düzenle</b>
            <form action="<?=current_url()?>" method="POST">
              <?=isset($hata) ? $hata: NULL?>
              <?=validation_errors()?>
              <div class="form-group form-float m-t-10">
                <div class="form-line">
                  <input type="text" value="<?=set_value("asansor_kod", $asansor->asansor_kodu)?>" id="email_address" name="asansor_kod" class="form-control">
                  <label class="form-label">Asansör Kodu</label>
                </div>
              </div>
              <div class="form-group form-float">
                <div class="form-line">
                  <input type="text" id="email_address" value="<?=set_value("asansor_enlem", $asansor->asansor_latitude)?>" name="asansor_enlem" class="form-control">
                  <label class="form-label">Asansör Enlem</label>
                </div>
              </div>
              <div class="form-group form-float">
                <div class="form-line">
                  <input type="text" id="email_address" value="<?=set_value("asansor_boylam", $asansor->asansor_longitude)?>" name="asansor_boylam" class="form-control">
                  <label class="form-label">Asansör Boylam</label>
                </div>
              </div>
              <div class="form-group form-float">
                <div class="form-line">
                  <input type="text" id="email_address" value="<?=set_value("asansor_tarih", $asansor->asansor_yapimTarihi)?>" name="asansor_tarih" class="form-control" maxlength="10">
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
                        echo '<option value="'.$yetkili->musteri_id.'"'.(($yetkili->musteri_id == (set_value("asansor_yetkili", $asansor->asansor_yetkili))) ? "selected" : NULL).'>'.$yetkili->musteri_adSoyad.'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group form-float">
                <div class="form-line">
                  <textarea name="asansor_adres" rows="4" class="form-control no-resize"><?=set_value("asansor_adres", $asansor->asansor_adres)?></textarea>
                  <label class="form-label">Asansör Adres</label>
                </div>
              </div>

              <div class="form-group form-float">
                <div class="form-line">
                  <textarea name="asansor_adresTarif" rows="4" class="form-control no-resize"><?=set_value("asansor_adresTarif", $asansor->asansor_adresTarif)?></textarea>
                  <label class="form-label">Asansör Adres Tarifi</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary m-t-15 waves-effect">Asansörü Guncelle</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<?php $this->load->view('include/footer'); ?>