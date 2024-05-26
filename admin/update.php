<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
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
    <h2>Update Data User</h2><br>


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
        <a href="datauser.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>