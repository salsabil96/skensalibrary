<?php
mysql_connect("localhost","firstmed_user","aslabKOM1234");
mysql_select_db("firstmed_skensalibrary");
$query=mysql_query("select * from buku");
$judul="Laporan Data Buku Perpustakaan SMK Negeri 1 Rangkasbitung";
$header=array(
		array("label"=>"ID Buku","length"=>"20"),
		array("label"=>"Tanggal Input","length"=>"23"),
		array("label"=>"Judul Buku","length"=>"110"),
		array("label"=>"Tahun","length"=>"11"),
		array("label"=>"Jumlah","length"=>"13"),
    array("label"=>"Golongan","length"=>"17"),
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
	$pdf->cell($kolom['length'],5,$kolom['label'],4,'0','C',true);
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
		$pdf->cell($header[3]['length'],5,$data[7],1,'0',$fill);
    	$pdf->cell($header[4]['length'],5,$data[8],1,'0',$fill);
		$pdf->cell($header[5]['length'],5,$data[6],1,'0',$fill);

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
$pdf->output("Laporan Buku ($year).pdf","I");

?>
