<?php
  if(isset($_POST['tambah'])) {
    $id_user   = $_POST['id_user'];
    $password  = $_POST['password'];
    $level     = $_POST['level'];

    $query = "INSERT INTO user VALUES('$id_user','$password','$level')";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());
	  if($simpan) { ?>
        <script>
  			   alert("User Account berhasil ditambahkan !");
           document.location="admin.php?id=useraccount";
  		  </script> <?php
    }
  }
  else if(isset($_POST['batal'])) { ?>
    <script>
      document.location="admin.php?id=useraccount";
    </script> <?php
  }
?>

<script type="text/javascript">
 function validasi_input(form) {
  if(form.id_user.value=="") {
   alert("ID User tidak boleh kosong!");
   form.id_user.focus();
   return false;
 }
 if(form.password.value=="") {
   alert("Password tidak boleh kosong!");
   form.password.focus();
   return false;
 }
 return true;
}
</script>


<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data User Account</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=useraccount">Data User Account</a></li>
          <li><i class="fa fa-file-text-o"></i>Tambah Data User Account</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">ID_User</label>
                <div class="col-sm-9">
                  <input type="text" name="id_user" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="text" name="password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>
                <div class="col-sm-9">
                  <select class="custom-select form-control" name="level">
                    <option value="">== Pilih Level ==</option>
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label"></label>
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary form control">
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
<br><br><br><br><br>
<?php include "./layout/footer.php"; ?>
