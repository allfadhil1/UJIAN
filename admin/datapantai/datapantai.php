<!DOCTYPE html>
<html>
<head>
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
        .options a {
            text-decoration: none;
            color: white;
            margin-left: auto;
        }
       
        .content1 a, .content2 a, .content3 a, .content4 a, .content5 a {
            display: grid;
            height: 40px;
            width: 150px;
            background: linear-gradient(#3a64f0, #4ce2ef);
            position: relative;
            margin: auto;
            place-items: center;
            font-family: "Poppins", sans-serif;
            color: #ffffff;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            letter-spacing: 3px;
            border-radius: 5px;
        }
        .content1 a { left: -200px; top: 20px; }
        .content2 a { top: -20px; }
        .content3 a { left: 200px; top: -60px; }
        .content4 a { left: 400px; top: -100px; }
        .content5 a { left: -400px; top: -140px; }

        .container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            table-layout: fixed;
        }
        th, td {
            word-wrap: break-word;
        }
        th.deskripsi-col, td.deskripsi-col {
            width: 350px; /* Atur lebar sesuai kebutuhan */
        }
    </style>
</head>
<title>Data User</title>
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
<br>

<h1></h1>
<div class="content1">
    <a href="../dataikan/dataikan.php">Data Ikan</a>
</div> 
<div class="content2">
    <a href="datapantai.php">Data Pantai</a>
</div>
<div class="content3">
    <a href="../datakarang/datakarang.php">Data Karang</a>
</div>
<div class="content4">
    <a href="../saran1/admin_page.php">Saran</a>
</div>
<div class="content5">
    <a href="../datauser.php">Data User</a>
</div>

<div class="container">
    <h4><center>DAFTAR PANTAI</center></h4>
    <?php
    include "koneksi.php";

    if (isset($_GET['id_pantai'])) {
        $id_pantai = htmlspecialchars($_GET["id_pantai"]);

        $sql = "DELETE FROM pantai WHERE id_pantai='$id_pantai'";
        $hasil = mysqli_query($conn, $sql);

        if ($hasil) {
            echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
            header("Location: datapantai.php");
        } else {
            echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
        }
    }
    ?>

    <br>
    <table class="my-3 table table-bordered">
        <thead>
        <tr class="table-primary">
            <th>No</th>
            <th>Nama Pantai</th>
            <th>Jenis</th>
            <th>Image</th>
            <th class="deskripsi-col">Deskripsi</th>
            <th>Website</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM pantai";
        $hasil = mysqli_query($conn, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data["nama_pantai"]; ?></td>
            <td><?php echo $data["jenis"]; ?></td>
            <td><img src="uploaded_img/<?php echo $data["gambar"]; ?>" alt="Gambar Pantai" width="100"></td>
            <td class="deskripsi-col"><?php echo nl2br($data["deskripsi"]); ?></td>
            <td><?php echo $data["website"]; ?></td>
            <td>
                <a href="update.php?id_pantai=<?php echo htmlspecialchars($data['id_pantai']); ?>" class="btn btn-warning btn-sm" role="button">Update</a> 
                <br> <br>
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_pantai=<?php echo $data['id_pantai']; ?>" class="btn btn-danger btn-sm" role="button">Delete </a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a><br><br><br>
</div>
</body>
</html>
