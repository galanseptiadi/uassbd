<!DOCTYPE html>
<html>
    <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
        <title>Menampilkan Data Dari Database PHP</title>
        <style>
        .galan{
            width: 900px;
            height: 600px;
        }
    </style>
    </head>
    <body>

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

    
        <div class="btn-toolbar mb-2 mb-md-10">
        <div class="container shadow:1%;">
        <div style="margin:1%;">
        <a class="btn btn-primary" href="obat_tambah.php" role="button"><i class="fa-solid fa-trash-can"></i>Tambah Obat</a>
        </div>

        <div class="card">
        <div class="galan">
        <table class="table table-striped">
        <thead class="bg-warning text-dark">
                <tr>
                    <td>No</td>
                    <td>Id obat</td>
                    <td>Nama obat</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <?php
            include "koneksi.php";
            $no = 1;
            $query = mysqli_query($conn, 'SELECT * FROM obat');
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['id_obat']?></td>
                    <td><?php echo $data['nama_obat']?></td>
                    <td>
                    <a class="btn btn-success" href="obat_ubah.php?id=<?= $data['id_obat'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i>edit</a>
					<a class="btn btn-danger" href="obat_hapus.php?id=<?= $data['id_obat'];?>" role="button"><i class="fa-solid fa-trash-can"></i>hapus</a>
                    </td>

                </tr>
                <?php } ?>
        </table>
        <div class="card mt-5">
	<div class="card-header">
        <h4>Triger</h4>
    </div>
	<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="card-header text-white bg-secondary">
            <tr>
                <td>No</td>
				<td>Id Log</td>
				<td>Id Obat</td>
                <td>Obat Lama</td>
				<td>Obat Baru</td>
				<td>Waktu</td>
				<td>Aksi</td>
            </tr>
        </thead>
        <?php
        $no = 1;
        $sql = mysqli_query($conn, 'SELECT * FROM log_obat');
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
				<td><?php echo $data['id_log'] ?></td>
				<td><?php echo $data['id_obat'] ?></td>
                <td><?php echo $data['obat_lama'] ?></td>
				<td><?php echo $data['obat_baru'] ?></td>
				<td><?php echo $data['waktu'] ?></td>
				<td><a class="btn btn-danger" href="trigger_hapus.php?id=<?= $data['id_log'];?>" role="button"><i class="fa-solid fa-trash-can"></i>hapus</a></td>
            </tr>
        <?php } ?>
    </table>
	</div>
	</div>
    </body>
</html>