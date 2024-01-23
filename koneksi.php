<?php
  $host = "localhost";
  $user = "firstmed_user";
  $pass = "aslabKOM1234";
  $db = "firstmed_skensalibrary";
  $koneksi = mysqli_connect($host, $user, $pass, $db);
  if(!$koneksi)
    echo("Data tidak terkoneksi");
  else
    mysqli_select_db($koneksi, $db) or die (mysqli_connect_errno());
?>
