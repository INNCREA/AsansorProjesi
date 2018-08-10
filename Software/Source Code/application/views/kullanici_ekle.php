<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><b>Kullanıcı İşlemleri</b></h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Kullanıcı Ekle
                        </h2>
                    </div>
                    <div class="body">
                        <form action="<?=current_url()?>" method="POST">
                            <?=isset($hata) ? $hata: NULL?>
                            <?=validation_errors()?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("kullanici_tckn")?>" name="kullanici_tckn" class="form-control">
                                    <label class="form-label">T.C. Kimlik Numarası</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("kullanici_adSoyad")?>" name="kullanici_adSoyad" class="form-control">
                                    <label class="form-label">Ad Soyad</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("kullanici_adres")?>" name="kullanici_adres" class="form-control">
                                    <label class="form-label">Adres</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("kullanici_tel")?>" name="kullanici_tel" class="form-control">
                                    <label class="form-label">Telefon</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("kullanici_mail")?>" name="kullanici_mail" class="form-control">
                                    <label class="form-label">E-posta</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label>Rol Seçiniz</label>
                                    <select class="form-control show-tick" tabindex="-98" name="kullanici_rol">
                                        <option disabled=""> Rol Seçiniz </option>
                                        <option value="1">Yönetici</option>
                                        <option value="2">Teknik Servis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label>Durum</label>
                                    <select class="form-control show-tick" tabindex="-98" id="kullanici_durum" name="kullanici_durum">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("kullanici_adi")?>" name="kullanici_adi" class="form-control">
                                    <label class="form-label">Kullanıcı Adı</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" value="<?=set_value("kullanici_sifre")?>" name="kullanici_sifre" class="form-control">
                                    <label class="form-label">Kullanıcı Şifre</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" value="<?=set_value("sifre_tekrar")?>" name="sifre_tekrar" class="form-control">
                                    <label class="form-label">Şifre Tekrar</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kullanıcı Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php $this->load->view('include/footer'); ?>