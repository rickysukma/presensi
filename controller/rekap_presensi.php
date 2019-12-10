<?php
//koneksi database
include_once "config.php";

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

    //matching data
    date_default_timezone_set('Asia/Jakarta');
    $date_now = date('Y-m-d');
    $sqlSiswa = mysqli_query($koneksi, "SELECT * FROM `siswa` WHERE NOT EXISTS (SELECT id_siswa FROM rekap_presensi WHERE rekap_presensi.id_siswa = siswa.id_siswa AND rekap_presensi.status = 0 AND DATE(rekap_presensi.waktu) = '$date_now' GROUP BY siswa.id_siswa)");
    while ($dataSiswa = mysqli_fetch_assoc($sqlSiswa)) {
        $id_siswa = $dataSiswa['id_siswa'];
        $id_mapel = 1;
        $presensi = "bolos";
        //insert into presensi harian
    }
}
