<?php
$query = "SELECT * FROM pengarang WHERE id_pengarang='$pengarangID'";
$ambil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($ambil);

if (isset($_POST['edit'])){
  $id_pengarang   = $_POST['id_pengarang'];
  $nama_pengarang  = $_POST['nama_pengarang'];

  $sql = "UPDATE pengarang SET id_pengarang='$id_pengarang',nama_pengarang='$nama_pengarang' WHERE id_pengarang='$pengarangID'";
  $simpan = mysqli_query($koneksi, $sql);
  if($simpan) { ?>
   <script>
    alert("Data Pengarang berhasil diedit !");
    document.location="admin.php?id=pengarang";
    </script> <?php
  }
}
else if (isset($_POST['batal'])){ ?>
  <script>
   document.location="admin.php?id=pengarang";
   </script> <?php
 }
 ?>
 
 <script type="text/javascript">
    function validasi_input(form) {
      if(form.id_pengarang.value=="") {
        alert("ID Pengarang tidak boleh kosong !");
        form.id_pengarang.focus();
        return false;
      }
      if(form.nama_pengarang.value=="") {
        alert("Nama Pengarang tidak boleh kosong !");
        form.nama_pengarang.focus();
        return false;
      }
      return true;
    }
    </script>

 <section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Pengarang</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=pengarang">Data Pengarang</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Pengarang</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Pengarang</label>
                <div class="col-sm-9"><input type="text" name="id_pengarang" value="<?php echo $data[0]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Pengarang</label>
                <div class="col-sm-9"><input type="text" name="nama_pengarang" value="<?php echo $data[1]; ?>" class="form-control">
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