<?php
  if(isset($_POST['tambah'])) {
    $id_user = $_SESSION['id_user'];

    $id_anggota   = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $jk           = $_POST['jk'];
    $email        = $_POST['email'];
    $status       = $_POST['status'];
    $ket          = $_POST['keterangan'];
    $user         = $_POST['user'];
    $pass         = md5($_POST['user']);
    $file		  = $_FILES['file']['name'];
  	$tmp_name	  = $_FILES['file']['tmp_name'];

    $query = "INSERT INTO user VALUES('$user','$pass','member')";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());

    if($simpan) {
    if(empty($tmp_name)){
      $query2 = "INSERT INTO anggota set id_anggota='$id_anggota',nama_anggota='$nama_anggota',jk='$jk',email='$email',status='$status',keterangan='$ket',id_user='$user'";
      $simpan2 = mysqli_query($koneksi, $query2) or die (mysqli_connect_error());
    }
    else {
      move_uploaded_file($tmp_name,"images/profil/".$file)or die('Tidak bisa upload');
      $query2 = "INSERT INTO anggota VALUES('$id_anggota','$nama_anggota','$jk','$email','$status','$ket', '$user','$file')";
      $simpan2 = mysqli_query($koneksi, $query2) or die (mysqli_connect_error());
    }

      if($simpan2) { ?>
        <script>
  			   alert("Anggota berhasil ditambahkan !");
           document.location="admin.php?id=anggota";
  		  </script> <?php
      }
    }
  }

  if(isset($_POST['batal'])) { ?>
    <script>
      document.location="admin.php?id=anggota";
    </script> <?php
  }
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Anggota</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=anggota">Data Anggota</a></li>
          <li><i class="fa fa-file-text-o"></i>Tambah Data Anggota</li>
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
    if(form.user.value=="") {
        alert("ID User tidak boleh kosong !");
      	form.user.focus();
    	  return false;
    	}
      return true;
    }
    </script>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" enctype="multipart/form-data" onsubmit="return validasi_input(this);">
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">ID Anggota</label>
                <div class="col-sm-4"> <?php
                  $query_kdauto = "SELECT max(id_anggota) as maxKode FROM anggota";
                  $hasil_kdauto = mysqli_query($koneksi,$query_kdauto);
                  $data_kdauto = mysqli_fetch_array($hasil_kdauto);
                  $kodeAnggota = $data_kdauto['maxKode'];
                  $noUrut = (int) substr($kodeAnggota, 3, 5);
                  $noUrut++;
                  $char = "MBR";
                  $kode = $char . sprintf("%05s", $noUrut); ?>
                  <input type="text" name="id_anggota" class="form-control" value="<?php echo $kode; ?>">
                </div>
                <label class="col-sm-2 control-label">Nama Anggota</label>
                <div class="col-sm-4">
                  <input type="text" name="nama_anggota" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                  <select class="custom-select form-control" name="jk">
                    <option value="">== Pilih Jenis Kelamin ==</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                  <input type="text" name="email" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-4">
                <select class="custom-select form-control" name="status">
                  <option value="">== Pilih Status ==</option>
                  <option value="Siswa">Siswa</option>
                  <option value="Guru">Guru</option>
                  <option value="Karyawan">Karyawan</option>
                </select>
                </div>
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-4">
                  <input type="text" name="keterangan" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">ID User</label>
                <div class="col-sm-4">
                  <input type="text" name="user" class="form-control">
                </div>
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-4">
                  <input type="file" name="file" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">&emsp;
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
<br><br>
<?php include "./layout/footer.php"; ?>
