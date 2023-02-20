<?php
session_start();
$login=1;
if(isset($_SESSION['user'])){
  if($_SESSION['role']!="cust"){
   echo "<script>

   window.location.href='../shop/pages-login.php?login=$login'; </script>";
  }
}else{
 echo "<script>

 window.location.href='../shop/pages-login.php?login=$login'; </script>";
//header("Location: new_product.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>my_tile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="icon.png" rel="icon">
  <link href="icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- my tile -->
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <img src="icon/icon.png" alt="">
          <h1 class="text-light"><a href="home.php"><span>My tile</span></a></h1>
          
        </div>

        <nav id="navbar" class="navbar">
          <ul>
           
            
           
            <li><a class="nav-link scrollto " href="cart.php"><img src="shopping-cart-20392.png" alt="CART" style="width:32px;height:32px;"></a></li>
            <li><a class="nav-link scrollto" href="profile.php"><img src="PROFILE.png" alt="PROFILE" style="width:32px;height:32px;"></a></li>
            
            <li><a class="nav-link scrollto" href="order view.php"><img src="ORDERS.png" alt="MY ORDERS" style="width:32px;height:32px;"></a></li>
            <li><a class="getstarted scrollto" href="../tiles/tile.php">Tiles</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->
  <main id="main">
     <!-- ======= Breadcrumbs ======= -->
     <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>My Orders</h2>
          
          <ol>
            <li><a href="../home3/home.php">Home</a></li>
            <li>My Orders</li>
          </ol>
        </div>

      </div>
    </section>
   
    











<div class='d-flex flex-row align-items-center'><a href='javascript:history.back()'><i class='fa fa-long-arrow-left'></i><span class='ml-2'>Continue Shopping </a></span></div>
                    <hr>

  
  <table class="table datatable">










                <thead>
                  <tr>
                    <th scope="col">ORDER ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRODUCT_NUMBER</th>
                    <th scope="col">NO_OF_PIECES</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">ORDER_DATETIME</th>
                    <th scope="col">shop name</th>
                    <th scope="col">shop phone</th>
                    
                
                    <th scope="col">Address</th>
                    <th scope="col">ORDER_STATUS</th>
                    <th scope="col">Updation</th>

                  </tr>
                </thead>

<?php 
 include 'in.php';
 $user=$_SESSION['user'];
 #cust id
 $sql=" SELECT * FROM cust WHERE EMAIL='$user'";

 $result=mysqli_query($conn,$sql);
 $rowcust=mysqli_fetch_array($result);
 $CUST=$rowcust['CUST_ID'];
  $sql=" SELECT * FROM order_table WHERE CUST='$CUST' ";

  $result=mysqli_query($conn,$sql);
  while($rowd=mysqli_fetch_array($result)){
  
    $ORDER_ID=$rowd['ORDER_ID'];
    echo" <tbody>
                  <tr>
                    <th scope='row'>"; echo $rowd['ORDER_ID'];
    $sql=" SELECT * FROM order_details WHERE 	ORDER_ID='$ORDER_ID' ";

    $res=mysqli_query($conn,$sql);


    while($roworderde=mysqli_fetch_array($res)){
    $SHOP_ID=$roworderde['SHOP_ID'];

    $sql=" SELECT * FROM shop WHERE SHOP_ID='$SHOP_ID' ";

    $resultshop=mysqli_query($conn,$sql);
    $rowshop=mysqli_fetch_array($resultshop);


    $PRODUCT_NUMBER=$roworderde['PRODUCT_NUMBER'];
    $sql=" SELECT * FROM product_table WHERE PRODUCT_NUMBER='$PRODUCT_NUMBER' ";

    $resultpro=mysqli_query($conn,$sql);
    $rowpro=mysqli_fetch_array($resultpro);


    $sql=" SELECT * FROM cust WHERE CUST_ID='$CUST' ";

    $resultcust=mysqli_query($conn,$sql);
    $rowcust=mysqli_fetch_array($resultcust);
    
    


    
    
if(isset($s)){
if($ORDER_ID==$s){
  echo"<th></th>";
}}
$s=$ORDER_ID;
                echo "</th>
                    <td>";echo $rowpro['TILE_TYPE']; echo"</td>
                    <td>";echo $roworderde['PRODUCT_NUMBER']; echo"</td>
                    <td>"; echo $roworderde['NO_OF_PIECES']; echo"</td>
                    <td>";echo $rowd['TOTAL_PRICE']; echo"</td>
                    <td>";echo $rowd['_DATETIME']; echo"</td>
                    <td>"; echo $rowshop['SHOP_NAME'];echo"</td>
                    <td>"; echo $rowshop['CONTACT_NUMBER'];echo"</td>
                    
                    <td>"; echo $rowd['ADD_RESS']," \n \n",$rowd['PHN'];echo"</td>
                    <td>";echo $roworderde['INDI_STAT']; echo"</td>
                    <td><a href='#'  class='btn btn-outline-danger' role='button' aria-pressed='true'>cancel</a></td>
                  </tr>";
                  
    }
               echo" </tbody> ";}?>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
   
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

  

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>my tile</span>
          </strong> <br> All content on this website data is for informational purposes only
        </div>
        
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>