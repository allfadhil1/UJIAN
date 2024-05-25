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
    background-color:rgb(5, 116, 176);
    position: -webkit-sticky;
    position: sticky;
    top: o;
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
    display:inline-block;
}
.dropdown-content{
    display: none;
    position: absolute;
    background-color:rgb(193, 8, 8) ;
    min-width: 160px;
    box-shadow: 0px, 8px, 16px, 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}
.dropdown-content a{
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover{
    background-color: rgb(0, 0, 0);
}

.dropdown:hover .dropdown-content {
    display: block;
}

.options a {
    text-decoration: none;
    color: white;
    margin-left: auto;}

.content1 a{
    display: grid;
    height: 40px;
    width: 150px;
    background: linear-gradient(
        #3a64f0,
        #4ce2ef
    );
    position:relative;
    margin: auto;
    left: -200px;
    right: 0;
    top: 20px;
    bottom: 0;
    place-items: center;
    font-family: "Poppins",sans-serif;
    color: #ffffff;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    letter-spacing: 3px;
    border-radius: 5px;
}

.content2 a{
    display: grid;
    height: 40px;
    width: 150px;
    background: linear-gradient(
        #3a64f0,
        #4ce2ef
    );
    position:relative;
    margin: auto;
    left: 0px;
    right: 0;
    top: -20px;
    bottom: 0;
    place-items: center;
    font-family: "Poppins",sans-serif;
    color: #ffffff;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    letter-spacing: 3px;
    border-radius: 5px;
}

.content3 a{
    display: grid;
    height: 40px;
    width: 150px;
    background: linear-gradient(
        #3a64f0,
        #4ce2ef
    );
    position:relative;
    margin: auto;
    left: 200px;
    right: 0;
    top: -60px;
    bottom: 10;
    place-items: center;
    font-family: "Poppins",sans-serif;
    color: #ffffff;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    letter-spacing: 3px;
    border-radius: 5px;
}

.content4 a{
    display: grid;
    height: 40px;
    width: 150px;
    background: linear-gradient(
        #3a64f0,
        #4ce2ef
    );
    position:relative;
    margin: auto;
    left: 400px;
    right: 0;
    top: -100px;
    bottom: 10;
    place-items: center;
    font-family: "Poppins",sans-serif;
    color: #ffffff;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    letter-spacing: 3px;
    border-radius: 5px;
}

.content5 a{
    display: grid;
    height: 40px;
    width: 150px;
    background: linear-gradient(
        #3a64f0,
        #4ce2ef
    );
    position:relative;
    margin: auto;
    left: -400px;
    right: 0;
    top: -140px;
    
    place-items: center;
    font-family: "Poppins",sans-serif;
    color: #ffffff;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    letter-spacing: 3px;
    border-radius: 5px;
}

.head {
    display: ;
    position: center;
    font-size: 9px;
}


</style>
</head>
<title>
Data User</title>
<body>
<nav>
        <ul>
            <li><a class="active" href="../proectDasprog/Project.php">Home</a></li>
            <li><a href="../proectDasprog/ProjectProfil.php">Profil</a></li>
        
            <li><a href="#">Medsos</a></li>
     </div>
               
           
            <li style="float: right;"><a href="../login.php">Login</a></li>
            <li style="float: right;"><a href="../register.php">Register</a></li>
        </ul>
    </nav>
    <br>
    
    <h1></h1>
    <div class="content1">
    <a  href="dataikan/dataikan.php">Data Ikan</a>
    </div> 
    <div class="content2">
    <a  href="datapantai/datapantai.php">Data Pantai</a>
    </div>
    <div class="content3">
    <a  href="datakarang/datakarang.php">Data Karang</a>
    </div>
    <div class="content4">
    <a  href="saran/admin_page.php">Saran</a>
    </div>
    <div class="content5">
    <a  href="datauser.php">Data User</a>
    </div>

<div class="container">
   
    <h4><center>DAFTAR USER</center></h4>
   <?php

    include "../koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['ID'])) {
        $id=htmlspecialchars($_GET["ID"]);

        $sql="delete from user where ID='$id' ";
        $hasil=mysqli_query($mysql,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "../koneksi.php";
        $sql="select * from user";

        $hasil=mysqli_query($mysql,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["Nama_Depan"]; ?></td>
                <td><?php echo $data["Nama_Belakang"];   ?></td>
                <td><?php echo $data["Username"];   ?></td>
                <td><?php echo $data["Password"];   ?></td>
                <td><?php echo $data["Level"];   ?></td>
                <td>
                    <a href="update.php?ID=<?php echo htmlspecialchars($data['ID']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?ID=<?php echo $data['ID']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="../Register.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
