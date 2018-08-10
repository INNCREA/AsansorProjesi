<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><b>Asansör İşlemleri</b></h2>
        </div>

        <?php 
        $islem = $this->session->flashdata('islem');
        if ($islem == 'ekle'){ ?>
            <script>
                swal("Kayıt işlemi başarılı !", "Hata kodu başarıyla eklenmiştir !", "success");
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

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Hata Kodları
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable temel-tablo">
                                            <thead>
                                                <tr>
                                                    <th>Hata Kodu</th>
                                                    <th>Hata Açıklaması</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if($hatakodlari){
                                                    foreach ($hatakodlari as $hata) {
                                                     ?>
                                                     <tr>
                                                        <td><?=$hata->hata_kodu?></td>
                                                        <td><?=$hata->hata_aciklama?></td>
                                                        <td><button type="button" data-id="<?=$hata->hata_id?>" data-url="<?=base_url('hatakodlari/hatakoduCek/')?>" class="btn bg-green waves-effect duzenleHata">
                                                            <i class="material-icons">create</i>
                                                            <span>Düzenle</span>
                                                        </button> <a href="<?=base_url("hatakodlari/sil/".$hata->hata_id)?>" class="btn bg-red waves-effect sil">
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


                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Hata Kodu Ekle
                                </h2>
                            </div>
                            <div class="body">
                                <form action="<?=base_url('hatakodlari/ekle')?>" method="POST">
                                    <?=validation_errors()?>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?=set_value("hata_kodu")?>" name="hata_kodu" class="form-control">
                                            <label class="form-label">Hata Kodu</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?=set_value("hata_aciklama")?>" name="hata_aciklama" class="form-control">
                                            <label class="form-label">Hata Açıklaması</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Hata Kodu Ekle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="modal fade" id="duzenle" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="defaultModalLabel">Hatakodu Düzenle</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('hatakodlari/guncelle')?>" method="POST">
                                    <?=validation_errors()?>
                                    <div class="form-group form-float">
                                        <input type="hidden" value="<?=set_value("hata_id")?>" id="hata_id" name="hata_id" class="form-control">
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" value="<?=set_value("hata_kodu")?>" id="hata_kodu" name="hata_kodu" class="form-control">
                                            <label class="form-label">Hata Kodu</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" value="<?=set_value("hata_aciklama")?>" id="hata_aciklama" name="hata_aciklama" class="form-control">
                                            <label class="form-label">Hata Açıklaması</label>
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
            </div>
        </section>
        <?php $this->load->view('include/footer'); ?>