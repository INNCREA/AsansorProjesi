<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><b>Müşteriler</b></h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Müşteri Listesi
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
                                            swal("İşlemi başarısız !", "İşlem gerçekleştirilirken bir hata oluştu. Lütfen tekrar deneyiniz !", "danger");
                                        </script>
                                    <?php } ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable temel-tablo">
                                            <thead>
                                                <tr>
                                                    <th>Müşteri</th>
                                                    <th>Adres</th>
                                                    <th>Telefon</th>
                                                    <th>Mail</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if($musteriler){
                                                    foreach ($musteriler as $musteri) {
                                                     ?>
                                                     <tr>
                                                        <td><?=$musteri->musteri_adSoyad?></td>
                                                        <td><?=$musteri->musteri_adres?></td>
                                                        <td><?=$musteri->musteri_tel?></td>
                                                        <td><?=$musteri->musteri_mail?></td>
                                                        <td><button type="button" data-id="<?=$musteri->musteri_id?>" data-url="<?=base_url('musteri/musteriCek/')?>" class="btn bg-green waves-effect duzenleMusteri">
                                                            <i class="material-icons">create</i>
                                                            <span>Düzenle</span>
                                                        </button> <a href="<?=base_url("musteri/sil/".$musteri->musteri_id)?>" class="btn bg-red waves-effect sil">
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
                            <h4 class="modal-title" id="defaultModalLabel">Müşteri Düzenle</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url('musteri/guncelle')?>" method="POST">
                                <?=validation_errors()?>
                                <div class="form-group form-float">
                                    <input type="hidden" value="<?=set_value("musteri_id")?>" id="musteri_id" name="musteri_id" class="form-control">
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("musteri_adSoyad")?>" name="musteri_adSoyad" id="musteri_adSoyad" class="form-control">
                                        <label class="form-label">Müşteri Ad Soyad</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("musteri_mail")?>" name="musteri_mail" id="musteri_mail" class="form-control">
                                        <label class="form-label">Müşteri Mail</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("musteri_tel")?>" name="musteri_tel" id="musteri_tel" class="form-control">
                                        <label class="form-label">Müşteri Telefon</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("musteri_adres")?>" name="musteri_adres" id="musteri_adres" class="form-control">
                                        <label class="form-label">Müşteri Adres</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?=set_value("musteri_kAdi")?>" name="musteri_kAdi" id="musteri_kAdi" class="form-control">
                                        <label class="form-label">Müşteri Kullanıcı Adı</label>
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