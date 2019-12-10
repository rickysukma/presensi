<?php 	

include_once '../config.php';

//matching data
date_default_timezone_set('Asia/Jakarta');
$date_now = date('Y-m-d');
$sqlSiswa = mysqli_query($koneksi, "SELECT * FROM `siswa` WHERE NOT EXISTS (SELECT id_siswa FROM rekap_presensi WHERE rekap_presensi.id_siswa = siswa.id_siswa AND rekap_presensi.status = 0 AND DATE(rekap_presensi.waktu) = '$date_now' GROUP BY siswa.id_siswa)");
if (mysqli_num_rows($sqlSiswa) > 0) {
    while ($dataSiswa = mysqli_fetch_assoc($sqlSiswa)) {
        $id_siswa = $dataSiswa['id_siswa'];
        $id_mapel = 1;
        $presensi = "bolos";
        $data[] = ['id_siswa' => $id_siswa,
                    'id_mapel'=> $id_mapel,
                    'presensi' => $presensi];
    }

    echo json_encode($data);
}else{
    echo json_encode(mysqli_error($koneksi));
}
 ?>