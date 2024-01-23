<?php
  $query = mysqli_query($koneksi, "SELECT * FROM user a LEFT OUTER JOIN petugas b on(a.id_user=b.id_user) WHERE a.id_user='$userID'");
  $data = mysqli_fetch_array($query);
?>

<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-striped table-hover">
      <tbody>
      <tr>
        <?php
        if($data[9]!=NULL) {
        echo "<th rowspan='11' width='25%'><img src='./images/profil/$data[9]' width='270px' height='365px'></img></th>"; 
        }
        else{
        echo "<th rowspan='11' width='25%'><img src='./images/profil/nophoto.png' width='270px' height='365px'></img></th>"; 
        }
        ?>
        <th colspan="2" class="text-center">Data Pribadi</th>
      </tr>
      <tr>
        <th>Nama</th>
        <td><?php echo $data[4]; ?></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td>
        <?php
          if($data[5]=='L')
            echo "Laki-Laki";
          else
            echo "Perempuan";
        ?>
        </td>
      </tr>
      <tr>
        <th>E-Mail</th>
        <td><?php echo $data[6]?></td>
      </tr>
      <tr>
        <th>Status</th>
        <td><?php echo $data[7]; ?></td>
      </tr>
      <tr>
        <th colspan="2" class="text-center">Data Account</th>
      </tr>
      <tr>
        <th>Username</th>
        <td><?php echo $data[0]?></td>
      </tr>
      <tr>
        <th>Level</th>
        <td><?php echo $data[2]?></td>
      </tr>
      </tbody>
    </table>
  </div>
</div>