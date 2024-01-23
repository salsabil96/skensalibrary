<?php
if(isset($_POST['cari'])){
   $keyword=$_POST['keyword'];
  $pp = "SELECT * FROM tamu_perpus WHERE id_tamu like '%$keyword%' OR tanggal_kunjungan like '%$keyword%' OR nama_tamu like '%$keyword%' OR jabatan like '%$keyword%' OR maksud_kunjungan like '%$keyword%' OR penerima like '%$keyword%' OR kesan like '%$keyword%' ORDER BY id_tamu";
  $car = mysqli_query($koneksi, $pp);
  $total = mysqli_num_rows($car);
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Kunjungan Tamu</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=kunjungantamu">Data Kunjungan Tamu</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Kunjungan Tamu</li>
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
                  <th>ID Tamu</th>
                  <th>Tanggal Kunjungan</th>
                  <th>Nama Tamu</th>
                  <th>Jabatan</th>
                  <th>Maksud Kunjungan</th>
                  <th>Penerima</th>
                  <th>Kesan</th>
                  <th>Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($car)){ ?>
                  <tr> <?php
                  echo "<td>$data[0]</td>";
                  echo "<td>$data[1]</td>";
                  echo "<td>$data[2]</td>";
                  echo "<td>$data[3]</td>";
                  echo "<td>$data[4]</td>";
                  echo "<td>$data[5]</td>";
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
