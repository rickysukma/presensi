<?php
	$mysqli = new mysqli('localhost:3307','root','','crud');
    $sql="DELETE FROM mahasiswa WHERE id=$_GET[id]";
    $mysqli->query($sql);
    header('location:index.php');
?>