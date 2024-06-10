<?php
// include database connection file
include_once("koneksi.php");
 
// Get id_diving from URL to delete that user
$id_diving = $_GET['id_diving'];
 
// Delete user row from table based on given id_diving
$result = mysqli_query($mysqli, "DELETE FROM pantai WHERE id_diving=$id_diving");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:datapantai.php");
?>