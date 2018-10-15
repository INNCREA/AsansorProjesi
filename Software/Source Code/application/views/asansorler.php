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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Asansör Listesi
                        </h2>
                    </div>
                    <div class="body">
                        <?php 
                        $islem = $this->session->flashdata('islem');
                        if ($islem == 'ekle'){ ?>
                            <script>
                                swal("Kayıt işlemi başarılı !", "Asansör başarıyla eklenmiştir !", "success");
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
                                else if ($islem == 'bakim')
                                    { ?>
                                        <script>
                                            swal("Bakım işlemi başarılı !", "Bakım işlemi başarıyla yapılmıştır. !", "success");
                                        </script>
                                    <?php }
                                    else if ($islem == 'zaman')
                                        { ?>
                                            <script>
                                                swal("Bakım tarihi hatası !", "Asansörün bu ay bakımı yapılmıştır. Lütfen gelecek bakımı bekleyiniz. !", "danger");
                                            </script>
                                        <?php }
                                        else if ($islem == 'basarisiz')
                                            { ?>
                                                <script>
                                                    swal("İşlem başarısız !", "İşlem gerçekleştirilirken bir hata oluştu. Lütfen tekrar deneyiniz !", "danger");
                                                </script>
                                            <?php } ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover temel-tablo dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Asansör Kod</th>
                                                            <th>Asansör Adı</th>
                                                            <th>Adres</th>
                                                            <th>Yetkili</th>
                                                            <th style="width: 10%;">Sonraki Bakım Tarihi</th>
                                                            <th>Bakım Durumu</th>
                                                            <th>İşlemler</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php
                                                       if($asansorler){
                                                          foreach ($asansorler as $asansor) {
                                                           ?>
                                                           <tr>
                                                            <td><?=$asansor->asansor_kodu?></td>
                                                            <td><?=$asansor->asansor_adi?></td>
                                                            <td><?=$asansor->asansor_adres?></td>
                                                            <td><?=$asansor->musteri_adSoyad?></td>
                                                            <td><?php
                                                            $sonraki_bakimTarihi = strtotime('+ 30  day' , strtotime($asansor->asansor_bakimTarihi));
                                                            $sonraki_bakimTarihi = date("d.m.Y" , $sonraki_bakimTarihi);
                                                            echo $sonraki_bakimTarihi;
                                                            ?></td>
                                                            <td>
                                                                <!-- Bakım Durumu ayarlanıyor.  -->

                                                                <?php
                                                                if( (strtotime(date("d.m.Y")) - strtotime($asansor->asansor_bakimTarihi))/86400 > 59)
                                                                {
                                                                    echo "<span class='badge bg-red font-12'>Yapılmadı</span>";
                                                                } 
                                                                else if($asansor->bakim_durum == "Yapıldı" && ((strtotime(date("d.m.Y")) - strtotime($asansor->asansor_bakimTarihi))/86400 < 30))
                                                                {

                                                                    echo "<span class='badge bg-green font-12'>Yapıldı</span>";

                                                                }
                                                                else 
                                                                {
                                                                    echo "<span class='badge bg-cyan font-12'>Bakım Bekleniyor</span>";
                                                                }

                                                                ?>
                                                            </td>
                                                            <td><a href="<?=base_url("ariza-olustur/".$asansor->asansor_id)?>" class="btn bg-amber waves-effect">
                                                                <i class="material-icons">warning</i>
                                                                <span>Arıza</span>
                                                            </a> <a href="<?=base_url("asansor/".$asansor->asansor_id)?>" class="btn bg-cyan waves-effect">
                                                                <i class="material-icons">search</i>
                                                                <span>Detay</span>
                                                            </a> <a href="<?=base_url("asansor/sil/".$asansor->asansor_id)?>" class="btn bg-red waves-effect">
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
            </section>

            <?php $this->load->view('include/footer'); ?>