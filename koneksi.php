<?php
$databaseHost = "localhost";
$databaseName = "dasprog";
$databaseUsername = "root";
$databasePassword = "";

$mysql = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if($mysql){
  //  echo "koneksi db berhasil.<br/>";
} else{
    echo "koneksi gagal.<br/>";

}
?>
