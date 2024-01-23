<?php
mysql_connect("localhost","firstmed_user","aslabKOM1234");
mysql_select_db("firstmed_skensalibrary");
$query=mysql_query("SELECT a.tanggal_pinjam, a.tanggal_kembali, b.nama_anggota, c.judul_buku, d.nama_petugas, a.status from peminjaman a LEFT OUTER JOIN anggota b ON(a.id_anggota=b.id_anggota) LEFT OUTER JOIN buku c ON(a.id_buku=c.id_buku) LEFT OUTER JOIN petugas d ON(a.id_petugas=d.id_petugas)");
$header=array(
		array("label"=>"Tgl Pinjam","length"=>"19"),
		array("label"=>"Tgl Kembali","length"=>"19"),
		array("label"=>"Peminjam","length"=>"32"),
		array("label"=>"Judul Buku","length"=>"83"),
		array("label"=>"Petugas","length"=>"18"),
		array("label"=>"Status","length"=>"16"),
	);
include "fpdf/fpdf/fpdf.php";
$pdf = new FPDF();
$pdf->AddPage("P","A4");

#Tampilan judul laporan

$pdf->Setfont('Times','B','18');
$pdf->Cell(0,5,'SMK NEGERI 1 RANGKASBITUNG','0',1,'C');
$pdf->Setfont('Times','B','12');
$pdf->Setfont('Times','B','10');
$pdf->Cell (0,5, 'Jl. Dewi Sartika No.61 L Komplek Pendidikan MC Timur Rangkasbitung','0',1,'C');
$pdf->Cell (0,5, 'Telp. +62 21 394 939 Fax. +62 21 384 292 Email :info@ads.com','0',1,'C');

#Header Title Laporan
	$pdf->SetLineWidth(0.0);
	$pdf->line(5,30,205,30);
	$pdf->ln();
	$pdf->ln();

	$pdf->SetFont('Times','B','12','C');
	$pdf->ln();
	$pdf->Cell(0,5,$judul,'4','3','C');
	$pdf->ln();

	$bln=date('F');
  $pdf->Cell(0,15,"Month : $bln",'C');
  $pdf->Ln();
	$pdf->SetFont('Times','B','10');
	#Warna Label
	$pdf->SetFillColor(22,82,173);
	$pdf->SetTextColor(250);
	$pdf->SetDrawColor(102,153,255);

foreach($header as $kolom){
	$pdf->cell($kolom['length'],5,$kolom['label'],2,'0','C',true);
}
$pdf->Ln();
$pdf->setfillcolor(51,20,255);
$pdf->settextcolor(0);
$fill=false;
$data=array();
while($data=mysql_fetch_array($query)){
		$pdf->cell($header[0]['length'],5,$data[0],1,'0',$fill);
		$pdf->cell($header[1]['length'],5,$data[1],1,'0',$fill);
		$pdf->cell($header[2]['length'],5,$data[2],1,'0',$fill);
		$pdf->cell($header[3]['length'],5,$data[3],1,'0',$fill);
		$pdf->cell($header[4]['length'],5,$data[4],1,'0',$fill);
		$pdf->cell($header[5]['length'],5,$data[5],1,'0',$fill);
$pdf->Ln();
}
$pdf->Ln();
$tgl=date('l d F Y');
$year=date('F Y');
	$pdf->Cell(20,10,"Rangkasbitung, $tgl",'C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','U',10);
	$pdf->Cell(0,10,'Apendi',0,1,'1');
	$pdf->SetY(-32);
	$pdf->SetFont('Times','I',10);
	$pdf->Cell(130);
	$pdf->Cell(0,10,'Halaman '. $pdf->PageNo(),'C');
#output file PDF
$pdf->output("Laporan Anggota ($year).pdf","I");

?>
