<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $id = $_POST['id'];
    $user = $_POST['username'];
	$nama = $_POST['nama_lengkap'];

    $sql = 'UPDATE user SET ';
    $sql .= "username = '{$user}', nama_lengkap = '{$nama}'" ;
    $sql .= "WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: user.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = '{$id}'";
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
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
    <title>Ubah User</title>
</head>
<body>
<div>
	<div class="p-5 shadow">
		<header">
		<h2 align="center">Edit Data User</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="user_ubah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Username</label>
					<input type="text" class="form-control" name="username" value="<?php echo $data['username'];?>"/>
				</div>
                <div class="input mb-3">
					<label class="col-sm-2 col-form-label">Nama Lengkap</label>
					<input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data['nama_lengkap'];?>"/>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id'];?>" />
					<input type="submit" name="submit" value="Simpan" />
					<a href="user.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>