<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
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
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a class="active" href="../../proectDasprog/Project.php">Home</a></li>
        <li><a href="../../proectDasprog/ProjectProfil.php">Profil</a></li>
        <li><a href="#">Medsos</a></li>
        <li style="float: right;"><a href="../../login.php">Login</a></li>
        <li style="float: right;"><a href="../../register.php">Register</a></li>
    </ul>
</nav>
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

        $nama_ikan = input($_POST["nama_ikan"]);
        $jenis = input($_POST["jenis"]);
        
        $Gambar = $_FILES['gambar']['name'];
        $Gambar_tmp_nama = $_FILES['gambar']['tmp_name'];
        $Gambar_folder = 'uploaded_img/' . $Gambar;
        $deskripsi = input($_POST["deskripsi"]);
        $website = input($_POST["website"]);

        // Query untuk menginput data ke dalam tabel ikan
        $sql = "INSERT INTO ikan (nama_ikan, jenis, gambar, deskripsi, website) VALUES ('$nama_ikan', '$jenis', '$Gambar', '$deskripsi', '$website')";
        
        if (mysqli_query($conn, $sql)) {
            // Jika berhasil memasukkan data, pindahkan gambar ke folder yang ditentukan
            move_uploaded_file($Gambar_tmp_nama, $Gambar_folder);
           
            echo "<div class='alert alert-success'> Data berhasil disimpan.</div>";
            header("Location:dataikan.php");
            // Kosongkan nilai input setelah pengiriman sukses
            $_POST['nama_ikan'] = $_POST['jenis'] = $_POST['deskripsi'] = $_POST['website'] ='';
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Input Data Ikan</h2><br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Ikan:</label>
            <input type="text" name="nama_ikan" class="form-control" placeholder="Masukan Nama Ikan" required />
        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <input type="text" name="jenis" class="form-control" placeholder="Masukan Jenis" required/>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar:</label><br>
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
</div>
</body>
</html>
