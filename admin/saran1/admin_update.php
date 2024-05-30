<?php
@include 'config.php';

$id_saran = isset($_GET['edit']) ? $_GET['edit'] : null;

if (!$id_saran) {
    die("Error: id_saran tidak ditentukan.");
}

if(isset($_POST['id_saran'])){
   $Nama = $_POST['Nama'];
   $Jenis = $_POST['Jenis'];
   $Deskripsi = $_POST['Deskripsi'];
   $Image = $_FILES['Image']['name'];
   $Image_tmp_Nama = $_FILES['Image']['tmp_name'];
   $Image_folder = 'uploaded_img/'.$Image;

   if(empty($Nama) || empty($Jenis)){
      $message[] = 'Harap isi semua kolom';
   } else {
      if(!empty($Image)){
         // Jika gambar baru diunggah, perbarui semua data termasuk gambar
         $update = "UPDATE saran SET Nama = '$Nama', Jenis = '$Jenis', Image = '$Image', Deskripsi = 'Deskripsi' WHERE id_saran = '$id_saran'";
         $upload = mysqli_query($conn, $update);

         if($upload){
            move_uploaded_file($Image_tmp_Nama, $Image_folder);
            header('Location: admin_page.php');
            exit();
         } else {
            $message[] = 'Gagal memperbarui data!';
         }
      } else {
         // Jika gambar baru tidak diunggah, perbarui data kecuali gambar
         $update = "UPDATE saran SET Nama = '$Nama', Jenis = '$Jenis', Deskripsi = 'Deskripsi' WHERE id_saran = '$id_saran'";
         $upload = mysqli_query($conn, $update);

         if($upload){
            header('Location: admin_page.php');
            exit();
         } else {
            $message[] = 'Gagal memperbarui data!';
         }
      }
   }
}
?>

<!DOCTYPE html>
<html lang="id_saran">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Saran</title>
   <link rel="stylesheet" href="style.css">
   <style>
      body, html {
         margin: 0;
         padding: 0;
         height: 100%;
         background-color: #f5f5f5;
      }
      .container {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 0px;
      }
      .admin-product-form-container {
         background-color: #fff;
         padding: -20px 0px; /* Ubah padding untuk mengurangi ukuran atas dan bawah */
         border-radius: 8px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         height: 20px;
         width: 100%;
         max-width: 600px; /* Lebar maksimum lebih kecil */
         box-sizing: border-box;
      }
      .message {
         display: block;
         margin-top: 10px;
         padding: 10px;
         border-radius: 5px;
         text-align: center;
         background-color: #f44336;
         color: white;
      }
      .btn {
         display: inline-block;
         background-color: #4CAF50;
         color: white;
         padding: 10px;
         text-decoration: none;
         border-radius: 5px;
         cursor: pointer;
      }
      .btn:hover {
         background-color: #45a049;
      }
      .title {
         margin-bottom: 10px; /* Kurangi margin bawah pada judul */
         text-align: center;
      }
      .box {
         width: 100%;
         padding: 10px;
         margin-bottom: 10px; /* Kurangi margin bawah pada input box */
         border: 1px solid #ccc;
         border-radius: 5px;
         box-sizing: border-box;
      }
   
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
        
         
.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #0574B0;
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
            <a href="admin_page.php">Hello Admin</a>
        </div>
        <nav class="nav-links">
            <a href="../datauser.php">User</a>
            <a href="../dataikan/dataikan.php">Ikan</a>
            <a href="../datakarang/datakarang.php">Karang</a>
            <a href="../datapantai/datapantai.php">Pantai</a>
            <a href="../saran1/admin_page.php">Saran</a>
        </nav>
        <div class="auth-links">
            <a href="../../login.php">Login</a>
            <a href="../../register.php">Register</a>
        </div>
    </header>
<br> <br><br>
<?php
   if(isset($message)){
      foreach($message as $msg){
         echo '<span class="message">'.$msg.'</span>';
      }
   }
?>
<?php
         $select = mysqli_query($conn, "SELECT * FROM saran WHERE id_saran = '$id_saran'");
         if($select && mysqli_num_rows($select) > 0) {
            while($row = mysqli_fetch_assoc($select)){
      ?>

<div class="container">
   <div class="admin-product-form-container centered">
   
      <form action="" method="post" enctype="multipart/form-data">
         <h3 class="title">Update Saran</h3>
         <input type="text" class="box" name="Nama" value="<?php echo htmlspecialchars($row['Nama']); ?>" placeholder="Masukkan Nama">
         <input type="text" class="box" name="Jenis" value="<?php echo htmlspecialchars($row['Jenis']); ?>" placeholder="Masukkan Jenis">
         <input type="text" class="box" name="Deskripsi" value="<?php echo htmlspecialchars($row['Deskripsi']); ?>" placeholder="Masukkan Jenis">
         <input type="file" class="box" name="Image" accept="image/png, image/jpeg, image/jpg">
         <input type="submit" value="Update Saran" name="id_saran" class="btn">
         <a href="admin_page.php" class="btn">Kembali</a>
      </form>
   
      <?php
            }
         } else {
            echo '<p class="message">Data tidak ditemukan</p>';
         }
      ?>
   </div>
</div>

</body>
</html>
