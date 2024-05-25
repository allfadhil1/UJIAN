<?php
// include database connection file
include_once("koneksi.php");
 
// Get id_pantai from URL to delete that user
$id_pantai = $_GET['id_pantai'];
 
// Delete user row from table based on given id_pantai
$result = mysqli_query($mysqli, "DELETE FROM pantai WHERE id_pantai=$id_pantai");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:datapantai.php");
?>