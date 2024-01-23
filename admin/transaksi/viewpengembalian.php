<?php
  $halaman = 5;
  $page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysqli_query($koneksi, "SELECT id_pengembalian FROM pengembalian");
  $no=$mulai+1;
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Pengembalian</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Pengembalian</li>
        </ul>
      </div>
    </div>

    <div class="row col-lg-12">
      <div class="col-lg-5">
        <ul class="pagination pagination pull-right">
          <?php 
         if($page>1){
           $link=$page-1; 
           echo" <li><a href='admin.php?id=pengembalian&halaman=$link'>«</a></li> "; }
           else { $prev = ""; }
           for ($i=1; $i<=$pages; $i++){ ?>
            <li><a href="admin.php?id=pengembalian&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php }
           
          $JmlHalaman = ceil($total/$halaman);
          if ( $page < $JmlHalaman ) {
           $link = $page + 1;
           echo "<li><a href='admin.php?id=pengembalian&halaman=$link'>»</a></li>"; }
          else { $next = ""; } ?>
        </ul>
      </div>
      <div class="col-lg-6"><br>
        <form class="form-inline" role="form" method="post" action="admin.php?id=searchkembali">
          <div class="form-group">
            <input type="text"  class="form-control" name="keyword" placeholder="Pencarian">
          </div>
          <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
        </form>
      </div>
    </div>

    <?php
      $query = "SELECT pengembalian.id_pengembalian, pengembalian.id_peminjaman, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, anggota.nama_anggota,
                buku.judul_buku, petugas.nama_petugas
                FROM petugas JOIN peminjaman on (petugas.id_petugas=peminjaman.id_petugas) JOIN buku on (buku.id_buku=peminjaman.id_buku)
                JOIN anggota on (anggota.id_anggota=peminjaman.id_anggota) JOIN pengembalian on (peminjaman.id_peminjaman=pengembalian.id_peminjaman) ORDER BY id_pengembalian LIMIT $mulai, $halaman";

      $result = mysqli_query($koneksi, $query);
      $total = mysqli_num_rows($result);
      if($total == 0){
        echo "Tidak ada data pengembalian";
     }

      else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>ID Pengembalian</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Nama Anggota</th>
                  <th>Judul Buku</th>
                  <th>Nama Petugas</th>
                  <th>Action</th>
                </tr>
                <tr>
                <?php
                  while($data = mysqli_fetch_array($result)){
                    for($i=0; $i<7; $i++){
                      if($i==1)
                        continue;
                      echo "<td>$data[$i]</td>";
                  }
                ?>
                <td width="15%">
                   <a class="btn btn-danger" href="admin.php?id=deletepengembalian&kembaliID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                </td>
                </tr> <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div> <?php
      }
    ?>
  </section><br><br>
<?php include "./layout/footer.php"; ?>
