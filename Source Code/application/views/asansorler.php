<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-17 01:29:28
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-07-19 13:09:40
 */
$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Asansör İşlemleri</h2>
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
                                        <th>Son Bakım Tarihi</th>
                                        <th style="width: 18%">İşlemler</th>
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
                                            <td><a href="<?=base_url("ariza-olustur/".$asansor->asansor_id)?>" class="btn bg-pink waves-effect">
                                                <i class="material-icons">warning</i>
                                                <span>Arıza</span>
                                            </a> <a href="<?=base_url("asansor/".$asansor->asansor_id)?>" class="btn bg-blue waves-effect">
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