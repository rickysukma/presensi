<?php

  // Fungsi Konversi nilai
  // @param $x adalah variable dari data nilai
  function mutu($x){
    if ($x <= 100 && $x > 85) {
        return 'A';
    }elseif ($x <= 85 && $x > 70) {
        return 'B';
    }elseif ($x <= 70 && $x > 60) {
        return 'C';
    }elseif ($x <= 60 && $x > 50) {
        return 'D';
    }else{
        return 'E';
    }
  }

    //Fungsi Total Nilai
    //Perkalian $x * $y
    //@param $x = Mutu
    //@param $y = Sks
    function totalNilai($x,$y){

      //Konversi huruf mutu ke nilai mutu
      if ($x == 'A') { 
          $x = 4;
      }elseif ($x == 'B') {
          $x = 3;
      }elseif ($x == 'C') {
          $x = 2;
      }elseif ($x == 'D') {
          $x = 1;
      }else{
        $x = 0;
      }

      return $x * $y;

    }

  $mysqli = new mysqli('localhost:3307','root','','crud');
  $sql= "SELECT * FROM mahasiswa JOIN nilai ON nilai.id_mahasiswa=mahasiswa.id JOIN makul ON nilai.id_makul=makul.id WHERE mahasiswa.id = $_GET[id]"; // Menampung perintah SQL ke variabel ‘sql’

  $biodata = "SELECT * FROM mahasiswa WHERE id = $_GET[id]"; /* query get mahasiswa*/
  $dataBiodata = $mysqli->query($biodata);                    /* exec query mahasiswa*/                                                           /* fetch result query mahasiswa*/

  $hasil = $mysqli->query($sql);

?>
<table style="color: #428bca">
  <thead>
    <?php while ($mahasiswa = $dataBiodata->fetch_array()) {
    ?>
    <tr>
      <th>NAMA&nbsp;</th>
      <td>:</td>
      <td><?php echo $mahasiswa['nama'] ?></td>
    </tr>
    <tr>
      <th>NIM&nbsp;</th>
      <td>:</td>
      <td><?php echo $mahasiswa['nim'] ?></td>
    </tr>
    <?php
      }
    ?>
  </thead>
</table>
<table class="table" style="color: #428bca" id="">
  <br>
  <thead>
    <tr>
      <th>No</th>
      <th scope="col">Mata Kuliah</th>
      <th>Huruf Mutu</th>
      <th scope="col">SKS</th>
      <th>Total Nilai</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    while($data = $hasil->fetch_array()){
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['makul'] ?></td>
      <td id="nilai"><?php echo $mutu = mutu($data['nilai']); ?></td>
      <td id="sks" class="sks"><?php echo $data['sks'] ?></td>
      <td id="totNilai" class="totNilai"><?php echo totalNilai($mutu,$data['sks']) ?></td>
      <?php } ?>
    </tr>
    <tr>
      <th style="text-align: right;" colspan="3">Jumlah :</th>
      <td colspan="2" id="jumlah"></td>
    </tr>
    <tr>
      <th style="text-align: right;" colspan="3">Rata - rata / Indeks Prestasi :</th>
      <td></td>
      <td id="rata"></td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
  var sum = 0;
  var result = 0;
// iterate through each td based on class and add the values
  $(".sks").each(function() {

      var value = $(this).text();
      // add only if the value is number
      if(!isNaN(value) && value.length != 0) {
          sum += parseFloat(value);
      }

      document.getElementById('jumlah').innerHTML = sum;
      console.log(sum);
  });

  $(".totNilai").each(function() {

      var tot = $(this).text();
      // add only if the value is number
      if(!isNaN(tot) && tot.length != 0) {
          result += parseFloat(tot);
      }

      document.getElementById('rata').innerHTML = result/sum;
      console.log(result);
  });
</script>