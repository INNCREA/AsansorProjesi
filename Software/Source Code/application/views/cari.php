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
                                                <td><?=$islem['0']->islem_turu?></td>
                                                <td><?=$islem['0']->islem_kodu?></td>
                                                <td><?=$islem['0']->islem_tarih?></td>
                                                <td><?=$islem['0']->asansor_adi?></td>
                                                <td class="fiyat"><?=$islem['0']->islem_tutar?></td>
                                                <td> <button type="button" data-id="<?=$islem['0']->islem_kodu?>" data-turu="<?=$islem['0']->islem_turu?>" data-url="<?=base_url('cari/islemIncele/')?>" class="btn bg-green waves-effect islemIncele">
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



<div class="modal fade" id="islemIncele" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">İşlem İncele</h4>
                <hr>
            </div>
            <div class="modal-body">



            </div>
        </div>
    </div>
</div>






</section>
<?php $this->load->view('include/footer'); ?>