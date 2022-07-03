<?php

$conn = mysqli_connect('localhost','admin_klinik','312010053','klinik_312010053');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>