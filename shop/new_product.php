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
</script>
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


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
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
                    <img src="<?php
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
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php
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
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="shop tile view1.php">
                    <i class="bi bi-grid"></i>
                    <span>Stock</span>
                </a>
            </li>
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

            <li class="nav-item">
                <a class="nav-link collapsed" href="contact.php">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->






        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <?php


    if (isset($_POST['submit'])) {
      include 'in.php';
      $msg = "";
      $PRODUCT_NUMBER = $_POST['PRODUCT_NUMBER'];
      $target = "images/" . basename($_FILES['image']['name']);


      $image = $_FILES['image']['name'];
      $BRAND = $_POST['BRAND'];
      $GRADE = $_POST['GRADE'];
      $WIDTH = $_POST['WIDTH'];
      $LENGHT = $_POST['LENGHT'];
      $CATEGORY = $_POST['CATEGORY'];
      $ROOM_TYPE = $_POST['ROOM_TYPE'];
      $SHOP_ID = $_POST['SHOP_ID'];
      $PRICE = $_POST['PRICE'];
      $TILE_TYPE = $_POST['TILE_TYPE'];
      $BIO = $_POST['BIO'];



      $sql = "INSERT INTO product_table (PRODUCT_NUMBER,ROOM_TYPE,CATEGORY,_PHOTO,PRICE,BRAND,LENGHT,WIDTH,TILE_TYPE,GRADE,BIO) VALUES ('$PRODUCT_NUMBER','$ROOM_TYPE','$CATEGORY','$image','$PRICE','$BRAND','$LENGHT','$WIDTH','$TILE_TYPE','$GRADE','$BIO')";
      $res = mysqli_query($conn, $sql);
      $b = "inact";
      $sql = "INSERT INTO _stock (SHOP_ID,_STATUS,PRODUCT_NUMBER) VALUES ('$SHOP_ID','$b','$PRODUCT_NUMBER')";
      $res = mysqli_query($conn, $sql);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "uploaded successfully";
        echo "<meta http-equiv='refresh' content='0'>";
      } else {
        $msg = "not uploaded";
      }



      if ($res) {
        echo "your request sent successfully";
      }
    }
    ?>
        <div class="pagetitle">
            <h1>New Item</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">MY TILE</li>
                    <li class="breadcrumb-item">shop</li>
                    <li class="breadcrumb-item active">New Item</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <div class=" text-center mt-5 ">

            </div>
            <div class="row ">
                <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                            <div class="container">
                                <form id="contact-form" role="form" method="post" action="#"
                                    enctype="multipart/form-data">
                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_name">PRODUCT_NUMBER </label>
                                                    <input id="form_name" type="text" name="PRODUCT_NUMBER"
                                                        class="form-control"
                                                        value="<?php echo $_SESSION['PRODUCT_NUMBER']; ?>"
                                                        required="required" data-error="Firstname is required."
                                                        readonly> </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_lastname">PHOTO *</label>
                                                    <input type="file" name="image" class="form-control"
                                                        required="required" data-error="Lastname is required."> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_name">BRAND *</label> <input
                                                        id="form_name" type="text" name="BRAND" class="form-control"
                                                        required="required" data-error="Firstname is required."> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_lastname">GRADE*</label>
                                                    <input id="form_lastname" type="text" name="GRADE"
                                                        class="form-control" required="required"
                                                        data-error="Lastname is required."> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_lastname">WIDTH *</label>
                                                    <input id="form_lastname" type="text" name="WIDTH"
                                                        class="form-control" required="required"
                                                        data-error="Lastname is required."> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_name">LENGHT *</label> <input
                                                        id="form_name" type="text" name="LENGHT" class="form-control"
                                                        required="required" data-error="Firstname is required."> </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_name">CATEGORY *</label> <input
                                                    id="form_name" type="text" name="CATEGORY" class="form-control"
                                                    required="required" data-error="Firstname is required."> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_lastname">ROOM_TYPE *</label>
                                                <input id="form_lastname" type="text" name="ROOM_TYPE"
                                                    class="form-control" required="required"
                                                    data-error="Lastname is required."> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_lastname">SHOP_ID </label> <input
                                                    id="form_lastname" type="text" name="SHOP_ID"
                                                    value="<?php
                                                                                                                                                        include 'in.php';
                                                                                                                                                        $temp = $_SESSION["user"];
                                                                                                                                                        $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                                                                                                                        $result = mysqli_query($conn, $sql1);



                                                                                                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                                                                                                          echo $row['SHOP_ID'];
                                                                                                                                                        }
                                                                                                                                                        $temp = "g";
                                                                                                                                                        mysqli_close($conn); ?>"
                                                    class="form-control" required="required"
                                                    data-error="Lastname is required." readonly> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_email">PRICE *</label> <input
                                                    id="form_email" type="text" name="PRICE" class="form-control"
                                                    required="required" data-error="Valid email is required."> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_need">TILE TYPE *</label> <select
                                                    id="form_need" name="TILE_TYPE" class="form-control"
                                                    required="required" data-error="Please specify your need.">
                                                    <option value="" selected disabled>--Select Your Tile Type--
                                                    </option>
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
                                                    <option>PARKING TILES<< /option>
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
                                            <div class="form-group"> <label for="form_message">BIO *</label> <textarea
                                                    id="form_message" name="BIO" class="form-control"
                                                    placeholder="Write your message here." rows="4" required="required"
                                                    data-error="Please, leave us a message."></textarea> </div>
                                        </div>
                                        <div class="col-md-12"> <input type="submit"
                                                class="btn btn-success btn-send pt-2 btn-block " name="submit"
                                                value="Add item"> </div>
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