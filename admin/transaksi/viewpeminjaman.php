<?php
  $halaman = 5;
  $page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysqli_query($koneksi, "SELECT id_peminjaman FROM peminjaman WHERE status='Pinjam'");
  $no=$mulai+1;
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Peminjaman</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Peminjaman</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5"><br>
        <a class="btn btn-primary" href="admin.php?id=addpeminjaman"><i class="icon_plus_alt2"></i> Tambah Peminjaman</a>
      </div>
      <div class="col-lg-3">
        <ul class="pagination pagination pull-left">
          <?php 
         if($page>1){
           $link=$page-1; 
           echo" <li><a href='admin.php?id=peminjaman&halaman=$link'>«</a></li> "; }
           else { $prev = ""; }
           for ($i=1; $i<=$pages; $i++){ ?>
            <li><a href="admin.php?id=peminjaman&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php }
           
          $JmlHalaman = ceil($total/$halaman);
          if ( $page < $JmlHalaman ) {
           $link = $page + 1;
           echo "<li><a href='admin.php?id=peminjaman&halaman=$link'>»</a></li>"; }
          else { $next = ""; } ?>
        </ul>
      </div>
      <div class="col-lg-4"><br>
        <form class="form-inline pull-right" role="form" method="post" action="admin.php?id=searchpinjam">
          <div class="form-group">
            <input type="text"  class="form-control" name="keyword" placeholder="Pencarian">
          </div>
          <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
        </form>
      </div>
    </div>

    <?php
      $result = mysqli_query($koneksi, "SELECT a.id_peminjaman, a.tanggal_pinjam, a.tanggal_kembali, b.nama_anggota, c.judul_buku, d.nama_petugas, a.status ,DATEDIFF(DATE_ADD(tanggal_pinjam, INTERVAL 7 DAY),CURDATE()) as 'selisih' FROM peminjaman a join anggota b on (a.id_anggota=b.id_anggota) join buku c on (a.id_buku=c.id_buku) join petugas d on (a.id_petugas=d.id_petugas) where a.status='Pinjam' LIMIT $mulai, $halaman");
      $total = mysqli_num_rows($result);
      if($total == 0){
        echo "Tidak ada data peminjaman";
      }

      else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>ID Peminjaman</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Peminjam</th>
                  <th>Judul Buku</th>
                  <th>Petugas</th>
                  <th>Status</th>
                  <th>Sisa Hari</th>
                  <th>Denda</th>
                  <th>Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($result)){ ?>
                  <tr> <?php
                    for($i=0; $i<7; $i++){
                      echo "<td>$data[$i]</td>";
                  } ?>
                  <td><?php echo $data['selisih'] . " hari"; ?></td>
                  <?php
                      $tempo = $data['selisih'];
                      if(($tempo>=0)&&($tempo<=7)){ ?>
                        <td>Rp.0</td> <?php

                      }
                      else if($tempo>=7){ ?>
                        <td>Rp.0</td> <?php
                      }
                      else { ?>
                        <?php
                          $jumlah=0;
                          $denda = 500;
                          $biaya = abs($denda*$tempo);
                          $jumlah+=$biaya;
                        ?>
                        <td>Rp. <?php echo $jumlah; ?></td> <?php
                      }
                    ?>
                    <td width="18%">
                      <a class="btn btn-danger"  href="admin.php?id=kembali&peminjamanID=<?php echo $data[0]; ?>">Kembali</a>
                      <a class="btn btn-primary" href="admin.php?id=perpanjang&peminjamanID=<?php echo $data[0]; ?>">Perpanjang</a>
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
