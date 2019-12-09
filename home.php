<?php
  $mysqli = new mysqli('localhost','root','','crud');
  $sql= "SELECT * FROM mesin"; // Menampung perintah SQL ke variabel ‘sql’
  $hasil = $mysqli->query($sql);
?>
<!-- Button tambah -->
<!-- Table Mesin -->
<table class="table" style="color: #428bca" id="DataTable">
  <thead>
    <tr>
      <th scope="col">SN Mesin</th>
      <th scope="col">Nama Mesin</th>
      <th scope="col">IP Mesin</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($hasil){
    while($data = $hasil->fetch_array()){
    ?>
    <tr>
      <th scope="row"><?php echo $data['sn'] ?></th>
      <td><?php echo $data['nama_mesin'] ?></td>
      <td><?php echo $data['ip'] ?></td>
      <td><?php $cek = cekMesin($data['ip']);  
          if($cek){
            echo "<span class='btn btn-xs btn-success'>ONLINE</span>";
          }else{
            echo "<span class='btn btn-xs btn-danger'>OFFLINE</span>";
          }
      ?></td>
      <td>
            <a href="index.php?page=mesin&ip=<?php echo $data['ip'] ?>" class="btn btn-xs btn-primary">
                <span class="" title="Detail">Detail</span>
            </a>
            <a href="index.php?page=mesinedit&ip=<?php echo $data['ip'] ?>" class="btn btn-xs btn-warning">
                <span class="" title="Setting">Setting</span>
            </a>
      </td>
    <?php } } ?>
    </tr>
  </tbody>
</table>

