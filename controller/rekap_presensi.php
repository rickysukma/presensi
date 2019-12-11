<?php
//koneksi database
include_once "config.php";
include_once "lib/function.php";

require 'lib/class.Presensi.php';
$presensi  = new Presensi();
$presensi->ip = $_GET['ip'];

$comkey = getData("SELECT * from mesin where ip = '$presensi->ip'")['comkey'];
$presensi->key = $comkey;

$data = $presensi->getDataPresensi();

if (isset($_POST['rekap'])) {
    if ($data) {
        $no = 0;
        foreach ($data as $da) {
            $no++;
            $id = $da['id'];
            $waktu = $da['waktu'];
            $status = $da['status'];
            $sql = "INSERT INTO rekap_presensi (id_siswa,waktu,status) VALUES ($id,'$waktu',$status)";
            mysqli_query($koneksi, $sql);
            if ($no == count($data) - 1) {
                echo $presensi->ClearData();
            }
        }
    }

    include_once 'siswa_tidakHadir.php';



}

echo '</br>
<a href="?page=presensi&ip='.$_GET['ip'].'" class="btn btn-primary" style="margin-top:30px;">Lihat Presensi</a>';

