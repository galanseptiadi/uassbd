<?php
error_reporting(E_ALL);
include 'koneksi.php';

if (isset($_POST['submit']))
{
	$nama = $_POST['nama_obat'];
	$sql = 'INSERT INTO obat (nama_obat)';
	$sql .= "VALUE ('{$nama}')";
	$result = mysqli_query($conn, $sql);
	header('location: obat.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<title>Tambah Obat</title>
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
		<h2 align="center">Tambah Obat</h2>
		</header>
		<hr>
			<div class="main">
				<form method="post" action="obat_tambah.php" enctype="multipart/form-data">
					<div class="input mb-3">
						<label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
						<input type="text" class="form-control" name="nama_obat" placeholder="Masukan Nama Obat" required/>
					</div>
					<div class="submit">
						<input type="submit" class="btn btn-success name="submit" value="Simpan" />
						<a href="obat.php" class="btn btn-warning role="button">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>