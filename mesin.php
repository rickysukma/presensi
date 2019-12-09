<?php
require 'lib/class.Presensi.php';
$presensi  = new Presensi();
$presensi->ip;

?>

<div class="row">
    <div class="col-md-12">
        <?php
            if(cekDataSiswa($token,$_GET['ip'])){
                echo '<div class="alert alert-warning" role="alert">
                Sinkronkan data <b>server</b> dengan <b>lokal</b> —— klik untuk sinkronasi <a class="btn btn-md btn-primary" href="sinkron.php?ip='.$ip.'&token='.$token.'">sync</a>
              </div>';
            }

            if(isset($_GET['error'])){
                echo '<div class="alert alert-danger" role="alert">'.$_GET['error'].'
              </div>';
            }
        ?>
    </div>
</div>