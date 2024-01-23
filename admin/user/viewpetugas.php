<?php
  $halaman = 5;
  $page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysqli_query($koneksi, "SELECT * FROM petugas");
  $no=$mulai+1;
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Petugas</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Petugas</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5"><br>
        <a class="btn btn-primary" href="admin.php?id=addpetugas"><i class="icon_plus_alt2"></i> Tambah Petugas</a>
      </div>
      <div class="col-lg-3">
        <ul class="pagination pagination pull-left">
          <?php 
          if($page>1){
            $link=$page-1;  
            echo" <li><a href='admin.php?id=petugas&halaman=$link'>«</a></li> ";
          }
          else
            $prev = "";

          for ($i=1; $i<=$pages; $i++){ ?>
            <li><a href="admin.php?id=petugas&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
          } 
          
          $JmlHalaman = ceil($total/$halaman); //ceil digunakan untuk pembulatan keatas

          if ( $page < $JmlHalaman ) {
           $link = $page + 1;
           echo "<li><a href='admin.php?id=petugas&halaman=$link'>»</a></li>";
         }else {
           $next = "";
         }
         ?>
        </ul>
      </div>
      <div class="col-lg-4"><br>
        <form class="form-inline pull-right" role="form" method="post" action="admin.php?id=searchpetugas">
          <div class="form-group">
            <input type="text"  class="form-control" name="keyword" placeholder="Pencarian">
          </div>
          <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
        </form>
      </div>
    </div>
    </div>
    <?php
      $result = mysqli_query($koneksi, "SELECT * FROM petugas LIMIT $mulai, $halaman");
      $total = mysqli_num_rows($result);
      if($total == 0){
        echo "Tidak ada data petugas";
      }

      else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>ID Petugas</th>
                  <th>Nama Petugas</th>
                  <th>JK</th>
                  <th>E-Mail</th>
                  <th>Status</th>
                  <th>ID User</th>
                  <th>Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($result)){ ?>
                  <tr> <?php
                    echo "<td>$no</td>";
                    if ($data[6]==NULL) {
                      echo "<a href=''><td><table border=3 style='borderstyle:double;'><tr><td width='40px' height='40px'><font size='2pt'>NO PHOTO</font></td></tr></table></td></a>";
                    }
                    else {
                      echo "<td><a href='images/profil/$data[6]'><img src='images/profil/$data[6]' width='60px' height='80'></a></td>";
                    }
                    $no++;
                    for($i=0; $i<6; $i++){
                      echo "<td>$data[$i]</td>";
                    } ?>
                    <td width="15%">
                        <a class="btn btn-success" href="admin.php?id=editpetugas&petugasID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                        <a class="btn btn-danger" href="admin.php?id=deletepetugas&petugasID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                    </td>
                  </tr> <?php
                } ?>
                </tbody>
              </table>
            </div>
          </div> <?php
        } ?>
      </section>
      <?php include "./layout/footer.php"; ?>
