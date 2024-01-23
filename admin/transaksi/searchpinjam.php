<?php
  $keyword=$_POST['keyword'];
  $pp = "SELECT a.id_peminjaman, a.tanggal_pinjam, a.tanggal_kembali, b.nama_anggota, c.judul_buku, d.nama_petugas, a.status ,DATEDIFF(DATE_ADD(a.tanggal_pinjam, INTERVAL 7 DAY),CURDATE()) as 'selisih' FROM peminjaman a join anggota b on (a.id_anggota=b.id_anggota) join buku c on (a.id_buku=c.id_buku) join petugas d on (a.id_petugas=d.id_petugas) where a.status='Pinjam' and (a.id_peminjaman like '%$keyword%' or a.tanggal_pinjam like '%$keyword%' or a.tanggal_kembali like '%$keyword%' or b.nama_anggota like '%$keyword%' or c.judul_buku like '%$keyword%' or d.nama_petugas like '%$keyword%')";
  $car = mysqli_query($koneksi, $pp);
  $total = mysqli_num_rows($car);
  $no=1;
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Peminjaman</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"><a href="admin.php?id=peminjaman"></i>Data Peminjaman</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Peminjaman</li>
        </ul>
      </div>
    </div>
    <?php
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
                while($data = mysqli_fetch_array($car)){ ?>
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
                    <td width="20%">
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
