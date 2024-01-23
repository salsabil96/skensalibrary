<?php
  $r_kunjungan = mysqli_query($koneksi, "SELECT b.nama_anggota FROM kunjungan_anggota a inner join anggota b on (a.id_anggota=b.id_anggota) where b.id_user='$id_user'");
  $total_kunjungan = mysqli_num_rows($r_kunjungan);
  $nama = mysqli_fetch_array($r_kunjungan);

  $r_pinjam = mysqli_query($koneksi, "SELECT a.id_peminjaman FROM peminjaman a inner join anggota b on (a.id_anggota=b.id_anggota) where b.id_user='$id_user'");
  $total_pinjam = mysqli_num_rows($r_pinjam);

  $r_bookmark = mysqli_query($koneksi, "SELECT a.id_bookmark FROM bookmark a LEFT OUTER JOIN anggota b on (a.id_anggota=b.id_anggota) where b.id_user='$id_user'");
  $total_bookmark = mysqli_num_rows($r_bookmark);
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="member.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <h2 class="text-center">Selamat Datang, <?php echo $nama[0]; ?></h2>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box blue-bg">
          <i class="fa fa-cloud-download"></i>
          <div class="count"><?php echo $total_pinjam; ?></div>
          <div class="title">Peminjaman</div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box brown-bg">
          <i class="fa fa-cloud-download"></i>
          <div class="count"><?php echo $total_kunjungan; ?></div>
          <div class="title">Kunjungan</div>
        </div>
      </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="info-box blue-bg">
        <i class="fa fa-cloud-download"></i>
        <div class="count"><?php echo $total_bookmark; ?></div>
        <div class="title">Bookmark</div>
      </div>
    </div>




    </div>
    </div> <!--div row -->
  </section> <!-- wrapper -->
</section>
<br><br><br><br><br><br><!-- main-content -->
