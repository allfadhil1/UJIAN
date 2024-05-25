<?php
@include 'config.php';

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM saran WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header('Location: admin_page.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <ul>
        <li><a class="active" href="../proectDasprog/Project.php">Beranda</a></li>
        <li><a href="../proectDasprog/ProjectProfil.php">Profil</a></li>
        <li><a href="#">Medsos</a></li>
        <li style="float: right;"><a href="../login.php">Login</a></li>
        <li style="float: right;"><a href="../register.php">Register</a></li>
    </ul>
</nav>
<br>

<div class="content1"><a href="../index.php">Data Ikan</a></div> 
<div class="content2"><a href="PesonaIkan.php">Data Pantai</a></div>
<div class="content3"><a href="PesonaIkan.php">Data Karang</a></div>
<div class="content4"><a href="admin_page.php">Saran</a></div>
<div class="content5"><a href="../datauser.php">Data User</a></div>
<h1><center>DAFTAR SARAN</center></h1>
<div class="container">
    <?php
    $result = $conn->query("SELECT * FROM saran");
    ?>
    <div class="product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><img src="uploaded_img/<?php echo htmlspecialchars($row['Image']); ?>" height="100" alt="Gambar"></td>
                    <td><?php echo htmlspecialchars($row['Nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['Jenis']); ?></td>
                    <td>
                        <a href="admin_update.php?edit=<?php echo $row['ID']; ?>" class="btn"><i class="fas fa-edit"></i> Edit</a>
                        <a href="admin_page.php?delete=<?php echo $row['ID']; ?>" class="btn"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
