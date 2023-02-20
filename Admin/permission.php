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



    <!--  ullil Template Main CSS File -->
<link href="tile.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

<!--  reg -->
<link href="all.min.css" rel="stylesheet">


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
      <a class="nav-link collapsed" href="all_products.php">
        <i class="bi bi-grid"></i>
        <span>Tiles</span>
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
  <div class="pagetitle">
      <h1>STOCK UPDATIONS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
          <li class="breadcrumb-item">shop</li>
          <li class="breadcrumb-item active">STOCK UPDATIONS</li>
        </ol>
      </nav>
    </div><!-- End Page Title html -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">NEW STOCK</h5>
              <?php



$conn=mysqli_connect("localhost","root","","my_tile");
if(!$conn){
 die("could not connect:".mysqli_error());
}

$_STATUS="inact";

$sql=" SELECT * FROM _stock WHERE _STATUS='$_STATUS'";

$result=mysqli_query($conn,$sql);
$sss=mysqli_num_rows($result);
echo $sss;




?>
              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">STOCK_ID</th>
                    
                    <th scope="col">PRODUCT_NUMBER</th>
                    <th scope="col">TILE TYPE</th>
                    <th scope="col">SHOP ID</th>
                    <th scope="col">SHOP NAME</th>
                    <th scope="col">STATUS</th>
                <th scope="col">PERMISSION</th>
                   
                  </tr>
                </thead>



                <?php

while($row=mysqli_fetch_array($result))
{ $SHOP_ID=$row['SHOP_ID'];
    $sql=" SELECT SHOP_NAME FROM shop WHERE SHOP_ID='$SHOP_ID'";

    $resultshop=mysqli_query($conn,$sql);
    $rowshop=mysqli_fetch_array($resultshop);

    
    $PRODUCT_NUMBER=$row['PRODUCT_NUMBER'];
    $sql="SELECT TILE_TYPE FROM product_table WHERE PRODUCT_NUMBER='$PRODUCT_NUMBER'";

    $resultpro=mysqli_query($conn,$sql);
    $rowpro=mysqli_fetch_array($resultpro);



    
                echo"<tbody>
                  <tr>

                    <th scope='row'>"; echo $row['STOCK_ID']; $STOCK_ID=$row['STOCK_ID'];echo"</th>
                    
                    <td>";  $a=$row['PRODUCT_NUMBER'];echo" <div><a class='btn btn-outline-dark' role='button' aria-disabled='true' href='single_tile_admin.php?a=$a' '>$a</a></div></td>
                    <td>"; echo $rowpro['TILE_TYPE'];echo"</td>
                    <td>"; echo $row['SHOP_ID'];echo"</td>
                    <td>";  echo $rowshop['SHOP_NAME'];echo"</td>
                    <td>";  echo $row['_STATUS'];echo"</td>";
                    echo"</td>
                    <td> <form action='#' method='post'>
                    
                    <button name='ORDER_ID' value=$STOCK_ID class='btn btn-outline-success' >ALLOW</button>
                  
                    </form></td>
                  </tr>";}
                  if(isset($_POST['ORDER_ID'])){


                    $STOCK_ID=$_POST['ORDER_ID'];
                                        $_STATUS="activ";
                                        $sql="UPDATE _stock SET _STATUS='$_STATUS' WHERE STOCK_ID='$STOCK_ID'";
                                        $resHIPP=mysqli_query($conn,$sql);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                      }
                  
                 

                  
                 ?>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  
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