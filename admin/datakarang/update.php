<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_karang
    if (isset($_GET['id_karang'])) {
        $id_karang=input($_GET["id_karang"]);

        $sql="select * from karang where id_karang=$id_karang";
        $hasil = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_karang=htmlspecialchars($_POST["id_karang"]);
        $nama_karang=input($_POST["nama_karang"]);
        $jenis=input($_POST["jenis"]);
        $website=input($_POST["website"]);
    

        //Query update data pada tabel anggota
        $sql="update karang set
    nama_karang='$nama_karang',
    jenis='$jenis',
    website='$website'
    where id_karang=$id_karang";


        //Mengeksekusi atau menjalankan query diatas
        $hasil = mysqli_query($conn, $sql);
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:datakarang.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Karang:</label>
            <input type="text" name="nama_karang" class="form-control" placeholder="Masukan Nama Karang" required />

        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <input type="text" name="jenis" class="form-control" placeholder="Masukan Jenis" required/>
        </div>
        <div class="form-group">
            <label>Website:</label>
            <input type="text" name="website" class="form-control" placeholder="Masukan Website" required/>
        </div>
        
        <input type="hidden" name="id_karang" value="<?php echo $data['id_karang']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>