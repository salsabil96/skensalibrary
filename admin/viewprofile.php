<?php
$ambil = mysqli_query($koneksi, "SELECT * FROM petugas join user on (petugas.id_user=user.id_user) WHERE petugas.id_user='$id_user'");
$data = mysqli_fetch_array($ambil);

?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Profil</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-file-text-o"></i>View Profil</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered table-striped table-hover">
          <tbody>
            <tr>
              <?php
              if($data[6]!=NULL)
                echo "<th rowspan='11' width='25%'><img src='./images/profil/$data[6]' width='270px' height='365px'></img></th>"; 
              else
              echo "<th rowspan='11' width='25%'><img src='./images/profil/nophoto.png' width='270px' height='365px'></img></th";  
             ?>
              <th colspan="2" class="text-center">Data Pribadi</th>
           </tr>
           <tr>
            <th>Nama</th>
            <td><?php echo $data[1]; ?></td>
          </tr>
          <tr>
            <th>Jenis Kelamin</th>
            <td>
              <?php
              if($data['jk']=='L')
                echo "Laki-Laki";
              else if($data['jk']=='P')
                echo "Perempuan";
              ?>
            </td>
          </tr>
          <tr>
            <th>E-Mail</th>
            <td><?php echo $data['email']?></td>
          </tr>
          <tr>
            <th>Status</th>
            <td>
              <?php echo $data[4]; ?>
            </td>
          </tr>
          <tr>
            <th colspan="2" class="text-center">Data Account</th>
          </tr>
          <tr>
            <th>Username</th>
            <td><?php echo $data['id_user']?></td>
          </tr>
          <tr>
            <th>Level</th>
            <td><?php echo $data['level']?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
<br><br>
<?php include "./layout/footer.php"; ?>

