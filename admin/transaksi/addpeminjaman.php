<?php
  if(isset($_POST['tambah'])) {
    $ambil_admin = mysqli_query($koneksi, "SELECT id_petugas FROM petugas WHERE id_user='$id_user'");
    $data_admin = mysqli_fetch_array($ambil_admin);

    $id_peminjaman   = $_POST['id_peminjaman'];
    $tanggal_pinjam  = $_POST['tanggal_pinjam'];
    $tanggal_kembali = NULL;
    $id_anggota      = $_POST['id_anggota'];
    $id_buku         = $_POST['id_buku'];
    $id_petugas      = $data_admin[0];
    $status          = 'Pinjam';

    $query = "INSERT INTO peminjaman VALUES('$id_peminjaman','$tanggal_pinjam','$tanggal_kembali','$id_anggota','$id_buku','$id_petugas','$status')";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());
    if($simpan) {
      $query2 = mysqli_query($koneksi, "SELECT DATE_ADD(tanggal_pinjam, INTERVAL 7 DAY) as 'tanggal_kembali',id_buku from peminjaman where id_peminjaman='$id_peminjaman'");
      $simpan2 = mysqli_fetch_array($query2);

      $tgl_kembali = $simpan2[0];
      $bukuID = $simpan2[1];

      $query3 = "UPDATE peminjaman SET tanggal_kembali='$tgl_kembali' WHERE id_peminjaman='$id_peminjaman'";
      $simpan3 = mysqli_query($koneksi, $query3);

      $query4 = mysqli_query($koneksi, "SELECT jumlah FROM buku WHERE id_buku='$bukuID'");
      $simpan4 = mysqli_fetch_array($query4);

      $jml = $simpan4[0]-1;

      $query5 = "UPDATE buku SET jumlah='$jml' WHERE id_buku='$bukuID'";
      $simpan5 = mysqli_query($koneksi, $query5);

      if($simpan3 && $simpan5) { ?>
      <script>
  		   alert("Data Peminjaman berhasil ditambahkan !");
         document.location="admin.php?id=peminjaman";
  		</script> <?php
      }
    }
  }
  else if(isset($_POST['batal'])) { ?>
    <script>
      document.location="admin.php?id=peminjaman";
    </script> <?php
  }
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Peminjaman</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=peminjaman">Data Peminjaman</a></li>
          <li><i class="fa fa-file-text-o"></i>Tambah Data Peminjaman</li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
    function validasi_input(form) {
      if(form.id_peminjaman.value=="") {
        alert("ID Peminjaman tidak boleh kosong !");
        form.id_peminjaman.focus();
        return false;
      }
      if(form.id_anggota.value=="") {
        alert("Nama Peminjam tidak boleh kosong !");
        form.id_anggota.focus();
        return false;
      }
      if(form.id_buku.value=="") {
        alert("Judul Buku tidak boleh kosong !");
        form.id_buku.focus();
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
              <div class="form-group col-sm-12">
                <label class="col-sm-2 control-label">ID Peminjaman</label>
                <div class="col-sm-4">
                <?php
                  $query_kdauto = "SELECT max(id_peminjaman) as maxKode FROM peminjaman";
                  $hasil_kdauto = mysqli_query($koneksi,$query_kdauto);
                  $data_kdauto = mysqli_fetch_array($hasil_kdauto);
                  $kodePinjam = $data_kdauto['maxKode'];
                  $noUrut = (int) substr($kodePinjam, 3, 5);
                  $noUrut++;
                  $char = "PJM";
                  $kode = $char . sprintf("%05s", $noUrut); ?>
                  <input type="text" name="id_peminjaman" value="<?php echo $kode; ?>" class="form-control">
                </div>
                <label class="col-sm-2 control-label">Tanggal Pinjam</label>
                <div class="col-sm-4">
                  <?php
                    date_default_timezone_set('ASIA/JAKARTA'); 
                    $date = date('d-m-Y');
                  ?>
                  <input type="text" name="tanggal_pinjam" value="<?php echo $date; ?>" class="form-control tanggal">
                </div>
              </div>
              <div class="form-group col-sm-12">
                <label class="col-sm-2 control-label">Nama Peminjam</label>
                <div class="col-sm-10">
                  <select class="custom-select form-control" name="id_anggota">
                     <option value="">== Pilih Anggota ==</option>

                    <?php
                      $ambil_member = mysqli_query($koneksi, "SELECT id_anggota, nama_anggota, status, keterangan FROM anggota ORDER BY nama_anggota");
                      while($data_member = mysqli_fetch_array($ambil_member)){ ?>
                        <option value="<?php echo $data_member[0]; ?>"><?php echo $data_member[1] . " | " . strtoupper($data_member[2]) . " " . strtoupper($data_member[3]); ?></option><?php
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-sm-12">
                <label class="col-sm-2 control-label">Judul Buku</label>
                <div class="col-sm-10">
                  <select class="custom-select form-control" name="id_buku">
                     <option value="">== Pilih Buku ==</option>
                    <?php
                      $ambil_book = mysqli_query($koneksi, "SELECT id_buku, judul_buku, id_golongan FROM buku WHERE jumlah>0 ORDER BY judul_buku");
                      while($data_book = mysqli_fetch_array($ambil_book)){ ?>
                        <option value="<?php echo $data_book[0]; ?>"><?php echo $data_book[1] . " | " . $data_book[2]; ?></option><?php
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-sm-12">
                <label class="col-sm-2 control-label">Petugas</label>
                <div class="col-sm-10">
                  <?php
                    $ambil_petugas = mysqli_query($koneksi, "SELECT id_petugas, nama_petugas FROM petugas WHERE id_user='$id_user'");
                    $datapetugas = mysqli_fetch_array($ambil_petugas);
                  ?>
                  <input type="text" name="id_petugas" disabled value="<?php echo $datapetugas[1]; ?>"class="form-control">
                </div>
              </div>
              <div class="form-group">&emsp;
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
