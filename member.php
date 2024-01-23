<?php
  session_start();
  if   (!isset($_SESSION ['id_user'])) { header('Location:index.php?id=login'); }
  else { $id_user = $_SESSION['id_user']; }

  include "koneksi.php";
  include "./layout/headermember.php";
  include "./layout/sidebarmember.php";
  include "route.php";
  include "./member/dashboard.php";
  include "./layout/footer.php";
?>