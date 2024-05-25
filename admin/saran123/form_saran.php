<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <h3>Saran</h3>
    <input type="text" placeholder="Masukkan Nama" name="Nama" class="box">
    <input type="text" placeholder="Masukkan Jenis" name="Jenis" class="box">
    <input type="file" accept="image/png, image/jpeg, image/jpg" name="Image" class="box">
    <input type="submit" class="btn" name="add_product" value="Tambah Produk">
</form>
