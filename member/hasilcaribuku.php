<?php
  $keyword   = $_POST['keyword'];
  $kategori = $_POST['kategori'];
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Hasil Cari Buku</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="member.php">Home</a></li>
          <li><i class="fa fa-file-text-o"></i>Hasil Cari Buku</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" action="member.php?id=hasil">
              <div class="form-group">
                <label class="col-sm-1 control-label m-bot15"><h4>Cari</h4></label>
                <div class="col-sm-4">
                  <input type="text" name="keyword" class="form-control input-lg m-bot15" placeholder="Kata Kunci" value="<?php echo $keyword; ?>">
                </div>
                <label class="col-sm-1 control-label"><h4>Kategori</h4></label>
                <div class="col-lg-4">
                  <select class="form-control input-lg m-bot15" name="kategori">
                    <option value="judul_buku"<?php if($kategori == "judul_buku"){ ?>selected<?php } ?> >Judul</option>
                    <option value="pengarang"<?php if($kategori == "pengarang"){ ?>selected<?php } ?> >Pengarang</option>
                    <option value="penerbit"<?php if($kategori == "penerbit"){ ?>selected<?php } ?> >Penerbit</option>
                    <option value="tahun"<?php if($kategori == "tahun"){ ?>selected<?php } ?> >Tahun Terbit</option>
                    <option value="call_number"<?php if($kategori == "call_number"){ ?>selected<?php } ?> >Nomor Panggil</option>
                  </select> 
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label"></label>
                <input type="submit" name="Cari" value="Cari Buku" class="btn btn-primary form control">
                </label>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
      if(($kategori != "pengarang") && ($kategori != "penerbit")) {
        $perintah = "SELECT buku.judul_buku, buku.tahun, buku.call_number, pengarang.nama_pengarang, penerbit.nama_penerbit, buku.jumlah, golongan.no_rak, buku.id_buku, buku.foto FROM buku JOIN pengarang on (buku.id_pengarang=pengarang.id_pengarang) JOIN penerbit on(buku.id_penerbit=penerbit.id_penerbit) JOIN golongan on (buku.id_golongan=golongan.id_golongan) WHERE " . $kategori . " like '%$keyword%'";
        $result = mysqli_query($koneksi, $perintah);

        $total = mysqli_num_rows($result);
        if($total == 0){
          echo "Buku tidak ditemukan";
        }
        else { ?>
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No</th>
                    <th>Sampul</th>
                    <th>Status</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Call Number</th>
                    <th>Pengarang</th>
                    <th class="col-sm-1">Penerbit</th>
                    <th class="col-sm-1">No.Rak</th>
                    <th>Action</th>
                  </tr> <?php
                  $no=1;
                  while($data = mysqli_fetch_array($result)){
                    $take = mysqli_query($koneksi, "SELECT bookmark.penanda, bookmark.id_bookmark, anggota.id_user from bookmark JOIN anggota on (bookmark.id_anggota=anggota.id_anggota) WHERE id_buku='$data[7]'");
                    $take1 = mysqli_fetch_array($take);
                    ?>
                    <tr> <?php
                      if($data[5]==0){ $status="Masih Dipinjam"; }
                      else { $status="Tersedia"; }

                      echo "<td>$no</td>";
                      if($data[8]==NULL){ ?>
                      <td width=125px height=150px>
                        <table border=2 style=border-style:double;>
                          <tr>
                            <td width=120px height=150px><center><font size=3pt>SAMPUL BELUM TERSEDIA</center></font></td>
                          </tr>
                        </table>
                      </td>
                    <?php }
                    else { ?>
                      <td>
                        <table border=0 style=border-style:double;>
                          <tr> <?php
                            echo "<td><center><a href='images/buku/$data[8]'><img src='images/buku/$data[8]' width=120px height=150px></center></a></td>"; ?>
                          </tr>
                        </table>
                      </td> <?php
                    }
                      if($data[5]==0){
                        echo "<td><font color='red'>$status</font></td>";
                      }
                      else{
                        echo "<td><font color='blue'>$status</font></td>";
                      }
                      echo "<td>$data[0]</td>";
                      echo "<td>$data[1]</td>";
                      echo "<td>$data[2]</td>";
                      echo "<td>$data[3]</td>";
                      echo "<td>$data[4]</td>";
                      echo "<td>$data[6]</td>";
                      if($take1[0]=='ya' && $take1[2]==$id_user) { ?>
                        <td><a class="btn btn-danger" href="member.php?id=deletebookmark&bookmarkID=<?php echo $take1[1]; ?>"><i class="icon_close_alt2"></i> Hapus Bookmark</a></td> <?php
                      }
                      else { ?>
                      <td><a class="btn btn-primary" href="member.php?id=addbookmark&bukuID=<?php echo $data[7]; ?>"><i class="icon_plus_alt2"></i> Bookmark</a></td> <?php
                      }
                      $no++;
                     ?>
                   </tr> <?php
                 } ?>
               </tbody>
             </table>
           </div>
         </div> <?php
       }
     }
     else if($kategori=="pengarang"){
       $perintah = "SELECT buku.judul_buku, buku.tahun, buku.call_number, pengarang.nama_pengarang, penerbit.nama_penerbit, buku.jumlah, golongan.no_rak, buku.foto, buku.id_buku FROM buku JOIN pengarang on (buku.id_pengarang=pengarang.id_pengarang) JOIN penerbit on(buku.id_penerbit=penerbit.id_penerbit) JOIN golongan on (buku.id_golongan=golongan.id_golongan) WHERE pengarang.nama_pengarang like '%$keyword%'";
       $result = mysqli_query($koneksi, $perintah);
       $total = mysqli_num_rows($result);
       if($total == 0){
         echo "Buku tidak ditemukan";
       }
       else { ?>
         <div class="row">
           <div class="col-lg-12">
             <table class="table table-striped table-advance table-hover">
               <tbody>
                 <tr>
                   <th>No</th>
                   <th>Sampul</th>
                   <th>Status</th>
                   <th>Judul Buku</th>
                   <th>Tahun Terbit</th>
                   <th>Call Number</th>
                   <th>Pengarang</th>
                   <th class="col-sm-1">Penerbit</th>
                   <th class="col-sm-1">No.Rak</th>
                   <th>Action</th>
                 </tr> <?php
                 $no=1;
                 while($data = mysqli_fetch_array($result)){
                   $take = mysqli_query($koneksi, "SELECT bookmark.penanda, bookmark.id_bookmark, anggota.id_user from bookmark JOIN anggota on (bookmark.id_anggota=anggota.id_anggota) WHERE id_buku='$data[8]'");
                   $take1 = mysqli_fetch_array($take);
                    ?>
                   <tr> <?php
                     if($data[5]==0){ $status="Masih Dipinjam"; }
                     else { $status="Tersedia"; }

                     echo "<td>$no</td>";
                     if($data[7]==NULL){ ?>
                     <td width=125px height=150px>
                       <table border=2 style=border-style:double;>
                         <tr>
                           <td width=120px height=150px><center><font size=3pt>SAMPUL BELUM TERSEDIA</center></font></td>
                         </tr>
                       </table>
                     </td>
                   <?php }
                   else { ?>
                     <td>
                       <table border=0 style=border-style:double;>
                         <tr> <?php
                           echo "<td><center><a href='images/buku/$data[7]'><img src='images/buku/$data[7]' width=120px height=150px></center></a></td>"; ?>
                         </tr>
                       </table>
                     </td> <?php
                   }
                     if($data[5]==0){
                       echo "<td><font color='red'>$status</font></td>";
                     }
                     else{
                       echo "<td><font color='blue'>$status</font></td>";
                     }
                     echo "<td>$data[0]</td>";
                     echo "<td>$data[1]</td>";
                     echo "<td>$data[2]</td>";
                     echo "<td>$data[3]</td>";
                     echo "<td>$data[4]</td>";
                     echo "<td>$data[6]</td>";
                     if($take1[0]=='ya' && $take1[2]==$id_user) { ?>
                       <td><a class="btn btn-danger" href="member.php?id=deletebookmark&bookmarkID=<?php echo $take1[1]; ?>"><i class="icon_plus_alt2"></i> Hapus Bookmark</a></td> <?php
                     }
                     else { ?>
                     <td><a class="btn btn-primary" href="member.php?id=addbookmark&bukuID=<?php echo $data[7]; ?>"><i class="icon_plus_alt2"></i> Bookmark</a></td> <?php
                     }
                     $no++;
                    ?>
                  </tr> <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div> <?php
      }
     }
     else if($kategori=="penerbit"){
       $perintah = "SELECT buku.judul_buku, buku.tahun, buku.call_number, pengarang.nama_pengarang, penerbit.nama_penerbit, buku.jumlah, golongan.no_rak, buku.foto, buku.id_buku FROM buku JOIN pengarang on (buku.id_pengarang=pengarang.id_pengarang) JOIN penerbit on(buku.id_penerbit=penerbit.id_penerbit) JOIN golongan on (buku.id_golongan=golongan.id_golongan) WHERE penerbit.nama_penerbit like '%$keyword%'";
       $result = mysqli_query($koneksi, $perintah);
       $total = mysqli_num_rows($result);
       if($total == 0){
         echo "Buku tidak ditemukan";
       }
       else { ?>
         <div class="row">
           <div class="col-lg-12">
             <table class="table table-striped table-advance table-hover">
               <tbody>
                 <tr>
                   <th>No</th>
                   <th>Sampul</th>
                   <th>Status</th>
                   <th>Judul Buku</th>
                   <th>Tahun Terbit</th>
                   <th>Call Number</th>
                   <th>Pengarang</th>
                   <th class="col-sm-1">Penerbit</th>
                   <th class="col-sm-1">No.Rak</th>
                   <th>Action</th>
                 </tr> <?php
                 $no=1;
                 while($data = mysqli_fetch_array($result)){
                   $take = mysqli_query($koneksi, "SELECT bookmark.penanda, bookmark.id_bookmark, anggota.id_user from bookmark JOIN anggota on (bookmark.id_anggota=anggota.id_anggota) WHERE id_buku='$data[8]'");
                   $take1 = mysqli_fetch_array($take);?>
                   <tr> <?php
                     if($data[5]==0){ $status="Masih Dipinjam"; }
                     else { $status="Tersedia"; }

                     echo "<td>$no</td>";
                     if($data[7]==NULL){ ?>
                     <td width=125px height=150px>
                       <table border=2 style=border-style:double;>
                         <tr>
                           <td width=120px height=150px><center><font size=3pt>SAMPUL BELUM TERSEDIA</center></font></td>
                         </tr>
                       </table>
                     </td>
                   <?php }
                   else { ?>
                     <td>
                       <table border=0 style=border-style:double;>
                         <tr> <?php
                           echo "<td><center><a href='images/buku/$data[7]'><img src='images/buku/$data[7]' width=120px height=150px></center></a></td>"; ?>
                         </tr>
                       </table>
                     </td> <?php
                   }
                     if($data[5]==0){
                       echo "<td><font color='red'>$status</font></td>";
                     }
                     else{
                       echo "<td><font color='blue'>$status</font></td>";
                     }
                     echo "<td>$data[0]</td>";
                     echo "<td>$data[1]</td>";
                     echo "<td>$data[2]</td>";
                     echo "<td>$data[3]</td>";
                     echo "<td>$data[4]</td>";
                     echo "<td>$data[6]</td>";
                     if($take1[0]=='ya' && $take1[2]==$id_user) { ?>
                       <td><a class="btn btn-danger" href="member.php?id=deletebookmark&bookmarkID=<?php echo $take1[1]; ?>"><i class="icon_plus_alt2"></i> Hapus Bookmark</a></td> <?php
                     }
                     else { ?>
                     <td><a class="btn btn-primary" href="member.php?id=addbookmark&bukuID=<?php echo $data[7]; ?>"><i class="icon_plus_alt2"></i> Bookmark</a></td> <?php
                     }
                     $no++;
                    ?>
                  </tr> <?php

                } ?>
              </tbody>
            </table>
          </div>
        </div> <?php
      }
     }
  ?>
</section>
<?php include "./layout/footer.php"; ?>
