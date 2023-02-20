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


if(isset($_POST['submit'])) {
  $conn=mysqli_connect("localhost","root","","my_tile");
  if(!$conn){
   die("could not connect:".mysqli_error());
  }$msg="";
  $PRODUCT_NUMBER=$_POST['PRODUCT_NUMBER'];
  $target = "../shop/images/".basename($_FILES['image']['name']);
  

  $image=$_FILES['image']['name'];
  $BRAND=$_POST['BRAND'];
  $GRADE=$_POST['GRADE'];
  $WIDTH=$_POST['WIDTH'];
  $LENGHT=$_POST['LENGHT'];
  $CATEGORY=$_POST['CATEGORY'];
  $ROOM_TYPE=$_POST['ROOM_TYPE'];
  
  $PRICE=$_POST['PRICE'];
  $TILE_TYPE=$_POST['TILE_TYPE'];
  $BIO=$_POST['BIO'];

  
 
  $sql="INSERT INTO product_table (PRODUCT_NUMBER,ROOM_TYPE,CATEGORY,_PHOTO,PRICE,BRAND,LENGHT,WIDTH,TILE_TYPE,GRADE,BIO) VALUES ('$PRODUCT_NUMBER','$ROOM_TYPE','$CATEGORY','$image','$PRICE','$BRAND','$LENGHT','$WIDTH','$TILE_TYPE','$GRADE','$BIO')";
  $res=mysqli_query($conn,$sql);
 
  
  if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
    $msg="uploaded successfully";
   
  }else{
    $msg="not uploaded";
  }

  

  if($res)
{
echo " <h6 style='color:green;'>UPLOADED SUCCESSFULLY</h6>";
}
}
?>
    <div class="pagetitle">
        <a href="new.php"><h1>New Item</h1></a>
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
                        <form id="contact-form" role="form" method="post" action="#"  enctype="multipart/form-data">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">PRODUCT_NUMBER </label> <input id="form_name" type="text" name="PRODUCT_NUMBER" class="form-control" value="<?php echo $_SESSION['PRODUCT_NUMBER']; ?>" required="required" data-error="Firstname is required." readonly> </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">PHOTO *</label> <input  type="file" name="image" class="form-control"  required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">BRAND *</label> <input id="form_name" type="text" name="BRAND" class="form-control" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">GRADE*</label> <input id="form_lastname" type="text" name="GRADE" class="form-control"  required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">WIDTH *</label> <input id="form_lastname" type="text" name="WIDTH" class="form-control"  required="required" data-error="Lastname is required."> </div>
                                    </div><div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">LENGHT *</label> <input id="form_name" type="text" name="LENGHT" class="form-control" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    
                                    </div><div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">CATEGORY *</label> <input id="form_name" type="text" name="CATEGORY" class="form-control" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">ROOM_TYPE *</label> <input id="form_lastname" type="text" name="ROOM_TYPE" class="form-control"  required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                     
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">PRICE *</label> <input id="form_email" type="text" name="PRICE" class="form-control"  required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_need">TILE TYPE *</label> <select id="form_need" name="TILE_TYPE" class="form-control" required="required" data-error="Please specify your need.">
                                                <option value="" selected disabled>--Select Your Tile Type--</option>
                                                <option>CERAMIC</option>
                                                <option>DIGITAL WALL TILE</option>
                                                <option>PGVT & GVT</option>
                                                <option>DOUBLE CHARGE VERTIFIED TILES</option>
                                                <option>PORCELAIN SLAB</option>
                                                <option>HIGH DEPTH ELEVATION</option>
                                                <option>HIGH GLOSS WALL TILE</option>
                                                <option>STEP AND RISER / STRIPS</option>
                                                <option>DIGITAL PORCELAIN TILES</option>
                                                <option>DIGITAL PARKING TILES</option>
                                                <option>BORDER AND DECORATIVE TILES</option>
                                                <option>SUBWAY AND MOSAIC TILES</option>
                                                <option>FULL BODY VERTIFIED TILES</option>
                                                <option>FLOOR (PORCELAIN BODY) TILES</option>
                                                <option>PARKING TILES<</option>
                                                <option>NANO VITRIFIED</option>
                                                <option>ORDINARY WALL TILES</option>
                                                <option>GRANITE,STONE&QUARTZ</option>
                                                <option>WOODEN PLANKS</option>
                                                <option>OTHERS</option>
                                                
                                            </select> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">BIO *</label> <textarea id="form_message" name="BIO" class="form-control" placeholder="Write your message here." rows="4" required="required" data-error="Please, leave us a message."></textarea> </div>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " name="submit" value="Add item"> </div>
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