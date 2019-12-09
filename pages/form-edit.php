<?php
  $mesin = getData("SELECT * FROM mesin WHERE ip = '".$_GET['ip']."'");
?>
<div class="container">
  <h2>Mesin Presensi Form</h2>
  <form class="form-horizontal" method="post" action="">
    <input type="hidden" name="id" value="<?= $mesin['id'] ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="sn">Serial Number:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sn" placeholder="Enter SN Mesin" value="<?= $mesin['sn'] ?>" name="sn">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nama">Nama Mesin:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nama" placeholder="Enter Nama Mesin" name="nama" value="<?= $mesin['nama_mesin'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ip">IP Addres Mesin:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="ip" placeholder="Enter IP Address Mesin" name="ip" value="<?= $mesin['ip'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="comkey">ComKey Mesin:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="comkey" placeholder="Enter Angka Kunci Komunikasi Mesin" name="comkey" value="<?= $mesin['comkey'] ?>">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="simpan" class="btn btn-default">
      </div>
    </div>
  </form>
</div>
<?php 

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $sn = $_POST['sn'];
    $nama = $_POST['nama'];
    $ip = $_POST['ip'];
    $comkey = $_POST['comkey'];
    $sql="UPDATE mesin SET sn = '$sn', nama_mesin = '$nama', ip = '$ip', comkey = '$comkey' WHERE id = $id";
    $koneksi->query($sql);
    header('location:index.php?page=mesinedit&ip='.$ip);
    
}

?>
