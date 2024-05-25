<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $Nama = $_POST['Nama'];
   $Jenis = $_POST['Jenis'];
   $Image = $_FILES['Image']['name'];
   $Image_tmp_Nama = $_FILES['Image']['tmp_name'];
   $Image_folder = 'uploaded_img/'.$Image;

   if(empty($Nama) || empty($Jenis)){
      $message[] = 'Harap isi semua kolom';
   }else{
      if(!empty($Image)){
         // Jika gambar baru diunggah, perbarui semua data termasuk gambar
         $update = "UPDATE saran SET Nama = '$Nama', Jenis = '$Jenis', Image = '$Image' WHERE ID = '$id'";
         $upload = mysqli_query($conn, $update);

         if($upload){
            move_uploaded_file($Image_tmp_Nama, $Image_folder);
            header('Location: admin_page.php');
         }else{
            $message[] = 'Gagal memperbarui data!';
         }
      }else{
         // Jika gambar baru tidak diunggah, perbarui data kecuali gambar
         $update = "UPDATE saran SET Nama = '$Nama', Jenis = '$Jenis' WHERE ID = '$id'";
         $upload = mysqli_query($conn, $update);

         if($upload){
            header('Location: admin_page.php');
         }else{
            $message[] = 'Gagal memperbarui data!';
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Saran</title>
   <link rel="stylesheet" href="style.css">
   <style>
      .container {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         background-color: #f5f5f5;
      }
      .admin-product-form-container {
         background-color: #fff;
         padding: 20px;
         border-radius: 8px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         max-width: 400px;
         width: 100%;
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
         margin-bottom: 20px;
      }
      .box {
         width: calc(100% - 22px);
         padding: 10px;
         margin-bottom: 20px;
         border: 1px solid #ccc;
         border-radius: 5px;
      }
   </style>
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $msg){
         echo '<span class="message">'.$msg.'</span>';
      }
   }
?>

<div class="container">

<div class="admin-product-form-container centered">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM saran WHERE ID = '$id'");
      while($row = mysqli_fetch_assoc($select)){
   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Update Saran</h3>
      <input type="text" class="box" name="Nama" value="<?php echo $row['Nama']; ?>" placeholder="Masukkan Nama">
      <input type="text" class="box" name="Jenis" value="<?php echo $row['Jenis']; ?>" placeholder="Masukkan Jenis">
      <input type="file" class="box" name="Image" accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="Update Saran" name="update_product" class="btn">
      <a href="admin_page.php" class="btn">Kembali</a>
   </form>

   <?php }; ?>

</div>

</div>

</body>
</html>
