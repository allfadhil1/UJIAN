<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="width=device-width, initial-scale=1.0">
    <title>Pesona Lautan</title>
    <link rel="stylesheet" type="text/css" href="learnmore.css">
    
</head>

<body>

<header class="admin-header">
        <div class="logo">
            <a href="project.php">Hello User</a>
        </div>
        <nav class="nav-links">
            <a href="project.php">Home</a>
            <a href="ProjectProfil.php">Profil</a>
            <a href="user_form.php">Saran</a>
           
        </nav>
        <div class="auth-links">
            <a href="../login.php">Login</a>
            <a href="../register.php">Register</a>
        </div>
        <style>
            
         
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
    </header>

   <div class="containerr">
    <input id="slide1" type="radio" name="group" checked>
    <input id="slide2" type="radio" name="group">
    <input id="slide3" type="radio" name="group">
    <div class="dots">
        <label for="slide1"></label>
        <label for="slide2"></label>
        <label for="slide3"></label>
    </div>
    <div class="slider">
        <div class="slide" for="slide1" style="--img:url('ASSET/wp3258768.jpg')">
          <div class="content">
              <h2>Pesona Ikan</h2>
              <p>Ikan adalah anggota vertebrata poikilotermik (berdarah dingin) yang hidup di air dan bernapas dengan insang. Ikan merupakan kelompok vertebrata yang paling beraneka ragam dengan jumlah spesies lebih dari 27,000 di seluruh dunia.</p>
              <br>
              
               
               
               <a href="PesonaIkan.php">Learn More</a>
               
              
          </div>
         </div>
          <div class="slide" for="slide2" style="--img:url('ASSET/f9f06d34b883685b4b0a19a64b493cba.jpg')">
           <div class="content">
        
            <h2>Pesona Terumbu Karang</h2>
<p>Terumbu karang adalah ekosistem bawah laut yang terdiri dari kumpulan binatang karang yang membentuk struktur kalsium karbonat atau batu kapur. Ekosistem terumbu karang merupakan habitat bagi berbagai satwa laut dan menjadi penjaga keanekaragaman hayati di lautan.</p>
<br>

<a href="PesonaTerumbuKarang.php">Learn More</a>


          </div></div>
        <div class="slide" for="slide3" style="--img:url('ASSET/78ac1ebbf683f9fc75adf5b6d7083c43.jpg')">
        <div class="content">
<h2>Pesona Pantai</h2>
<p>Pantai adalah sebuah bentuk geografis yang terdiri dari pasir, dan terdapat di daerah pesisir laut. Daerah pantai menjadi batas antara daratan dan perairan laut. Kawasan pantai berbeda dengan pesisir walaupun antara keduanya saling berkaitan. </p>
<br>
<a href="PesonaPantai.php">Learn More</a>
          
    </div>
   </div>
   
</body>

</html>
