<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

|
     <div class="glass-containerr">
        <div class="login-box">
            <h2>Register</h2>
            <form action="register.php" method="post">

                <input type="text" id="Nama_Depan" name="Nama_Depan" required placeholder="Nama_Depan">
                
                <input type="text" id="Nama_Belakang" name="Nama_Belakang" required placeholder="Nama_Belakang">

                <input type="text" id="Username" name="Username" required placeholder="Username">

                <input type="password" id="Password" name="Password" required placeholder="Paassword">
                <br>
                <td>
                      <select name="Level" id="Level" required>
                        
                       <option disabled selected> Pilih </option>
                       <option value="ADMIN">Admin</option>
                           <option value="USER">User</option>
                       </select>
                           </td>
                <div class="options">
                    <input type="checkbox" id="Remember" name="remember">
                    <label for="Remember">Remember me</label>
                    <a href="halaman_login.php">Forgot Password?</a>
                </div>
                
                           <button name='Submit'>Register</button>

                
                
                

                <p>Have an account? <a href="login.php" id="login">Login</a></p>
                <?php
// Check If form submitted, insert form data into users table. 
if(isset($_POST['Submit'])) {
$namadepans= $_POST['Nama_Depan'];
$namabelakangs= $_POST['Nama_Belakang'];
$usernames = $_POST['Username'];
$passwords = $_POST['Password']; 
$levels= $_POST['Level'];
//echo($judul);
// include database connection file
include_once("koneksi.php");
// Insert user data into table
$result = mysqli_query($mysql,
"INSERT INTO user(Nama_Depan,Nama_Belakang,Username, Password, Level) VALUES ('$namadepans','$namabelakangs','$usernames', '$passwords', '$levels')");
// Show message when user added
// echo "Data added successfully. <a href='index.php'>View Data Buku</a>"; 
header("location:login.php");
}
?>
            </form>
        </div>
    </div>
   

</body>
    
</html>