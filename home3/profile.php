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
          <h2>Profile</h2>
          
          <ol>
            <li><a href="../home3/home.php">Home</a></li>
            <li>Profile</li>
          </ol>
        </div>

      </div>
    </section>
   
    




















            <div class="pagetitle">
      <h5>USER DETAILS</h5>
     
    </div><!-- End Page Title html -->

    
              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  
                </thead>



                <?php

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
                echo"<tbody>
                  <tr> <form method='post' action='#'>

                    <th scope='row'>  <div class='form-floating mb-3'>
                    <input type='text' class='form-control' id='floatingPassword' placeholder='name' name='name' value='$aa'  required autofocu>
                    <label for='floatingPassword'>name</label>
                  </div>
    
                  
                    
                    <td>
                    <div class='form-floating mb-3'>
                    <input type='address' class='form-control' id='floatingPasswordConfirm' placeholder='Address' name='address' value='$ad' required autofocu>
                    <label for='floatingPasswordConfirm'>Address</label>
                  </div>
                  </th> </td>
                    <td>
                    <div class='form-floating mb-3'>
                    <input type='phone' class='form-control' id='floatingPasswordConfirm' placeholder='phone' name='phone' value='$PHN' required autofocu>
                    <label for='floatingPasswordConfirm'>phone</label>
                  </div>
                  </th> </td>";
                
                    echo"</td>
                    <td> 
                    
                    <button name='detail' class='btn btn-outline-success' >apply</button>
                  
                    </form></td>
                  </tr>";
                 
             
                   
                  if(isset($_POST['detail'] )){

                    $name=$_POST['name'];
                    $address=$_POST['address'];
                    $phone=$_POST['phone'];
                    $sql="UPDATE  cust SET CUST_NAME='$name' ,ADD_RESS='$address',PHN='$phone'  where EMAIL='$user' ";

                        $res=mysqli_query($conn,$sql);

                        echo'<meta http-equiv="refresh" content="0">';
                  }



                  









                    ?>
                   
                           
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <h5>PASSWORD UPDATION</h5>

              
              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  
                </thead>



                <?php




    
                echo"<tbody>
                  <tr> <form method='post' action='#'>

                    <th scope='row'>  <div class='form-floating mb-3'>
                    <input type='password' class='form-control' id='floatingPassword' placeholder='Password' name='pas'  required autofocu>
                    <label for='floatingPassword'>Password</label>
                  </div>
    
                  
                    
                    <td>
                    <div class='form-floating mb-3'>
                    <input type='password' class='form-control' id='floatingPasswordConfirm' placeholder='Confirm Password' name='new' required autofocu>
                    <label for='floatingPasswordConfirm'>new Password</label>
                  </div>
                  </th> </td>
                    <td>
                    <div class='form-floating mb-3'>
                    <input type='password' class='form-control' id='floatingPasswordConfirm' placeholder='Confirm Password' name='re' required autofocu>
                    <label for='floatingPasswordConfirm'>Confirm Password</label>
                  </div>
                  </th> </td>";
                
                    echo"</td>
                    <td> 
                    
                    <button name='apply' class='btn btn-outline-success' >apply</button>
                  
                    </form></td>
                  </tr>";
                 
                    if(isset( $_POST['apply'] ))
                    {
                      $pas=$_POST['pas'];
                       $new=$_POST['new'];
                       $re=$_POST['re'];
                     $ROLE="cust";
                     $user=$_SESSION['user'];
                        
                        if($re==$new){
                        $conn=mysqli_connect("localhost","root","","my_tile");
                        if(!$conn){
                         die("could not connect:".mysqli_error());
                        }
                        
                        $sql="SELECT * FROM _login WHERE _ROLE='$ROLE' AND _USER_NAME='$user'";
                        $result=mysqli_query($conn,$sql);
                        

                        $ress=mysqli_fetch_array($result);
                       if($ress['_PASSWORD']==$pas){

                  
                        
                        $sql="UPDATE  _login SET _PASSWORD='$new' where _ROLE='$ROLE' AND _USER_NAME='$user'";

                        $res=mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo"<h6 style='color:green;'>Password updated successfully\n</h6>";}else{
                          echo "<h6 style='color:red;'>Wrong password </h6>";
                        }
                       }else{
                        echo "<h6 style='color:red;'>password missmatch</h6>";
                    }
                        
                   
                    
                    }
                      
                    
                    
                    ?>
                   
                           
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
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