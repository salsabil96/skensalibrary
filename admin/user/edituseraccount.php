<?php
  $query = "SELECT * FROM user WHERE id_user='$userID'";
  $ambil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($ambil);

  if (isset($_POST['edit'])){
    $id_user   = $_POST['id_user'];
    $password  = md5($_POST['password']);
    $level     = $_POST['level'];

    $sql = "UPDATE user SET id_user = '$id_user', password = '$password', level = '$level' WHERE id_user = '$userID'";
    $simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
    if($simpan) { ?>
			<script>
				alert("Data User Account berhasil diedit !");
				document.location="admin.php?id=useraccount";
			</script> <?php
		}
  }
	else if (isset($_POST['batal'])){ ?>
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
          <li><i class="fa fa-file-text-o"></i>Edit Data User Account</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">ID User</label>
                <div class="col-sm-9">
                  <input type="text" name="id_user" value="<?php echo $data[0]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="text" name="password" value="<?php echo $data[1]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>
                <div class="col-sm-9">
                  <?php if($data[2]=="admin") { ?>
                    <select class="custom-select form-control" name="level">
                      <option value="admin" selected>Admin</option>
                      <option value="member">Member</option>
                    </select>
                  <?php }
                  else { ?>
                    <select class="custom-select form-control" name="level">
                      <option value="admin">Admin</option>
                      <option value="member" selected>Member</option>
                    </select> <?php
                  } ?>
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
<br><br><br><br><br>
<?php include "./layout/footer.php"; ?>
