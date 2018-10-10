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
                            Stok Listesi
                        </h2>
                    </div>
                    <div class="body">
                        <?php 
                        $islem = $this->session->flashdata('islem');
                        if ($islem == 'ekle'){ ?>
                            <script>
                                swal("Kayıt işlemi başarılı !", "Stok başarıyla eklenmiştir !", "success");
                            </script>
                        <?php } 
                        else if ($islem == 'guncelle')
                            { ?>
                                <script>
                                    swal("Güncelleme işlemi başarılı !", "Kayıt başarıyla güncellenmiştir !", "success");
                                </script>
                            <?php }
                            else if ($islem == 'sil')
                                { ?>
                                    <script>
                                        swal("Silme işlemi başarılı !", "Kayıt başarıyla silinmiştir !", "success");
                                    </script>
                                <?php }
                                else if ($islem == 'basarisiz')
                                    { ?>
                                        <script>
                                            swal("İşlem başarısız !", "İşlem gerçekleştirilirken bir hata oluştu. Lütfen tekrar deneyiniz !", "danger");
                                        </script>
                                    <?php } ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable temel-tablo">
                                            <thead>
                                                <tr>
                                                    <th>Stok Kodu</th>
                                                    <th>Stok Adı</th>
                                                    <th>Alış Fiyatı</th>
                                                    <th>Satış Fiyatı</th>
                                                    <th>KDV Değeri</th>
                                                    <th>Birim</th>
                                                    <th>Miktar</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if($stoklar){
                                                    foreach ($stoklar as $stok) {
                                                       ?>
                                                       <tr>
                                                        <td><?=$stok->stok_kodu?></td>
                                                        <td><?=$stok->stok_adi?></td>
                                                        <td class="fiyat"><?=$stok->alis_fiyat?></td>
                                                        <td class="fiyat"><?=$stok->satis_fiyat?></td>
                                                        <td><?=$stok->stok_kdv?></td>
                                                        <td><?=$stok->stok_birim?></td>
                                                        <td><?=$stok->stok_miktar?></td>
                                                        <td><button type="button" data-id="<?=$stok->stok_id?>" data-url="<?=base_url('stok/stokCek/')?>" class="btn bg-green waves-effect duzenleStok">
                                                            <i class="material-icons">create</i>
                                                            <span>Düzenle</span>
                                                        </button> <a href="<?=base_url("stok/sil/".$stok->stok_id)?>" class="btn bg-red waves-effect sil">
                                                            <i class="material-icons">delete</i>
                                                            <span>Sil</span>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="duzenle" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Stok Düzenle</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url('stok/guncelle')?>" method="POST">
                                <?=validation_errors()?>
                                <div class="form-group form-float">
                                    <input type="hidden" value="<?=set_value("stok_id")?>" id="stok_id" name="stok_id" class="form-control">
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("stok_kodu")?>" name="stok_kodu" id="stok_kodu" class="form-control">
                                        <label class="form-label">Stok Kodu</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("stok_adi")?>" name="stok_adi" id="stok_adi" class="form-control">
                                        <label class="form-label">Stok Adı</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("alis_fiyat")?>" name="alis_fiyat" id="alis_fiyat" class="form-control fiyat">
                                        <label class="form-label">Alış Fiyat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("satis_fiyat")?>" name="satis_fiyat" id="satis_fiyat" class="form-control fiyat">
                                        <label class="form-label">Satış Fiyat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>KDV Değeri</label>
                                        <select class="form-control show-tick" tabindex="-98" id="stok_kdv" name="stok_kdv">
                                            <option>Bir değer seçiniz</option>
                                            <option value="18">%18</option>
                                            <option value="8">%8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>Birim</label>
                                        <select class="form-control show-tick" tabindex="-98" id="stok_birim" name="stok_birim">
                                            <option value="Adet">Adet</option>
                                            <option value="Metre">Metre</option>
                                            <option value="Takım">Takım</option>
                                            <option value="Kilogram">Kilogram</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("stok_miktar")?>" name="stok_miktar" id="stok_miktar" class="form-control">
                                        <label class="form-label">Miktar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success waves-effect">GÜNCELLE</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" >VAZGEÇ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('include/footer'); ?>