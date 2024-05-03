<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Ikan</td>
				<td><input type="text" name="nama_ikan"></td>
			</tr>
			<tr> 
				<td>Jenis Ikan</td>
				<td><input type="text" name="jenis_ikan"></td>
			</tr>
			<tr> 
				<td>Umur Ikan</td>
				<td><input type="text" name="umur_ikan"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nama = $_POST['nama_ikan'];
		$jenis = $_POST['jenis_ikan'];
		$umur = $_POST['umur_ikan'];
		
		// include database connection file
		include_once("../koneksi");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO ikan(nama_ikan,jenis_ikan,umur_ikan) VALUES('$nama','$jenis','$umur')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>