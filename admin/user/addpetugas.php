<?php
  if(isset($_POST['tambah'])) {
    $id_petugas   = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $jk           = $_POST['jk'];
    $email        = $_POST['email'];
    $status       = $_POST['status'];
    $user         = $_POST['user'];
    $pass         = md5($_POST['user']);
    $file         = $_FILES['file']['name'];
    $tmp_name     = $_FILES['file']['tmp_name'];

    $query = "INSERT INTO user VALUES('$user','$pass','admin')";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());

    if($simpan) {
    if(empty($tmp_name)){
      $query2 = "INSERT INTO petugas SET id_petugas='$id_petugas',nama_petugas='$nama_petugas',jk='$jk',email='$email',
            status='$status',id_user='$user'";
      $simpan2 = mysqli_query($koneksi, $query2) or die (mysqli_connect_error());
    }
    else {
      move_uploaded_file($tmp_name,"images/profil/".$file)or die('Tidak bisa upload');
      $query2 = "INSERT INTO petugas VALUES('$id_petugas','$nama_petugas','$jk','$email','$status','$user','$file')";
      $simpan2 = mysqli_query($koneksi, $query2) or die (mysqli_connect_error());
    }

      if($simpan2) { ?>
        <script>
           alert("Petugas berhasil ditambahkan !");
           document.location="admin.php?id=petugas";
        </script> <?php
      }
    }
  }

  else if(isset($_POST['batal'])) { ?>
    <script>
      document.location="admin.php?id=petugas";
    </script> <?php
  }
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Petugas</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=petugas">Data Petugas</a></li>
          <li><i class="fa fa-file-text-o"></i>Tambah Data Petugas</li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
    function validasi_input(form) {
      if(form.id_petugas.value=="") {
        alert("ID Petugas tidak boleh kosong !");
        form.id_petugas.focus();
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
                <label class="col-sm-2 control-label">ID_Petugas</label>
                <div class="col-sm-4">
                  <?php
                  $query_kdauto = "SELECT max(id_petugas) as maxKode FROM petugas";
                  $hasil_kdauto = mysqli_query($koneksi,$query_kdauto);
                  $data_kdauto = mysqli_fetch_array($hasil_kdauto);
                  $kodePetugas = $data_kdauto['maxKode'];
                  $noUrut = (int) substr($kodePetugas, 3, 5);
                  $noUrut++;
                  $char = "ADM";
                  $kode = $char . sprintf("%05s", $noUrut); 
                ?>
                  <input type="text" name="id_petugas" class="form-control" value="<?php echo $kode; ?>">
                </div>
                <label class="col-sm-2 control-label">Nama Petugas</label>
                <div class="col-sm-4">
                  <input type="text" name="nama_petugas" class="form-control">
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
                  <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                  <option value="Petugas Perpustakaan">Petugas Perpustakaan</option>
                </select>
                </div>
                <label class="col-sm-2 control-label">ID User</label>
                <div class="col-sm-4">
                  <input type="text" name="user" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
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
