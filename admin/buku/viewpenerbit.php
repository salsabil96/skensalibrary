<?php
$halaman = 6;
$page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($koneksi, "SELECT * FROM penerbit");
$no=$mulai+1;
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Penerbit</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Penerbit</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5"><br>
        <a class="btn btn-primary" href="admin.php?id=addpenerbit"><i class="icon_plus_alt2"></i> Tambah Penerbit</a>
      </div>
      <div class="col-lg-3">
        <ul class="pagination pagination pull-left">
          <?php 
         if($page>1){
           $link=$page-1; 
           echo" <li><a href='admin.php?id=penerbit&halaman=$link'>«</a></li> "; }
           else { $prev = ""; }
           for ($i=1; $i<=$pages; $i++){ ?>
            <li><a href="admin.php?id=penerbit&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php }
           
          $JmlHalaman = ceil($total/$halaman);
          if ( $page < $JmlHalaman ) {
           $link = $page + 1;
           echo "<li><a href='admin.php?id=penerbit&halaman=$link'>»</a></li>"; }
          else { $next = ""; } ?>
        </ul>
      </div>
      <div class="col-lg-4"><br>
        <form class="form-inline pull-right" role="form" method="post" action="admin.php?id=searchpenerbit">
          <div class="form-group"><input type="text"  class="form-control" name="keyword" placeholder="Pencarian"></div>
          <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
        </form>
      </div>
    </div>

    <?php
    $result = mysqli_query($koneksi, "SELECT * FROM penerbit ORDER BY nama_penerbit LIMIT $mulai, $halaman");
    $total = mysqli_num_rows($result);
    if($total == 0){ echo "Tidak ada data penerbit"; }
    else { ?>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr><th>No</th><th>ID Penerbit</th><th>Nama Penerbit</th><th>Action</th></tr>
              <?php
                while($data = mysqli_fetch_array($result)){ ?>
                  <tr> <?php
                  echo "<td>$no</td>";
                  $no++;
                  for($i=0; $i<2; $i++){ echo "<td>$data[$i]</td>"; } ?>
                  <td width="15%">
                    <a class="btn btn-success" href="admin.php?id=editpenerbit&penerbitID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                    <a class="btn btn-danger" href="admin.php?id=deletepenerbit&penerbitID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                  </td>
                  </tr> <?php } ?>
              </tbody>
            </table>
          </div>
          </div> <?php } ?>
      </section>
      <?php include "./layout/footer.php"; ?>