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
  <?php 
if(isset($_POST['sub'])) {
  $conn=mysqli_connect("localhost","root","","my_tile");
  if(!$conn){
   die("could not connect:".mysqli_error());
  }
  $a=$_POST['PRODUCT_NUMBER'];
  $sql1="SELECT PRODUCT_NUMBER FROM product_table WHERE PRODUCT_NUMBER='$a'";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 if(empty($row)){
   $_SESSION['PRODUCT_NUMBER']=$_POST['PRODUCT_NUMBER'];
  echo "<script>
 
   window.location.href='new_next.php'; </script>";
  //header("Location: new_product.php");

 }else{
     echo "<h6 style='color:green;'> This item is in product list</h6>";
 }
}

?>
    <div class="pagetitle">
        <h1>New Item</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">MY TILE</li>
            <li class="breadcrumb-item">Product List</li>
            <li class="breadcrumb-item active">New Item</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <div class="container"><div class=" text-center mt-5 ">
        
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form" action="#" method="post">
                            <div class="controls">
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">PRODUCT_NUMBER </label> <input id="form_name" type="text" name="PRODUCT_NUMBER" class="form-control" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    
                                    <div class="col-md-12"> <input type="submit" name="sub" class="btn btn-success btn-send pt-2 btn-block " value="Add item"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>
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