<!DOCTYPE html>
<html>
    <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
        <title>Menampilkan Data Dari Database PHP</title>
        <style>
            .galan{
            width: 900px;
            height: 450px;
        }
        </style>
   
        <meta name="description" content="">
    <meta name="author" content="">
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
        <a class="btn btn-primary" href="dokter_tambah.php" role="button"><i class="fa-solid fa-trash-can"></i>Tambah Dokter</a>
        </div>
        <div class="card">
        <div class="galan">
        <table class="table table-striped">
        <thead class="bg-warning text-dark">
                <tr>
                    <td>No</td>
                    <td>Id dokter</td>
                    <td>Nama dokter</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <?php
            include "koneksi.php";
            $no = 1;
            $query = mysqli_query($conn, 'SELECT * FROM dokter');
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['id_dokter']?></td>
                    <td><?php echo $data['nama_dokter']?></td>
                    <td><a class="btn btn-success" href="dokter_ubah.php?id=<?= $data['id_dokter'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i>edit</a>
					<a class="btn btn-danger" href="dokter_hapus.php?id=<?= $data['id_dokter'];?>" role="button"><i class="fa-solid fa-trash-can"></i>hapus</a>
            </td>           

                </tr>
                <?php } ?>
       
             </table>
            </div>
            </body>
</html>