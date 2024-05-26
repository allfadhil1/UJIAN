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

        $id_karang = input($_POST["id_karang"]); // Ambil nilai id_karang dari form

        $nama_karang = input($_POST["nama_karang"]);
        $jenis = input($_POST["jenis"]);
        
        $Gambar = $_FILES['gambar']['name'];
        $Gambar_tmp_nama = $_FILES['gambar']['tmp_name'];
        $Gambar_folder = 'uploaded_img/' . $Gambar;
        $deskripsi = input($_POST["deskripsi"]);
        $website = input($_POST["website"]);

        // Validasi file gambar
        $allowed_extensions = array('png', 'jpeg', 'jpg');
        $file_extension = strtolower(pathinfo($Gambar, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            echo "<div class='alert alert-danger'>Hanya file gambar PNG, JPEG, atau JPG yang diperbolehkan.</div>";
        } else {
            // Pindahkan file gambar yang diunggah ke folder tujuan
            move_uploaded_file($Gambar_tmp_nama, $Gambar_folder);

            //Query update data pada tabel karang
            $sql = "UPDATE karang SET
            nama_karang='$nama_karang',
            jenis='$jenis',
            gambar='$Gambar',
            deskripsi='$deskripsi',
            website='$website'
            WHERE id_karang='$id_karang'";
        
            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($conn, $sql);
            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:datakarang.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    }

    // Mendapatkan id_karang dari parameter URL (jika disediakan)
    $id_karang = $_GET['id_karang'];

    // Query untuk mendapatkan data karang berdasarkan id_karang
    $query_pantai = "SELECT * FROM karang WHERE id_karang = $id_karang";

    // Eksekusi query
    $result = mysqli_query($conn, $query_pantai);

    // Periksa apakah data ditemukan
    if(mysqli_num_rows($result) > 0) {
        // Ambil data dari hasil query
        $row = mysqli_fetch_assoc($result);
        // Simpan nilai id_karang ke dalam variabel
        $id_karang = $row['id_karang'];
    } else {
        // Tampilkan pesan jika data tidak ditemukan
        echo "Data karang tidak ditemukan.";
    }
    ?>
    <h2>Update Data Karang</h2>
<br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_karang" value="<?php echo $id_karang; ?>"> <!-- Hidden input untuk menyimpan nilai id_karang -->
        <div class="form-group">
            <label>Nama Karang:</label>
            <input type="text" name="nama_karang" class="form-control" placeholder="Masukan Nama Karang" required />
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
        <a href="datakarang.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
