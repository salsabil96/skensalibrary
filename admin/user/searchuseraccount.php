<?php
  $keyword=$_POST['keyword'];
  $pp = "SELECT * FROM user WHERE id_user like '%$keyword%' or password like '%$keyword%' or level like '%$keyword%'";
  $car = mysqli_query($koneksi, $pp);
  $total = mysqli_num_rows($car);
  $no=1;
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data User Account</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=useraccount">Data User Account</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data User Account</a></li>
        </ul>
      </div>
    </div>

    <?php
      $result = mysqli_query($koneksi, "SELECT * FROM user");
      $total = mysqli_num_rows($result);
      if($total == 0){
        echo "Tidak ada data user account";
      }

      else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>No</th>
                  <th class="col-lg-4">ID User</th>
                  <th class="col-lg-4">Level</th>
                  <th class="col-lg-4">Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($car)){ ?>
                  <tr> <?php
                    echo "<td>$no</td>";
                    $no++;
                    echo "<td>$data[0]</td>";
                    echo "<td>$data[2]</td>";
                    ?>
                    <td width="22%">
                        <a class="btn btn-primary" href="admin.php?id=detailuser&userID=<?php echo $data[0]; ?>"><i class="icon_plus_alt2"></i> Detail</a>
                        <a class="btn btn-success" href="admin.php?id=edituseraccount&userID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                        <a class="btn btn-danger" href="admin.php?id=deleteuseraccount&userID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                    </td>
                  </tr> <?php
                } ?>
                </tbody>
              </table>
            </div>
          </div> <?php
        } ?>
      </section>
    </section>
    <?php include "./layout/footer.php"; ?>
