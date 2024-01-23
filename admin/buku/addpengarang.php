<?php
  if(isset($_POST['tambah'])) {
    $id_pengarang   = $_POST['id_pengarang'];
    $nama_pengarang = $_POST['nama_pengarang'];

    $query  = "INSERT INTO pengarang VALUES('$id_pengarang','$nama_pengarang')";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());
	  if($simpan) { ?>
      <script>
			   alert("Pengarang berhasil ditambahkan !");
         document.location="admin.php?id=pengarang";
		  </script> <?php
    }
  }
  else if(isset($_POST['batal'])) { ?>
    <script>
      document.location="admin.php?id=pengarang";
    </script> <?php
  }
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Pengarang</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=pengarang">Data Pengarang</a></li>
          <li><i class="fa fa-file-text-o"></i>Tambah Data Pengarang</li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
    function validasi_input(form) {
      if(form.id_pengarang.value=="") {
        alert("ID Pengarang tidak boleh kosong !");
        form.id_pengarang.focus();
        return false;
      }
      return true;
    }
    </script>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Pengarang</label>
                <div class="col-sm-9">
                <?php
                  $query_kdauto = "SELECT max(id_pengarang) as maxKode FROM pengarang";
                  $hasil_kdauto = mysqli_query($koneksi,$query_kdauto);
                  $data_kdauto = mysqli_fetch_array($hasil_kdauto);
                  $kodePengarang = $data_kdauto['maxKode'];
                  $noUrut = (int) substr($kodePengarang, 3, 5);
                  $noUrut++;
                  $char = "AUT";
                  $kode = $char . sprintf("%05s", $noUrut); ?>
                  <input type="text" name="id_pengarang" value="<?php echo $kode; ?>" class="form-control">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Pengarang</label>
                <div class="col-sm-9"> <input type="text" name="nama_pengarang" class="form-control"> </div>
              </div>

              <div class="form-group">
                <label class="col-sm-5 control-label"></label>
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary form control">
                <input type="submit" name="batal" value="Batal" class="btn btn-danger form control">
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