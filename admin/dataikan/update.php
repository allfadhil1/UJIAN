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

        $id_konten = input($_POST["id_konten"]); // Ambil nilai id_konten dari form

        $nama = input($_POST["nama"]);
        $id_kategori = input($_POST["id_kategori"]);

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

            //Query update data pada tabel konten
            $sql = "UPDATE konten SET
            nama='$nama',
            id_kategori='$id_kategori',
            gambar='$Gambar',
            deskripsi='$deskripsi',
            website='$website'
            WHERE id_konten='$id_konten'";

            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($conn, $sql);
            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location: dataikan.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    }

    // Mendapatkan id_konten dari parameter URL (jika disediakan)
    if (isset($_GET['id_konten'])) {
        $id_konten = input($_GET['id_konten']);

        // Query untuk mendapatkan data konten berdasarkan id_konten
        $query_pantai = "SELECT * FROM konten WHERE id_konten = '$id_konten'";

        // Eksekusi query
        $result = mysqli_query($conn, $query_pantai);

        // Periksa apakah data ditemukan
        if (mysqli_num_rows($result) > 0) {
            // Ambil data dari hasil query
            $row = mysqli_fetch_assoc($result);
        } else {
            // Tampilkan pesan jika data tidak ditemukan
            echo "Data konten tidak ditemukan.";
            exit;
        }
    } else {
        echo "ID konten tidak disediakan.";
        exit;
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
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
<br><br>
<div class="container">
  
    <h2>Update Data Konten</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id_konten=" . $id_konten); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_konten" value="<?php echo $id_konten; ?>"> <!-- Hidden input untuk menyimpan nilai id_konten -->
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Ikan" value="<?php echo $row['nama']; ?>" required />
        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <select name="id_kategori" id="id_kategori" required>
                <option disabled selected>Pilih</option>
                <option value="1" <?php if ($row['id_kategori'] == 1) echo 'selected'; ?>>Ikan</option>
                <option value="2" <?php if ($row['id_kategori'] == 2) echo 'selected'; ?>>Terumbu Karang</option>
                <option value="3" <?php if ($row['id_kategori'] == 3) echo 'selected'; ?>>Pantai</option>
            </select>
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
            <label>Website:</label>
            <input type="text" name="website" class="form-control" placeholder="Masukan Website" value="<?php echo $row['website']; ?>" required />
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="dataikan.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<br><br>
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
