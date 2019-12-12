<?php
require 'lib/class.Presensi.php';
$presensi  = new Presensi();
$presensi->ip = $_GET['ip'];

$comkey = getData("SELECT * from mesin where ip = '$presensi->ip'")['comkey'];
$presensi->key = $comkey;
$ip = $_GET['ip'];

$data = $presensi->getDataPresensi();
if (count($data) <= 2) {
    $disable = 'disabled';
}

?>
<div class="row">
    <div class="col-md-12">
        <table class="table" style="color: #428bca" id="DataTable">
            <thead>
                <tr>
                    <th scope="col">ID Siswa</th>
                    <!-- <th scope="col">Nama</th> -->
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($data) {
                    foreach ($data as $da) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $da['id'] ?></th>
                            <!-- <td><?php echo $da['id'] ?></td> -->
                            <td><?php echo $da['waktu'] ?></td>
                            <td><?php echo $da['status'] ?></td>
                    <?php }
                    } ?>
                        </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row" style="margin-top : 30px">
    <div class="col-md-12">
        <form action="?page=rekap_presensi&ip=<?= $ip ?>&rekap" method="post">
            <input type="submit" name="rekap" id="rekap" class="btn btn-primary" style="float:right;" value="Rekap Presensi" <?php echo $disable;?>>
        </form>
        <p style="text-right">Klik tombol presensi untuk menyimpan rekap presensi dari mesin</p>
        <!-- <a href="?page=presensi&ip=<?= $ip ?>&rekap" class="btn btn-primary" style="float:right; margin-bottom: 10px">Rekap Presensi</a> -->
    </div>
</div>