<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
      /* CSS untuk Body */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

/* CSS untuk Container */
.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* CSS untuk Header */
.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: rgb(5, 116, 176);
    color: #ffffff;
}

.logo a {
    text-decoration: none;
    color: #ffffff;
    font-size: 24px;
    font-weight: bold;
}

.nav-links {
    display: flex;
}

.nav-links a {
    text-decoration: none;
    color: #ffffff;
    margin: 0 15px;
    font-size: 16px;
    position: relative;
    transition: color 0.3s;
}

.nav-links a::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #ffffff;
    transition: width 0.3s;
    position: absolute;
    bottom: -5px;
    left: 0;
}

.nav-links a:hover::after {
    width: 100%;
}

.nav-links a:hover {
    color: #87ceeb;
}

.auth-links {
    display: flex;
}

.auth-links a {
    text-decoration: none;
    color: #ffffff;
    margin-left: 15px;
    font-size: 16px;
    position: relative;
    transition: color 0.3s;
}

.auth-links a::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #ffffff;
    transition: width 0.3s;
    position: absolute;
    bottom: -5px;
    left: 0;
}

.auth-links a:hover::after {
    width: 100%;
}

.auth-links a:hover {
    color: #87ceeb;
}

/* CSS untuk Form */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #495057;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-control:focus {
    border-color: #80bdff;
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    border-radius: 4px;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    color: #fff;
    background-color: #0056b3;
    border-color: #004085;
}

.btn-secondary {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    color: #fff;
    background-color: #565e64;
    border-color: #434a50;
}

/* CSS untuk Footer */
footer {
    background-color: #0574B0;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

footer a {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
}

footer a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
<header class="admin-header">
        <div class="logo">
            <a href="datapantai.php">Hello Admin</a>
        </div>
        <nav class="nav-links">
            <a href="datauser.php">User</a>
            <a href="dataikan/dataikan.php">Konten</a>
            <a href="datakarang/datakarang.php">Kategori</a>
            <a href="../datapantai/datapantai.php">Diving</a>
            <a href="../transaksiadmin/transaksi.php">Transaksi</a>
            <a href="saran1/admin_page.php">Saran</a>
        </nav>
        <div class="auth-links">
            <a href="../../login.php">Logout</a>
           
        </div>
    </header>
<br> <br>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "../koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama ID
    if (isset($_GET['ID'])) {
        $ID=input($_GET["ID"]);

        $sql="select * from user where ID=$ID";
        $hasil=mysqli_query($mysql,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }
    
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ID=htmlspecialchars($_POST["ID"]);
        $gmails=input($_POST["Gmail"]);
        $Telepons=input($_POST["Telepon"]);
        $usernames=input($_POST["Username"]);
        $passwords=input($_POST["Password"]);
        $levels=input($_POST["Level"]);

        //Query update data pada tabel anggota
        $sql="update user set
            Gmail='$gmails',
            Telepon='$Telepons',
            Username='$usernames',
            Password='$passwords',
            Level='$levels'
            where ID=$ID";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($mysql,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            echo "<div class='alert alert-success'> Data berhasil disimpan.</div>";
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data User</h2>
<br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
        <label>Gmail:</label>
        <input type="text" name="Gmail" class="form-control" placeholder="Masukkan Gmail" value="<?php echo isset($data['Gmail']) ? $data['Gmail'] : ''; ?>" required />
    </div>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="Telepon" class="form-control" placeholder="Masukkan No Telepon" value="<?php echo isset($data['Telepon']) ? $data['Telepon'] : ''; ?>" required/>
    </div>
    <div class="form-group">
        <label>Username:</label>
        <input type="text" name="Username" class="form-control" placeholder="Masukkan Username" value="<?php echo isset($data['Username']) ? $data['Username'] : ''; ?>" required/>
    </div>
    <div class="form-group">
        <label>Password:</label>
        <input type="text" name="Password" class="form-control" placeholder="Masukkan Password" value="<?php echo isset($data['Password']) ? $data['Password'] : ''; ?>" required/>
    </div>
    <div class="form-group">
        <label>Level:</label>
        <select name="Level" id="Level" required>
            <option value="ADMIN" <?php echo (isset($data['Level']) && $data['Level'] == 'ADMIN') ? 'selected' : ''; ?>>Admin</option>
            <option value="USER" <?php echo (isset($data['Level']) && $data['Level'] == 'USER') ? 'selected' : ''; ?>>User</option>
        </select>
    </div>
    <input type="hidden" name="ID" value="<?php echo isset($data['ID']) ? $data['ID'] : ''; ?>" /><br><br>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <a href="datauser.php" class="btn btn-secondary">Cancel</a>
</form>

</div>
<br><br>
<footer>
        <p>&copy; 2024 Allfadhil_. All rights reserved.</p>
        <p>
            <a href="../proectDasprog/Project.php">Home</a> | 
            <a href="https://sites.google.com/view/allfadhil/beranda">About Me</a> | 
            <a href="../proectDasprog/ProjectProfil.php">Profil</a>
        </p>
    </footer>
</body>
</html>
