<?php
	require "koneksi.php";
	
	$querypasien = mysqli_query($conn, "SELECT * FROM pasien");
	$jumlahpasien = mysqli_num_rows($querypasien);
	
	$queryobat = mysqli_query($conn, "SELECT * FROM obat");
	$jumlahobat = mysqli_num_rows($queryobat);
	
	$querydokter = mysqli_query($conn, "SELECT * FROM dokter");
	$jumlahdokter = mysqli_num_rows($querydokter);
	
	$queryberobat = mysqli_query($conn, "SELECT * FROM berobat");
	$jumlahberobat = mysqli_num_rows($queryberobat);
	
	$queryresep = mysqli_query($conn, "SELECT * FROM resep_obat");
	$jumlahresep = mysqli_num_rows($queryresep);
	
	$queryuser = mysqli_query($conn, "SELECT * FROM user");
	$jumlahuser = mysqli_num_rows($queryuser);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/sb-admin-2.min.css" />
    <title>Home</title>
	<link rel="stylesheet" href="style.css">

 <div id="container">
 
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fw fa-clinic-medical"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Klinik Segar Waras</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
			<li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-clipboard"></i>
                    <span>Dashboard</span></a>
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-clipboard"></i>
                    <span>Menu</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>Logout</span></a>
                    <li class="nav-item">
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

            
    

<style css >
/* navigasi */
nav {
 display: block;
 background-color: #A52A2A;
}
nav a {
 padding: 15px 30px;
 display: inline-block;
 color: #ffffff;
 font-size: 14px;
 text-decoration: none;
 font-weight: bold;
}
nav a.active,
nav a:hover {
 background-color: #A52A2A;
}
</style>
	
	<style>
		.kotak {
			border: solid;
		}
		.summary-pasien{
			background-color: #FF8C00;
			border-radius: 15px;
		}
		.summary-obat{
			background-color: #0a516b;
			border-radius: 15px;
		}
		.summary-dokter{
			background-color: #008B8B;
			border-radius: 15px;
		}
		.summary-berobat{
			background-color: #8FBC8F;
			border-radius: 15px;
		}
		.summary-resep{
			background-color: #0000FF;
			border-radius: 15px;
		}
		.summary-user{
			background-color: #5F9EA0;
			border-radius: 15px;
		}
		
		.no-decoration{
			text-decoration: none;
		}
		
	</style>

		
		<div class="container mt-4">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-pasien p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-bed-pulse fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Pasien</h3>
								<p class="fs-4"><?php echo $jumlahpasien; ?> Pasien</p>
								<p> <a href="pasien.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-obat p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-capsules fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Obat</h3>
								<p class="fs-4"><?php echo $jumlahobat; ?> Obat</p>
								<p> <a href="obat.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-dokter p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-user-doctor fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Dokter</h3>
								<p class="fs-4"><?php echo $jumlahdokter; ?> Dokter</p>
								<p> <a href="dokter.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-berobat p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-syringe fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Berobat</h3>
								<p class="fs-4"><?php echo $jumlahberobat; ?> Berobat</p>
								<p> <a href="berobat.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-resep p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-receipt fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Resep</h3>
								<p class="fs-4"><?php echo $jumlahresep; ?> Resep</p>
								<p> <a href="resep_obat.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-user p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-hospital-user fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">User</h3>
								<p class="fs-4"><?php echo $jumlahuser; ?> User</p>
								<p> <a href="user.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Galan Septiadi - 312010053 | Universitas Pelita Bangsa 2022 |</span>
                    </div>
                </div>
            </footer>
</body>
</html>