<?php
error_reporting(E_ALL);
include 'koneksi.php';

if (isset($_POST['submit']))
{
	$id_pasien = $_POST['id_pasien'];
    $id_resep = $_POST['id_resep'];
    $tgl_berobat = $_POST['tgl_berobat'];
    $keluhan_pasien = $_POST['keluhan_pasien'];
    $hasil_diagnosa = $_POST['hasil_diagnosa'];
    $penatalaksanaan = $_POST['penatalaksanaan']; 
	$sql = 'INSERT INTO berobat (id_pasien, id_resep, tgl_berobat, keluhan_pasien, hasil_diagnosa, penatalaksanaan)';
	$sql .= "VALUE ('{$id_pasien}','{$id_resep}','{$tgl_berobat}','{$keluhan_pasien}','{$hasil_diagnosa}','{$penatalaksanaan}')";
	$result = mysqli_query($conn, $sql);
	header('location: berobat.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
	<title>Tambah Rekam Medis</title>
</head>
<body>
	<div>
		<div class="p-5 shadow">
		<header>
		<h2 align="center">Tambah Rekam Medis</h2>
		</header>
		<hr>
			<div class="main">
				<form method="post" action="berobat_tambah.php" enctype="multipart/form-data">
					<div class="input mb-3">
						<label for="id_pasien" class="col-sm-2 col-form-label">Id Pasien</label>
						<input type="number" class="form-control" name="nama_obat" placeholder="Masukan Nama Obat" required/>
					</div>
                    <div class="input mb-3">
						<label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
						<input type="text" class="form-control" name="nama_obat" placeholder="Masukan Nama Obat" required/>
					</div>
					<div class="submit">
						<input type="submit" name="submit" value="Simpan" />
						<a href="obat.php" role="button">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>