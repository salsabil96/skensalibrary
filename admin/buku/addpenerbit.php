<?php
  if(isset($_POST['tambah'])) {
    $id_penerbit   = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];

    $query  = "INSERT INTO penerbit VALUES('$id_penerbit','$nama_penerbit')";
    $simpan = mysqli_query($koneksi, $query);
	  if($simpan) { ?>
      <script>
			   alert("Penerbit berhasil ditambahkan !");
         document.location="admin.php?id=penerbit";
		  </script> <?php
    }
  }
  else if(isset($_POST['batal'])) { ?>
    <script>
      document.location="admin.php?id=penerbit";
    </script> <?php
  }
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Penerbit</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=penerbit">Data Penerbit</a></li>
          <li><i class="fa fa-file-text-o"></i>Tambah Data Penerbit</li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
    function validasi_input(form) {
      if(form.id_penerbit.value=="") {
        alert("ID Penerbit tidak boleh kosong !");
        form.id_penerbit.focus();
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
                <label class="col-sm-2 control-label">ID Penerbit</label>
                <div class="col-sm-9">
                <?php
                  $query_kdauto = "SELECT max(id_penerbit) as maxKode FROM penerbit";
                  $hasil_kdauto = mysqli_query($koneksi,$query_kdauto);
                  $data_kdauto = mysqli_fetch_array($hasil_kdauto);
                  $kodePenerbit = $data_kdauto['maxKode'];
                  $noUrut = (int) substr($kodePenerbit, 3, 5);
                  $noUrut++;
                  $char = "PUB";
                  $kode = $char . sprintf("%05s", $noUrut); ?>
                  <input type="text" name="id_penerbit" value="<?php echo $kode; ?>" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Penerbit</label>
                <div class="col-sm-9"> <input type="text" name="nama_penerbit" class="form-control"> </div>
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