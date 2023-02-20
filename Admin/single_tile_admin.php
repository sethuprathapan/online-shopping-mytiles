<?php
session_start();
if(!isset($_SESSION['user'])){
  echo "<script>
 
  window.location.href='../shop/pages-login.php'; </script>";
  if($_SESSION['role']!='ADMIN'){
    echo "<script>
 
   window.location.href='../shop/pages-login.php'; </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>my tile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="icon/icon.png" rel="icon">
  <link href="icon/icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
   
  
  <!-- Template Main CSS File -->
   <link href="../home3/assets/css/style.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



 
<style>
a{
  color: black;
}

a:visited {
  color: black;
}

a:hover {
  color: black;
}

a:active {
  color: black;
} </style>
</head>

<body>

  <!-- ======= Header ======= html-->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="all_products.php" class="logo d-flex align-items-center">
        <img src="icon/icon.png" alt="">
        <span class="d-none d-lg-block">MY tile</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        
</ul>
</nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">


 

<li class="nav-item">
      <a class="nav-link collapsed" href="permission.php">
        <i class="bi bi-grid"></i>
        <span> STOCK UPDATIONS</span>
      </a>
      </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="orders.php">
        <i class="bi bi-grid"></i>
        <span>PENDING ORDERS</span>
      </a>
      </li>
      <li class="nav-item">
    <a class="nav-link collapsed" href="order details.php">
      <i class="bi bi-grid"></i>
      <span>ORDER DETAILS</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed" href="new.php">
      <i class="bi bi-grid"></i>
      <span>NEW ITEM</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed" href="shop-registration.php">
      <i class="bi bi-grid"></i>
      <span>SHOP REGISTRATION</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed" href="shops.php">
      <i class="bi bi-grid"></i>
      <span>shop DETAILS</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed" href="cust.php">
      <i class="bi bi-grid"></i>
      <span>CUSTOMER DETAILS</span>
    </a>
    </li>
<li class="nav-item">
    <a class="nav-link collapsed" href="profile.php">
      <i class="bi bi-grid"></i>
      <span>PROFILE</span>
    </a>
  </li>
  <?php 
  $out=1;
  
  echo'<li class="nav-item">
    <a class="nav-link collapsed" href="../shop/pages-login.php?out=$out">
      <i class="bi bi-grid"></i>
      <span>LOG OUT</span>
    </a>
  </li>'?>
  <!-- End Contact Page Nav -->

  


  
  
</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

  <hr>
  <div class='d-flex flex-row align-items-center'><a href='javascript:history.back()'><i class='fa fa-long-arrow-left'></i><span class='ml-2'>Continue Shopping </a></span></div>
                    <hr>
  
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

     
        <div class="d-flex justify-content-between align-items-center">
          <h2><?php  
                     
                     include 'in.php';
                     $temp=$_GET['a'];
                     $sql1="SELECT * FROM product_table WHERE PRODUCT_NUMBER='$temp'";

                     $result=mysqli_query($conn,$sql1);
                     $row=mysqli_fetch_array($result);
                     echo "TILE \n \n:\n\n";
                     echo  $row['TILE_TYPE'];
                     
                     ?></h2>
          
          <ol>
            <li><a href="../home3/home.php">Home</a></li>
            <li>Tiles</li>
            <li>product details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= shop and product detailed Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
      
        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="<?php 
                   include 'in.php';
           $temp=$_GET['a'];
           $sql1="SELECT _PHOTO FROM product_table WHERE PRODUCT_NUMBER='$temp'";
           $result=mysqli_query($conn,$sql1);
           $row=mysqli_fetch_array($result);
           if(empty($row['_PHOTO'])){


            echo("assets/img/card.jpg");
           }else echo("../shop/images/".$row['_PHOTO']);
           
           
          
           $temp="g";
                      ?>" alt="photo1">
                </div>

               

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>PRODUCT DISCRIPTION </h3>
              <div class="col-lg-4"> </div>
              <ul>
              <?php  
                     
                     include 'in.php';
                     $temp=$_GET['a'];
                     $sql1="SELECT * FROM product_table WHERE PRODUCT_NUMBER='$temp'";

                     $result=mysqli_query($conn,$sql1);
                     $row=mysqli_fetch_array($result);
                    $p=$row['PRODUCT_NUMBER'];
                    $w=$row['WIDTH'];
                    $l=$row['LENGHT'];
                    $b=$row['BRAND'];
                    $t=$row['TILE_TYPE'];
                    $g=$row['GRADE'];
                    $r=$row['ROOM_TYPE'];
                    $c=$row['CATEGORY'];
                    $pri=$row['PRICE'];
                    $bio=$row['BIO'];

               echo"<form action='#' method='post'> <li><strong>PRODUCT NUMBER</strong>:<input type=text name='PRODUCT_NUMBER' value='$p' readonly>";  echo"</li>
                <li><strong>WIDTH :</strong><input type=text name='WIDTH' value='$w'></li>
                <li><strong>LENGTH :</strong><input type=text name='LENGHT' value='$l'>"; echo"</li>
                <li><strong>BRAND</strong>:<input type=text name='BRAND' value='$b'>";  echo"</li>
                <li><strong>TILE TYPE</strong>:<input type=text name='TILE_TYPE' value='$t'> ";echo"</li>
                <li><strong>GRADE:</strong>:<input type=text name='GRADE' value='$g'> ";  echo"</li>
                <li><strong>ROOM TYPE</strong>:<input type=text name='ROOM_TYPE' value='$r'>"; echo"</li>
                <li><strong>CATEGORY</strong>:<input type=text name='CATEGORY' value='$c'>";  echo"</li>
                <li><strong>PRICE</strong>:<input type=text name='PRICE' value='$pri'>";  echo"</li>
                </ul>
               
            </div>";echo"
            <div class='portfolio-description'>
              <h4>more about product</h4>
              <p><input type=text name='bio' value='$bio'>
              "; echo" </p>
            </div>
            <input type='submit' class='btn btn-primary' value='save changes' name='submit'>
            </form>
            ";
                       $price=$row['PRICE'];
           $are=$row['LENGHT']*$row['WIDTH'];
            ?>
            
                
   <?php
   if(isset($_POST['submit']))
   {
    include 'in.php';
    $p=$_POST['PRODUCT_NUMBER'];
    $w=$_POST['WIDTH'];
    $l=$_POST['LENGHT'];
    $b=$_POST['BRAND'];
    $t=$_POST['TILE_TYPE'];
    $g=$_POST['GRADE'];
    $r=$_POST['ROOM_TYPE'];
    $c=$_POST['CATEGORY'];
    $pri=$_POST['PRICE'];
    $bio=$_POST['bio'];
    $sql="UPDATE product_table SET 	ROOM_TYPE='$r',CATEGORY='$c',PRICE='$pri',BRAND='$b' ,LENGHT='$l',WIDTH='$w',TILE_TYPE='$t',GRADE='$g',BIO='$bio' WHERE PRODUCT_NUMBER='$p'";
    
    $res=mysqli_query($conn,$sql);

    echo"<meta http-equiv='refresh' content='0'>";
   
  }
  
   ?>
                  
            
          

        </div>

      </div>
     
      
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>my tile</span></strong> All Rights Reserved
    </div>
   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>