<?php 

if(isset($_GET['ip']) && !empty($_GET['ip'])){
    $ip = $_GET['ip'];
?>
<li><a href="?page=siswa&ip=<?= $ip ?>"><i class="fa fa-users"></i> Daftar Siswa</a></li>
<li><a href="?page=presensi&ip=<?= $ip ?>"><i class="fa fa-calendar"></i> Presensi Siswa</a></li>
<li><a href="?page=rekap&ip=<?= $ip ?>"><i class="fa fa-user"></i> Rekap Presensi Siswa</a></li>
<li><a href="?page=serveri&ip=<?= $ip ?>"><i class="fa fa-cloud"></i> Sinkron Siswa</a></li>
<?php
}else{
    echo '<li><a href="?page=tambah"><i class="fa fa-plus"></i> Tambah Mesin </a></li>';
}
?>