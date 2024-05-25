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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_ikan
    if (isset($_GET['id_ikan'])) {
        $id_ikan=input($_GET["id_ikan"]);

        $sql="select * from ikan where id_ikan=$id_ikan";
        $hasil = mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_ikan=htmlspecialchars($_POST["id_ikan"]);
        $namaikan=input($_POST["nama_ikan"]);
        $jenis=input($_POST["jenis"]);
        $website=input($_POST["website"]);
    

        //Query update data pada tabel anggota
        $sql="update ikan set
    nama_ikan='$namaikan',
    jenis='$jenis',
    website='$website'
    where id_ikan=$id_ikan";


        //Mengeksekusi atau menjalankan query diatas
        $hasil = mysqli_query($kon, $sql);
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:dataikan.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Ikan:</label>
            <input type="text" name="nama_ikan" class="form-control" placeholder="Masukan Nama Ikan" required />

        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <input type="text" name="jenis" class="form-control" placeholder="Masukan Jenis" required/>
        </div>
        <div class="form-group">
            <label>Website:</label>
            <input type="text" name="website" class="form-control" placeholder="Masukan Website" required/>
        </div>
        
        <input type="hidden" name="id_ikan" value="<?php echo $data['id_ikan']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>