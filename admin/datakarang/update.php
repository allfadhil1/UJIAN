<!DOCTYPE html>
<html>
<head>
    <title>Form Update Karang</title>
    
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
            <a href="datakarang.php">Hello Admin</a>
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
            <a href="../../login.php">Logout</a>
           
        </div>
    </header>
<br> <br>
<div class="container">
    <?php
    // Include file koneksi, untuk menghubungkan ke database
    include "koneksi.php";

    // Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_kategori = input($_POST["id_kategori"]); // Ambil nilai id_kategori dari form

        $nama_kategori = input($_POST["nama_kategori"]);
      

    
       
      

            //Query update data pada tabel kategori
            $sql = "UPDATE kategori SET
            nama_kategori='$nama_kategori'
          
            WHERE id_kategori='$id_kategori'";
        
            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($conn, $sql);
            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:datakarang.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    

    // Mendapatkan id_kategori dari parameter URL (jika disediakan)
    $id_kategori = $_GET['id_kategori'];

    // Query untuk mendapatkan data kategori berdasarkan id_kategori
    $query_pantai = "SELECT * FROM kategori WHERE id_kategori = $id_kategori";

    // Eksekusi query
    $result = mysqli_query($conn, $query_pantai);

    // Periksa apakah data ditemukan
    if(mysqli_num_rows($result) > 0) {
        // Ambil data dari hasil query
        $row = mysqli_fetch_assoc($result);
        // Simpan nilai id_kategori ke dalam variabel
        $id_kategori = $row['id_kategori'];
    } else {
        // Tampilkan pesan jika data tidak ditemukan
        echo "Data kategori tidak ditemukan.";
    }
    ?>
    <h2>Update Data Kategori</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>"> <!-- Hidden input untuk menyimpan nilai id_kategori -->
        <div class="form-group">
            <label>Nama Kategori:</label>
            <input type="text" name="nama_kategori" class="form-control" placeholder="Masukan Nama Kategori" value="<?php echo $row['nama_kategori']; ?>" required />
        </div>
       
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="datakarang.php" class="btn btn-secondary">Cancel</a>
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
