<?php
// koneksi database
include 'config.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];

// menginput data ke database
$link = mysqli_query($koneksi,"insert into mahasiswa values('$nama','$nim')");

// mengalihkan halaman kembali ke index.php
// header("location:index.php");
echo "Kode error: ".mysqli_errno($koneksi);
echo mysqli_error($link);

?>