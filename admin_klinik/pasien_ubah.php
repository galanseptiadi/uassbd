<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
if (isset($_POST['submit']))
{
    $id = $_POST['id'];
    $nama = $_POST['nama_pasien'];
    $jenis = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
   
    $sql = 'UPDATE pasien SET ';
    $sql .="nama_pasien = '{$nama}', jenis_kelamin = '{$jenis}', ";
    $sql .="umur = '{$umur}'";
    $sql .= "WHERE id_pasien = '{$id}'";
    $result = mysqli_query($conn, $sql);
    
    header('location: pasien.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM pasien WHERE id_pasien = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die('error: Data tidak tersedia');
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
    <title>Ubah Pasien</title>
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
		<h2 align="center">Edit Data Pasien</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="pasien_ubah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Nama Pasien</label>
					<input type="text" class="form-control" name="nama_pasien" value="<?php echo $data['nama_pasien'];?>"/>
				</div>
                <div class="input mb-3">
					<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin">
						<option <?php echo is_select ('L', $data['jenis_kelamin']);?>value="L">Laki-laki</option>
						<option <?php echo is_select ('P', $data['jenis_kelamin']);?>value="P">Perempuan</option>
						</select>
				</div>
                <div class="input mb-3">
					<label class="col-sm-2 col-form-label">Umur</label>
					<input type="number" class="form-control" name="umur" value="<?php echo $data['umur'];?>"/>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id_pasien'];?>" />
					<input type="submit" class="btn btn-success" name="submit" value="Simpan" />
					<a href="pasien.php" class="btn btn-warning" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>