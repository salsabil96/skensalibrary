<?php
$query = "SELECT * FROM penerbit WHERE id_penerbit='$penerbitID'";
$ambil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($ambil);

if (isset($_POST['edit'])){
  $id_penerbit    = $_POST['id_penerbit'];
  $nama_penerbit  = $_POST['nama_penerbit'];

  $sql = "UPDATE penerbit SET id_penerbit = '$id_penerbit', nama_penerbit = '$nama_penerbit' WHERE id_penerbit = '$penerbitID'";
  $simpan = mysqli_query($koneksi, $sql);
  if($simpan) { ?>
   <script>
    alert("Data Penerbit berhasil diedit !");
    document.location="admin.php?id=penerbit";
    </script> <?php
  }
}
else if (isset($_POST['batal'])){ ?>
  <script>
   document.location="admin.php?id=penerbit";
   </script> <?php
 }
 ?>
 
 <script type="text/javascript">
    function validasi_input(form) {
      if(form.id_penerbit.value=="") {
        alert("ID Penerbit tidak boleh kosong !");
        form.id_penerbit.focus();
        return false;
      }
      if(form.nama_penerbit.value=="") {
        alert("Nama Penerbit tidak boleh kosong !");
        form.nama_penerbit.focus();
        return false;
      }
      return true;
    }
    </script>

 <section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Penerbit</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=penerbit">Data Penerbit</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Penerbit</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Penerbit</label>
                <div class="col-sm-9"><input type="text" name="id_penerbit" value="<?php echo $data[0]; ?>" class="form-control">    </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Penerbit</label>
                <div class="col-sm-9"><input type="text" name="nama_penerbit" value="<?php echo $data[1]; ?>" class="form-control"> </div>
              </div>
              <div class="form-group">&emsp;
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