<?php
include 'koneksi.php';

$username = $_POST['Username'];
$password = $_POST['Password'];

$login = mysqli_query($mysql,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    if($data['Level']=="ADMIN"){

        $_SESSION['Username'] = $username;
        $_SESSION['Level'] == "ADMIN";

        header("location:admin/datauser.php");

    }else if($data['Level']=="USER"){

        $_SESSION['Username']=$username;
        $_SESSION['Level'] == "USER";

        header("location:proectDasprog/Project.php");

    }else{

        header("locationn:Project.php");

    }

}else{
    header("location:Project.php");
}
?>