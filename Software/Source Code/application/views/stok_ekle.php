<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><b>Stok İşlemleri</b></h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Stok Ekle
                        </h2>
                    </div>
                    <div class="body">
                        <form action="<?=current_url()?>" method="POST">
                            <?=isset($hata) ? $hata: NULL?>
                            <?=validation_errors()?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("stok_kodu")?>" name="stok_kodu" class="form-control">
                                    <label class="form-label">Stok Kodu</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("stok_adi")?>" name="stok_adi" class="form-control">
                                    <label class="form-label">Stok Adı</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("alis_fiyat")?>" name="alis_fiyat" class="form-control fiyat">
                                    <label class="form-label">Alış Fiyatı</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("satis_fiyat")?>" name="satis_fiyat" class="form-control fiyat">
                                    <label class="form-label">Satış Fiyatı</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label>KDV Değeri</label>
                                    <select class="form-control show-tick" tabindex="-98" name="stok_kdv">
                                        <option value="18">%18</option>
                                        <option value="8">%8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label>Birim</label>
                                    <select class="form-control show-tick" tabindex="-98" name="stok_birim">
                                        <option value="Adet">Adet</option>
                                        <option value="Metre">Metre</option>
                                        <option value="Takım">Takım</option>
                                        <option value="Kilogram">Kilogram</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("stok_miktar")?>" name="stok_miktar" class="form-control">
                                    <label class="form-label">Miktar</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Stok Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php $this->load->view('include/footer'); ?>