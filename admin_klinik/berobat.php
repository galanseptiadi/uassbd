<!DOCTYPE html>
<html>
    <head>
        <title>Menampilkan Data Dari Database PHP</title>
        <style>
            table,tr,td {
                border: 1px solid black;
            }
            thead {
                background-color: #cccddd;
            }
        </style>
    </head>
    <body>
        <h1 style>Sistem Informasi Klinik</h1>
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Id resep</td>
                    <td>Id pasien</td>
                    <td>Id dokter</td>
                    <td>tgl berobat</td>
                    <td>keluhan pasien</td>
                    <td>hasil diagnosa</td>
                    <td>penatalaksanaan</td>
                </tr>
            </thead>
            <?php
            include "koneksi.php";
            $no = 1;
            $query = mysqli_query($conn, 'SELECT * FROM berobat');
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['id_berobat']?></td>
                    <td><?php echo $data['id_pasien']?></td>
                    <td><?php echo $data['id_dokter']?></td>
                    <td><?php echo $data['tgl_berobat']?></td>
                    <td><?php echo $data['keluhan_pasien']?></td>
                    <td><?php echo $data['hasil_diagnosa']?></td>
                    <td><?php echo $data['penatalaksanaan']?></td>
                    <td><a class="btn btn-success" href="berobat_ubah.php?id=<?= $data['id_dokter'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i>edit</a>
					<a class="btn btn-danger" href="berobat_hapus.php?id=<?= $data['id_dokter'];?>" role="button"><i class="fa-solid fa-trash-can"></i>hapus</a>
                    </td>
                </tr>
                <?php } ?>
        </table>
    </body>
</html>