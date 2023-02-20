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

  <!-- cart -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">

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
          <h2>Cart</h2>
          
          <ol>
            <li><a href="../home3/home.php">Home</a></li>
            <li>Cart</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <?php echo"
    <div class='container mt-5 p-3 rounded cart'>
        <div class='row no-gutters'>
            <div class='col-md-8'>
                <div class='product-details mr-2'>
                    <div class='d-flex flex-row align-items-center'><a href='javascript:history.back()'><i class='fa fa-long-arrow-left'></i><span class='ml-2'>Continue Shopping </a></span></div>
                    <hr>
                   ";

                   

                   
                    
                   include 'in.php';

if(isset($_GET['del'])){

  $v=$_GET['del'];

  $dele="DELETE FROM `cart_details` WHERE CARTDETAILS_ID='$v'";
  $r=mysqli_query($conn,$dele);
}



                        $user=$_SESSION['user'];
                        
                        #cust id
                      $sql=" SELECT * FROM cust WHERE EMAIL='$user'";

                      $result=mysqli_query($conn,$sql);
                      $rowcust=mysqli_fetch_array($result);
                      $CUST=$rowcust['CUST_ID'];
                      
#cart id
$sql=" SELECT CART_ID FROM cart WHERE CUST_ID='$CUST'";

