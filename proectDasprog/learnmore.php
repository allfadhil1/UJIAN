<link rel="stylesheet" type="text/css" href="lenore.css">



<?php
session_start();

// Cek apakah pengguna sudah login dan levelnya adalah USER
if (!isset($_SESSION['Username']) || $_SESSION['Level'] != 'USER') {
    header("Location: ../login.php");
    exit();
}

// Isi halaman user di sini
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesona Lautan</title>
 
    <style>
@import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
}

.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #0574B0;
    color: #ffffff;
    position: absolute;
    width: 100%;
    z-index: 10;
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





.slider {
   
    display: flex;
    transition: transform 1.2s ease;
    height: 100%;
}

.slide {
    min-width: 100%;
    position: relative;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    color: #fff;
    text-align: left;
    box-sizing: border-box;
    height: 100vh;
    padding-left: 50px;
}

.slide::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7));
    z-index: 1;
}

.slide .content {
    position: relative;
    z-index: 2;
    padding: 20px;
    max-width: 600px;
    margin-top: 180px; /* Add margin-top to move the content down */
}

.slide h2 {
    font-size: 40px;
    margin-bottom: 20px;
}

.slide p {
    font-size: 20px;
    margin-bottom: 20px;
}

.slide a {
    background-color: #87ceeb;
    color: #0574B0;
    text-decoration: none;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.slide a:hover {
    background-color: #66b2e0;
}

.dots {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    display: flex;
    flex-direction: column;
}

.dots label {
    cursor: pointer;
    background: rgba(255, 255, 255, 0.5);
    padding: 10px 15px;
    margin: 5px 0;
    transition: background 0.3s;
    color: #000;
    text-align: center;
    border-radius: 5px;
}

.dots label:hover {
    background: rgba(255, 255, 255, 0.9);
}

#slide1:checked ~ .slider .slide:nth-child(1),
#slide2:checked ~ .slider .slide:nth-child(2),
#slide3:checked ~ .slider .slide:nth-child(3),
#slide4:checked ~ .slider .slide:nth-child(4) {
    transform: translateX(0%);
}

#slide1:checked ~ .dots label:nth-child(1),
#slide2:checked ~ .dots label:nth-child(2),
#slide3:checked ~ .dots label:nth-child(3),
#slide4:checked ~ .dots label:nth-child(4) {
    background-color: rgba(255, 255, 255, 0.9);
}

#slide1:checked ~ .slider {
    transform: translateX(0%);
}

#slide2:checked ~ .slider {
    transform: translateX(-100%);
}

#slide3:checked ~ .slider {
    transform: translateX(-200%);
}

#slide4:checked ~ .slider {
    transform: translateX(-300%);
}

        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        footer a:hover {
            text-decoration: underline;
        }

        .containerr {
    position: relative;
    width: 100%;
    height: auto; /* Ubah height menjadi auto */
    overflow: visible; /* Ubah overflow menjadi visible */
}

footer {
    position: fixed; /* Atur posisi footer tetap di bagian bawah */
    bottom: 0;
    width: 100%;
    background-color: #0574B0;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    z-index: 1000; /* Atur z-index agar muncul di atas elemen lainnya */
}


    </style>
</head>

<body>

<header class="admin-header">
    <div class="logo">
        <a href="project.php">Hello <?php echo $_SESSION['Username']; ?></a>
    </div>
    <nav class="nav-links">
        <a href="project.php">Home</a>
        <a href="ProjectProfil.php">About Me</a>
        <a href="riwayat.php">Riwayat</a>
        <a href="user_form.php">Saran</a>
    </nav>
    <div class="auth-links">
    <a href="../login.php">Logout</a>
        <a href="../register.php">Register</a>
    </div>
</header>

<div class="containerr">
    <input id="slide1" type="radio" name="group" checked>
    <input id="slide2" type="radio" name="group">
    <input id="slide3" type="radio" name="group">
    <input id="slide4" type="radio" name="group">
    <div class="dots">
        <label for="slide1">Ikan</label>
        <label for="slide2">Terumbu Karang</label>
        <label for="slide3">Pantai</label>
        <label for="slide4">Diving Yuk!</label>
    </div>
    <div class="slider">
        <div class="slide" style="background-image: url('ASSET/wp3258768.jpg');">
            <div class="content">
                <h2>Pesona Ikan</h2>
                <p>Ikan adalah anggota vertebrata poikilotermik (berdarah dingin) yang hidup di air dan bernapas dengan insang. Ikan merupakan kelompok vertebrata yang paling beraneka ragam dengan jumlah spesies lebih dari 27,000 di seluruh dunia.</p>
                <a href="PesonaIkan.php">Learn More</a>
            </div>
        </div>
        <div class="slide" style="background-image: url('ASSET/f9f06d34b883685b4b0a19a64b493cba.jpg');">
            <div class="content">
                <h2>Pesona Terumbu Karang</h2>
                <p>Terumbu karang adalah ekosistem bawah laut yang terdiri dari kumpulan binatang karang yang membentuk struktur kalsium karbonat atau batu kapur. Ekosistem terumbu karang merupakan habitat bagi berbagai satwa laut dan menjadi penjaga keanekaragaman hayati di lautan.</p>
                <a href="PesonaTerumbuKarang.php">Learn More</a>
            </div>
        </div>
        <div class="slide" style="background-image: url('ASSET/78ac1ebbf683f9fc75adf5b6d7083c43.jpg');">
            <div class="content">
                <h2>Pesona Pantai</h2>
                <p>Pantai adalah sebuah bentuk geografis yang terdiri dari pasir, dan terdapat di daerah pesisir laut. Daerah pantai menjadi batas antara daratan dan perairan laut. Kawasan pantai berbeda dengan pesisir walaupun antara keduanya saling berkaitan.</p>
                <a href="PesonaPantai.php">Learn More</a>
            </div>
        </div>
        <div class="slide" style="background-image: url('ASSET/diving.jpg');">
            <div class="content">
                <h2>Diving Yuk!</h2>
                <p>Diving merupakan salah satu kegiatan olahraga menyelam ke bawah laut dengan tujuan untuk melihat keindahan yang ada di dalam laut. Kegiatan ini dilakukan dengan menggunakan alat bantu agar para penyelam bebas bergerak dan dapat bernafas meskipun sedang berada di dalam air.</p>
                <a href="PesonaDiving.php">Learn More</a>
            </div>
        </div>
    </div>
</div>
<footer>
        <p>&copy; 2024 Allfadhil_. All rights reserved.</p>
        <p>
            <a href="Project.php">Home</a> | 
            <a href="https://sites.google.com/view/allfadhil/beranda">About Me</a> | 
            <a href="ProjectProfil.php">Profil</a>
        </p>
    </footer>
</body>
</html>
