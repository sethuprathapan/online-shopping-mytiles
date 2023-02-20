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
        <a class="nav-link collapsed" href="new.php">
          <i class="bi bi-grid"></i>
          <span>NEW ITEM</span>
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
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">SHOP REGISTRATION</h5>
            <form action="#" method="post">
            <?php 

if(isset( $_POST['sub'] ))
{
   $shop_name=$_POST['shop_name'];
   $gst=$_POST['gst'];
   $em=$_POST['em'];
   $dis=$_POST['dis'];
   $add=$_POST['add'];
   $con=$_POST['con'];
   $pas=$_POST['pas'];
   $cnp=$_POST['cnp'];
$SHOP="shop";
   
    
    if( $pas==$cnp){
    $conn=mysqli_connect("localhost","root","","my_tile");
    if(!$conn){
     die("could not connect:".mysqli_error());
    }
    
    
    $sql="INSERT INTO _login (_USER_NAME,_PASSWORD,_ROLE) VALUES ('$em','$pas','$SHOP')";
    $res=mysqli_query($conn,$sql);
    
    if(!$res)
{
echo "<h6 style='color:red;'>this account is already existing </h6>";
}else{

$sql="INSERT INTO shop (SHOP_NAME,GST_NUMBER,Shop_email,_ADDRESS,CONTACT_NUMBER,DISTRICT) VALUES ('$shop_name','$gst','$em','$add','$con','$dis')";
$res=mysqli_query($conn,$sql);
if(!$res){

echo"error";
}
echo"<h6 style='color:green;'>Account created successfully\n</h6>";}

mysqli_close($conn);}else{
    echo "<h6 style='color:red;'>password missmatch</h6>";
}
  
}

?>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="SHOP NAME" name="shop_name" required autofocus>
                <label for="floatingInputUsername">SHOP NAME</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="GST NUMBER" name="gst" required autofocus>
                <label for="floatingInputUsername">GST NUMBER</label>
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" name="em" required autofocus>
                <label for="floatingInputEmail">Email</label>
              </div>

              <hr>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="DISTRICT" name="dis" required autofocus>
                <label for="floatingInputUsername">DISTRICT</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="ADDRESS" name="add" required autofocus>
                <label for="floatingInputUsername">ADDRESS</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="CONTACT NUMBER" name="con" required autofocus>
                <label for="floatingInputUsername">CONTACT NUMBER</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pas"  required autofocu>
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password" name="cnp" required autofocu>
                <label for="floatingPasswordConfirm">Confirm Password</label>
              </div>

              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit" name="sub">CREATE</button>
              </div>

              
              <hr class="my-4">

             

            </form>












          </div>
        </div>
      </div>
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