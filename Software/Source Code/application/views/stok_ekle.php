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
                                    <input type="text" value="<?=set_value("stok_fiyat")?>" name="stok_fiyat" class="form-control">
                                    <label class="form-label">Birim Fiyat</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("stok_paraBirimi")?>" name="stok_paraBirimi" id="stok_paraBirimi" class="form-control">
                                    <label class="form-label">Para Birimi</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="<?=set_value("stok_birim")?>" name="stok_birim" class="form-control">
                                    <label class="form-label">Birim</label>
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