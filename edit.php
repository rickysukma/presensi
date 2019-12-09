<?php
  $mysqli = new mysqli('localhost:3307','root','','crud');
  $sql= "SELECT * FROM mahasiswa WHERE id=$_GET[id]"; // Menampung perintah SQL ke variabel ‘sql’
  $hasil = $mysqli->query($sql)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    while($data = $hasil->fetch_array()){
?>
<div class="container">
  <br>
  <a href="index.php" class="btn btn-md btn-default">Dasboard</a>
  <h2>Mahasiswa Form</h2>
  <form class="form-horizontal" method="post" action="">
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
    <div class="form-group">
      <label class="control-label col-sm-2"  for="nim">NIM:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" value="<?php echo $data['nim'] ?>" id="nim" placeholder="Enter NIM Mahasiswa" name="nim">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nama">Nama Mahasiswa:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value="<?php echo $data['nama'] ?>" id="nama" placeholder="Enter Nama Mahasiswa" name="nama">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" class="btn btn-success" value="Simpan">
      </div>
    </div>
  </form>
</div>
<?php } ?>
</body>
</html>

<?php
  if (isset($_POST['submit'])) {
        $sql="UPDATE mahasiswa SET nim='$_POST[nim]', nama='$_POST[nama]' WHERE id='$_POST[id]'";
      $mysqli->query($sql);
      header('Location: '.$_SERVER['REQUEST_URI']);

  }

?>
