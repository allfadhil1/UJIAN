<?php

@include 'config.php';

if(isset($_POST['add_product'])){

   $Nama = $_POST['Nama'];
   $Jenis = $_POST['Jenis'];
   $Image = $_FILES['Image']['Nama'];
   $Image_tmp_Nama = $_FILES['Image']['tmp_Nama'];
   $Image_folder = 'uploaded_img/'.$Image;

   if(empty($Nama) || empty($Jenis) || empty($Image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO saran(Nama, Jenis, Image) VALUES('$Nama', '$Jenis', '$Image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($Image_tmp_Nama, $Image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM saran WHERE ID = $id");
   header('location:admin_page.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

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

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Saran</h3>
         <input type="text" placeholder="Masukkan Nama" name="Nama" class="box">
         <input type="text" placeholder="Masukkan Jenis" name="Jenis" class="box">
         <input type="file" accept="Image/png, Image/jpeg, Image/jpg" name="Image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM saran");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>product image</th>
            <th>product name</th>
            <th>product price</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['Nama']; ?></td>
            <td>$<?php echo $row['Jenis']; ?>/-</td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>