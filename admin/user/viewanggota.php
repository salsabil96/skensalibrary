<?php
$halaman = 3;
$page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($koneksi, "SELECT * FROM anggota");
$no=$mulai+1;
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Anggota</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Anggota</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5"><br>
        <a class="btn btn-primary" href="admin.php?id=addanggota"><i class="icon_plus_alt2"></i> Tambah Anggota</a>
      </div>
      <div class="col-lg-3">
        <ul class="pagination pagination pull-left">
          <?php 
         if($page>1){
           $link=$page-1; 
           echo" <li><a href='admin.php?id=anggota&halaman=$link'>«</a></li> "; }
           else { $prev = ""; }
           for ($i=1; $i<=$pages; $i++){ ?>
            <li><a href="admin.php?id=anggota&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php }
           
          $JmlHalaman = ceil($total/$halaman);
          if ( $page < $JmlHalaman ) {
           $link = $page + 1;
           echo "<li><a href='admin.php?id=anggota&halaman=$link'>»</a></li>"; }
          else { $next = ""; } ?>
       </ul>
     </div>
     <div class="col-lg-4"><br>
      <form class="form-inline pull-right" role="form" method="post" action="admin.php?id=searchanggota">
        <div class="form-group">
          <input type="text" class="form-control" name="keyword" placeholder="Pencarian">
        </div>
        <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
      </form>
    </div>
  </div>
  <?php
  if($total == 0){
    echo "Tidak ada data anggota";
  }

  else { ?>
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-striped table-advance table-hover">
          <tbody>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>ID Anggota</th>
              <th>Nama Anggota</th>
              <th>JK</th>
              <th>E-Mail</th>
              <th>Status</th>
              <th>Keterangan</th>
              <th>ID User</th>
              <th>Action</th>
              </tr> <?php
              $result2 = mysqli_query($koneksi, "SELECT * FROM anggota LIMIT $mulai, $halaman");
              while($data = mysqli_fetch_array($result2)){ ?>
                <tr>
                  <?php
                  echo "<td>$no</td>";
                  if ($data[7]==NULL) {
                    echo "<a href=''><td><table border=3 style='borderstyle:double;'><tr><td width='40px' height='40px'><font size='2pt'>NO PHOTO</font></td></tr></table></td></a>";
                  }
                  else {
                    echo "<td><a href='images/profil/$data[7]'><img src='images/profil/$data[7]' width='60px' height='80px'></a></td>";
                  }
                  for($i=0; $i<7; $i++){
                    echo "<td>$data[$i]</td>";
                  }
                  $no++;
                  ?>
                  <td width="15%">
                    <a class="btn btn-success" href="admin.php?id=editanggota&anggotaID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                    <a class="btn btn-danger" href="admin.php?id=deleteanggota&anggotaID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                  </td>
                  </tr> <?php
                } ?>
              </tbody>
            </table>
          </div>
          </div> <?php
        }
        ?>
      </section>
      <?php include "./layout/footer.php"; ?>