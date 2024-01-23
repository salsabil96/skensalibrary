<?php
  $halaman = 6;
  $page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysqli_query($koneksi, "SELECT * FROM sumber");
  $no=$mulai+1;
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Sumber</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Sumber</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5"><br>
        <a class="btn btn-primary" href="admin.php?id=addsumber"><i class="icon_plus_alt2"></i> Tambah Sumber</a>
      </div>
    <div class="col-lg-4">
      <ul class="pagination pagination pull-left">
        <li><a href="">«</a></li> <?php
        for ($i=1; $i<=$pages; $i++){ ?>
          <li><a href="admin.php?id=sumber&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
           <?php
        } ?>
        <li><a href="">»</a></li>
      </ul>
    </div>
    <div class="col-lg-3"><br>
      <form class="form-inline" role="form" method="post" action="admin.php?id=searchsumber">
        <div class="form-group">
          <input type="text"  class="form-control" name="keyword" placeholder="Pencarian">
        </div>
        <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
      </form>
    </div>
  </div>

    <?php
      $result = mysqli_query($koneksi, "SELECT * FROM sumber LIMIT $mulai, $halaman");
      $total = mysqli_num_rows($result);
      if($total == 0){
        echo "Tidak ada data sumber";
      }

      else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>No</th>
                  <th>ID Sumber</th>
                  <th>Nama Sumber</th>
                  <th>Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($result)){ ?>
                  <tr> <?php
                  echo "<td>$no</td>";
                  $no++;
                    for($i=0; $i<2; $i++){
                      echo "<td>$data[$i]</td>";
                    } ?>
                    <td width="15%">
                      <a class="btn btn-success" href="admin.php?id=editsumber&sumberID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                      <a class="btn btn-danger" href="admin.php?id=deletesumber&sumberID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
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
