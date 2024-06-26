<?php
include "koneksi.php";

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_diving = input($_POST["id_diving"]); 

    $nama = input($_POST["nama"]);
    $harga = input($_POST["harga"]);
    
    $Gambar = $_FILES['gambar']['name'];
    $Gambar_tmp_nama = $_FILES['gambar']['tmp_name'];
    $Gambar_folder = 'uploaded_img/' . $Gambar;
    $deskripsi = input($_POST["deskripsi"]);
    $website = input($_POST["website"]);

    $allowed_extensions = array('png', 'jpeg', 'jpg');
    $file_extension = strtolower(pathinfo($Gambar, PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<div class='alert alert-danger'>Hanya file gambar PNG, JPEG, atau JPG yang diperbolehkan.</div>";
    } else {
        move_uploaded_file($Gambar_tmp_nama, $Gambar_folder);

        $sql = "UPDATE diving SET
        nama='$nama',
        harga='$harga',
        gambar='$Gambar',
        deskripsi='$deskripsi',
        website='$website'
        WHERE id_diving='$id_diving'";
    
        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            header("Location: datapantai.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
}

$id_diving = isset($_GET['id_diving']) ? $_GET['id_diving'] : null;

if ($id_diving === null) {
    echo "ID diving tidak tersedia.";
    exit;
}

$query_pantai = "SELECT * FROM diving WHERE id_diving = $id_diving";
$result = mysqli_query($conn, $query_pantai);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Data diving tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Update</title>
    <!-- CSS styles -->
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
            <a href="../datauser.php">User</a>
            <a href="../dataikan/dataikan.php">Konten</a>
            <a href="../datakarang/datakarang.php">Kategori</a>
            <a href="../datapantai/datapantai.php">Diving</a>
            <a href="../transaksiadmin/transaksi.php">Transaksi</a>
            <a href="../saran1/admin_page.php">Saran</a>
        </nav>
        <div class="auth-links">
            <a href="../../login.php">Login</a>
            <a href="../../register.php">Register</a>
        </div>
    </header>
<br> <br>
<div class="container">
    <h2>Update Data Pantai</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_diving" value="<?php echo $id_diving; ?>">
        <div class="form-group">
            <label>Nama Diving:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Diving" value="<?php echo $row['nama']; ?>" required />
        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukan Jenis" value="<?php echo $row['harga']; ?>" required />
        </div>
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" class="input-field" accept="image/png, image/jpeg, image/jpg" required>
        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi" value="<?php echo $row['deskripsi']; ?>" required />
        </div>
       <div class="form-group">
            <label>Website :</label>
            <input type="text" name="website" class="form-control" placeholder="Masukan Website" value="<?php echo $row['website']; ?>" required />
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="datapantai.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
<br><br>
<footer>
        <p>&copy; 2024 Allfadhil_. All rights reserved.</p>
        <p>
            <a href="Project.php">Home</a> | 
            <a href="https://sites.google.com/view/allfadhil/beranda">About Me</a> | 
            <a href="ProjectProfil.php">Profil</a>
        </p>
    </footer>
</html>
