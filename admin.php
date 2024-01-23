<?php
  session_start();
  if   (!isset($_SESSION ['id_user'])) 
  	{ header('Location:index.php?id=login'); }
  else 
  	{ $id_user = $_SESSION['id_user']; }

  include "koneksi.php";
  include "./layout/headeradmin.php";
  include "./layout/sidebaradmin.php";
  include "route.php";
  include "./admin/dashboard.php";
  include "./layout/footer.php";
?>
