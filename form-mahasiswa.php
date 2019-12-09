
  <h2>Mahasiswa Form</h2>
  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="nim">NIM:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nim" placeholder="Enter NIM Mahasiswa" name="nim">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nama">Nama Mahasiswa:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nama" placeholder="Enter Nama Mahasiswa" name="nama">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="simpan" class="btn btn-default">
      </div>
    </div>
  </form>

<?php 

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $mysqli = new mysqli('localhost:3307','root','','crud');
    $sql="INSERT INTO mahasiswa (nama, nim) VALUES ('$nama','$nim')";
    $mysqli->query($sql);
    header('location:index.php');
    
}

?>
