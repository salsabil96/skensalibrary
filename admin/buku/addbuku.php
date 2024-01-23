<?php
if(isset($_POST['tambah'])) {
  $id_buku        = $_POST['id_buku'];
  $tanggal_input  = $_POST['tanggal_input'];
  $judul_buku     = $_POST['judul_buku'];
  $file            = $_FILES['file']['name'];
  $tmp_name       = $_FILES['file']['tmp_name'];
  $id_pengarang   = $_POST['id_pengarang'];
  $id_penerbit    = $_POST['id_penerbit'];
  $id_sumber      = $_POST['id_sumber'];
  $id_golongan    = $_POST['id_golongan'];
  $tahun          = $_POST['tahun'];
  $jumlah         = $_POST['jumlah'];
  $call_number    = $_POST['call_number'];

  if(empty($tmp_name)){
    $query = "INSERT INTO buku set id_buku='$id_buku',tanggal_input='$tanggal_input',judul_buku='$judul_buku',id_pengarang='$id_pengarang',id_penerbit='$id_penerbit',id_sumber='$id_sumber',id_golongan='$id_golongan',tahun='$tahun',jumlah='$jumlah',call_number='$call_number'";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());
  }
  else {
    move_uploaded_file($tmp_name,"images/buku/".$file)or die('Tidak bisa upload');
    $query = "INSERT INTO buku VALUES('$id_buku','$tanggal_input','$judul_buku','$id_pengarang','$id_penerbit','$id_sumber','$id_golongan','$tahun','$jumlah','$call_number','$file')";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());
  }

  if($simpan) { ?>
    <script>
     alert("Buku berhasil ditambahkan !");
     document.location="admin.php?id=buku";
     </script> <?php
   }
 }
 else if(isset($_POST['batal'])) { ?>
  <script>
    document.location="admin.php?id=buku";
    </script> <?php
  }
  ?>
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Data Buku</h3>
          <ul class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i><a href="admin.php?id=buku">Data Buku</a></li>
            <li><i class="fa fa-file-text-o"></i>Tambah Data Buku</li>
          </ul>
        </div>
      </div>

      <script type="text/javascript">
        function validasi_input(form) {
          if(form.id_buku.value=="") {
            alert("No. Buku tidak boleh kosong !");
            form.id_buku.focus();
            return false;
          }
          if(form.id_pengarang.value=="") {
            alert("Pengarang tidak boleh kosong !");
            form.id_pengarang.focus();
            return false;
          }
          if(form.id_penerbit.value=="") {
            alert("Penerbit tidak boleh kosong !");
            form.id_penerbit.focus();
            return false;
          }
          if(form.id_sumber.value=="") {
            alert("Sumber tidak boleh kosong !");
            form.id_sumber.focus();
            return false;
          }
          if(form.id_golongan.value=="") {
            alert("Golongan tidak boleh kosong !");
            form.id_golongan.focus();
            return false;
          }
          return true;
        }
      </script>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data" onsubmit="return validasi_input(this);">

                <div class="form-group col-md-11">
                  <label class="col-sm-2 control-label">No Buku</label>
                  <div class="col-sm-4">
                    <?php
                    $query_kdauto = "SELECT max(id_buku) as maxKode FROM buku";
                    $hasil_kdauto = mysqli_query($koneksi,$query_kdauto);
                    $data_kdauto = mysqli_fetch_array($hasil_kdauto);
                    $kodeBuku = $data_kdauto['maxKode'];
                    ++$kodeBuku;
                    ?>
                    <input type="text" name="id_buku" value="<?php echo $kodeBuku; ?>" class="form-control">
                  </div>
                  <label class="col-sm-2 control-label">Tanggal Input</label>
                  <div class="col-sm-4"> <input type="text" name="tanggal_input" class="form-control tanggal"> </div>
                </div>

                <div class="form-group col-md-11">
                  <label class="col-sm-2 control-label">Judul Buku</label>
                  <div class="col-sm-4"> <input type="text" name="judul_buku" class="form-control"> </div>
                  <label class="col-sm-2 control-label">Sampul</label>
                  <div class="col-sm-4"> <input type="file" name="file" class="form-control"> </div>
                </div>
                
                <div class="form-group col-sm-11">
                  <label class="col-sm-2 control-label">Pengarang</label>
                  <div class="col-sm-4">
                    <select class="custom-select form-control" name="id_pengarang">
                      <option value="">== Pilih Pengarang ==</option>
                      <?php
                      $ambil_aut = mysqli_query($koneksi, "SELECT * FROM pengarang ORDER BY nama_pengarang");
                      while($data_aut = mysqli_fetch_array($ambil_aut)){ ?>
                        <option value="<?php echo $data_aut[0]; ?>"><?php echo $data_aut[1]; ?></option><?php
                      } ?>
                    </select>
                  </div>
                  <label class="col-sm-2 control-label">Penerbit</label>
                  <div class="col-sm-4">
                    <select class="custom-select form-control" name="id_penerbit">
                      <option value="">== Pilih Penerbit ==</option>
                      <?php
                      $ambil_pub = mysqli_query($koneksi, "SELECT * FROM penerbit ORDER BY nama_penerbit");
                      while($data_pub = mysqli_fetch_array($ambil_pub)){ ?>
                        <option value="<?php echo $data_pub[0]; ?>"><?php echo $data_pub[1]; ?></option><?php
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group col-sm-11">
                  <label class="col-sm-2 control-label">Sumber</label>
                  <div class="col-sm-4">
                    <select class="custom-select form-control" name="id_sumber">
                      <option value="">== Pilih Sumber ==</option>
                      <?php
                      $ambil_src = mysqli_query($koneksi, "SELECT * FROM sumber ORDER BY nama_sumber");
                      while($data_src = mysqli_fetch_array($ambil_src)){ ?>
                        <option value="<?php echo $data_src[0]; ?>"><?php echo $data_src[1]; ?></option><?php
                      } ?>
                    </select>
                  </div>
                  <label class="col-sm-2 control-label">Golongan</label>
                  <div class="col-sm-4">
                    <select class="custom-select form-control" name="id_golongan">
                      <option value="">== Pilih Golongan ==</option>
                      <?php
                      $ambil_gol = mysqli_query($koneksi, "SELECT * FROM golongan");
                      while($data_gol = mysqli_fetch_array($ambil_gol)){ ?>
                        <option value="<?php echo $data_gol[0]; ?>"><?php echo $data_gol[0] . " | " . $data_gol[1]; ?></option><?php
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group col-sm-11">
                  <label class="col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-2">
                    <select class="custom-select form-control" name="tahun">
                      <?php
                      for($i=1983; $i<2019; $i++){ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option> <?php
                      } ?>
                    </select>
                  </div>
                  <label class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-1">  <input type="text" name="jumlah" class="form-control">  </div>
                  <label class="col-sm-2 control-label">Call Number</label>
                  <div class="col-sm-3">  <input type="text" name="call_number" class="form-control"> </div>
                </div>

                <div class="form-group col-sm-11">&emsp;&emsp;
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
    <?php include "./layout/footer.php"; ?>