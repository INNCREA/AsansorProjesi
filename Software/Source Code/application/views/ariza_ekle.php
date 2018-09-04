<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-08-01 15:12:18
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-08-01 19:02:55
 */
$this->load->view('include/header');
$this->load->view('include/sidebar');
?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Arıza İşlemleri</h2>
		</div>
		<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Arıza Ekle
                        </h2>
                    </div>
                    <div class="body">
                    	<?php if($this->session->flashdata('durum') == 'ok'){ ?>
                    		<script>swal("Ekleme islemi basarili!", "Ariza basariyla eklendi !", "success");</script>
                    	<?php
                    	}
                    	if($this->session->flashdata('durum') == 'no'){ ?>
                    		<script>swal("Ekleme islemi basarisiz!", "Ariza eklenemedi!", "error");</script>
                    	<?php } ?>
                        <form action="<?=current_url()?>" method="POST">
                            <?=isset($hata) ? $hata: NULL?>
                            <?=validation_errors()?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" tabindex="-98" name="ariza_kodu">
                                        <option disabled=""> Arıza Kodu Seçiniz </option>
                                        <?php
                                        if($kodlar){
                                            foreach ($kodlar as $kod) {
                                                echo '<option '.(set_value("ariza_kodu") == $kod->hata_kodu ? "selected" : NULL).' value="'.$kod->hata_kodu.'">'.$kod->hata_kodu.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" tabindex="-98" name="asansor_id">
                                        <option disabled=""> Asansör Seçiniz</option>
                                        <?php
                                        if($asansor){
                                            foreach ($asansor as $a) {
                                                echo '<option '.($a->asansor_id == $sid || set_value("asansor_id") == $a->asansor_id ? "selected" : NULL).' value="'.$a->asansor_id.'">'.$a->asansor_adi.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="asansor_aciklama" rows="4" class="form-control no-resize"><?=set_value("asansor_aciklama")?></textarea>
                                    <label class="form-label">Arıza Açıklaması</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Arızayı Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('include/footer'); ?>