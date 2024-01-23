<?php
  $query = mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$userID'");
  $data = mysqli_fetch_array($query);
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data User Account</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=useraccount">Data User Account</a></li>
          <li><i class="fa fa-file-text-o"></i>Detail Data User Account</li>
        </ul>
      </div>
    </div>
    <?php
      if($data[0]=='member'){
        include "detailuseranggota.php";
      }
      elseif($data[0]=='admin') {
        include "detailuserpetugas.php";
      }
    ?>
  </section>
  <?php include "./layout/footer.php"; ?>
