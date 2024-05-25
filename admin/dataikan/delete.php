<?php
// include database connection file
include_once("koneksi.php");
 
// Get id_ikan from URL to delete that user
$id_ikan = $_GET['id_ikan'];
 
// Delete user row from table based on given id_ikan
$result = mysqli_query($mysqli, "DELETE FROM ikan WHERE id_ikan=$id_ikan");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:dataikan.php");
?>