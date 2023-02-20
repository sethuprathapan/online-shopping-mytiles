<?php
session_start();
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
 <!-- jquery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <li>Tiles </li>
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
                  <img src="<?php  $conn=mysqli_connect("localhost","root","","my_tile");
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

                <div class="swiper-slide">
                  <img src="<?php echo("../shop/images/".$row['_PHOTO']); ?>" alt="photo2">
                </div>

                <div class="swiper-slide">
                  <img src="<?php echo("../shop/images/".$row['_PHOTO']); ?>" alt="photo3">
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
                  
               echo" <li><strong>PRODUCT NUMBER</strong>:"; echo  $row['PRODUCT_NUMBER']; echo"</li>
                <li><strong>LENGTH : WIDTH</strong>:"; echo  $row['WIDTH']; echo"*"; echo  $row['LENGHT']; echo"</li>
                <li><strong>BRAND</strong>:"; echo  $row['BRAND']; echo"</li>
                <li><strong>TILE TYPE</strong>: "; echo  $row['TILE_TYPE']; echo"</li>
                <li><strong>GRADE:</strong>: "; echo  $row['GRADE']; echo"</li>
                <li><strong>ROOM TYPE</strong>:"; echo  $row['ROOM_TYPE']; echo"</li>
                <li><strong>CATEGORY</strong>:"; echo  $row['CATEGORY']; echo"</li>
                <li><strong>PRICE</strong>:"; echo  $row['PRICE']; echo"</li>
                </ul>
            </div>";echo"
            <div class='portfolio-description'>
              <h4>more about product</h4>
              <p>
              "; echo  $row['BIO']; echo" </p>
            </div>
            ";
$price=$row['PRICE'];
           $are=$row['LENGHT']*$row['WIDTH'];
            ?>
            
            <div class="portfolio-info">
              <h3>CALCULATION</h3>
              <div class="col-lg-4"> </div>
              <ul>
              <?php  
                    
                     if(isset($_POST['sub'])){ 
                      $no=$_POST['no'];
                      $area=$_POST['area'];
                      
                      $shop=$_POST['shop'];
                      $user=$_SESSION['user'];
                      $temp=$_GET['a'];
                      

                      #shop id
                      $sql=" SELECT SHOP_ID FROM shop WHERE SHOP_NAME='$shop'";

                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($result);
                      $shopid=$row['SHOP_ID'];
                      
                     #cust id
                      $sql=" SELECT * FROM cust WHERE EMAIL='$user'";

                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($result);
                      $CUST=$row['CUST_ID'];

#cart table
                      $sql=" SELECT CUST_ID FROM cart WHERE CUST_ID='$CUST'";

                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($result);
                      if(empty($row['CUST_ID'])){
                        #cart
                        $sql=" INSERT INTO cart(CUST_ID) VALUES('$CUST')";
                        $result=mysqli_query($conn,$sql);
                        


                    #cart details
                      $sql=" SELECT CART_ID FROM cart WHERE CUST_ID='$CUST'";

                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($result);
                      $cartid=$row['CART_ID'];
                        $sql=" INSERT INTO cart_details (CART_ID,SHOP_ID,PRODUCT_NUMBER,NO_OF_PIECES,PRICE) VALUES('$cartid','$shopid','$temp','$no','$price')";
                        $result=mysqli_query($conn,$sql);
                      }else{
                          #cart details
                      $sql=" SELECT CART_ID FROM cart WHERE CUST_ID='$CUST'";

                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($result);
                      $cartid=$row['CART_ID'];
                        $sql=" SELECT PRODUCT_NUMBER FROM cart_details WHERE PRODUCT_NUMBER='$temp' AND CART_ID='$cartid'";

                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($result);
                      if(empty($row['PRODUCT_NUMBER']))
                      {
                        
                         #cart
                      $sql=" SELECT CART_ID FROM cart WHERE CUST_ID='$CUST'";

                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($result);
                      $cartid=$row['CART_ID'];
                      
                        $sql=" INSERT INTO cart_details (CART_ID,SHOP_ID,PRODUCT_NUMBER,NO_OF_PIECES,PRICE) VALUES('$cartid','$shopid','$temp','$no','$price')";
                        $result=mysqli_query($conn,$sql);
                        
                          echo "<h6 style='color:green;'>new item added to cart</h6>";
                         
                      }else{
                         #cart
                      $sql=" SELECT CART_ID FROM cart WHERE CUST_ID='$CUST'";

                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($result);
                        $cartid=$row['CART_ID'];
                        $sql="UPDATE cart_details SET SHOP_ID='$shopid',NO_OF_PIECES='$no',PRICE='$price' WHERE PRODUCT_NUMBER='$temp' AND CART_ID='$cartid' ";
                        $res=mysqli_query($conn,$sql);
                        echo "<h6 style='color:green;'>UPDATED CART ITEM</h6>";

                      }

                       
                      }

                     
                      

                       }echo $are.$price;
               echo"<form action='#' method='post'>
                <li><strong>No:of pieces</strong>:<input type='number' onkeyup='cal()' name='no' id='no'></li>
               <br><h6 style='color:#778899'> OR </h6><br>
              <input type='hidden' id='are' value=$are  >
               <input type='hidden' id='pric' name='pric' value=$price >             
                <li><strong>Area of room</strong>:<input type='text' onkeyup='area_room()' name='area' id='area'></li><br>
                
                <li><strong> Total price</strong>:<input type='text' id='total' name='total' value='' readonly></li>
               
                <li><strong><select id='form_need' name='shop' class='form-control' required='required' data-error='Please specify your need.'>
                <option value='' selected disabled>--Select Your shop--</option>

                
                ";
                
                $sql1="SELECT SHOP_NAME FROM shop where SHOP_ID in (select SHOP_ID from _stock where PRODUCT_NUMBER='$temp' ) ";
                $result=mysqli_query($conn,$sql1);
                     
                
                while($row=mysqli_fetch_array($result))
                {
                 
                  echo"
                <option>$row[SHOP_NAME]</option>";
                }
                
              if(isset($_SESSION["user"])&&  $_SESSION["role"]=="cust") {
                
                echo" 
                
                
            </select> </strong></li>
            <li><strong><input type='submit' name='sub' class='btn btn-success btn-lg btn-block' value=' Add   to   cart' ></strong></li>
                </ul></form>
            </div>"; 
                }else{
                  $login=1;
                  echo" 
                
                
                  </select> </strong></li>
                  <li><strong><a type='button' class='btn btn-success btn-lg btn-block' href='../shop/pages-login.php?login=$login'> Add   to   cart</a></strong></li>
                      </ul></form>
                  </div>"; 
                }
               
            ?>     
                     
               <script> 
               function cal()
               {
   var no= document.getElementById("no").value;
   var are=document.getElementById("are").value;
   var price=document.getElementById("pric").value;
   var total=no*price;
 var a=are*no;
 

 $(document).ready(function() {
    $("#area").val(a);
    $("#total").val(total);
});
}

function area_room()
{
   var area= document.getElementById("area").value;
   var are=document.getElementById("are").value;
   var price=document.getElementById("pric").value;
   var x=area/are;
   var no=Math.ceil(x);
   var total=no*price;

 $(document).ready(function() {
    $("#no").val(no);
    $("#total").val(total);
});
}
</script>     
                  
            
          </div>

        </div>

      </div>
     
      
    </section><!-- End Portfolio Details Section -->
   
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
  <script src="assets/js/main.js">
    $(document).ready(function(){
    $("#visible").click(function(){
        $("p").show();
    });
     $("#hidden").click(function(){
        $("p").hide();
    });
});
  </script>


</body>

</html>