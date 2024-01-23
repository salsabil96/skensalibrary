<?php
$halaman = 6;
$page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($koneksi, "SELECT id_kunjungan FROM kunjungan_anggota");
$no=$mulai+1;
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Kunjungan Anggota</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Kunjungan Anggota</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5">
        <ul class="pagination pagination pull-right">
          <?php 
         if($page>1){
           $link=$page-1; 
           echo" <li><a href='admin.php?id=kunjungananggota&halaman=$link'>«</a></li> "; }
           else { $prev = ""; }
           for ($i=1; $i<=$pages; $i++){ ?>
            <li><a href="admin.php?id=kunjungananggota&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php }
           
          $JmlHalaman = ceil($total/$halaman);
          if ( $page < $JmlHalaman ) {
           $link = $page + 1;
           echo "<li><a href='admin.php?id=kunjungananggota&halaman=$link'>»</a></li>"; }
          else { $next = ""; } ?>
        </ul>
      </div>
      <div class="col-lg-4"><br>
        <form class="form-inline pull-left" role="form" method="post" action="admin.php?id=searchkunjungananggota">
          <div class="form-group">
            <input type="text"  class="form-control" name="keyword" placeholder="Pencarian">
          </div>
          <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
        </form>
      </div>
    </div>

    <?php
    $sql = "SELECT a.id_kunjungan, a.tanggal_kunjungan, a.id_anggota, b.nama_anggota, b.status, b.keterangan, a.tujuan FROM kunjungan_anggota a INNER JOIN anggota b on (a.id_anggota=b.id_anggota) ORDER BY id_kunjungan LIMIT $mulai, $halaman";
    $result = mysqli_query($koneksi, $sql);
    $total = mysqli_num_rows($result);
    //  if($total == 0){
      //  echo "Tidak ada data kunjungan";
      //}

    //  else { ?>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>ID Kunjungan</th>
                <th>Tanggal Kunjungan</th>
                <th>Nama Anggota</th>
                <th>Status</th>
                <th>Tujuan</th>
                <th>Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($result)){ ?>
                  <tr> <?php
                  echo "<td>$data[0]</td>";
                  echo "<td>$data[1]</td>";
                  echo "<td>" . $data[3] . "</td>";
                  echo "<td>" . $data[4] . " " . $data[5] ."</td>";
                  echo "<td>$data[6]</td>";
                  ?>
                  <td width="15%">
                    <a class="btn btn-danger" href="admin.php?id=deletekunjungananggota&kunjunganID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                  </td>
                  </tr> <?php
                } ?>
              </tbody>
            </table>
          </div>
          </div> <?php
    //  }
          ?>
        </section>
        <?php include "./layout/footer.php"; ?>
