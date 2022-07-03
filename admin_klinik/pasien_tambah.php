<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
 $id_pasien = $_POST['id_pasien'];
 $nama_pasien = $_POST['nama_pasien'];
 $jenis_kelamin = $_POST['jenis_kelamin'];
 $umur = $_POST['umur'];

 $sql = 'INSERT INTO pasien (id_pasien, nama_pasien, jenis_kelamin, umur) ';
 $sql .= "VALUE ('{$id_pasien}', '{$nama_pasien}','{$jenis_kelamin}', 
'{$umur}')";
 $result = mysqli_query($conn, $sql);
 header('location: pasien.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<title>Tambah Pasien</title>
	<style>
		.galan{
			background: #DEB887;
			padding: 10px;
	}
	</style>
</head>
<body>
	<div>
		<div class="p-5 shadow">
		<header class="galan">
		<h2 align="center">Tambah Pasien</h2>
		</header>
		<hr>
			<div class="main">
				<form method="post" action="pasien_tambah.php" enctype="multipart/form-data">
					<div class="input mb-3">
						<label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
						<input type="text" class="form-control" name="nama_pasien" placeholder="Masukan Nama Pasien" required/>
					</div>
                    <div class="input">
						<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis_kelamin</label>
						<select name="jenis_kelamin" class="form-control">
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
						</select>
					</div>
                <div class="input mb-3">
						<label for="umur" class="col-sm-2 col-form-label">Umur</label>
						<input type="number" class="form-control" name="umur" placeholder="Masukan Umur" required/>
					</div>
					<div class="submit">
						<input type="submit" class="btn btn-success" name="submit" value="Simpan" />
						<a href="pasien.php" class="btn btn-warning" role="button">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>