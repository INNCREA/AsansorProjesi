<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Cari İşlemleri</h2>
        </div>


        <!-- Tabs With Icon Title -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Cari Hesap Detayı
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#detay" data-toggle="tab">
                                    <i class="material-icons">format_align_left</i> DETAY
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#hesap_ozeti" data-toggle="tab">
                                    <i class="material-icons">history</i> İŞLEM GEÇMİŞİ
                                </a>
                            </li>
                        </ul>

                        <!-- Tab 1 başlangıç -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="detay">
                                <div class="row">
                                    <br>
                                    <table class="col-md-6 col-xs-12 col-sm-12 m-l-15">
                                        <tbody>
                                          <tr>
                                            <td><strong>Cari Hesap İsmi</strong></td>
                                            <td><?=$cari->cari_isim?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Adres</strong></td>
                                            <td><?=$cari->cari_adres?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telefon</strong></td>
                                            <td><?=$cari->cari_telefon?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>E-posta</strong></td>
                                            <td><?=$cari->cari_mail?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Yetkili</strong></td>
                                            <td><?=$cari->cari_yetkili?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Vergi Dairesi</strong></td>
                                            <td><?=$cari->cari_vergiDairesi?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Vergi Numarası</strong></td>
                                            <td><?=$cari->cari_vergiNo?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bakiye</strong></td>
                                            <td class="fiyat"><?=$cari->cari_bakiye?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Tab 1 bitiş -->

                        <!--  Tab 2 başlangıç  -->
                        <div role="tabpanel" class="tab-pane fade" id="hesap_ozeti">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover temel-tablo dataTable">
                                    <thead>
                                        <tr>
                                           <th>İşlem Türü</th>
                                           <th>İşlem Kodu</th>
                                           <th>İşlem Tarihi</th>
                                           <th>Asansör Adı</th>
                                           <th>İşlem Tutarı</th>
                                           <th>İşlemler</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                    <?php
                                    if($islemler){
                                        foreach ($islemler as $islem) {
                                            ?>
                                            <tr>
                                                <td><?=$islem->islem_turu?></td>
                                                <td><?=$islem->islem_kodu?></td>
                                                <td><?=$islem->islem_tarih?></td>
                                                <td><?=$islem->asansor_adi?></td>
                                                <td class="fiyat"><?=$islem->islem_tutar?></td>
                                                <td> <button type="button" data-id="<?=$islem->islem_kodu?>" data-turu="<?=$islem->islem_turu?>" data-url="<?=base_url('cari/islemIncele')?>" class="btn bg-green waves-effect islemIncele">
                                                    <i class="material-icons">search</i>
                                                    <span>İncele</span>
                                                </button></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Tab 1 bitiş -->


                </div>
            </div>
        </div>
    </div>
</div>
</div>


<style type="text/css">
td
{
    margin-left: 5px;
}
</style>
<div class="modal fade" id="inceleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">İşlem İncele</h4>
                <hr>
            </div>
            <div class="modal-body">
                <!-- <div class="row"> -->


                    <div id="arizaDiv" style="display: none;">
                        <h5 style="text-align: center">Arıza Detayı</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Arızanın Kodu</strong> <span class="pull-right" id="ariza_kodu"></span></li>
                            <li class="list-group-item"><strong>Arızanın İçeriği</strong> <span class="pull-right" id="ariza_icerik"></span></li>
                            <li class="list-group-item"><strong>Arızanın Tarihi</strong> <span class="pull-right" id="ariza_timestamp"></span></li>
                            <li class="list-group-item"><strong>Arızalanan Asansör</strong> <span class="pull-right" id="ariza_asansor"></span></li>
                            <li class="list-group-item"><strong>Arızayı Onaran</strong> <span class="pull-right" id="ariza_onaran"></span></li>
                            <li class="list-group-item fiyat"><strong>Arızanın Tutarı</strong> <span class="pull-right" id="ariza_tutar"></span></li>
                        </ul>
                    </div>
                    <div id="degisimDiv" style="display: none;">
                        <h5 style="text-align: center">Değişim Detayı</h5>
                        <ul class="list-group degisimUl">
                            <li class="list-group-item"><strong>Değişen Parça</strong> <span class="pull-right" id="stok_adi"></span></li>
                            <li class="list-group-item"><strong>Birim Fiyat</strong> <span class="pull-right" id="fiyat"></span></li>
                            <li class="list-group-item"><strong>Değişen Miktar</strong> <span class="pull-right" id="adet"></span></li>
                            <li class="list-group-item"><strong>Birim</strong> <span class="pull-right" id="birim"></span></li>
                            <li class="list-group-item fiyat"><strong>Değişim Tutarı</strong> <span class="pull-right" id="tutar"></span></li>
                        </ul>
                    </div>
                    <div id="bakimDiv" style="display: none;">
                        <h5 style="text-align: center">Bakım Detayı</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Bakım Yapılan Asansör</strong> <span class="pull-right" id="bakim_asansor"></span></li>
                            <li class="list-group-item"><strong>Bakım Durumu</strong> <span class="pull-right" id="bakim_durum"></span></li>
                            <li class="list-group-item"><strong>Bakım Tarihi</strong> <span class="pull-right" id="bakim_tarih"></span></li>
                            <li class="list-group-item"><strong>Bakımı Yapan</strong> <span class="pull-right" id="bakim_yapan"></span></li>
                            <li class="list-group-item"><strong>Bakım İçeriği</strong> <span class="pull-right" id="bakim_icerik"></span></li>
                        </ul>
                    </div>


                    <!-- </div> -->

                </div>
            </div>
        </div>
    </div>






</section>
<?php $this->load->view('include/footer'); ?>