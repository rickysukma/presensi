<?php
require 'lib/class.Presensi.php';
$presensi  = new Presensi();
$presensi->ip = $_GET['ip'];

$comkey = getData("SELECT * from mesin where ip = '$presensi->ip'")['comkey'];
$presensi->key = $comkey;

$data = $presensi->getDataPresensi();

?>
<div class="row">
    <div class="col-md-12" style="float:right">
    <p style="text-right">Klik tombol presensi untuk menyimpan rekap presensi dari mesin</p>
        <a href="?page=presensi&ip=<?= $ip ?>&save" class="btn btn-primary" style="float:right; margin-bottom: 10px">Rekap Presensi</a>
    </div>
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
            if($data){
            foreach($data as $da){
            ?>
            <tr>
            <th scope="row"><?php echo $da['id'] ?></th>
            <!-- <td><?php echo $da['id'] ?></td> -->
            <td><?php echo $da['waktu'] ?></td>
            <td><?php echo $da['status'] ?></td>
            <?php } } ?>
            </tr>
        </tbody>
        </table>
    </div>
</div>
<?php 
if(isset($_GET['save'])){
    if($data){
        $no = 0;
        foreach($data as $da){
            $no++;
            $id = $da['id'];
            $waktu = $da['waktu'];
            $status = $da['status'];
            $sql = "INSERT INTO rekap_presensi (id_siswa,waktu,status) VALUES ($id,'$waktu',$status)";
            mysqli_query($koneksi,$sql);
            if($no == count($data) - 1){
                echo $presensi->ClearData();
            }
        }
    }
}