<?php
  $query = "SELECT * FROM petugas WHERE id_petugas='$petugasID'";
  $ambil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($ambil);

  $ambil_user = mysqli_query($koneksi, "SELECT a.id_user FROM user a LEFT OUTER JOIN petugas b on(a.id_user=b.id_user) WHERE a.level='admin' && b.id_petugas is null");
  $jml = mysqli_num_rows($ambil_user);

  if (isset($_POST['edit'])){
    $id_petugas   = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $jk           = $_POST['jk'];
    $email        = $_POST['email'];
    $status       = $_POST['status'];
    $user       = $_POST['user'];
    $file           = $_FILES['file']['name'];
    $tmp_name       = $_FILES['file']['tmp_name'];

    if(empty($tmp_name)){
    $sql = "UPDATE petugas SET id_petugas = '$id_petugas', nama_petugas = '$nama_petugas', jk = '$jk', email = '$email',
            status = '$status', id_user = '$user' WHERE id_petugas = '$petugasID'";
		$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
     }
    else {
      move_uploaded_file($tmp_name,"images/profil/".$file);
      $sql = "UPDATE petugas SET id_petugas = '$id_petugas', nama_petugas = '$nama_petugas', jk = '$jk', email = '$email',
            status = '$status', id_user = '$user', file='$file' WHERE id_petugas = '$petugasID'";
      $simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
    }


    if($simpan) { ?>
			<script>
				alert("Data Petugas berhasil diedit !");
				document.location="admin.php?id=petugas";
			</script> <?php
		}
  }
	else if (isset($_POST['batal'])){ ?>
    <script>
       document.location="admin.php?id=petugas";
    </script> <?php
	}
?>

<script type="text/javascript">
 function validasi_input(form) {
  if(form.id_petugas.value=="") {
   alert("ID Petugas tidak boleh kosong!");
   form.id_petugas.focus();
   return false;
 }
 return true;
}
</script>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Petugas</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=petugas">Data Petugas</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Petugas</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">ID Petugas</label>
                <div class="col-sm-4">
                  <input type="text" name="id_petugas" value="<?php echo $data[0]; ?>" class="form-control">
                </div>
                <label class="col-sm-2 control-label">Nama Petugas</label>
                <div class="col-sm-4">
                  <input type="text" name="nama_petugas" value="<?php echo $data[1]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                    <select class="custom-select form-control" name="jk">
                      <option value="L" <?php if($data[2]=='L'){ ?> selected <?php } ?>>Laki-Laki</option>
                      <option value="P" <?php if($data[2]=='P'){ ?> selected <?php } ?>>Perempuan</option>
                    </select>
                </div>
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                  <input type="text" name="email" value="<?php echo $data[3]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-4">
                  <select class="custom-select form-control" name="status">
                    <option value="Kepala Perpustakaan" <?php if($data[4]=="Kepala Perpustakaan") { ?> selected <?php } ?>>Kepala Perpustakaan</option>
                    <option value="Petugas Perpustakaan"<?php if($data[4]=="Petugas Perpustakaan") { ?> selected <?php } ?>>Petugas Perpustakaan</option>
                  </select>
                </div>
                <label class="col-sm-2 control-label">ID User</label>
                <div class="col-sm-4">
                <select class="custom-select form-control" name="user">
                  <option value="<?php echo $data[5]; ?>" selected><?php echo $data[5]; ?></option>
                  <?php
                    while($data2 = mysqli_fetch_array($ambil_user)) { ?>
                      <option value="<?php echo $data2[0]; ?>"><?php echo $data2[0]; ?></option> <?php
                    }
                  ?>
                </select>
                </div>
              </div>
              <div class="form-group col-sm-11">
                 <label class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-4">
                    <table border=0 style=border-style:double;>
                      <tr> <?php
                      if($data[6]==NULL){
                        echo "<td>NO PHOTO</td>";
                      }
                      else{
                        echo "<td><center><a href='images/profil/$data[6]'><img src='images/profil/$data[6]' width=50px height=50px></center></a></td>";
                      } ?>
                      <td><input type="file" name="file" class="form-control"></td>
                      </tr>
                    </table>
                  </div>
              </div>
              <div class="form-group col-sm-11">&emsp;
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
<br>
<?php include "./layout/footer.php"; ?>
