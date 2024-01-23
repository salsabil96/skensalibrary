<?php 
  include "./layout/sidebar.php";
  
  $sql           = "SELECT CURDATE() as 'tgl_kunjung'";
  $ambil_tgl     = mysqli_query($koneksi, $sql);
  $tgl_kunjungan = mysqli_fetch_array($ambil_tgl);

  if(isset($_POST['tambah'])) {
    $tanggal_kunjungan  = $tgl_kunjungan[0];
    $nama_tamu          = $_POST['nama_tamu'];
    $jabatan            = $_POST['jabatan'];
    $maksud_kunjungan   = $_POST['maksud_kunjungan'];
    $penerima           = implode(', ', $_POST['penerima']);
    $kesan              = $_POST['kesan'];

    $query = "INSERT INTO tamu_perpus VALUES('','$tanggal_kunjungan','$nama_tamu','$jabatan','$maksud_kunjungan','$penerima','$kesan')";
    $simpan = mysqli_query($koneksi, $query);
    if($simpan) { ?>
      <script>
  		   alert("Terima Kasih Atas Kunjungan Anda! \n Fitur Pencarian Buku Dapat Diakses!");
         document.location="index.php?id=caribuku";
  		</script> <?php
    }
  }
?>

<script type="text/javascript">
 function validasi_input(form) {
  if(form.nama_tamu.value=="") {
   alert("Nama tidak boleh kosong!");
   form.nama_tamu.focus();
   return false;
 }
 if(form.jabatan.value=="") {
   alert("Jabatan tidak boleh kosong!");
   form.jabatan.focus();
   return false;
 }
 return true;
}
</script>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i>Kunjungan Tamu</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Tanggal Kunjungan</label>
                <div class="col-sm-4">
                  <input type="text" name="tanggal_kunjungan" value="<?php echo date('d-m-Y', strtotime($tgl_kunjungan['tgl_kunjung']));?>" disabled class="form-control">
                </div>
                <label class="col-sm-2 control-label">Nama Tamu</label>
                <div class="col-sm-4">
                  <input type="text" name="nama_tamu" class="form-control">
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-4">
                  <input type="text" name="jabatan" class="form-control">
                </div>
                 <label class="col-sm-2 control-label">Maksud Kunjungan</label>
                <div class="col-sm-4">
                  <input type="text" name="maksud_kunjungan" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Penerima</label>
                <div class="col-sm-9">
                  <div class="checkbox">
                    <input type="checkbox" value="Kepala Sekolah" name="penerima[]">Kepala Sekolah
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" value="Kepala Perpustakaan" name="penerima[]">Kepala Perpustakaan
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" value="Petugas Perpustakaan" name="penerima[]">Petugas Perpustakaan
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kesan</label>
                <div class="col-sm-9">
                  <input type="text" name="kesan" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label"></label>
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary form control">
                </label>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- wrapper -->
</section> <!-- main-content -->
<script type="text/javascript" src="./assets/js/ga.js"></script>
<br><br>
<?php include "./layout/footer.php"; ?>