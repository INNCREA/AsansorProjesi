<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Müşteriler</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Müşteri Ekle
                        </h2>
                    </div>
                    <div class="body">
                        <form action="<?=current_url()?>" method="POST">
                            <?=validation_errors()?>
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
                                    <input type="text" value="<?=set_value("musteri_adres")?>" name="musteri_adres" id="musteri_adres" class="form-control">
                                    <label class="form-label">Müşteri Adres</label>
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
                                    <input type="password" value="<?=set_value("sifre_tekrar")?>" name="sifre_tekrar" class="form-control">
                                    <label class="form-label">Şifre Tekrar</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Müşteri Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
<?php $this->load->view('include/footer'); ?>