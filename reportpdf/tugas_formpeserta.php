<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>FORMULIR PESERTA DIDIK</title>
	<style>
		.warning{
			color: #ff0000;
		}
	</style>
</head>
<body>
	<?php
	$tanggal=""; $eror_tanggal=""; $nama=""; $eror_nama=""; $jk=""; $eror_jk=""; $nisn=""; $eror_nisn=""; $nik=""; $eror_nik=""; $tempat=""; $eror_tempat=""; $ttl=""; $eror_ttl=""; $noreg="";	$eror_noreg=""; $agama=""; $eror_agama=""; $kwn=""; $eror_kwn=""; $negara=""; $eror_negara=""; $kebutuhan=""; $eror_kebutuhan=""; $alamat=""; $eror_alamat=""; $rt=""; $eror_rt=""; $rw=""; $eror_rw=""; $dusun=""; $eror_dusun=""; $desa=""; $eror_desa=""; $kecamatan=""; $eror_kecamatan=""; $pos=""; $eror_pos=""; $lintang=""; $eror_lintang=""; $bujur=""; $eror_bujur=""; $tinggal=""; $eror_tinggal=""; $moda=""; $eror_moda=""; $kks=""; $anak=""; $eror_anak=""; $pkps=""; $eror_pkps=""; $kps=""; $eror_kps="";
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (empty($_POST["tanggal"])) {
			$eror_tanggal="Tanggal harus diisi!";
		}else{
			$tanggal=cek($_POST["tanggal"]);
		}
		if (empty($_POST["nama"])) {
			$eror_nama="Nama harus diisi!";
		}else{
			if (!preg_match("/^[a-zA-Z ]*$/", cek($_POST["nama"]))) {
				$eror_nama="Nama harus terdiri dari huruf dan spasi!";
			}else{
				$nama=cek($_POST["nama"]);
			}
		}
		if (empty($_POST["jk"])||empty($_POST["jk"])) {
			$eror_jk="Jenis Kelamin harus diisi!";
		}else{
			$jk=cek($_POST["jk"]);
		}
		if (empty($_POST["nisn"])) {
			$eror_nisn="NISN harus diisi!";
		}else{
			if (!is_numeric(cek($_POST["nisn"]))) {
				$eror_nisn="NISN harus terdiri dari angka!";
			}else{
				if (strlen(cek($_POST["nisn"]))>10) {
					$eror_nisn="NISN harus terdiri dari 10 angka saja!";
				}else{
					$nisn=cek($_POST["nisn"]);
				}
			}
		}
		if (empty($_POST["nik"])) {
			$eror_nik="NIK/No. KITAS harus diisi!";
		}else{
			if (!is_numeric(cek($_POST["nik"]))) {
				$eror_nik="NIK/No. KITAS harus terdiri dari angka saja!";
			}else{
				if (strlen(cek($_POST["nik"]))>16) {
					$eror_nik="NISN harus terdiri dari 16 angka saja!";
				}else{
					$nik=cek($_POST["nik"]);
				}
			}
		}
		if (empty($_POST["tempat"])) {
			$eror_tempat="Tempat Lahir harus diisi!";
		}else{
			if (!preg_match("/^[a-zA-Z ]*$/", cek($_POST["tempat"]))) {
				$eror_tempat="Tempat Lahir harus terdiri dari huruf dan spasi saja!";
			}else{
				$tempat=cek($_POST["tempat"]);
			}
		}
		if (empty($_POST["ttl"])) {
			$eror_ttl="Tanggal Lahir harus diisi!";
		}else{
			$ttl=cek($_POST["ttl"]);
		}
		if (empty($_POST["noreg"])) {
			$eror_noreg="No Registrasi Akta Lahir harus diisi!";
		}else{
			$noreg=cek($_POST["noreg"]);
		}
		if ($_POST["agama"]=="a") {
			$eror_agama="Agama & Kepercayaan harus dipilih!";
		}else{
			$agama=cek($_POST["agama"]);
		}
		if (empty($_POST["kwn"])||empty($_POST["kwn"])) {
			$eror_kwn="Kewarganegaraan harus diisi!";
		}else{
			$kwn=cek($_POST["kwn"]);
			if ($kwn=="Asing") {
				if (empty($_POST["negara"])) {
					$eror_negara="Nama Negara Asing harus diisi!";
				}else{
					$kwn=cek($_POST["negara"]);
				}
			}
		}
		if ($_POST["kebutuhan"]=="k") {
			$eror_kebutuhan="Kebutuhan harus dipilih!";
		}else{
			$kebutuhan=cek($_POST["kebutuhan"]);
		}
		if (empty($_POST["alamat"])) {
			$eror_alamat="Alamat harus diisi!";
		}else{
			$alamat=cek($_POST["alamat"]);
		}
		if (empty($_POST["rt"])) {
			$eror_rt="RT harus diisi!";
		}else{
			if (!is_numeric(cek($_POST["rt"]))) {
				$eror_rt="RT harus terdiri dari angka saja!";
			}else{
				$rt=cek($_POST["rt"]);
			}
		}
		if (empty($_POST["rw"])) {
			$eror_rw="RW harus diisi!";
		}else{
			if (!is_numeric(cek($_POST["rw"]))) {
				$eror_rw="RW harus terdiri dari angka saja!";
			}else{
				$rw=cek($_POST["rw"]);
			}
		}
		$dusun=cek($_POST["dusun"]);
		if (empty($_POST["desa"])) {
			$eror_desa="Kelurahan/ Desa harus diisi!";
		}else{
			$desa=cek($_POST["desa"]);
		}
		if (empty($_POST["kecamatan"])) {
			$eror_kecamatan="Kecamatan harus diisi!";
		}else{
			$kecamatan=cek($_POST["kecamatan"]);
		}
		if (empty($_POST["pos"])) {
			$eror_pos="Kode Pos harus diisi!";
		}else{
			if (!is_numeric(cek($_POST["pos"]))) {
				$eror_pos="Kode Pos harus terdiri dari angka saja!";
			}else{
				$pos=cek($_POST["pos"]);
			}
		}
		if (empty($_POST["lintang"])) {
			$eror_lintang="Lintang harus diisi!";
		}else{
			$lintang=cek($_POST["lintang"]);
		}
		if (empty($_POST["bujur"])) {
			$eror_bujur="Bujur harus diisi!";
		}else{
			$bujur=cek($_POST["bujur"]);
		} 
		if ($_POST["tinggal"]=="t") {
			$eror_tinggal="Tempat Tinggal harus dipilih!";
		}else{
			$tinggal=cek($_POST["tinggal"]);
		}
		if ($_POST["moda"]=="m") {
			$eror_moda="Moda Transportasi harus dipilih!";
		}else{
			$moda=cek($_POST["moda"]);
		}
		$kks=cek($_POST["kks"]);
		if (empty($_POST["anak"])) {
			$eror_anak="Anak Ke-berapa harus diisi!";
		}else{
			if (!is_numeric(cek($_POST["anak"]))) {
				$eror_anak="Anak Ke-berapa harus terdiri dari angka saja!";
			}else{
				$anak=cek($_POST["anak"]);
			}
		}
		if (empty($_POST["pkps"])) {
			$eror_pkps="Penerima KPS/PKH harus dipilih!";
		}else{
			$pkps=cek($_POST["pkps"]);
			if ($pkps=="Y") {
				if (empty($_POST["kps"])) {
					$eror_kps="No KPS/PKH harus diisi!";
				}else{
					$kps=cek($_POST["kps"]);
				}
			}
		}
	}
	function cek($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	?>
	<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="padding-bottom: 10%;">
	<div class="row">
		<div class="col-md-12" style="padding-bottom: 1%;">
			<div class="text-white text-center" style="background-color: darkorange; font-size: 25px; font-weight: bold;">
					<div class="card-header">
					FORMULIR PESERTA DIDIK
					</div>
			</div>
		</div>
		<div class="col-md-10"></div>
		<div class="col-md-2">
			<div class="text-center" style="border: solid 2px; font-weight:bold;">
				F-PD
			</div>
		</div>
			<label class="col-sm-1 col-form-label" for="ttl">Tanggal: </label>
			<div class="col-sm-2">
				<input type="date" class="form-control <?php echo($eror_tanggal !="" ?"is-invalid" : "");?>" id="tanggal" placeholder="Tanggal" name="tanggal" value="<?php echo $tanggal?>">
				<span class="warning"><?php echo $eror_tanggal;?></span>
			</div>
		<div class="col-md-12" style="padding-top: 0.5%;">
			<div class="text-white" style="background-color: steelblue; font-size: 18px; font-weight: bold;">
				<div class="card-header">
					DATA PESERTA DIDIK
				</div>
			</div>
		</div>
		<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="nama">1. Nama Lengkap</label>
					<div class="col-sm-8">
						<input type="text" class="form-control <?php echo($eror_nama !="" ?"is-invalid" : "");?>" id="nama" placeholder="Nama" name="nama" value="<?php echo $nama;?>">
						<span class="warning"><?php echo $eror_nama;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="jk">2. Jenis Kelamin</label>
					<div class="col-sm-4">
						<input type="radio" name="jk" value="Laki-laki" <?php if($jk=='Laki-laki'){echo 'checked';}?>/> Laki-laki &nbsp &nbsp
						<input type="radio" name="jk" value="Perempuan" <?php if($jk=='Perempuan'){echo 'checked';}?>/> Perempuan &nbsp &nbsp
						<span class="warning"><?php echo $eror_jk;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="nisn">3. NISN</label>
					<div class="col-sm-4">
						<input type="text" class="form-control <?php echo($eror_nisn !="" ?"is-invalid" : "");?>" id="nisn" placeholder="NISN" name="nisn" value="<?php echo$nisn;?>">
						<span class="warning"><?php echo $eror_nisn;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="nik">4. NIK/ No. KITAS &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(Untuk WNA)</label>
					<div class="col-sm-6">
						<input type="text" class="form-control <?php echo($eror_nik !="" ?"is-invalid" : "");?>" id="nik" placeholder="NIK/ No. KITAS" name="nik" value="<?php echo $nik?>">
						<span class="warning"><?php echo $eror_nik;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="tempat">5. Tempat Lahir</label>
					<div class="col-sm-8">
						<input type="text" class="form-control <?php echo($eror_tempat !="" ?"is-invalid" : "");?>" id="tempat" placeholder="Tempat Lahir" name="tempat" value="<?php echo $tempat?>">
						<span class="warning"><?php echo $eror_tempat;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="ttl">6. Tanggal Lahir</label>
					<div class="col-sm-2">
						<input type="date" class="form-control <?php echo($eror_ttl !="" ?"is-invalid" : "");?>" id="ttl" placeholder="Tanggal Lahir" name="ttl" value="<?php echo $ttl?>">
						<span class="warning"><?php echo $eror_ttl;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="noreg">7. No Registrasi Akta Lahir</label>
					<div class="col-sm-10">
						<input type="text" class="form-control <?php echo($eror_noreg !="" ?"is-invalid" : "");?>" id="noreg" placeholder="No Registrasi Akta Lahir" name="noreg" value="<?php echo $noreg?>">
						<span class="warning"><?php echo $eror_noreg;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="agama">8. Agama & Kepercayaan</label>
					<div class="col-sm-3">
						<select class="form-control <?php echo($eror_agama !="" ?"is-invalid" : "");?>" name="agama">
							<option value="a" >Agama&Kepercayaan</option>
							<option value="Islam" <?php if ($agama=="Islam") { echo "selected=\"selected\""; } ?>>Islam</option>
							<option value="Kristen/Protestan" <?php if ($agama=="Kristen/Protestan") { echo "selected=\"selected\""; } ?>>Kristen/Protestan</option>
							<option value="Katolik" <?php if ($agama=="Katolik") { echo "selected=\"selected\""; } ?>>Katolik</option>
							<option value="Hindu" <?php if ($agama=="Hindu") { echo "selected=\"selected\""; } ?>>Hindu</option>
							<option value="Budha" <?php if ($agama=="Budha") { echo "selected=\"selected\""; } ?>>Budha</option>
							<option value="Konghucu" <?php if ($agama=="Konghucu") { echo "selected=\"selected\""; } ?>>Konghucu</option>
							<option value="Kepercayaan Kepada Tuhan YME" <?php if ($agama=="Kepercayaan Kepada Tuhan YME") { echo "selected=\"selected\""; } ?>>Kepercayaan Kepada Tuhan YME</option>
							<option value="Lainnya" <?php if ($agama=="Lainnya") { echo "selected=\"selected\""; } ?>>Lainnya</option>
						</select>
						<span class="warning"><?php echo $eror_agama;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="kwn">9. Kewarganegaraan</label>
					<div class="col-sm-3">
						<input type="radio" name="kwn" value="Indonesia" <?php if($kwn=='Indonesia'){echo 'checked';}?>/> Indonesia (WNI) &nbsp &nbsp
						<input type="radio" name="kwn" value="Asing" <?php if($kwn!='Indonesia'&&$kwn!=''){echo 'checked';}?>/> Asing (WNA):
						<span class="warning"><?php echo $eror_kwn;?></span>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control <?php echo($eror_negara !="" ?"is-invalid" : "");?>" id="negara" placeholder="Nama Negara" name="negara" value="<?php if($kwn!='Indonesia'){echo $kwn;}?>">
						<span class="warning"><?php echo $eror_negara;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="kebutuhan">10. Berkebutuhan Khusus</label>
					<div class="col-sm-2">
						<select class="form-control <?php echo($eror_kebutuhan !="" ?"is-invalid" : "");?>" name="kebutuhan">
							<option value="k" >Kebutuhan</option>
							<option value="Tidak" <?php if ($kebutuhan=="Tidak") { echo "selected=\"selected\""; } ?>>Tidak</option>
							<option value="Netra" <?php if ($kebutuhan=="Netra") { echo "selected=\"selected\""; } ?>>Netra</option>
							<option value="Rungu" <?php if ($kebutuhan=="Netra") { echo "selected=\"selected\""; } ?>>Rungu</option>
							<option value="Grahita Ringan" <?php if ($kebutuhan=="Grahita Ringan") { echo "selected=\"selected\""; } ?>>Grahita Ringan</option>
							<option value="Grahita Sedang" <?php if ($kebutuhan=="Grahita Sedang") { echo "selected=\"selected\""; } ?>>Grahita Sedang</option>
							<option value="Daksa Ringan" <?php if ($kebutuhan=="Daksa Ringan") { echo "selected=\"selected\""; } ?>>Daksa Ringan</option>
							<option value="Daksa Sedang" <?php if ($kebutuhan=="Daksa Sedang") { echo "selected=\"selected\""; } ?>>Daksa Sedang</option>
							<option value="Laras" <?php if ($kebutuhan=="Laras") { echo "selected=\"selected\""; } ?>>Laras</option>
							<option value="Wicara" <?php if ($kebutuhan=="Wicara") { echo "selected=\"selected\""; } ?>>Wicara</option>
							<option value="Tuna Ganda" <?php if ($kebutuhan=="Tuna Ganda") { echo "selected=\"selected\""; } ?>>Tuna Ganda</option>
							<option value="Hiper Aktif" <?php if ($kebutuhan=="Hiper Aktif") { echo "selected=\"selected\""; } ?>>Hiper Aktif</option>
							<option value="Cerdas Insting" <?php if ($kebutuhan=="Cerdas Insting") { echo "selected=\"selected\""; } ?>>Cerdas Insting</option>
							<option value="Bakat Istimewah" <?php if ($kebutuhan=="Bakat Istimewah") { echo "selected=\"selected\""; } ?>>Bakat Istimewah</option>
							<option value="Kesulitan Belajar" <?php if ($kebutuhan=="Kesulitan Belajar") { echo "selected=\"selected\""; } ?>>Kesulitan Belajar</option>
							<option value="Narkoba" <?php if ($kebutuhan=="Narkoba") { echo "selected=\"selected\""; } ?>>Narkoba</option>
							<option value="Indigo" <?php if ($kebutuhan=="Indigo") { echo "selected=\"selected\""; } ?>>Indigo</option>
							<option value="Down Sindrom" <?php if ($kebutuhan=="Down Sindrom") { echo "selected=\"selected\""; } ?>>Down Sindrom</option>
							<option value="Autis" <?php if ($kebutuhan=="Autis") { echo "selected=\"selected\""; } ?>>Autis</option>
						</select>
						<span class="warning"><?php echo $eror_kebutuhan;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="alamat">11. Alamat Jalan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control <?php echo($eror_alamat !="" ?"is-invalid" : "");?>" id="alamat" placeholder="Alamat Jalan" name="alamat" value="<?php echo $alamat?>">
						<span class="warning"><?php echo $eror_alamat;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="rt">12. RT</label>
					<div class="col-sm-1">
						<input type="text" class="form-control <?php echo($eror_rt !="" ?"is-invalid" : "");?>" id="rt" placeholder="RT" name="rt" value="<?php echo $rt?>">
						<span class="warning"><?php echo $eror_rt;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="rw">13. RW</label>
					<div class="col-sm-1">
						<input type="text" class="form-control <?php echo($eror_rw !="" ?"is-invalid" : "");?>" id="rw" placeholder="RW" name="rw" value="<?php echo $rw?>">
						<span class="warning"><?php echo $eror_rw;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="dusun">14. Nama Dusun</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="dusun" placeholder="Nama Dusun" name="dusun" value="<?php echo $dusun?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="desa">15. Nama Kelurahan/ Desa</label>
					<div class="col-sm-8">
						<input type="text" class="form-control <?php echo($eror_desa !="" ?"is-invalid" : "");?>" id="desa" placeholder="Nama Kelurahan/ Desa" name="desa" value="<?php echo $desa?>">
						<span class="warning"><?php echo $eror_desa;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="kecamatan">16. Kecamatan</label>
					<div class="col-sm-8">
						<input type="text" class="form-control <?php echo($eror_kecamatan !="" ?"is-invalid" : "");?>" id="kecamatan" placeholder="Kecamatan" name="kecamatan" value="<?php echo $kecamatan?>">
						<span class="warning"><?php echo $eror_kecamatan;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="pos">17. Kode Pos</label>
					<div class="col-sm-2">
						<input type="text" class="form-control <?php echo($eror_pos !="" ?"is-invalid" : "");?>" id="pos" placeholder="Kode Pos" name="pos" value="<?php echo $pos?>">
						<span class="warning"><?php echo $eror_pos;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="lintang">18. Lintang</label>
					<div class="col-sm-8">
						<input type="text" class="form-control <?php echo($eror_lintang !="" ?"is-invalid" : "");?>" id="lintang" placeholder="Lintang" name="lintang" value="<?php echo $lintang?>">
						<span class="warning"><?php echo $eror_lintang;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="bujur">19. Bujur</label>
					<div class="col-sm-8">
						<input type="text" class="form-control <?php echo($eror_bujur !="" ?"is-invalid" : "");?>" id="bujur" placeholder="Bujur" name="bujur" value="<?php echo $bujur?>">
						<span class="warning"><?php echo $eror_bujur;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="tinggal">20. Tempat Tinggal</label>
					<div class="col-sm-2">
						<select class="form-control <?php echo($eror_tinggal !="" ?"is-invalid" : "");?>" name="tinggal">
							<option value="t">Tempat Tinggal</option>
							<option value="Bersama Orang Tua" <?php if ($tinggal=="Bersama Orang Tua") { echo "selected=\"selected\""; } ?>>Bersama Orang Tua</option>
							<option value="Wali" <?php if ($tinggal=="Wali") { echo "selected=\"selected\""; } ?>>Wali</option>
							<option value="Kos" <?php if ($tinggal=="Kos") { echo "selected=\"selected\""; } ?>>Kos</option>
							<option value="Asrama" <?php if ($tinggal=="Asrama") { echo "selected=\"selected\""; } ?>>Asrama</option>
							<option value="Panti Asuhan" <?php if ($tinggal=="Panti Asuhan") { echo "selected=\"selected\""; } ?>>Panti Asuhan</option>
							<option value="Lainnya" <?php if ($tinggal=="Lainnya") { echo "selected=\"selected\""; } ?>>Lainnya</option>
						</select>
						<span class="warning"><?php echo $eror_tinggal;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="moda">21. Moda Transportasi</label>
					<div class="col-sm-2">
						<select class="form-control <?php echo($eror_moda !="" ?"is-invalid" : "");?>" name="moda">
							<option value="m">Moda Transportasi</option>
							<option value="Jalan Kaki" <?php if ($moda=="Jalan Kaki") { echo "selected=\"selected\""; } ?>>Jalan Kaki</option>
							<option value="Kendaraan Pribadi" <?php if ($moda=="Kendaraan Pribadi") { echo "selected=\"selected\""; } ?>>Kendaraan Pribadi</option>
							<option value="Kendaraan Umum/Angkot/Pete-Pete" <?php if ($moda=="Kendaraan Umum/Angkot/Pete-Pete") { echo "selected=\"selected\""; } ?>>Kendaraan Umum/Angkot/Pete-Pete</option>
							<option value="Jemputan Sekolah" <?php if ($moda=="Jemputan Sekolah") { echo "selected=\"selected\""; } ?>>Jemputan Sekolah</option>
							<option value="Kereta Api" <?php if ($moda=="Kereta Api") { echo "selected=\"selected\""; } ?>>Kereta Api</option>
							<option value="Ojek" <?php if ($moda=="Ojek") { echo "selected=\"selected\""; } ?>>Ojek</option>
							<option value="Andong/Bendi/Sado/Dokar/Delman/Becak" <?php if ($moda=="Andong/Bendi/Sado/Dokar/Delman/Becak") { echo "selected=\"selected\""; } ?>>Andong/Bendi/Sado/Dokar/Delman/Becak</option>
							<option value="Perahu Penyebrangan/Rakit/Getek" <?php if ($moda=="Perahu Penyebrangan/Rakit/Getek") { echo "selected=\"selected\""; } ?>>Perahu Penyebrangan/Rakit/Getek</option>
							<option value="Lainnya" <?php if ($moda=="Lainnya") { echo "selected=\"selected\""; } ?>>Lainnya</option>
						</select>
						<span class="warning"><?php echo $eror_moda;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="kks">22. No KKS  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(Kartu Keluarga Sejahtera)</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="kks" placeholder="No KKS" name="kks" value="<?php echo $kks?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="anak">23. Anak ke-berapa</label>
					<div class="col-sm-2">
						<input type="text" class="form-control <?php echo($eror_anak !="" ?"is-invalid" : "");?>" id="anak" placeholder="Anak ke-berapa" name="anak" value="<?php echo $anak?>">
						<span class="warning"><?php echo $eror_anak;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="pkps">24. Penerima KPS/PKH</label>
					<div class="col-sm-4">
						<input type="radio" name="pkps" value="Y" <?php if($pkps=='Y'){echo 'checked';}?>/> Ya &nbsp &nbsp
						<input type="radio" name="pkps" value="T" <?php if($pkps=='T'){echo 'checked';}?>/> Tidak &nbsp &nbsp
						<span class="warning"><?php echo $eror_pkps;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="kps">25. No. KPS/PKH  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(apabila menerima)</label>
					<div class="col-sm-6">
						<input type="text" class="form-control <?php echo($eror_kps !="" ?"is-invalid" : "");?>" id="kps" placeholder="No KPS/PKH" name="kps" value="<?php echo $kps?>">
						<span class="warning"><?php echo $eror_kps;?></span>
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-success">SIMPAN DATA</button>
				<br><br>
			</form>
			<form method="POST" action="tugas_report.php">
				<button type="submit" class="btn btn-primary">REPORT DATA TO PDF</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php
include('tugas_koneksi.php');
if (!empty($tanggal)&&!empty($nama)&&!empty($jk)&&!empty($nisn)&&!empty($nik)&&!empty($tempat)&&!empty($ttl)&&!empty($noreg)&&!empty($agama)&&!empty($kwn)&&!empty($kebutuhan)&&!empty($alamat)&&!empty($rt)&&!empty($rw)&&!empty($desa)&&!empty($kecamatan)&&!empty($pos)&&!empty($lintang)&&!empty($bujur)&&!empty($tinggal)&&!empty($moda)&&!empty($anak)&&!empty($pkps)) {
	$sql="INSERT INTO form VALUES ('$tanggal','$nama', '$jk', '$nisn', '$nik', '$tempat', '$ttl', '$noreg', '$agama', '$kwn', '$kebutuhan', '$alamat', '$rt', '$rw', '$dusun', '$desa', '$kecamatan', '$pos', '$lintang', '$bujur', '$tinggal', '$moda', '$kks', '$anak', '$pkps', '$kps')";
	if (mysqli_query($con, $sql)) {
		echo "<script> 
            alert('Data berhasil dimasukkan!');
            document.location.href = '1.html';
        </script>";
	}else{
		echo "Gagal".mysqli_error($con);
	}
}
mysqli_close($con); 
?>