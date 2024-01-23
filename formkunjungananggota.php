<?php 
  include "./layout/sidebar.php"; 

  $sql           = "SELECT CURDATE() as 'tgl_kunjung'";
  $ambil_tgl     = mysqli_query($koneksi, $sql);
  $tgl_kunjungan = mysqli_fetch_array($ambil_tgl);

  if(isset($_POST['tambah'])) {
    $tanggal_kunjungan  = $tgl_kunjungan[0];
    $id_anggota         = $_POST['id_anggota'];
    $tujuan             = implode(', ', $_POST['tujuan']);

    $query = "INSERT INTO kunjungan_anggota VALUES('','$tanggal_kunjungan','$id_anggota','$tujuan')";
    $simpan = mysqli_query($koneksi, $query);
    if($simpan) { ?>
      <script>
  		   alert("Terima Kasih atas Kunjungan Anda. \nSilahkan Login Untuk Melanjutkan.");
         document.location="index.php?id=login";
  		</script> <?php 
    }
  }
?>
<script type="text/javascript">
 function validasi_input(form) {
  if(form.id_anggota.value=="") {
   alert("Anda belum memilih Anggota!");
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
        <h3 class="page-header"><i class="fa fa-laptop"></i>Kunjungan Anggota</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Kunjungan</label>
                <div class="col-sm-9">
                  <input type="text" name="tanggal_kunjungan" value="<?php echo date('d-m-Y', strtotime($tgl_kunjungan['tgl_kunjung']));?>" disabled class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-9">
                  <select class="custom-select form-control" name="id_anggota">
                    <option value="">== Pilih Nama ==</option>
                    <?php
                      $ambil_member = mysqli_query($koneksi, "SELECT id_anggota, nama_anggota, status, keterangan FROM anggota ORDER BY nama_anggota");
                      while($data_member = mysqli_fetch_array($ambil_member)){ ?>
                        <option value="<?php echo $data_member[0]; ?>"><?php echo $data_member[1] . " | " . strtoupper($data_member[2]) . " " . strtoupper($data_member[3]); ?></option><?php
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tujuan</label>
                <div class="col-sm-9">
                  <div class="checkbox">
                    <input type="checkbox" value="Membaca Buku" name="tujuan[]">Membaca Buku
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" value="Meminjam Buku" name="tujuan[]">Meminjam Buku
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" value="Mengembalikan Buku" name="tujuan[]">Mengembalikan Buku
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" value="Mencari Buku" name="tujuan[]">Mencari Buku
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" value="Dll" name="tujuan[]" checked>Dll
                  </div>
                </div>
              </div>
              <div class="form-group">&emsp;
                <label class="col-sm-4 control-label"></label>&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary form control">&emsp;
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
<br><br><br>
<?php include "./layout/footer.php"; ?>