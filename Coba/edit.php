<?php
// include database connection file
include_once("../koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update'])) {
    $nama= $_POST['nama_ikan'];
    $jenis= $_POST['jenis_ikan'];
    $umur= $_POST['umur_ikan'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE user SET nama_ikan='$nama',jenis_ikan='$jenis',umur_ikan='$umur' WHERE id_ikan=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id_ikan'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM ikan WHERE id_ikan=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$nama= $_POST['nama_ikan'];
    $jenis= $_POST['jenis_ikan'];
    $umur= $_POST['umur_ikan'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="nama_ikan" value=<?php echo $name;?>></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="jenis_ikan" value=<?php echo $email;?>></td>
			</tr>
			<tr> 
				<td>Mobile</td>
				<td><input type="text" name="umur_ikan" value=<?php echo $mobile;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_ikan" value=<?php echo $_GET['id_ikan'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>