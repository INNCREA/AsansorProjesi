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
                                <a href="#tahsilat" data-toggle="tab">
                                    <i class="material-icons">account_balance_wallet</i> TAHSİLAT
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
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
                        <div role="tabpanel" class="tab-pane fade" id="tahsilat">
                            <div class="panel-group full-body" id="accordion_5" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <div class="panel-heading bg-blue-grey" role="tab" id="headingOne_5">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion_5" href="#collapseOne_5" aria-expanded="false" aria-controls="collapseOne_5">
                                                NAKİT
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne_5" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_5">
                                        <div class="panel-body">
                                         <form action="<?=base_url("cari/tahsilat")?>" method="POST">
                                            <?=validation_errors()?>
                                            <div class="form-group form-float">
                                                <input type="hidden" value="<?=$cari->cari_id?>" id="tahsilat_id" name="tahsilat_id" class="form-control">
                                            </div>

                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-3 col-xs-4 form-control-label">
                                                    <input type="radio" name="tahsilat_radio" id="toplam" class="with-gap">
                                                    <label for="toplam">Toplam Tutar :</label>
                                                </div>
                                                <div class="col-lg-9 col-md-10 col-sm-9 col-xs-8">
                                                    <div class="form-group">
                                                        <div id="toplam_tutar_div" class="form-line focused warning">
                                                            <input type="text" name="tahsilat_tutar" value="<?=$cari->cari_bakiye?>" id="toplam_tutar" class="form-control fiyat" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-2 col-sm-3 col-xs-4 form-control-label">
                                                    <input type="radio" name="tahsilat_radio" id="diger" class="with-gap">
                                                    <label for="diger">Diğer Tutar :</label>
                                                </div>
                                                <div class="col-lg-9 col-md-10 col-sm-9 col-xs-8">
                                                    <div class="form-group">
                                                        <div class="form-line success">
                                                            <input type="text" value="<?=set_value("diger_tutar")?>" name="tahsilat_tutar" id="diger_tutar" class="form-control fiyat" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success waves-effect">TAHSİL ET</button>
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" >VAZGEÇ</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading bg-blue-grey" role="tab" id="headingTwo_5">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_5" href="#collapseTwo_5" aria-expanded="false"
                                        aria-controls="collapseTwo_5">
                                        ÇEK
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo_5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_5">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                    eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                    Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                    raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading bg-blue-grey" role="tab" id="headingThree_5">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_5" href="#collapseThree_5" aria-expanded="false"
                                    aria-controls="collapseThree_5">
                                    SENET
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree_5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_5">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                raw denim aesthetic synth nesciunt you probably haven't heard of them
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- #END# Tabs With Icon Title -->




</div>
</section>
<?php $this->load->view('include/footer'); ?>