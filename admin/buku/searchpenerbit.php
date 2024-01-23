<?php
$keyword=$_POST['keyword'];
$pp = "SELECT * FROM penerbit WHERE id_penerbit like '%$keyword%' or nama_penerbit like '%$keyword%'";
$car = mysqli_query($koneksi, $pp);
$total = mysqli_num_rows($car);
$no=1;
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Penerbit</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"><a href="admin.php?id=penerbit"></i>Data Penerbit</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Penerbit</li>
        </ul>
      </div>
    </div>

    <?php
    $total = mysqli_num_rows($car);
    if($total == 0){ echo "Tidak ada data penerbit"; }
    else { ?>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr><th>No</th><th>ID Penerbit</th><th>Nama Penerbit</th><th>Action</th></tr> 
              <?php
                while($data = mysqli_fetch_array($car)){ ?>
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