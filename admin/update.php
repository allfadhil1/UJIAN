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
    include "../koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
    if (isset($_GET['ID'])) {
        $id=input($_GET["ID"]);

        $sql="select * from user where ID=$id";
        $hasil=mysqli_query($mysql,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=htmlspecialchars($_POST["ID"]);
        $namadepans=input($_POST["Nama_Depan"]);
        $namabelakangs=input($_POST["Nama_Belakang"]);
        $usernames=input($_POST["Username"]);
        $passwords=input($_POST["Password"]);
        $levels=input($_POST["Level"]);

        //Query update data pada tabel anggota
        $sql="update user set
			Nama_Depan='$namadepans',
			Nama_Belakang='$namabelakangs',
			Username='$usernames',
			Password='$passwords',
			Level='$levels'
			where ID=$id";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($mysql,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:datauser.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Depan:</label>
            <input type="text" name="Nama_Depan" class="form-control" placeholder="Masukan Nama Depan" required />

        </div>
        <div class="form-group">
            <label>Nama Belakang:</label>
            <input type="text" name="Nama_Belakang" class="form-control" placeholder="Masukan Nama Belakang" required/>
        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="Username" class="form-control" placeholder="Masukan Username" required/>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="text" name="Password" class="form-control" placeholder="Masukan Password" required/>
        </div>
        <div class="form-group">
            <label>Level:</label><br>
            <td>
                      <select name="Level" id="Level" required>
                       <option disabled selected> Pilih Level </option>
                          <option value="ADMIN">Admin</option>
                           <option value="USER">User</option>
                       </select>
                           </td>
           
        </div>
        <br><br><br>

        <input type="hidden" name="ID" value="<?php echo $data['ID']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>