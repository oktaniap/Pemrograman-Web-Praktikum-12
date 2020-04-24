<?php
include('tugas_koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$sql = mysqli_query($con,"SELECT nama, jk, nisn, tempat, ttl FROM form");
$html = '<html><head><link rel="stylesheet" type="text/css" href="css.css"></head><body><center><h3>Rekapitulasi Data Peserta Didik</h3></center><hr/><br/>';
$html .= '<table class="table1">
 <tr>
 <th class="center">No</th>
 <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>NISN</th>
 <th>Tempat, Tanggal Lahir</th>
 </tr>';
$no = 1;
while ($row = mysqli_fetch_array($sql)) {
	$html .= "<tr>
	<td>".$no."</td>
	<td>".$row['nama']."</td>
	<td>".$row['jk']."</td>
	<td>".$row['nisn']."</td>
	<td>".$row['tempat'];
	$tl=date('d F Y',strtotime($row['ttl']));
	$html .= ", ".$tl."</td>
	</tr>";
	$no++;
}
$html .= "</table>";
$query = mysqli_query($con,"SELECT * FROM form");
while ($data = mysqli_fetch_array($query)) {
	$html .= "<div class='isi'>
	<div class='judul'>DATA PESERTA DIDIK</div>
	<div class='line'></div><br><br> 
	<table class='par'>
	<tr>
	<th><b>NAMA PESERTA DIDIK</th>
	<th style='text-transform: uppercase;'>".$data['nama']."</th>
	</tr><br>
	<tr>
	<th>NISN</th>
	<th>".$data['nisn']."</th>
	</tr>
	<tr>
	<th>TANGGAL PENDAFTARAN</th>";
	$tl=date('d F Y',strtotime($data['tanggal']));
	$html .="<th>".$tl."</th></b><tr>
	<br><hr/><br></table>
	<table class='tab'>
	<tr><td>Nama Lengkap</td><td>".$data['nama']."</td>
	<tr><td>Jenis Kelamin</td><td>".$data['jk']."</td>
	<tr><td>NISN</td><td>".$data['nisn']."</td>
	<tr><td>NIK</td><td>".$data['nik']."</td>";
	$tl=date('d F Y',strtotime($data['ttl']));
	$html .= "<tr><td>Tempat, Tanggal Lahir</td><td>".$data['tempat'].", ".$tl."</td>
	<tr><td>No. Registrasi Akta</td><td>".$data['noreg']."</td>
	<tr><td>Agama</td><td>".$data['agama']."</td>
	<tr><td>Kwarganegaraan</td><td>".$data['kwn']."</td>
	<tr><td>Berkebutuhan Khusus</td><td>".$data['kebutuhan']."</td>
	<tr><td>Alamat</td><td>".$data['alamat']."</td>
	<tr><td>RT</td><td>".$data['rt']."</td>
	<tr><td>RW</td><td>".$data['rw']."</td>
	<tr><td>Dusun</td><td>".$data['dusun']."</td>
	<tr><td>Desa</td><td>".$data['desa']."</td>
	<tr><td>Kecamatan</td><td>".$data['kecamatan']."</td>
	<tr><td>Kode Pos</td><td>".$data['pos']."</td>
	<tr><td>Lintang</td><td>".$data['lintang']."</td>
	<tr><td>Bujur</td><td>".$data['bujur']."</td>
	<tr><td>Tempat Tinggal</td><td>".$data['tinggal']."</td>
	<tr><td>Moda Transportasi</td><td>".$data['moda']."</td>
	<tr><td>No KKS</td><td>".$data['kks']."</td>
	<tr><td>Anak Ke-</td><td>".$data['anak']."</td>";
	if ($data['pkps']=="Y") {
		$pkps="Ya";
	}else{
		$pkps="Tidak";
	}
	$html .= "<tr><td>Penerima KPS/PKH</td><td>".$pkps."</td>
	<tr><td>No. KPS/PKH</td><td>".$data['kps']."</td>
	</table></div>";
}
$html .= "</body></html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream('pesertadidik.pdf');
?>