<?php
  $query = "SELECT * FROM pengembalian WHERE id_pengembalian='$kembaliID'";
  $ambil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($ambil);

  $pinjamID = $data[1];
  $ambil2 = mysqli_query($koneksi, "SELECT id_anggota FROM peminjaman WHERE id_peminjaman='$pinjamID'");
  $data2 = mysqli_fetch_array($ambil2);

  $anggotaID = $data2[0];

  if (isset($_POST['edit'])){
    $id_pengembalian   = $_POST['id_pengembalian'];

    $sql = "UPDATE pengembalian SET id_pengembalian = '$id_pengembalian' WHERE id_pengembalian = '$kembaliID'";
		$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");

    if($simpan) { ?>
			<script>
				alert("Data Pengembalian berhasil diedit !");
				document.location="admin.php?id=pengembalian";
			</script> <?php
		}
  }
	else if (isset($_POST['batal'])){ ?>
    <script>
       document.location="admin.php?id=pengembalian";
    </script> <?php
	}
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Pengembalian</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=pengembalian">Data Pengembalian</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Pengembalian</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST">
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Pengembalian</label>
                <div class="col-sm-9">
                  <input type="text" name="id_pengembalian" value="<?php echo $data[0]; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Peminjam</label>
                  <div class="col-sm-9">
                    <select class="custom-select form-control" disabled name="id_anggota">
                      <?php
                        $ambil_member = mysqli_query($koneksi, "SELECT id_anggota, nama_anggota, status, keterangan FROM anggota ORDER BY nama_anggota");
                        while($data_member = mysqli_fetch_array($ambil_member)){
                          if($data_member[0] == $anggotaID) { ?>
                            <option value="<?php echo $data_member[0]; ?>" selected><?php echo $data_member[1] . " | " . strtoupper($data_member[2]) . " " . strtoupper($data_member[3]); ?></option><?php
                          }
                        }
                      ?>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Petugas</label>
                <div class="col-sm-9">
                    <?php
                      $ambil_petugas = mysqli_query($koneksi, "SELECT a.id_pengembalian, a.id_petugas, b.nama_petugas FROM pengembalian a JOIN petugas b ON(a.id_petugas=b.id_petugas) WHERE a.id_pengembalian='$kembaliID'");
                      $datapetugas = mysqli_fetch_array($ambil_petugas);
                    ?>
                    <input type="text" name="id_petugas" disabled value="<?php echo $datapetugas[2]; ?>"class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Kembali</label>
                <div class="col-sm-9">
                  <?php
                      $ambil_tanggal = mysqli_query($koneksi, "SELECT a.id_pengembalian, a.id_peminjaman, b.tanggal_kembali FROM pengembalian a JOIN peminjaman b ON (a.id_peminjaman=b.id_peminjaman) WHERE a.id_pengembalian='$kembaliID'");
                      $datatgl = mysqli_fetch_array($ambil_tanggal);
                    ?>
                    <input type="text" name="tanggal_kembali" disabled value="<?php echo $datatgl[2]; ?>"class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label"></label>
                <input type="submit" name="edit" value="Edit Data Pengembalian" class="btn btn-primary form control">
                <input type="submit" name="batal" value="Batalkan" class="btn btn-danger form control">
                </label>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- wrapper -->
</section> <!-- main-content -->
<br><br><br><br><br>
<?php include "./layout/footer.php"; ?>
