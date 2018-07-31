<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Stok İşlemleri</h2>
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
                                swal("Kayıt işlemi başarılı !", "Kullanıcı başarıyla eklenmiştir !", "success");
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
                                            swal("İşlemi başarılı !", "İşlem gerçekleştirilirken bir hata oluştu. Lütfen tekrar deneyiniz !", "danger");
                                        </script>
                                    <?php } ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable temel-tablo">
                                            <thead>
                                                <tr>
                                                    <th>Stok Kodu</th>
                                                    <th>Stok Adı</th>
                                                    <th>Birim Fiyat</th>
                                                    <th>Para Birimi</th>
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
                                                        <td><?=$stok->stok_fiyat?></td>
                                                        <td><?=$stok->stok_paraBirimi?></td>
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
                                        <input type="text" value="<?=set_value("stok_fiyat")?>" name="stok_fiyat" id="stok_fiyat" class="form-control">
                                        <label class="form-label">Birim Fiyat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("stok_paraBirimi")?>" name="stok_paraBirimi" id="stok_paraBirimi" class="form-control">
                                        <label class="form-label">Para Birimi</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("stok_birim")?>" name="stok_birim" id="stok_birim" class="form-control">
                                        <label class="form-label">Birim</label>
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