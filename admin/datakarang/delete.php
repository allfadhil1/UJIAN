<?php
// include database connection file
include_once("koneksi.php");
 
// Get id_karang from URL to delete that user
$id_karang = $_GET['id_karang'];
 
// Delete user row from table based on given id_karang
$result = mysqli_query($mysqli, "DELETE FROM karang WHERE id_karang=$id_karang");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:datakarang.php");
?>