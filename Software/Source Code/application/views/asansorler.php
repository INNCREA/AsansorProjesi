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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover temel-tablo dataTable">
                                <thead>
                                    <tr>
                                        <th>Asansör Kod</th>
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
                                            <td><?=$asansor->asansor_adres?></td>
                                            <td><?=$asansor->musteri_adSoyad?></td>
                                            <td><?=$asansor->asansor_bakimTarihi?></td>
                                            <td>
                                                <!-- Bakım Durumu ayarlanıyor.  -->

                                                <?php if((strtotime($asansor->asansor_bakimTarihi)-strtotime(date("d.m.Y")) < 0) && ($asansor->bakim_durum == ""))
                                                {
                                                    echo "<span class='badge bg-red font-12'>Yapılmadı</span>";
                                                } 
                                                else if($asansor->bakim_durum == "Yapıldı"){

                                                    echo "<span class='badge bg-green font-12'>".$asansor->bakim_durum."</span>";

                                                }
                                                else if($asansor->bakim_durum == "")
                                                {
                                                    echo "<span class='badge bg-cyan font-12'>Bakım Bekleniyor</span>";
                                                }

                                                ?>
                                            </td>
                                            <td><a href="<?=base_url("ariza-olustur/".$asansor->asansor_id)?>" class="btn bg-amber waves-effect">
                                                <i class="material-icons">warning</i>
                                                <span>Arıza</span>
                                            </a> <a href="<?=base_url("bakim/bakimYap/".$asansor->asansor_id)?>" class="btn bg-green waves-effect">
                                                <i class="material-icons">build</i>
                                                <span>Bakım</span>
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