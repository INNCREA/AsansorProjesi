<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header');
$this->load->view('include/sidebar');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Rapor İşlemleri</h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php echo $raporAdi ?> Listesi
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable rapor-tablo">
                                <thead>
                                    <tr>
                                        <?php
                                        foreach ($rapor["table"] as $a) {
                                            echo "<th>".$a."</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($rapor["data"]){
                                        foreach ($rapor["data"] as $b) {
                                         ?>
                                         <tr>
                                            <?php
                                            foreach ($rapor["table"] as $c => $d) {
                                                echo "<td>".$b->$c."</td>";
                                            }
                                            ?>
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
    <!-- #END# Exportable Table -->
</div>
</section>
<?php $this->load->view('include/footer'); ?>