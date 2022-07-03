<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages 
    $querypasien = mysqli_query($conn, "SELECT * FROM pasien");
	$jumlahpasien = mysqli_num_rows($querypasien);
	
	$queryobat = mysqli_query($conn, "SELECT * FROM obat");
	$jumlahobat = mysqli_num_rows($queryobat);
	
	$querydokter = mysqli_query($conn, "SELECT * FROM dokter");
	$jumlahdokter = mysqli_num_rows($querydokter);

	// IMPLEMETASI FUNCTION (untuk menampilkan total pasien)
	$data_pasien = mysqli_query($conn, "SELECT fn_totalUsers() as total");
	$jumlah_pasien = mysqli_fetch_row($data_pasien);
	// END IMPLEMENTASI FUNCTION

	// IMPLEMENTASI SUBQUERY (menampilkan total posien yang belum berobat)
	$totalPasienBelumBerobat = mysqli_query($conn, "SELECT count(id_pasien) as total FROM pasien WHERE id_pasien NOT IN(SELECT DISTINCT id_pasien FROM berobat)");
	$totalPasienBelumBerobat = mysqli_fetch_row($totalPasienBelumBerobat);
	// END IMPLEMENTASI SUBQUERY
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>

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

        <!-- Page Heading -->
    
        <div class="content-wrapper">
        <div class="content-header row">
        <h1 align="center">Selamat Datang Di Klinik Segar Waras</h1>
        </div>

<div class="content-body">
<div class=”row g-0″></div>
<div class="container shadow">
<div style=”margin:21px;”></div>
<div class=”col-sm-11 mx-auto”>
<div class=”card”>
<div class=”card-body”>
<p>
<form method=”POST”>
<table style=”width:100%;padding:11px;”>
</div>
</div>
</div>
</div>
</div>
</div>
<tr>
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
								<!-- IMPLEMENTASI SUBQUERY -->
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-4">
												<i class="fa-solid fa-hospital-user fa-7x text-black-50"></i>
											</div>
											<div class="col-8 text-white">
												<h3 class="fs-2">Belum Berobat</h3>
												<p class="fs-4">
													<?= $totalPasienBelumBerobat[0]; ?> Pasien
												</p>
												<p><a href="#" class="text-white no-decoration" style="text-decoration:underline"></a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- END IMPLEMENTASI SUBQUERY -->

								<!-- IMPLEMENTASI FUNCTION -->
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-hospital-user fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">Total Pasien</h3>
												<p class="fs-4">
													<?= $jumlah_pasien[0]; ?>
													Total Pasien
												</p>
												<p><a href="#" class="text-white no-decoration" style="text-decoration:underline"></a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- END IMPLEMENTASI FUNCTION -->
                <!-- IMPLEMENTASI VIEW -->
			<div class="card" style="margin-top:2rem;">
				<div class="card-body">
					<h4>Data Berobat Laki-Laki</h4>
					<div class="container mt-4">
						<table class="table" style="margin-top:1rem;">
							<thead>
								<tr>
									<td>No.</td>
									<td>Nama Pasien</td>
									<td>Jenis Kelamin</td>
									<td>Umur</td>
									<td>Keluhan</td>
									<td>Hasil Diagnosa</td>
									<td>Nama Dokter</td>
								</tr>
							</thead>
							<?php
								$no = 1;
								$query = mysqli_query($conn, 'SELECT * FROM viewPenyakit');
								while ($data = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data['nama_pasien'] ?></td>
								<td><?= $data['jenis_kelamin'] ?></td>
								<td><?= $data['umur'] ?></td>
								<td><?= $data['keluhan_pasien'] ?></td>
								<td><?= $data['hasil_diagnosa'] ?></td>
								<td><?= $data['nama_dokter'] ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

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



