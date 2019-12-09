<?php
$data = getDataAll("SELECT * from rekap_presensi",$koneksi);
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
            if($data){
            foreach($data as $da){
            ?>
            <tr>
            <th scope="row"><?php echo $da['id_siswa'] ?></th>
            <!-- <td><?php echo $da['id'] ?></td> -->
            <td><?php echo $da['waktu'] ?></td>
            <td><?php echo $da['status'] ?></td>
            <?php } } ?>
            </tr>
        </tbody>
        </table>
    </div>
</div>