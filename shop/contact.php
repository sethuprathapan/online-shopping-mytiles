<?php
session_start();
if (!isset($_SESSION['user'])) {
  echo "<script>
 
  window.location.href='../shop/pages-login.php'; </script>";
  if ($_SESSION['role'] != 'shop') {
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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


</head>

<body>

    <!-- ======= Header ======= html-->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="users-profile.php" class="logo d-flex align-items-center">
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

                <li class="nav-item dropdown">
                    <?php
          include 'in.php';
          $temp = $_SESSION['SHOP_ID'];
          $sql = "SELECT * FROM order_details WHERE (INDI_STAT='BOOKED'OR INDI_STAT='WARNING')  AND SHOP_ID='$temp'";
          $result = mysqli_query($conn, $sql);
          $no = mysqli_num_rows($result);
          ?>
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number"><?php echo $no;  ?></span>
                    </a><!-- End Notification Icon -->


                    <?php
          include 'in.php';


          $SHOP_ID = $_SESSION['SHOP_ID'];

          $sql = " SELECT * FROM order_details WHERE SHOP_ID=$SHOP_ID";

          $result = mysqli_query($conn, $sql);

          if ($no == 0) {
            echo " <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications'>
  <li class='dropdown-header'>
    You have no pending orders
    
  </li>
  

  <li>
    <hr class='dropdown-divider'>
  </li>";
          } else {
            echo " <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications'>
        <li class='dropdown-header'>
      
          You have";
            echo  $no;
            echo " new orders pending
          <a href='order.php'><span class='badge rounded-pill bg-primary p-2 ms-2'>View all</span></a>
        </li>
        

        <li>
          <hr class='dropdown-divider'>
        </li>";
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {

              if ($i == 4) {
                break;
              }
              $i++;
              $ORDER_ID = $row['ORDER_ID'];
              $BOOKED = "BOOKED";
              $sql = " SELECT * FROM order_table WHERE ORDER_ID=$ORDER_ID AND ORDER_ID in (SELECT ORDER_ID FROM order_details WHERE INDI_STAT='BOOKED' OR INDI_STAT='WARNING' )";

              $resultord = mysqli_query($conn, $sql);
              $roword = mysqli_fetch_array($resultord);
              if (empty($roword)) {
              } else {


                $sql = " SELECT * FROM cust WHERE CUST_ID IN (SELECT 	CUST FROM order_table WHERE ORDER_ID='$ORDER_ID')";

                $resultcust = mysqli_query($conn, $sql);
                $rowcust = mysqli_fetch_array($resultcust);

                if ($row['INDI_STAT'] == 'BOOKED') {

                  echo "<li class='notification-item'>
          <i class='bi bi-check-circle text-success'></i>
          <div>
            <h4>Booking</h4>
            <p>Order Id:";
                  echo $row['ORDER_ID'];
                  echo "</p>
            <p>Product no:";
                  echo $row['PRODUCT_NUMBER'];
                  $to = $row['NO_OF_PIECES'] * $row['PRICE'];
                  echo "</p>
            <p>Amount:";
                  echo $to;
                  echo "</p>
            <p>address:";
                  echo $roword['ADD_RESS'];
                  echo "</p>
          </div>
        </li>
        <li>
          <hr class='dropdown-divider'>
        </li>
        ";
                } else {
                  echo "<li class='notification-item'>

          <i class='bi bi-exclamation-circle text-warning'></i>
          <div>
            <h4>Warning</h4>
            <p>Order Id:";
                  echo $row['ORDER_ID'];
                  echo "</p>
            <p>Product no:";
                  echo $row['PRODUCT_NUMBER'];
                  $to = $row['NO_OF_PIECES'] * $row['PRICE'];
                  echo "</p>
            <p>Amount:";
                  echo $to;
                  echo "</p>
            <p>address:";
                  echo $roword['ADD_RESS'];
                  echo "</p>
          </div>
        </li>
        <li>
          <hr class='dropdown-divider'>
        </li>";
                }
              }
            }





            echo "<li>
          <hr class='dropdown-divider'>
        </li>
        <li class='dropdown-footer'>
          <a href='order.php'>Show all pending orders</a>
        </li>";
          }
          ?>





            </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?php $conn = mysqli_connect("localhost", "root", "", "my_tile");
                    include 'in.php';
                    $temp = $_SESSION["user"];
                    $sql1 = "SELECT image FROM shop WHERE Shop_email='$temp'";
                    $result = mysqli_query($conn, $sql1);
                    $row = mysqli_fetch_array($result);
                    if (empty($row['image'])) {


                      echo ("assets/img/card.jpg");
                    } else echo ("images/" . $row['image']);



                    $temp = "g";
                    mysqli_close($conn); ?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php $conn = mysqli_connect("localhost", "root", "", "my_tile");
                                                                include 'in.php';
                                                                $temp = $_SESSION["user"];
                                                                $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                                $result = mysqli_query($conn, $sql1);



                                                                while ($row = mysqli_fetch_array($result)) {
                                                                  echo $row['SHOP_NAME'];
                                                                }
                                                                $temp = "g";
                                                                mysqli_close($conn); ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php
                include 'in.php';
                $temp = $_SESSION["user"];
                $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                $result = mysqli_query($conn, $sql1);



                while ($row = mysqli_fetch_array($result)) {
                  echo $row['SHOP_NAME'];
                }
                $temp = "g";
                mysqli_close($conn); ?></h6>
                        <span><?php
                  include 'in.php';
                  $temp = $_SESSION["user"];
                  $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                  $result = mysqli_query($conn, $sql1);



                  while ($row = mysqli_fetch_array($result)) {
                    echo $row['GST_NUMBER'];
                  }
                  $temp = "g";
                  mysqli_close($conn); ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>


                    <li>
                        <hr class="dropdown-divider">
                    </li>


            </li>
            <li>
                <hr class="dropdown-divider">
            </li>


            <li>
                <hr class="dropdown-divider">
            </li>

            <li><?php
          $out = 1;
          echo '
              <a class="dropdown-item d-flex align-items-center" onclick="fun();" href="pages-login.php?out=$out">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>'; ?>
            </li>

            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">


            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.php">
                    <i class="bi bi-grid"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="shop tile view1.php">
                    <i class="bi bi-grid"></i>
                    <span>Stock</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="order details.php">
                    <i class="bi bi-grid"></i>
                    <span>Order Details</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="order.php">
                    <i class="bi bi-grid"></i>
                    <span>Pending Orders</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="new if have.php">
                    <i class="bi bi-grid"></i>
                    <span>Add ITEM</span>
                </a>
            </li>
            <!-- End Contact Page Nav -->






        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Contact</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">MY TILE</li>
                    <li class="breadcrumb-item">shop</li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section contact">

            <div class="row gy-4">

                <div class="col-xl-6">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="info-box card">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>rajakkad,central hub - mytile<br>idukki,kerala</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info-box card">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+91 9526656377<br>+91 9744520388</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info-box card">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>elphintomy5000@gmail.com<br>sethuprathapanmuthirayil@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info-box card">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-6">
                    <div class="card p-4">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                        required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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