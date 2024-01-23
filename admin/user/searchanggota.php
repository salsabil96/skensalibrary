<?php
  $keyword=$_POST['keyword'];
  $pp = "SELECT * FROM anggota WHERE id_anggota like '%$keyword%' or nama_anggota like '%$keyword%' or jk like '%$keyword%' or email like '%$keyword%' or status like '%$keyword%' or keterangan like '%$keyword%' or id_user like '%$keyword%'";
  $car = mysqli_query($koneksi, $pp);
  $total = mysqli_num_rows($car);
  $no=1;
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Anggota</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=anggota">Data Anggota</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Anggota</li>
        </ul>
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
                  <th>ID Anggota</th>
                  <th>Nama Anggota</th>
                  <th>JK</th>
                  <th>E-Mail</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>ID User</th>
                  <th>Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($car)){ ?>
                  <tr>
                    <?php
                    echo "<td>$no</td>";
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

