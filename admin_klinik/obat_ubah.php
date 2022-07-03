<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $id 	= $_POST['id'];
	$nama 	= $_POST['nama_obat'];

    $sql = 'UPDATE obat SET ';
    $sql .= "nama_obat = '{$nama}'" ;
    $sql .= "WHERE id_obat = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: obat.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM obat WHERE id_obat = '{$id}'";
    $result = mysqli_query($conn, $sql);
    if (!$result) die('Error: Data tidak tersedia');
    $data = mysqli_fetch_array($result);

    function is_select($var, $val) {
        if ($var == $val) return 'selected="selected"';
        return false;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <title>Ubah Obat</title>
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
		<h2 align="center">Edit Data Obat</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="obat_ubah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Nama Obat</label>
					<input type="text" class="form-control" name="nama_obat" value="<?php echo $data['nama_obat'];?>"/>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id_obat'];?>" />
					<input type="submit" class="btn btn-success name="submit" value="Simpan" />
					<a href="obat.php" class="btn btn-warning role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>