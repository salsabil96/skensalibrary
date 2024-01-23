<?php
$query = "SELECT * FROM sumber WHERE id_sumber='$sumberID'";
$ambil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($ambil);

if (isset($_POST['edit'])){
  $id_sumber   = $_POST['id_sumber'];
  $nama_sumber  = $_POST['nama_sumber'];

  $sql = "UPDATE sumber SET id_sumber = '$id_sumber', nama_sumber = '$nama_sumber' WHERE id_sumber = '$sumberID'";
  $simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
  if($simpan) { ?>
   <script>
    alert("Data Sumber berhasil diedit !");
    document.location="admin.php?id=sumber";
    </script> <?php
  }
}
else if (isset($_POST['batal'])){ ?>
  <script>
   document.location="admin.php?id=sumber";
   </script> <?php
 }
 ?>
 
 <script type="text/javascript">
    function validasi_input(form) {
      if(form.id_sumber.value=="") {
        alert("ID Sumber tidak boleh kosong !");
        form.id_sumber.focus();
        return false;
      }
      if(form.nama_sumber.value=="") {
        alert("Nama Sumber tidak boleh kosong !");
        form.nama_sumber.focus();
        return false;
      }
      return true;
    }
    </script>

 <section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Sumber</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=sumber">Data Sumber</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Sumber</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Sumber</label>
                <div class="col-sm-9"><input type="text" name="id_sumber" value="<?php echo $data[0]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Sumber</label>
                <div class="col-sm-9"><input type="text" name="nama_sumber" value="<?php echo $data[1]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label"></label>
                <input type="submit" name="edit" value="Simpan" class="btn btn-primary form control">
                <input type="submit" name="batal" value="Batal" class="btn btn-danger form control">
              </label>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section> <!-- wrapper -->
</section> <!-- main-content -->
<br><br><br><br><br><br><br><br>
<?php include "./layout/footer.php"; ?>