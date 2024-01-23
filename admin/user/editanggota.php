<?php
  $query = "SELECT * FROM anggota WHERE id_anggota='$anggotaID'";
  $ambil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($ambil);

  $ambil_user = mysqli_query($koneksi, "SELECT a.id_user FROM user a LEFT OUTER JOIN anggota b on(a.id_user=b.id_user) WHERE a.level='member' && b.id_anggota is null");
  $jml = mysqli_num_rows($ambil_user);

  if (isset($_POST['edit'])){
    $id_anggota   = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $jk           = $_POST['jk'];
    $email        = $_POST['email'];
    $status       = $_POST['status'];
    $ket          = $_POST['keterangan'];
    $user         = $_POST['user'];
    $file		  = $_FILES['file']['name'];
  	$tmp_name	  = $_FILES['file']['tmp_name'];

    if(empty($tmp_name)){
    $sql = "UPDATE anggota SET id_anggota = '$id_anggota', nama_anggota = '$nama_anggota', jk = '$jk', email = '$email',
            status = '$status', keterangan = '$ket', id_user = '$user' WHERE id_anggota = '$anggotaID'";
		$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
    }
    else {
      move_uploaded_file($tmp_name,"images/profil/".$file);
      $sql = "UPDATE anggota SET id_anggota = '$id_anggota', nama_anggota = '$nama_anggota', jk = '$jk', email = '$email',
            status = '$status', keterangan = '$ket', id_user = '$user', file='$file' WHERE id_anggota = '$anggotaID'";
    $simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
    }

    if($simpan) { ?>
			<script>
				alert("Data Anggota berhasil diedit !");
				document.location="admin.php?id=anggota";
			</script> <?php
		}
  }
	else if (isset($_POST['batal'])){ ?>
    <script>
       document.location="admin.php?id=anggota";
    </script> <?php
	}
?>

<script type="text/javascript">
 function validasi_input(form) {
  if(form.id_anggota.value=="") {
   alert("ID Anggota tidak boleh kosong!");
   form.id_anggota.focus();
   return false;
 }
 return true;
}
</script>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Anggota</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=anggota">Data Anggota</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Anggota</li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
    function validasi_input(form) {
      if(form.id_anggota.value=="") {
        alert("ID Anggota tidak boleh kosong !");
        form.id_anggota.focus();
        return false;
      }
      return true;
    </script>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" enctype="multipart/form-data" onsubmit="return validasi_input(this);">
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">ID_Anggota</label>
                <div class="col-sm-4">
                  <input type="text" name="id_anggota" value="<?php echo $data[0]; ?>" class="form-control">
                </div>
                <label class="col-sm-2 control-label">Nama Anggota</label>
                <div class="col-sm-4">
                  <input type="text" name="nama_anggota" value="<?php echo $data[1]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                    <select class="custom-select form-control" name="jk">
                      <option value="L" <?php if($data[2]=='L'){?> selected <?php } ?>>Laki-Laki</option>
                      <option value="P" <?php if($data[2]=='P'){?> selected <?php } ?>>Perempuan</option>
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
                    <option value="siswa" <?php if($data[4]=='Siswa'){?> selected <?php } ?> >Siswa</option>
                    <option value="guru" <?php if($data[4]=='Guru'){?> selected <?php } ?> >Guru</option>
                    <option value="karyawan" <?php if($data[4]=='Karyawan'){?> selected <?php } ?> >Karyawan</option>
                  </select>
                </div>
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-4">
                  <input type="text" name="keterangan" value="<?php echo $data[5]; ?>"class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">ID User</label>
                <div class="col-sm-4">
                  <select class="custom-select form-control" name="user">
                    <option value="<?php echo $data[6]; ?>" selected><?php echo $data[6]; ?></option>
                    <?php
                      while($data2 = mysqli_fetch_array($ambil_user)) { ?>
                        <option value="<?php echo $data2[0]; ?>"><?php echo $data2[0]; ?></option> <?php
                      }
                    ?>
                  </select>
                </div>
                  <label class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-4">
                    <table border=0 style=border-style:double;>
                      <tr> <?php
                      if($data[7]==NULL){
                        echo "<td>NO PHOTO</td>";
                      }
                      else{
                        echo "<td><center><a href='images/profil/$data[7]'><img src='images/profil/$data[7]' width=50px height=50px></center></a></td>";
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
