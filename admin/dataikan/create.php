<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }

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

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: rgb(5, 116, 176);
            position: sticky;
            top: 0;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: rgb(255, 255, 255);
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: rgb(6, 154, 234);
        }

        li .dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgb(193, 8, 8);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: rgb(0, 0, 0);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

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

    </style>
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <a href="dataikan.php">Hello Admin</a>
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

            $nama = input($_POST["nama"]);
            $id_kategori = input($_POST["id_kategori"]);
            
            $Gambar = $_FILES['gambar']['name'];
            $Gambar_tmp_nama = $_FILES['gambar']['tmp_name'];
            $Gambar_folder = 'uploaded_img/' . $Gambar;
            $deskripsi = input($_POST["deskripsi"]);
            $website = input($_POST["website"]);

            // Query untuk menginput data ke dalam tabel ikan
            $sql = "INSERT INTO konten (nama, id_kategori, gambar, deskripsi, website) VALUES ('$nama', '$id_kategori', '$Gambar', '$deskripsi', '$website')";
            
            if (mysqli_query($conn, $sql)) {
                // Jika berhasil memasukkan data, pindahkan gambar ke folder yang ditentukan
                move_uploaded_file($Gambar_tmp_nama, $Gambar_folder);
               
                echo "<div class='alert alert-success'> Data berhasil disimpan.</div>";
              
                // Kosongkan nilai input setelah pengiriman sukses
                $_POST['nama'] = $_POST['id_kategori'] = $_POST['deskripsi'] = $_POST['website'] ='';
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Input Data Konten</h2><br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Ikan" required />
            </div>
            <div class="form-group">
            <label>Jenis:</label>

            <select name="id_kategori" id="id_kategori" required>
                        
                        <option disabled selected> Pilih </option>
                        <?php
                        $sql = "SELECT * FROM kategori";
                        $hasil = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_array($hasil)):
                      ?>
                        
                        <option value="<?php echo $data["id_kategori"];?>"><?php echo $data["nama_kategori"];?></option>
                          
                    
                        <?php endwhile;?>
            </select>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar" class="input-field" accept="image/png, image/jpeg, image/jpg" required>
            </div>
            <div class="form-group">
                <label>Deskripsi:</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi" required/>
            </div>
            <div class="form-group">
                <label>Website :</label>
                <input type="text" name="website" class="form-control" placeholder="Masukan Website" required/>
            </div><br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="dataikan.php" class="btn btn-secondary">Cancel</a>
        </form>
        <br><br>
    </div>
    <footer>
    <p>&copy; 2024 Allfadhil_. All rights reserved.</p>
    <p>
        <a href="Project.php">Home</a> | 
        <a href="https://sites.google.com/view/allfadhil/beranda">About Me</a> | 
        <a href="ProjectProfil.php">Profil</a>
    </p>
</footer>
</body>
</html>
