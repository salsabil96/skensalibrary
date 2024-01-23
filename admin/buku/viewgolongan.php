<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Golongan</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Golongan</li>
        </ul>
      </div>
    </div><br>

    <?php  $result = mysqli_query($koneksi, "SELECT * FROM golongan");
    $total = mysqli_num_rows($result); ?>
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-striped table-advance table-hover">
          <tbody>
            <tr><th class="col-lg-2">ID Golongan</th><th class="col-lg-4">Nama Golongan</th><th>No. Rak</th></tr> 
            <?php
              while($data = mysqli_fetch_array($result)){ ?>
                <tr> <?php for($i=0; $i<3; $i++){ echo "<td>$data[$i]</td>"; } ?> </tr> 
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <?php include "./layout/footer.php"; ?>