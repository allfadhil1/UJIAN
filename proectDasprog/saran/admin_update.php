<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $Nama = $_POST['Nama'];
   $Jenis = $_POST['Jenis'];
   $Image = $_FILES['Image']['name'];
$Image_tmp_Nama = $_FILES['Image']['tmp_name'];
   $Image_folder = 'uploaded_img/'.$Image;

   if(empty($Nama) || empty($Jenis) || empty($Image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO saran(Nama, Jenis, Image) VALUES('$Nama', '$Jenis', '$Image')";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($Image_tmp_Nama, $Image_folder);
         header('location:admin_page.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
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
      <input type="text" class="box" name="Nama" value="<?php echo $row['Nama']; ?>" placeholder="enter the product name">
      <input type="text" class="box" name="Jenis" value="<?php echo $row['Jenis']; ?>" placeholder="enter the product price">
      <input type="file" class="box" name="Image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>