$result=mysqli_query($conn,$sql);
$rowcart=mysqli_fetch_array($result);



                        
if(empty($rowcart['CART_ID'])){
  echo "<h2>Empty cart</h2>";
}else{  
  
          
  $cartid=$rowcart['CART_ID'];         

                        
 
#cart details

                        $sql1="SELECT * FROM cart_details WHERE CART_ID='$cartid'";
                        $result=mysqli_query($conn,$sql1);


                        
                        $row=mysqli_num_rows($result);
                        if($row==0){
                          echo "<h2>Empty cart</h2>";
                        }
                        else{

                        

  

                        echo" <h6 class='mb-0'>Shopping cart</h6>";
                    echo"<div class='d-flex justify-content-between'><span>You have ".$row." items in your cart</span>
                       
                    </div>";

                   
                     $sum=0;
                    while($row=mysqli_fetch_array($result))
                    {  $de_id=$row['CARTDETAILS_ID'];
                      $pro_no=$row['PRODUCT_NUMBER'];
                      #product table
                      $sql1="SELECT * FROM product_table WHERE PRODUCT_NUMBER='$pro_no'";
                      $resultpro=mysqli_query($conn,$sql1);
                      $rowpro=mysqli_fetch_array($resultpro);
                      #shop name
                      $shopid=$row['SHOP_ID'];
                      $sql1="SELECT * FROM shop WHERE SHOP_ID ='$shopid'";
                      $resultsh=mysqli_query($conn,$sql1);
                      $rowsh=mysqli_fetch_array($resultsh);

                      echo "<div class='d-flex justify-content-between align-items-center mt-3 p-3 items rounded'>
                        <div class='d-flex flex-row'><img class='rounded' src=";  
                        if(empty($rowpro['_PHOTO'])){
                       
                       
                         echo("../shop/assets/img/card.jpg");
                        }else echo("../shop/images/".$rowpro['_PHOTO']);
                        
                        
                        $tot=($row['PRICE']*$row['NO_OF_PIECES']);
                        
                                   echo" width='40'>
                            <div class='l-2'><span class='font-weight-bold d-block'><a href='inner_page_shop.php?a=$pro_no'>"; echo $rowpro['TILE_TYPE'];echo"</a>\n\n\n\n\n\n\n\n\n",$rowpro['LENGHT'],"*",$rowpro['WIDTH']; echo"</span><span class='spec'>"; echo "product no:\n". $row['PRODUCT_NUMBER'] ,"\n \n \n<br>",$rowpro['BRAND']," <br>  ".$rowsh['SHOP_NAME'],"\n\n\n\n\n\n\n shop id:", $row['SHOP_ID']; echo"</span></div>
                        </div>
                        <div class='d-flex flex-row align-items-center'><span class='d-block'>"; echo "No. of pieces :". $row['NO_OF_PIECES']; echo"</span><span class='d-block ml-5 font-weight-bold'>"; echo  "Per Piece : \n $". $row['PRICE']; $sum=$sum+($row['PRICE']* $row['NO_OF_PIECES']); echo"</span><span class='d-block ml-5 font-weight-bold'>"; echo  "Total Price : \n $". $tot;  echo"</span>
                        <a href='cart.php?del=$de_id'><i class='fa fa-trash-o ml-3 text-black-50'></i></a></div>
                    </div>";}
                    
                    $user=$_SESSION['user'];


                    $conn=mysqli_connect("localhost","root","","my_tile");
                    if(!$conn){
                     die("could not connect:".mysqli_error());
                    }
                    
                    $sql="SELECT * FROM cust WHERE EMAIL='$user'";
                    $result=mysqli_query($conn,$sql);
                    
                  
                    $re=mysqli_fetch_array($result);
                  
                  
                    $aa=$re['CUST_NAME'];
                    
                    $ad=$re['ADD_RESS'];
                    $PHN=$re['PHN'];
                    
              echo"  </div>
            </div>
            <div class='col-md-4'>
              <form action='#' method='post'>
              <div><label class='credit-card-label'>Name</label><input type='text' value='$aa' name='nn' required class='form-control credit-inputs' placeholder='name'></div>
            <div><label class='credit-card-label'>Address</label><input type='text' value='$ad' name='addr' required class='form-control credit-inputs' placeholder='Address'></div>
            <div><label class='credit-card-label'>contact number</label><input type='tel' name='nmbr' value='$PHN' required  class='form-control credit-inputs' placeholder='contact number'></div>

            



            <hr class='line'>
                <div class='payment-info'>
                    <div class='d-flex justify-content-between align-items-center'><span>Card details</span></div><span class='type d-block mt-3 mb-1'>Card type</span><label class='radio'> <input type='radio' name='card' value='payment' checked> <span><img width='30' src='https://img.icons8.com/color/48/000000/mastercard.png' /></span> </label>
                    <label class='radio'> <input type='radio' name='card' value='payment'> <span><img width='30' src='https://img.icons8.com/officel/48/000000/visa.png' /></span> </label>
                    <label class='radio'> <input type='radio' name='card' value='payment'> <span><img width='30' src='https://img.icons8.com/ultraviolet/48/000000/amex.png' /></span> </label>
                    <label class='radio'> <input type='radio' name='card' value='payment'> <span><img width='30' src='https://img.icons8.com/officel/48/000000/paypal.png' /></span> </label>
                    <div><label class='credit-card-label'>Name on card</label><input type='text' class='form-control credit-inputs' placeholder='Name'></div>
                    <div><label class='credit-card-label'>Card number</label><input type='text' class='form-control credit-inputs' placeholder='0000 0000 0000 0000'></div>
                    <div class='row'>
                        <div class='col-md-6'><label class='credit-card-label'>Date</label><input type='text' class='form-control credit-inputs' placeholder='12/24'></div>
                        <div class='col-md-6'><label class='credit-card-label'>CVV</label><input type='text' class='form-control credit-inputs' placeholder='342'></div>
                    </div>
                    <hr class='line'>
                    
                    <div class='d-flex justify-content-between information'><span>Total</span><span>$"; echo $sum."</span></div>
                    <div class='d-flex justify-content-between information'><span>gst 18%</span><span>$";
                    $d=$sum/100;
                    $gst=$d*18;
                    
                    
                    echo $gst."</span>
                    </div><div class='d-flex justify-content-between information'><span>Total(Incl. taxes)</span><span>$"; $t=$gst+$sum; echo $t."</span></div><input class='btn btn-primary btn-block d-flex justify-content-between mt-3' name='ss' type='submit' value='Order Now'>
                </div>
                
                </form>
            </div>
        </div>
    </div> ";}}
    ?>
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
  <?php 
 include 'in.php';



     if(isset($_POST['nmbr'])){

      $user=$_SESSION['user'];

    
       
            #cust id
            $sql=" SELECT * FROM cust WHERE EMAIL='$user'";

            $result=mysqli_query($conn,$sql);
            $rowcust=mysqli_fetch_array($result);
            $CUST=$rowcust['CUST_ID'];

            


#cart_details
      $sql=" SELECT * FROM cart_details WHERE CART_ID IN(SELECT CART_ID FROM cart WHERE CUST_ID IN (SELECT CUST_ID FROM cust WHERE EMAIL='$user' ) )";

      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result)){

        $CARTDETAILS_ID=$row['CARTDETAILS_ID'];
       $CART_ID=$row['CART_ID'];
        $SHOP_ID=$row['SHOP_ID'];
        $PRODUCT_NUMBER=$row['PRODUCT_NUMBER'];
       $NO_OF_PIECES=$row['NO_OF_PIECES'];
        $PRICE=$row['PRICE'];
        $TOTAL=$NO_OF_PIECES*$PRICE;
        $nmbr=$_POST['nmbr'];
      $addr=$_POST['addr'];



        $ORDER_STATUS="BOOKED";
        
        if(!isset($b)){$b=1;
          $date = date('Y-m-d H:i:s');
      $sql="INSERT INTO order_table (_DATETIME,CUST,TOTAL_PRICE,ADD_RESS,PHN)VALUES('$date','$CUST','$TOTAL','$addr','$nmbr')";
      $res=mysqli_query($conn,$sql);
        }
      $sql=" SELECT ORDER_ID FROM order_table WHERE _DATETIME='$date' ";

      $resultz=mysqli_query($conn,$sql);
      $roww=mysqli_fetch_array($resultz);
      $ORDER_ID=$roww['ORDER_ID'];

      $sql="INSERT INTO order_details (ORDER_ID ,PRODUCT_NUMBER,SHOP_ID,NO_OF_PIECES,PRICE,INDI_STAT)VALUES('$ORDER_ID','$PRODUCT_NUMBER','$SHOP_ID','$NO_OF_PIECES','$PRICE','$ORDER_STATUS')";
      $res=mysqli_query($conn,$sql);

      $sql="DELETE FROM cart_details WHERE CARTDETAILS_ID=$CARTDETAILS_ID ";
      $res=mysqli_query($conn,$sql);



      }





      
      echo "<meta http-equiv='refresh' content='0'>";

            
     }$b=null;
     
?>

</body>

</html>