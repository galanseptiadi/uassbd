<?php
$host = "localhost";
$user = "admin_klinik";
$pass = "312010053";
$db = "klinik_312010053";
$conn = mysqli_connect('localhost','admin_klinik','312010053','klinik_312010053');

if ($conn == false)
{
    echo "Koneksi ke server gagal";
    die();
} else echo "";
?>