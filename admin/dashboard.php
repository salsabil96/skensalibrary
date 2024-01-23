<?php
  $r_anggota = mysqli_query($koneksi, "SELECT id_anggota FROM anggota");
  $total_anggota = mysqli_num_rows($r_anggota);

  $r_buku = mysqli_query($koneksi, "SELECT SUM(jumlah) FROM buku");
  $total_buku = mysqli_fetch_array($r_buku);

  $r_kunjungan = mysqli_query($koneksi, "SELECT id_kunjungan FROM kunjungan_anggota");
  $total_kunjungan = mysqli_num_rows($r_kunjungan);

  $r_tamu = mysqli_query($koneksi, "SELECT id_tamu FROM tamu_perpus");
  $total_tamu = mysqli_num_rows($r_tamu);
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ul>
      </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="x_panel">
      <div class="x_title">
            <h4>Welcome!</h4>
            <div class="clearfix"></div>
          </div>
      <div class="x_content">
            <p><b>Hai, <?php echo $id_user; ?></b></p>
            <p>Selamat datang di halaman administrator Perpustakaan SMK Negeri 1 Rangkasbitung. Anda dapat mengelola konten melalui menu yang tersedia</p><br>
      </div>
    </div>
  </div>
    
    
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box blue-bg">
          <i class="fa fa-cloud-download"></i>
          <div class="count"><?php echo $total_anggota; ?></div>
          <div class="title">Anggota</div>
        </div>
        </div>
      

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box brown-bg">
          <i class="fa fa-shopping-cart"></i>
          <div class="count"><?php echo $total_buku[0]; ?></div>
          <div class="title">Buku</div>
        </div>
      </div>
      
      

      

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box dark-bg">
          <i class="fa fa-thumbs-o-up"></i>
          <div class="count"><?php echo $total_kunjungan; ?></div>
          <div class="title">Kunjungan Anggota</div>
        </div>
      </div>
  
  

      
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box green-bg">
          <i class="fa fa-cubes"></i>
          <div class="count"><?php echo $total_tamu; ?></div>
          <div class="title">Kunjungan Tamu</div>
        </div>
      </div>
    </div> <!--div row -->
  </section> <!-- wrapper -->
</section>
<br><br><br><br><br><!-- main-content -->
