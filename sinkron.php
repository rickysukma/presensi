<?php
require 'config.php';
require 'lib/function.php';  
require 'lib/class.Presensi.php';
require 'session.php';  
$ip = $_GET['ip'];
$token = $_GET['token'];

$presensi = new Presensi();
$comkey = getData("SELECT comkey FROM mesin WHERE ip = '$ip'")['comkey'];
$id_mesin = getData("SELECT id FROM mesin WHERE ip = '$ip'")['id'];
if(cekMesin($token,$ip)){
    $server = cekDataSiswa($ip);
    if($server){
        $presensi->ip = $ip;
        $presensi->key = $comkey;
        $url = "http://sims.imersa.co.id/api/presensi?token=".$token."&siswa";
        $url = file_get_contents($url);
        $siswa = json_decode($url,true);
        // print_r($siswa);die();
        foreach($siswa as $s){
            $id_siswa = $s['id_siswa'];
            $nama = $s['nama_lengkap'];
            $rombel = $s['rombel'];
            $sql = "INSERT INTO siswa (id_siswa,nama_siswa,rombel,id_mesin) VALUES ($id_siswa,'$nama',$rombel,$id_mesin)";
            mysqli_query($koneksi,$sql);
            echo mysqli_error($koneksi).'<br>';
            $exe = $presensi->UploadNama($id_siswa,$nama);
            echo $exe['msg'];
        }
    }
}else{
    // header('location:index.php?page=mesin&ip='.$ip.'&error=Tidak dapat terhubung ke mesin dengan alamat <b>IP : '.$ip.'</b>');
}