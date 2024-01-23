<?php
$halaman = 4;
$page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($koneksi, "SELECT id_tamu FROM tamu_perpus");
$no=$mulai+1;
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Kunjungan Tamu</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Kunjungan Tamu</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5">
        <ul class="pagination pagination pull-right">
          <?php 
         if($page>1){
           $link=$page-1; 
           echo" <li><a href='admin.php?id=kunjungantamu&halaman=$link'>«</a></li> "; }
           else { $prev = ""; }
           for ($i=1; $i<=$pages; $i++){ ?>
            <li><a href="admin.php?id=kunjungantamu&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php }
           
          $JmlHalaman = ceil($total/$halaman);
          if ( $page < $JmlHalaman ) {
           $link = $page + 1;
           echo "<li><a href='admin.php?id=kunjungantamu&halaman=$link'>»</a></li>"; }
          else { $next = ""; } ?>
        </ul>
      </div>
      <div class="col-lg-4"><br>
        <form class="form-inline pull-left" role="form" method="post" action="admin.php?id=searchkunjungantamu">
          <div class="form-group">
            <input type="text"  class="form-control" name="keyword" placeholder="Pencarian">
          </div>
          <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
        </form>
      </div>
    </div>
    <br>

    <?php
    $sql = "SELECT * FROM tamu_perpus ORDER BY tanggal_kunjungan desc LIMIT $mulai, $halaman";
    $result = mysqli_query($koneksi, $sql);
    $total = mysqli_num_rows($result);
    // if($total == 0){
    //   echo "Tidak ada data kunjungan";
    // }

    // else { ?>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>ID Tamu</th>
                <th>Tanggal Kunjungan</th>
                <th>Nama Tamu</th>
                <th>Jabatan</th>
                <th>Maksud Kunjungan</th>
                <th>Penerima</th>
                <th>Kesan</th>
                <th>Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($result)){ ?>
                  <tr> <?php
                  for($i=0; $i<7; $i++){
                    echo "<td>" . $data[$i] . "</td>";
                  }
                  ?>
                  <td width="15%">
                    <a class="btn btn-danger" href="admin.php?id=deletekunjungantamu&tamuID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                  </td>
                  </tr> <?php
                } ?>
              </tbody>
            </table>
          </div>
          </div> <?php
        // }
        ?>
      </section>
      <?php include "./layout/footer.php"; ?>
