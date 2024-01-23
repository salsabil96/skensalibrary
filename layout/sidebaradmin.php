<!--sidebar start-->
<aside><font size="3pt" face="Candara">
  <div id="sidebar" class="nav-collapse">
    <ul class="sidebar-menu">
      <li class="active">
        <a href="admin.php"><i class="icon_house_alt"></i><span>Dashboard</span></a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="icon_documents_alt"></i><span>Profilku</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a href="admin.php?id=viewprofile&userID=<?php echo $id_user; ?>"><font size="2pt" face="Candara">Data Pribadi</font></a></li>
          <li><a href="admin.php?id=logout"><font size="2pt" face="Candara">Log Out</font></a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="icon_documents_alt"></i><span>User</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a href="admin.php?id=anggota"><font size="2pt" face="Candara">Data Anggota</font></a></li>
          <li><a href="admin.php?id=petugas"><font size="2pt" face="Candara">Data Petugas</font></a></li>
          <li><a href="admin.php?id=useraccount"><font size="2pt" face="Candara">Data User Account</font></a></li>
        </ul>
      </li>
      <li>
        <li class="sub-menu">
          <a href="javascript:;">
            <i class="icon_documents_alt"></i><span>Buku</span>
            <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a href="admin.php?id=buku"><font size="2pt" face="Candara">Data Buku</font></a></li>
            <li><a href="admin.php?id=pengarang"><font size="2pt" face="Candara">Data Pengarang</font></a></li>
            <li><a href="admin.php?id=penerbit"><font size="2pt" face="Candara">Data Penerbit</font></a></li>
            <li><a href="admin.php?id=sumber"><font size="2pt" face="Candara">Data Sumber</font></a></li>
            <li><a href="admin.php?id=golongan"><font size="2pt" face="Candara">Data Golongan</font></a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;">
            <i class="icon_documents_alt"></i><span>Transaksi</span>
            <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a href="admin.php?id=peminjaman"><font size="2pt" face="Candara">Data Peminjaman</font></a></li>
            <li><a href="admin.php?id=pengembalian"><font size="2pt" face="Candara">Data Pengembalian</font></a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;">
            <i class="icon_documents_alt"></i><span>Kunjungan</span>
            <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a href="admin.php?id=kunjungananggota"><font size="2pt" face="Candara">Kunjungan Anggota</font></a></li>
            <li><a href="admin.php?id=kunjungantamu"><font size="2pt" face="Candara">Kunjungan Tamu</font></a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;">
            <i class="icon_documents_alt"></i><span>Laporan</span>
            <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a href="admin/laporan/laporanbuku.php" target="_blank"><font size="2pt" face="Candara">Laporan Buku</font></a></li>
            <li><a href="admin/laporan/laporanpeminjaman.php" target="_blank"><font size="2pt" face="Candara">Laporan Peminjaman Buku</font></a></li>
            <li><a href="admin/laporan/laporankunjungan.php" target="_blank"><font size="2pt" face="Candara">Laporan Kunjungan</font></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
</font>
<!--sidebar end-->
