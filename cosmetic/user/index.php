<?php 
	session_start();
    include 'config.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEAUTY COSMETICS WEBSITE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="stylesheet/stylesheet.css">
</head>
<body>
<header class="header">
    <a href="#home" class="logo"> <img src="images/logo.png" alt=""> </a>
    <h2>Dark Mode ></h2>
    <input type="checkbox" id="darkToggle" class="darkToggle">
    <label for="darkToggle"></label>
    <form action="" class="search-form">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>
    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <a href="profile.php" class="fas fa-user"></a>
        <a href="#category" class="fas fa-shopping-cart"></a>
    </div>
</header>
<nav class="navbar">
    <div id="close-navbar" class="fas fa-times"></div>
    <a href="profile.php">profile</a>
    <a href="#home">home</a>
    <a href="#shop">cart</a>
    <a href="#gallery">gallery</a>
    <a href="logout.php">log out</a>
</nav>
<section class="home" id="home">
    <div class="slide active">
        <div class="content">
            <img src="images/content-img-2.png" alt="">
            <span>Beauty cosmetics</span>
            <h3>cosmetics</h3>
            <a href="#about" class="btn">Explore more</a>
        </div>
        <div class="image">
            <img src="images/home-img-2.png" alt="">
        </div>
    </div>

</section>
<section class="category">
    <?php 
        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
        if(mysqli_num_rows($kategori) > 0){
            while($k = mysqli_fetch_array($kategori)){
    ?>
        <a href="product.php?kat=<?php echo $k['category_id'] ?>" class="box">
            <img src="images/category-1.png" alt = "">
            <p><?php echo $k['category_name'] ?></p>
        </a>
    </a>
    <?php }}else{ ?>
        <p>Kategori tidak ada</p>
    <?php } ?>
    <a href="data-category.php" class="box">
            <img src="images/category-2.png" alt="">
        <p>More Category</p>
</section>
  <section class="about" id="about">
      <div class="content">
          <span>Biodata Developer</span>
          <p>Nama          : Jihan Hafizah Ariyani</p>
          <p>NIM           : 2009106038</p>
          <p>Program Studi : Informatika</p>
          <p>Angkatan      : 2020</p>
          <p>Hobi          : Membaca, menari</p>
          <p>Jobdesk       : Membuat keranjang belanja, membuat database keranjang, membuat login register</p><br></br>
          <p>Nama          : Sevina Afi Amalia</p>
          <p>NIM           : 2009106042</p>
          <p>Program Studi : Informatika</p>
          <p>Angkatan      : 2020</p>
          <p>Hobi          : Menonton, menyanyi</p>
          <p>Jobdesk       : Membuat halaman buy, membuat biodata</p><br></br>
          <p>Nama          : Hu, Natasya Prajna</p>
          <p>NIM           : 2009106048</p>
          <p>Program Studi : Informatika</p>
          <p>Angkatan      : 2020</p>
          <p>Hobi          : Membaca</p>
          <p>Jobdesk       : Memperbaiki profile, memperbaiki login</p><br></br>
      </div>
  </section>
<section class="arrivals" id="arrivals">
    <div class="heading">
        <h1>Product List</h1>
        <p>Explore more Our Products!</p>
    </div>
    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/makeup.png" alt="">
                </div>
                <div class="content">
                    <a href="buy.php" class="btn">Explore More</a>
                </div>
            </div>
</section>
<section class="gallery" id="gallery">
    <div class="heading">
        <h1>our gallery</h1>
        <p>Testimonial Products</p>
    </div>
    <div class="lightbox">
        <a href="images/img-1.jpg"><img src="images/img-1.jpg" alt=""></a>
        <a href="images/img-2.jpg"><img src="images/img-2.jpg" alt=""></a>
        <a href="images/img-3.jpg"><img src="images/img-3.jpg" alt=""></a>
        <a href="images/img-4.jpg"><img src="images/img-4.jpg" alt=""></a>
        <a href="images/img-5.jpg"><img src="images/img-5.jpg" alt=""></a>
        <a href="images/img-6.jpg"><img src="images/img-6.jpg" alt=""></a>
    </div>
</section>
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a class="link" href="#home"> <i class="fas fa-angle-right"></i> home</a>
            <a class="link" href="#shop"> <i class="fas fa-angle-right"></i> shop</a>
            <a class="link" href="#gallery"> <i class="fas fa-angle-right"></i> gallery</a>
            <!-- <a href="#" class="link"> <i class="fas fa-angle-right"></i> my order </a>
            <a href="#" class="link"> <i class="fas fa-angle-right"></i> my favorite </a>
            <a href="#" class="link"> <i class="fas fa-angle-right"></i> my wishlist </a> -->
        </div>
        <div class="box">
          <h3>Security and Using</h3>
          <a href="#" class="link"> <i class="fas fa-angle-right"></i> private policy </a>
          <a href="#" class="link"> <i class="fas fa-angle-right"></i> terms of use </a>
      </div>
        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-phone"></i> +6281255599526 </p>
            <p> <i class="fas fa-envelope"></i> beautycosmetics@gmail.com </p>
            <p> <i class="fas fa-map"></i> Samarinda, Kalimantan Timur </p>
            <div class="share">
                <a href="#" class="fab fa-linkedin"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-telegram"></a>
            </div>
        </div>
        <div class="box">
            <h3>newsletter</h3>
            <p>subscribe for latest updates</p>
            <form action="">
                <input type="email" name="" placeholder="enter your email" id="" class="email">
                <input type="submit" value="subscribe" class="btn">
            </form>
        </div>
    </div>
    <div class="credit"> 2022 <span>Beauty Cosmetics</span> | all rights reserved! </div>
</section>
<script>alert('Welcome in Beauty Cosmetics!')</script>
<script src="js/javascript.js"></script>
</body>
</html>