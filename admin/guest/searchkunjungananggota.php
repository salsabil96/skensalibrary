<?php
if(isset($_POST['cari'])){
   $keyword=$_POST['keyword'];
  $pp = "SELECT a.id_kunjungan, a.tanggal_kunjungan, a.id_anggota, b.nama_anggota, b.status, b.keterangan, a.tujuan FROM kunjungan_anggota a JOIN anggota b on (a.id_anggota=b.id_anggota) WHERE a.id_kunjungan like '%$keyword%' OR a.tanggal_kunjungan like '%$keyword%' OR b.nama_anggota like '%$keyword%' OR b.status like '%$keyword%' OR b.keterangan like '%$keyword%' OR a.tujuan like '%$keyword%' ORDER BY a.id_kunjungan";
  $car = mysqli_query($koneksi, $pp);
  $total = mysqli_num_rows($car);
  $no=1;
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Kunjungan Anggota</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=kunjungananggota">Data Kunjungan Anggota</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Kunjungan Anggota</li>
        </ul>
      </div>
    </div>

    <?php
    if($total == 0){
      echo "Tidak ada data kunjungan";
    }

    else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>No</th>
                  <th>ID Kunjungan</th>
                  <th>Tanggal Kunjungan</th>
                  <th>Nama Anggota</th>
                  <th>Status</th>
                  <th>Tujuan</th>
                  <th>Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($car)){ ?>
                  <tr> <?php
                  echo "<td>$no</td>";
                  $no++;
                  echo "<td>$data[0]</td>";
                  echo "<td>$data[1]</td>";
                  echo "<td>" . $data[3] . "</td>";
                  echo "<td>" . $data[4] . " " . $data[5] ."</td>";
                  echo "<td>$data[6]</td>";
                  ?>
                    <td>
                      <a class="btn btn-danger" href="admin.php?id=deletekunjungananggota&kunjunganID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                    </td>
                  </tr> <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div> <?php
    }
  }
    ?>
  </section>
<?php include "./layout/footer.php"; ?>
